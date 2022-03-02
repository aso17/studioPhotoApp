<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Detail;

class PesananController extends Controller
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
            ->leftJoin('categories', 'categories.id', '=', 'orders.category_id')
            ->where('details.status', '=', 'belum bayar')
            ->groupByRaw('details.kodeTransaksi')
            ->select('details.*', 'categories.description as categoryName', 'categories.categoryPhoto', 'products.description', 'orders.dateOrder')
            ->get();
        return view('customers.pesanan', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'buktiTransfer' => 'required|image|file|mimes:jpeg,png,jpg|max:4048',
        ]);

        $file = $request->file('buktiTransfer');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'file-buktiTransfer';
        $file->move($tujuan_upload, $nama_file);

        Detail::where('kodeTransaksi', $request->kdTransaksi)
            ->update([
                'status' => "menuggu verifikasi",
                'proofTransfer' => $nama_file

            ]);
        return redirect('/pemesanan')->with('success', 'pemesanan successful menunggu verifikasi');
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
