<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\H_Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.dashboard');
    }
    public function showtenant()
    {
        $activeUser = Auth::user();

        $menus = Menu::where('user_id', $activeUser->user_id)->get();
        return view('pages.hlmnTenant', compact('menus'));

    }
    public function showReportTenant()
    {
        $activeUser = Auth::user();
        return view('pages.reportTenant');

    }
    public function showOrders(Request $request)
    {
        $activeUser = Auth::user();
        $user_id = $activeUser->user_id;
        $tenantId = $this->getTenantId($user_id);

        $tanggal = $request->input('tanggal', now()->toDateString());
        $orders = H_Menu::where('tenant_id', $tenantId);

        if (!empty($tanggal)) {
            $orders->whereDate('created_at', $tanggal);
        }

        $orders = $orders->get();

        return view('pages.ordersTenant', compact('orders'));

    }
    public function filter(Request $request)
    {
        $activeUser = Auth::user();
        $user_id = $activeUser->user_id;
        $tenantId = $this->getTenantId($user_id);

        $tanggal = $request->input('tanggal');

        $orders = H_Menu::where('tenant_id', $tenantId);

        if (!empty($tanggal)) {
            $orders->whereDate('created_at', $tanggal);
        }

        $orders = $orders->get();

        return view('pages.ordersTenant', compact('orders'));
    }

    private function getTenantId($user_id)
    {
        if ($user_id == 9) {
            return 1;
        } elseif ($user_id == 10) {
            return 2;
        } elseif ($user_id == 11) {
            return 3;
        }
    }
}
