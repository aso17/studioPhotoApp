<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Detail;
use Dompdf\Dompdf;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('report.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [

            'tgl_awal' => 'required',
            'tgl_ahir' => 'required'
        ];
        $messages = [
            'tgl_awal.required' => 'tanggal tidak boleh kosong!',
            'tgl_ahir.required' => 'tanggal tidak boleh kosong!',

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $tglAwal = $request->tgl_awal;
        $tglAhir = $request->tgl_ahir;
        $data['tglAwal'] = $tglAwal;
        $data['tglAhir'] = $tglAhir;
        $data['customers'] = Detail::leftJoin('orders', 'orders.kodeTransaksi', '=', 'details.kodeTransaksi')
            ->leftJoin('products', 'products.id', '=', 'orders.product_id')
            ->leftJoin('customers', 'customers.id', '=', 'orders.cutomer_id')
            ->leftJoin('categories', 'categories.id', '=', 'orders.category_id')
            ->where('dateOrder', '>=', $tglAwal)
            ->where('dateOrder', '<=', $tglAhir)
            ->groupByRaw('details.kodeTransaksi')
            ->select('details.*', 'categories.description as categoryName', 'categories.categoryPhoto', 'products.description', 'orders.dateOrder', 'customers.*')
            ->get();

        $data['total'] = $this->sumtotal($tglAwal, $tglAhir)->sum('totalPrice');
        return view('report.sort', $data);
    }

    public function sumtotal($tglAwal, $tglAhir)
    {
        return Detail::whereBetween('dateOrder',  [$tglAwal, $tglAhir])
            ->Join('orders', 'orders.kodeTransaksi', '=', 'details.kodeTransaksi')
            ->where('dateOrder', '<=', $tglAhir)
            ->groupBy('details.kodeTransaksi')
            ->get();
    }
}