@extends('dashboard.body.main')

@section('container')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            @if (session()->has('success'))
                <div class="alert text-white bg-success" role="alert">
                    <div class="iq-alert-text">{{ session('success') }}</div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="ri-close-line"></i>
                    </button>
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert text-white bg-danger" role="alert">
                    <div class="iq-alert-text">{{ session('success') }}</div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="ri-close-line"></i>
                    </button>
                </div>
            @endif
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Lista de actividades</h4>
                    <p class="mb-0">Um painel de actividades permite coletar e visualizar facilmente os dados do produto a partir da otimização <br>
                    a experiência das actividades, garantindo complitude das actividades.</p>
                </div>
                <div>
                <a href="{{ route('activites.exportData') }}" class="btn btn-warning add-list">Exportar</a>
                <a href="{{ route('activities.create') }}" class="btn btn-primary add-list">Add Actividades</a>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <form action="{{ route('activities.index') }}" method="get">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <div class="form-group row">
                        <label for="row" class="col-sm-3 align-self-center">Row:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="row">
                                <option value="10" @if(request('row') == '10')selected="selected"@endif>10</option>
                                <option value="25" @if(request('row') == '25')selected="selected"@endif>25</option>
                                <option value="50" @if(request('row') == '50')selected="selected"@endif>50</option>
                                <option value="100" @if(request('row') == '100')selected="selected"@endif>100</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-3 align-self-center" for="search">Pesquisar:</label>
                        <div class="input-group col-sm-8">
                            <input type="text" id="search" class="form-control" name="search" placeholder="pesquisar" value="{{ request('search') }}">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text bg-primary">Pesquisar</button>
                                <a href="{{ route('activities.index') }}" class="input-group-text bg-danger">Todas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-lg-12">
            <div class="table-responsive rounded mb-3">
                <table class="table mb-0">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>No.</th>
                            <th>@sortablelink('activity', 'Actividade')</th>
                            <th>@sortablelink('location', 'Local')</th>
                            <th>Data de execução</th>
                            <th>@sortablelink('resourse', 'Recursos necssários')</th>
                            <th>Status</th>
                            <th>Observações</th>
                            <th>Acções</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @forelse ($activities as $activity)
                        <tr>
                            <td>{{ (($activities->currentPage() * 10) - 10) + $loop->iteration  }}</td>                         
                            <td>{{ $activity->activity }}</td>
                            <td>{{ $activity->location }}</td>
                            <td><span class="badge rounded-pill bg-success">{{ $activity->date }}</span>
                            </td>
                            <td>{{ $activity->resourse }}</td>
                            <td>
                             @if ($activity->status === 'pendente')
                             <span class="badge rounded-pill bg-warning">pendente</span>
                             @elseif ($activity->status === 'completo')
                            <span class="badge rounded-pill bg-success">conpleto</span>
                             @elseif ($activity->status === 'adiado')
                            <span class="badge rounded-pill bg-danger">adiado</span>
                              @endif   
                             </td>  
                            <td>{{ $activity->obs }}</td>                            
                            <td>
                                <form action="{{ route('activities.destroy', $activity->id) }}" method="POST" style="margin-bottom: 5px"> 
                                @method('delete')
                                    @csrf
                                    <div class="d-flex align-items-center list-action">
                                        <a class="btn btn-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                        href=""><i class="ri-eye-line mr-0"></i>   
                                        </a>
                                        <a class="btn btn-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                        href="{{ route('activities.edit', $activity->id) }}"><i class="ri-pencil-line mr-0"></i>   
                                        </a>
                                            <button type="submit" class="btn btn-warning mr-2 border-none" onclick="return confirm('Are you sure you want to delete this record?')" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="ri-delete-bin-line mr-0"></i></button>
                                    </div>
                                </form>
                            </td>
                        </tr>

                        @empty
                        <div class="alert text-white bg-danger" role="alert">
                            <div class="iq-alert-text">Sem Actividades este Mes</div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                            </button>
                        </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $activities->links() }}
        </div>
    </div>
    <!-- Page end  -->
</div>

@endsection
