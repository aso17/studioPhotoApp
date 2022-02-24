<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;
use Dompdf\Dompdf;

class PrintController extends Controller
{
    public function PrintPdf($tglAwal, $tglAhir)
    {

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
        $view = view('report.pdf', $data);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream('reportradjastudio.pdf');
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