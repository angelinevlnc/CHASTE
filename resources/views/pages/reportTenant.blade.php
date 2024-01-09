@extends('layouts.appTenant', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Report'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Laporan Laba Rugi</h6>
                        <h5 style="color: red">Pengeluaran</h5>
                        <form action="{{ route('pengeluaran.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                            </div>
                            <div class="form-group">
                                <label for="nominal">Nominal</label>
                                <input type="number" class="form-control" id="nominal" name="nominal" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Pengeluaran</button>
                        </form>
                        <table id="pengeluaranTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th style="color: red">No</td>
                                    <th style="color: red">Keterangan</td>
                                    <th style="color: red">Nominal Pengeluaran</td>
                                </tr>
                            </thead>
                            @php
                                $counter = 1;
                            @endphp
                            <tbody>                               
                                @foreach($pengeluaran as $item)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <span style="color: red">Total Pengeluaran: Rp {{ number_format($result['totalPengeluaran'],0,',','.') }}</span>
                        <br>
                        <br>
                        <h5 style="color: green">Pendapatan</h5>
                        <table id="pendapatanTable" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th style="color: green">No</th>
                                    <th style="color: green">Tanggal</th>
                                    <th style="color: green">Total Pendapatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach($pendapatan as $p)
                                    <tr>
                                        <td>{{ $counter++ }}</td>
                                        <td>{{ $p->created_at->format('d/m/Y') }}</td>
                                        <td>Rp {{ number_format($p->total, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <span style="color: green">Total Pendapatan: Rp {{ number_format($result['totalPendapatan'],0,',','.') }}</span>
                        <br>
                        <br>
                        <br>
                        <h5 style="color: red">Total Kerugian: Rp {{ number_format($result['totalKerugian'],0,',','.') }}</h5>
                        <br>
                        <h5 style="color: green">Total Keuntungan: Rp {{ number_format($result['totalKeuntungan'],0,',','.') }}</h5>
                        @if ($result['totalKeuntungan'] > 0)
                            <br>
                            <h5 style="color: green">Total Keuntungan: Rp {{ number_format($result['totalKeuntungan'],0,',','.') }}</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
