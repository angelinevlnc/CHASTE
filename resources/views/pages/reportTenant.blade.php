@extends('layouts.appTenant', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Report'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Laporan Laba Rugi</h6>
                        <table id="pengeluaranTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th style="color: red">Pengeluaran: </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sewa Tenant</td>
                                    <td>1.000.000</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <table id="pendapatanTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th style="color: green">Pendapatan: </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>12/12/2023</td>
                                    <td>50.000</td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <span style="color: red">Total Kerugian: 950.000</span>
                        <br>
                        <span style="color: green">Total Keuntungan: 0</span>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection