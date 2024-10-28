<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Order;
use App\Models\Activity;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'total_paid' => Order::sum('pay'),
            'total_due' => Order::sum('due'),
            'complete_orders' => Order::where('order_status', 'complete')->count(),
            'pending_orders' => Order::where('order_status', 'pendente')->count(),
            'rescheduled_orders' => Order::where('order_status', 'adiado')->count(),
            'products' => Product::orderBy('product_store')->take(5)->get(),
            'new_products' => Product::orderBy('buying_date')->take(2)->get(),
        ]);
    }
    

    public function dashboardComGrafico()
    {
        // Obtenha os dados para o gráfico (vendas agrupadas por data)
        $activities = Activity::selectRaw('DATE(created_at) as data, SUM(id) as total')
            ->groupBy('data')
            ->orderBy('data', 'ASC')
            ->get();

        // Formata os dados em JSON
        $dadosJson = $activities->toJson();

        // Dados para o dashboard
        $totalPaid = Order::sum('pay');
        $totalDue = Order::sum('due');
        $completeOrders = Order::where('order_status', 'complete')->get();
        $products = Product::orderBy('product_store')->take(5)->get();
        $newProducts = Product::orderBy('buying_date')->take(2)->get();

        // Retorna a view combinada (gráfico e dashboard)
        return view('dashboard.grafic', [
            'activities' => $activities,
            'dadosJson' => $dadosJson,
            'total_paid' => $totalPaid,
            'total_due' => $totalDue,
            'complete_orders' => $completeOrders,
            'products' => $products,
            'new_products' => $newProducts,
        ]);
    }
    

}


