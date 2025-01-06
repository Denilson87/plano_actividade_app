<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon; 
use App\Models\Activity;
use App\Models\Order;
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
    
    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        return view('activities.edit', compact('activity'));
    }

    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();
    
        return redirect()->route('dashboard.activities.index')
                         ->with('success', 'Atividade removida com sucesso.');
    }

    public function dashboardComGrafico()
    {
        $userEmail = Auth::user()->email; // Obtém o e-mail do usuário logado
    
        // Filtra e agrupa as atividades por data com paginação
        $activities = Activity::selectRaw('DATE(created_at) as data, COUNT(id) as total')
            ->where('employee', $userEmail)
            ->groupBy('data')
            ->orderBy('data', 'ASC')
            ->paginate(10); // Paginação para o gráfico
    
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
    
        // Número de itens por página para a tabela de atividades
        $row = 6; // Pode ser ajustado conforme necessário
    
        // Atividades filtradas e paginadas para exibição na tabela
        $filteredActivities = Activity::where('employee', $userEmail) // Adiciona filtro pelo funcionário logado
            ->filter(request(['search'])) // Verifica se há uma busca
            ->orderBy('created_at', 'desc') // Ordena por data de criação em ordem decrescente
            ->sortable() // Permite ordenação (se estiver usando o pacote sortable)
            ->paginate($row)
            ->appends(request()->query()); // Mantém os parâmetros na paginação
    
        // Formatação dos dados para o gráfico (JSON)
        $dadosJson = $activities->map(function ($activity) {
            return [
                'data' => $activity->data,
                'total' => $activity->total,
            ];
        });
    
        // Retorna a view combinada (gráfico e dashboard)
        return view('dashboard.grafic', [
            'activities' => $filteredActivities, // Passa atividades filtradas para a tabela
            'dadosJson' => $dadosJson, // Dados formatados para o gráfico
            'completeActivity' => $completeActivity, // Total de atividades completas
            'pendingActivity' => $pendingActivity, // Total de atividades pendentes
            'rescheduledActivity' => $rescheduledActivity, // Total de atividades adiadas
        ]);
    }
    


    
    
}


