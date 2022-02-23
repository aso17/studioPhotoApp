<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;

class AdminCustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['order'] = Detail::leftJoin('orders', 'orders.kodeTransaksi', '=', 'details.kodeTransaksi')
            ->leftJoin('products', 'products.id', '=', 'orders.product_id')
            ->leftJoin('customers', 'customers.id', '=', 'orders.cutomer_id')
            ->leftJoin('categories', 'categories.id', '=', 'orders.category_id')
            ->groupByRaw('details.kodeTransaksi')
            ->select('details.*', 'categories.description as categoryName', 'categories.categoryPhoto', 'products.description', 'orders.dateOrder', 'customers.*')
            ->get();
        return view('adminCustomers.index', $data);
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
        Detail::where('kodeTransaksi', $request->kode_transaksi)
            ->update([
                'status' => "sudah terverifikasi",
            ]);
        return redirect('/adminCustomers')->with('success', 'pemesanan successful selesai verifikasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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