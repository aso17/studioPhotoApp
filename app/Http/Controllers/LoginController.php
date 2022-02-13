<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\hash;

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

        User::create([
            'customer_id' => $idcustomer,
            'role' => 1,
            'email' => $request->email,
            'password' => Hash::make($request->password)

        ]);
        return redirect('/registrasi')->with('success', 'registration successful silahkan login');
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
                    "img" => $user->photo

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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}