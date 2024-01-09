@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Laporan Keuangan'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-7"">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Income Expenses</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 justify-content-between ps-0 mb-2 border-radius-lg">
                                <h6 class="mb-1 text-dark font-weight-bold text-sm">19 Nov 23</h6>
                                <div class="align-items-center text-sm">
                                    HT001 <br> Rp2.000.000 <br> Pay Salary
                                </div>
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                </div>
                            </li>
                            <li class="list-group-item border-0 justify-content-between ps-0 mb-2 border-radius-lg">
                                <h6 class="mb-1 text-dark font-weight-bold text-sm">20 Nov 23</h6>
                                <div class="align-items-center text-sm">
                                    HT001 <br> Rp5.000.000 <br> Pay Salary
                                </div>
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h1></h1>
                        <h6>Add Expenses</h6>
                        <form action="{{ route('add-expense') }}" method="post">
                        @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input class="form-control" type="text" id="" name="nama">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Total Payment</label>
                                <input class="form-control" type="text" id="" name="total">
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="desc"></textarea>
                                <label for="floatingTextarea2">Description</label>
                            </div>
                            <div class="mb-3 my-3">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-7">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Income Information</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">Angeline Valencia</h6>
                                    <span class="mb-2 text-xs">Total Payment: <span
                                            class="text-dark font-weight-bold ms-sm-2">Rp700.000</span></span>
                                    <span class="mb-2 text-xs">Description: <span
                                            class="text-dark ms-sm-2 font-weight-bold">Sewa Kamar Kos</span></span>
                                    <span class="mb-2 text-xs">Date: <span
                                            class="text-dark ms-sm-2 font-weight-bold">18/11/2023</span></span>
                                </div>
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">Lingga Dian Lestari</h6>
                                    <span class="mb-2 text-xs">Total Payment: <span
                                            class="text-dark font-weight-bold ms-sm-2">Rp500.000</span></span>
                                    <span class="mb-2 text-xs">Description: <span
                                            class="text-dark ms-sm-2 font-weight-bold">Sewa Stand</span></span>
                                    <span class="mb-2 text-xs">Date: <span
                                            class="text-dark ms-sm-2 font-weight-bold">11/10/2023</span></span>
                                </div>
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">Arensa</h6>
                                    <span class="mb-2 text-xs">Total Payment: <span
                                            class="text-dark font-weight-bold ms-sm-2">Rp900.000</span></span>
                                    <span class="mb-2 text-xs">Description: <span
                                            class="text-dark ms-sm-2 font-weight-bold">Sewa Kamar Kos</span></span>
                                    <span class="mb-2 text-xs">Date: <span
                                            class="text-dark ms-sm-2 font-weight-bold">01/10/2023</span></span>
                                </div>
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h1></h1>
                        <h6>Add Income</h6>
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input class="form-control" type="text" id="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total Payment</label>
                            <input class="form-control" type="text" id="">
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">Description</label>
                        </div>
                        <div class="mb-3 my-3">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            

        </div>

            <!-- <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Income Information</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">Angeline Valencia</h6>
                                    <span class="mb-2 text-xs">Total Payment: <span
                                            class="text-dark font-weight-bold ms-sm-2">Rp700.000</span></span>
                                    <span class="mb-2 text-xs">Description: <span
                                            class="text-dark ms-sm-2 font-weight-bold">Sewa Kamar Kos</span></span>
                                    <span class="mb-2 text-xs">Date: <span
                                            class="text-dark ms-sm-2 font-weight-bold">18/11/2023</span></span>
                                </div>
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">Lingga Dian Lestari</h6>
                                    <span class="mb-2 text-xs">Total Payment: <span
                                            class="text-dark font-weight-bold ms-sm-2">Rp500.000</span></span>
                                    <span class="mb-2 text-xs">Description: <span
                                            class="text-dark ms-sm-2 font-weight-bold">Sewa Stand</span></span>
                                    <span class="mb-2 text-xs">Date: <span
                                            class="text-dark ms-sm-2 font-weight-bold">11/10/2023</span></span>
                                </div>
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">Arensa</h6>
                                    <span class="mb-2 text-xs">Total Payment: <span
                                            class="text-dark font-weight-bold ms-sm-2">Rp900.000</span></span>
                                    <span class="mb-2 text-xs">Description: <span
                                            class="text-dark ms-sm-2 font-weight-bold">Sewa Kamar Kos</span></span>
                                    <span class="mb-2 text-xs">Date: <span
                                            class="text-dark ms-sm-2 font-weight-bold">01/10/2023</span></span>
                                </div>
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                            class="far fa-trash-alt me-2"></i>Delete</a>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                            class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> -->
        @include('layouts.footers.auth.footer')
    </div>
@endsection