@extends('main')
@section('content')

<!-- Announcement Banner -->
@php
    $currentDate = now();
    $showNotif = $currentDate->day >= 25 && $currentDate->day <= $currentDate->daysInMonth;

    $month = $currentDate->format('F');
    $year = $currentDate->year;

    if($showNotif && !$cekPembayaran){
      echo 
      '<div class="bg-gradient-to-r from-red-500 via-purple-400 to-blue-500">
        <div class="max-w-[85rem] px-4 py-4 sm:px-6 lg:px-8 mx-auto">
          <!-- Grid -->
          <div class="grid justify-center md:grid-cols-2 md:justify-between md:items-center gap-2">
            <div class="text-center md:text-start">
              <p class="text-xs text-white/[.8] uppercase tracking-wider">
                Pemberitahuan!
              </p>
              <p class="mt-1 text-white font-medium">
                Anda belum melakukan pembayaran kos periode '.$month.' '.$year.'
              </p>
            </div>
            <!-- End Col -->

            <div class="mt-3 text-center md:text-start md:flex md:justify-end md:items-center">
              <a class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">
                Bayar Sekarang
              </a>
            </div>
            <!-- End Col -->
          </div>
          <!-- End Grid -->
        </div>
      </div>';
    }
@endphp
<!-- End Announcement Banner -->


  <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
    <div class="mb-5 pb-5 flex justify-between items-center border-b border-gray-200 dark:border-gray-700">
        <div>
        <h2 class="text-4xl font-semibold text-gray-800">Hello, {{Session::get('login_username')}}</h2>
        </div>
    </div>

    <div class="max-w-2xl mb-10 lg:mb-14 mt-10">
        <div class="max-w-2xl">


          <!-- Content -->
          <div class="space-y-5 md:space-y-8">

            <blockquote class="">
              <p class="text-2xl font-semibold mt-5 text-gray-800 md:text-2xl md:leading-normal xl:text-2xl xl:leading-normal ">
                My Rooms

              </p>
            </blockquote>

            @foreach ($listKamar as $kamar)
              <figure>
                <img class=" object-cover rounded-xl" src="{{ Storage::url("$kamar->foto") }}" alt="Image Description">
                <figcaption class="mt-3 text-sm text-center text-gray-500">
                  Room {{$kamar->nama}}
                </figcaption>
              </figure>
            @endforeach
        </div>
      </div>
      <!-- End Blog Article -->
  </div>



@endsection
