<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\H_Menu;
use App\Models\H_Bulan;
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
        $user_id = $activeUser->user_id;
        $tenantId = $this->getTenantId($user_id);
        $pengeluaran = H_Bulan::where('user_id', $user_id)->where('status', 3)->get();

        $result = $this->kalkulasiduit($tenantId);

        $pendapatan = H_Menu::where('tenant_id', $tenantId)
        ->where('status', 2)
        ->select('created_at', 'total')
        ->get();

        return view('pages.reportTenant', compact('pendapatan','result','pengeluaran'));

    }

    public function storePengeluaran(Request $request)
    {
        $request->validate([
            'keterangan' => 'required|string',
            'nominal' => 'required|numeric',
        ]);

        $activeUser = Auth::user();
        $user_id = $activeUser->user_id;

        H_Bulan::create([
            'user_id' => $user_id,
            'keterangan' => $request->keterangan,
            'total' => $request->nominal,
            'status' => 3,
        ]);

        return redirect()->route('report.tenant')->with('success', 'Pengeluaran berhasil ditambahkan.');
    }

    public function kalkulasiduit($tenantId)
    {
        $user_id = Auth::id(); 
        $totalPengeluaran = H_Bulan::where('user_id', $user_id)
        ->where('status',3)
        ->sum('total');

        $totalPendapatan = H_Menu::where('tenant_id', $tenantId)
            ->where('status', 2)
            ->sum('total');

        $totalKerugian = $totalPengeluaran-$totalPendapatan;


        $totalKeuntungan = $totalPendapatan-$totalKerugian;

        return [
            'totalKerugian' => $totalKerugian,
            'totalPendapatan' => $totalPendapatan,
            'totalKeuntungan' => max(0, $totalKeuntungan),
            'totalPengeluaran' => $totalPengeluaran,
        ];
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

    public function terimaOrder($id)
    {
        $menu = H_Menu::find($id);
        $activeUser = Auth::user();
        $user_id = $activeUser->user_id;
        $tenantId = $this->getTenantId($user_id);
        $orders = H_Menu::where('tenant_id', $tenantId);
        if ($menu) {
            $menu->status = 2;
            $menu->save();

        }

        return view('pages.ordersTenant', compact('orders'));
    }

    public function tolakOrder($id)
    {
        $menu = H_Menu::find($id);
        $activeUser = Auth::user();
        $user_id = $activeUser->user_id;
        $tenantId = $this->getTenantId($user_id);
        $orders = H_Menu::where('tenant_id', $tenantId);
        if ($menu) {
            $menu->status = 0;
            $menu->save();

            
        }
        return view('pages.ordersTenant', compact('orders'));

    }

    
}