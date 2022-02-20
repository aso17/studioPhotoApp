<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Detail;
use Illuminate\Support\Arr;
use GuzzleHttp\Promise\Create;
use PHPUnit\Framework\Constraint\Count;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['product'] = Product::all();
        $data['category'] = Category::all();
        return view('customers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data['order'] = Order::leftJoin('categories', 'categories.id', '=', 'orders.category_id')
        //     ->leftJoin('products', 'products.id', '=', 'orders.product_id')
        //     ->leftJoin('customers', 'customers.id', '=', 'orders.cutomer_id')
        //     ->where('orders.cutomer_id', '=', session('id_user'))
        //     ->groupByRaw('cutomer_id')
        //     ->get();
        return view('customers.history');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $qtybaru = $request->jmlBeli;
        $productbeli = $request->product_id;
        $jmlPorduct = Count($productbeli);
        for ($in = 0; $in < $jmlPorduct; $in++) {
            $datStoklama = Product::where('id', '=', $productbeli[$in])->first();
            $stockbaru = $datStoklama->stock - $qtybaru[$in];
            Product::where('id', $productbeli[$in])
                ->update(['stock' => $stockbaru]);
        }


        $array = 12345;
        $kdtransaksi = rand(113, $array);
        $hrgCategory = $request->hrgCategory;
        $hrgTotalBingkai = $request->total;
        $tmpHrga = [];
        $jmlhrga = Count($request->total);
        $l = 0;
        for ($n = 0; $n < $jmlhrga; $n++) {
            $tmpHrga = $hrgTotalBingkai[$l] + $hrgTotalBingkai[$l + 1];
        }

        $grandTotal = $hrgCategory + $tmpHrga;
        $validate = $request->validate([
            'dateOrder' => 'required',

        ]);
        if ($validate === true) {
            return redirect('/customer')->with('error', 'harap isi dengan benar');
        } else {
            $productId = $request->product_id;
            $qtyBeli = $request->jmlBeli;
            $jmlId = Count($productId);
            for ($i = 0; $i < $jmlId; $i++) {
                Order::create([
                    'kodeTransaksi' => $kdtransaksi,
                    'dateOrder' => $request->dateOrder,
                    'qtyOrder' => $qtyBeli[$i],
                    'product_id' => $productId[$i],
                    'category_id' => $request->idcategory,
                    'cutomer_id' => session('id_user')
                ]);
            }
            Detail::create([
                'status' => "belum bayar",
                'kodeTransaksi' => $kdtransaksi,
                'proofTransfer' => "",
                'totalPrice' => $grandTotal,

            ]);

            $datStoklama = Product::where('id', '=', 1);


            return redirect('/customer')->with('success', 'pesanan telah dibuat lihat lanjutkan di menu pesanan');
        }
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