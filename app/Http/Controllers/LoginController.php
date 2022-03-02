<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use DateTime;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'fullName' => 'required',
            'phoneNumber' => 'required|unique:customers',
            'addres' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:4',
            'photo' => 'required|image|file|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);


        $file = $request->file('photo');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'photo-users';
        $file->move($tujuan_upload, $nama_file);

        Customer::create([
            'fullName' => $request->fullName,
            'phoneNumber' => $request->phoneNumber,
            'addres' => $request->addres,
            'photo' => $nama_file
        ]);

        $idcustomer = Customer::max('id');
        $tgl = sha1(time());
        User::create([
            'customer_id' => $idcustomer,
            'role' => 1,
            'code_verified_at' => $tgl,
            'email' => $request->email,
            'password' => Hash::make($request->password)

        ]);
        // $user = new user();
        if ($request->email != null) {
            MailController::sendSignupEmail($request->fullName, $request->email, $tgl);
            return redirect('/')->with('success', 'Registration success  silahkan check email anda untuk verifikasi');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function sigIn(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',

        ]);
        //mengambil data dari dua tabel untuk set sessions
        $user = user::leftJoin('customers', 'customers.id', '=', 'users.customer_id')
            ->where('users.email', '=', $request->email)->first();
        // dd($user);
        //pengecekan user
        if (!empty($user)) {

            //cek password
            if (Hash::check($request->password, $user->password)) {
                session([
                    "login" => true,
                    "id_user" => $user->id,
                    "fullName" => $user->fullName,
                    "email" => $user->email,
                    "name" => $user->fullName,
                    "img" => $user->photo,
                    "alamat" => $user->addres,
                    "no_phone" => $user->phoneNumber

                ]);
                if ($user->role == 1) {
                    return redirect('/customer');
                } else {
                    return redirect('/dashboard');
                }
            } else {
                return redirect('/')->with('error', 'Password wrong!!');
            }
        } else {
            return redirect('/')->with('error', 'Not Registered Please Register');
        }
    }
    public function verify($verifyCode)
    {
        $user = User::where(['code_verified_at' => $verifyCode])->first();
        if ($user != null) {
            // $i = $user->is_verified;
            // var_dump($i);
            // die;
            if ($user->is_verified == 0) {
                $user->is_verified = 1;
                $user->save();
                return redirect('/')->with('success', 'verifikasi berhasil silahkan login');
            } else {
                return redirect('/')->with('error', 'verifikasi sudah di lakukan silahkan login');
            }
        }
    }
    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}