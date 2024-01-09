@extends('main')
@section('content')

<!-- Card Section -->
<div class="max-w-2xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <!-- Card -->
    <div class="bg-white rounded-xl shadow p-4 sm:p-7 ">
      <div class="text-center mb-8">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 ">
          Payment
        </h2>
        <p class="text-sm text-gray-600 ">
          Your order details
        </p>
      </div>

      <form class="mt-5">
        <!-- Section -->
        <div class="mt-5 py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 ">
          <label for="af-payment-billing-contact" class="inline-block text-sm font-medium ">
            Billing contact
          </label>

          <div class="mt-2 space-y-3">
            <input id="af-payment-billing-contact" type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Name">
            <input type="text" class="py-2 px-3 pe-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Phone Number">
          </div>
        </div>
        <!-- End Section -->



        <!-- Section -->
        <div class="mt-5 py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 ">
          <label for="af-payment-payment-method" class="inline-block text-sm font-medium ">
            Your Orders :
          </label>

        @foreach ($data as $menu)
        <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
          <img src="{{ Storage::url("$menu->foto") }}" alt="product-image" class="w-full rounded-lg sm:w-40" />
          <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
            <div class="mt-5 sm:mt-0">
              <h2 class="text-lg font-bold text-gray-900">{{ $menu->nama }}</h2>
              <p class="mt-1 text-xs text-gray-700">Rp. {{ number_format($menu->harga) }}</p>            </div>
            <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-2">
                <div class="flex items-center border-gray-100 ml-7">
                    <p class="w-20 text-center">Qty : {{$menu->qty}}</p>

                </div>
              <div class="">
                <p class="text-sm">Subtotal : Rp. {{number_format($menu->subtotal)}}</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach

        <div class="mt-6 w- full h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 ">
            <div class="mb-2 flex justify-between">
              <p class="text-gray-700">Subtotal</p>
              <p class="text-gray-700">
                Rp. {{number_format($total)}}
              </p>
            </div>
            <div class="flex justify-between">
              <p class="text-gray-700">TAX</p>
              <p class="text-gray-700">
                Rp. {{number_format($tax)}}
              </p>
            </div>
            <hr class="my-4" />
            <div class="flex justify-between">
              <p class="text-lg font-bold">Total</p>
              <div class="">
                <p class="mb-1 text-lg font-bold">Rp {{ number_format($grandtotal) }}</p>
                <p class="text-sm text-gray-700">including TAX</p>
              </div>
            </div>
          </div>


        </div>
        <!-- End Section -->
      </form>

      <div class="mt-5 flex justify-end gap-x-2">
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none ">
          Cancel
        </button>

        <form action="{{ route('food-midtrans') }}" method="post">
            @csrf
            <button type="submit" name="pay" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none ">
                Make Order
            </button>
        </form>

      </div>
    </div>
    <!-- End Card -->
  </div>
  <!-- End Card Section -->



@endsection

