<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\services as Service;
use App\Models\Lead;
use App\Models\payment as Payment;
use App\Models\Wallet;
use App\Models\wallet_history as WalletHistory;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminReportController extends Controller
{
    public function index(Request $request)
    {
        
        // Stats Tiles
        $totalOrders = Order::count();
        $completedOrders = Order::where("form_submitted", 4)->count();
        $totalLeads = Lead::count();
        $convertedLeads = Lead::where('status', 'ordered')->count();
        $totalSales = Payment::sum('amount');
        $walletBalance = Wallet::sum('amount');

        // Orders over time
        $ordersOverTime = Order::selectRaw('DATE(created_at) as date, COUNT(*) as count')
                               ->groupBy('date')
                               ->orderBy('date', 'ASC')
                               ->get();

        // Sales over time
        $salesOverTime = Payment::selectRaw('DATE(created_at) as date, SUM(amount) as total')
                                ->groupBy('date')
                                ->orderBy('date', 'ASC')
                                ->get();

        $topSellingServices = Order::select('service_id', DB::raw('COUNT(*) as total'))
        ->groupBy('service_id')
        ->orderBy('total', 'DESC')
        ->with('service')  // Assuming Order model has a relationship with Service
        ->take(6) // Get top 5 services
        ->get()
        ->map(function ($order) {
            return [
                'service_name' => $order->service ? $order->service->name : 'Unknown Service',
                'total' => $order->total
            ];
        });

        // Recent Transactions
        $recentTransactions = WalletHistory::orderBy('created_at', 'desc')->take(5)->get();


        return view('admin.reports.index', compact(
            'totalOrders', 'completedOrders', 'totalLeads', 
            'convertedLeads', 'totalSales', 'walletBalance',
            'ordersOverTime', 'salesOverTime', 'recentTransactions',
            'topSellingServices'
        ));

        return "hello";
    }
}

