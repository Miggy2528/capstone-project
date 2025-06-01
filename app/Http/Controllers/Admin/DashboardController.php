<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $todaySales = Order::whereDate('created_at', Carbon::today())->sum('total');
        $orderCount = Order::count();
        $lowStock = Product::where('stock', '<=', 5)->get();
        $customerCount = User::where('role', 'customer')->count();
        $recentOrders = Order::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'todaySales',
            'orderCount',
            'lowStock',
            'customerCount',
            'recentOrders'
        ));
    }
}
