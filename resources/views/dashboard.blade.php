@extends('layouts.admin')

@section('content')


<div class="container-fluid bg-light">
    <div class="row">
        <div class="col-md-12">
            <h1>Dasboard</h1>
            <div class="jumbotron bg-light">
                <h1 class="display-4"></h1>
                <p class="lead"></p>
                <hr class="my-4">

                <p class="lead">
                    <a class="btn btn-default btn-sm" data-toggle="modal" data-target="#tentangmodal"
                        role="button">Pelajari</a>
                </p>
            </div>
            <h4> </h4>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="tentangmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tentang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Aturan Penggunaan </h5>
                <ul class="list-unstyled">
                    <li>Penentuan Sanksi dilakukan berdasarkan pelanggaran yang sifatnya terstruktur
                    </li>
                    <li>Penilaian yang dilakukan atas pelanggaran yang dilakukan</li>
                    <li>Pemberian sanksi diberikan dari nilai terkecil</li>
                    <li>Semakin kecil Penilaian semakin berat sanksi yang diberikan</li>
                    <li> <strong> Kriterian Penilaian</strong>
                        <ul>
                            <li>Karyawan tidak masuk kerja satu hari tanpa Keternagan</li>
                            <li>izin telat masuk kerja lebih dari tiga kali dalam satu bulan</li>
                            <li>izin cuti mendadak lebih dari dua kali dalam satu bulan.</li>

                        </ul>
                    </li>

                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn detail btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

@endsection