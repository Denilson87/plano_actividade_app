<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Auth;
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
        $userEmail = Auth::user()->email; // Obtém o e-mail do usuário logado
    
        // Filtra e agrupa as atividades por data
        $activities = Activity::selectRaw('DATE(created_at) as data, SUM(id) as total')
            ->where('employee', $userEmail)
            ->groupBy('data')
            ->orderBy('data', 'ASC')
            ->get();
    
        // Formata os dados em JSON
        $dadosJson = $activities->toJson();
    
        // Contagem das atividades por status para o usuário logado
        $completeActivity = Activity::where('employee', $userEmail)
            ->where('status', 'completo')
            ->count();
    
        $pendingActivity = Activity::where('employee', $userEmail)
            ->where('status', 'pendente')
            ->count();
    
        $rescheduledActivity = Activity::where('employee', $userEmail)
            ->where('status', 'adiado')
            ->count();
    
        // Dados gerais para o dashboard
        $totalPaid = Order::sum('pay');
        $totalDue = Order::sum('due');
    
        // Retorna a view combinada (gráfico e dashboard)
        return view('dashboard.grafic', [
            'activities' => $activities,
            'dadosJson' => $dadosJson,
            'completeActivity' => $completeActivity,
            'pendingActivity' => $pendingActivity,
            'rescheduledActivity' => $rescheduledActivity,
            'products' => $products ?? [], // Certifique-se de que essa variável é definida
            'new_products' => $newProducts ?? [], // Certifique-se de que essa variável é definida
        ]);
    }

}


