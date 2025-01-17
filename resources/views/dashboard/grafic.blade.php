@extends('dashboard.body.main')

@section('container')

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    
<div class="container-fluid">
    <div class="row">
      
        <div class="col-lg-4">
            <div class="card card-transparent card-block card-stretch card-height border-none">
                <div class="card-body p-0 mt-lg-2 mt-0">
                <h3 class="mb-3"><span class="mr-1">
                Olá {{ auth()->user()->name }} </h3></span>
                    <p class="mb-0 mr-4">Este dashboard mostrando processos e uma visão geral e completude das actividades</p>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4 card-total-sale">
                                <div class="icon iq-icon-box-2 bg-info-light">
                                    <img src="../assets/images/product/1.png" class="img-fluid" alt="image">
                                </div>
                                <div>
                                    <p class="mb-2">Actividades reagendas</p>
                                    <h4>{{ $rescheduledActivity }}</h4>
                                </div>
                            </div>
                            <div class="iq-progress-bar mt-2">
                                <span class="bg-info iq-progress progress-1" data-percent="85">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4 card-total-sale">
                                <div class="icon iq-icon-box-2 bg-danger-light">
                                    <img src="../assets/images/product/2.png" class="img-fluid" alt="image">
                                </div>
                                <div>
                                    <p class="mb-2">Actividades concluidas</p>
                                    <h4>{{ $completeActivity }}</h4>
                                </div>
                            </div>
                            <div class="iq-progress-bar mt-2">
                                <span class="bg-danger iq-progress progress-1" data-percent="70">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="card card-block card-stretch card-height">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4 card-total-sale">
                                <div class="icon iq-icon-box-2 bg-success-light">
                                    <img src="../assets/images/product/3.png" class="img-fluid" alt="image">
                                </div>
                                <div>
                                    <p class="mb-2">Actividades Pendentes</p>
                                    <h4>{{$pendingActivity}}</h4>
                                </div>
                            </div>
                            <div class="iq-progress-bar mt-2">
                                <span class="bg-success iq-progress progress-1" data-percent="75">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <main class="cd__main">
         <!-- Start DEMO HTML (Use the following code into your project)-->
         <div id='calendar'></div>

    <!-- Add modal -->

    <div class="modal fade edit-form" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title" id="modal-title">Adicionar actividade</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="box" style="margin:20px;">
                <form action="{{ route('activities.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- begin: Input Image -->                    
                        <!-- end: Input Image -->
                        <!-- begin: Input Data -->
                        <div class="form-group row align-items-center">
                            <div class="col-md-12">
                                <div class="profile-img-edit">
                                    <div class="crm-profile-img-edit">
                                        <img class="crm-profile-pic rounded-circle avatar-110" id="image-preview" src="{{ asset('assets/images/product/pngtree-work-plan-list-png-image_4896609.jpg') }}" alt="profile-pic">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="form-group col-md-6">
                                <label for="activity"><b>Actividade</b> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('activity') is-invalid @enderror" placeholder="Descreva a actividade" id="activity" name="activity" value="{{ old('activity') }}" required>
                                @error('activity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="tag"><b>Local da actividade</b> <span class="text-danger">*</span></label>
                                <select class="form-control select2" name="location" id="location" required>
                                    <option value="" disabled selected>Selecione o local</option>
                                    <option value="CS Escritório HO">Escritório HO</option>
                                    <option value="CS Escritório MC">Escritório MC</option>
                                    <option value="Kampfumo" disabled >Kampfumo</option>
                                    <option value="CS Alto Mae">CS Alto Mae</option>
                                    <option value="CS Malhangalene">CS Malhangalene</option>
                                    <option value="CS Polana cimento">CS Polana cimento</option>
                                    <option value="CS Porto">CS Porto</option>
                                    <option value="Kamavota" disabled >Kamavota</option>
                                    <option value="CS Albasine">CS Albasine</option>
                                    <option value="CS Hulene">CS Hulene</option>
                                    <option value="CS Romão">CS Romão</option>
                                    <option value="CS Mavalane">CS Mavalane</option>
                                    <option value="CS Pescadores">CS Pescadores</option>
                                    <option value="Chamanculo" disabled >Kamavota</option>
                                    <option value="CS Xipamanine">CS Xipamanine</option>
                                    <option value="CS Chamanculo">CS Chamanculo</option>
                                    <option value="CS Jose Macamo">CS Jose Macamo</option>
                                    <option value="Kamaxaquene" disabled >Kamavota</option>
                                    <option value="CS 1 de Maio">CS Xipamanine</option>
                                    <option value="CS Chamanculo">CS Chamanculo</option>
                                    <option value="CS Jose Macamo">CS Jose Macamo</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="date">Data de execução <span class="text-danger">*</span></label>
                                <input id="date" class="form-control @error('date') is-invalid @enderror" name="date" placeholder="2024/01/01" value="{{ old('date') }}" required />
                                @error('activity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="resourse"><b>Recursos necessários</b> <span class="text-danger">*</span></label>
                                <input id="resourse" class="form-control @error('resourse') is-invalid @enderror" placeholder="Descreva os recursos necessários para a actividade" name="resourse" value="{{ old('resourse') }}" required/>
                                @error('resourse')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="status"><b>Status</b> <span class="text-danger">*</span></label>
                                <select class="form-control" name="status" required>
                                    <option selected value="pendente">Pendente</option>
                                    <option value="adiado">Adiado</option>
                                    <option value="completo">Completo</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="obs"><b>Observações</b> <span class="text-danger">*</span></label>
                                <input id="obs" class="form-control @error('obs') is-invalid @enderror" name="obs" value="sem notas..." required/>
                                @error('obs')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <!-- end: Input Data -->
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary mr-2">Salvar</button>
                            <a class="btn bg-danger" href="">Cancelar</a>
                        </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="delete-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="delete-modal-title">Confirm Deletion</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center" id="delete-modal-body">
              Are you sure you want to delete the event?
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary rounded-sm" data-dismiss="modal" id="cancel-button">Cancel</button>
              <button type="button" class="btn btn-danger rounded-lg" id="delete-button">Delete</button>
            </div>
          </div>
        </div>
      </div>
         <!-- END EDMO HTML (Happy Coding!)-->
      </main>
        <div class="col-lg-12">
            <!-- <canvas id="relatorioGrafico" width="400" height="200"></canvas> -->
        </div>

    </div>
</div>
<div class="list" style="margin: 20px;">
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
                    <h4 class="mb-3">Minhas actividades</h4>
                    <p class="mb-0">Previsualização da minha Planificação.</p>
                </div>
                <div>
                
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
        <table class="table mb-0" style="margin-top:3px;">
            <thead class="bg-white text-uppercase">
                <tr class="ligth ligth-data">
                    <th>No.</th>
                    <th>@sortablelink('activity', 'Actividade')</th>
                    <th>@sortablelink('location', 'Local')</th>
                    <th>Data de execução</th>
                    <th>@sortablelink('resourse', 'Recursos necessários')</th>
                   
                    <th>Observações</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody class="ligth-body">
                @forelse ($activities as $activity)
                    <tr>
                        <td>{{ (($activities->currentPage() - 1) * $activities->perPage()) + $loop->iteration }}</td>
                        <td>{{ $activity->activity }}</td>
                        <td>{{ $activity->location }}</td>
                        <td><span class="badge rounded-pill bg-success">{{ $activity->date }}</span></td>
                        <td>{{ $activity->resourse }}</td>
                       
                        <td>{{ $activity->obs }}</td>
                        <td>
                            <form action="{{ route('activities.destroy', $activity->id) }}" method="POST" style="margin-bottom: 5px">
                                @method('DELETE')
                                @csrf
                                <div class="d-flex align-items-center list-action">
                                    <a class="btn btn-info mr-2" data-toggle="tooltip" data-placement="top" title="View"
                                       href="">
                                        <i class="ri-eye-line mr-0"></i>
                                    </a>
                                    <a class="btn btn-success mr-2" data-toggle="tooltip" data-placement="top" title="Edit"
                                       href="{{ route('activities.edit', $activity->id) }}">
                                        <i class="ri-pencil-line mr-0"></i>
                                    </a>
                                    <button type="submit" class="btn btn-warning mr-2 border-none"
                                            onclick="return confirm('Are you sure you want to delete this record?')"
                                            data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="ri-delete-bin-line mr-0"></i>
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-danger">
                            Sem Actividades este Mês
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- Paginação -->
    {{ $activities->links() }}
</div>

    </div>
    <!-- Page end  -->
</div>
</div>
<script>
    // Verifique se $dadosJson está corretamente embutido e convertido
    let dados = @json($dadosJson);

    // Verifica se os dados são uma string e, se forem, converte para objeto
    if (typeof dados === 'string') {
        dados = JSON.parse(dados);  // Converte a string JSON para um objeto JavaScript
    }

    if (Array.isArray(dados) && dados.length > 0) {
        // Formatar dados para o gráfico
        const labels = dados.map(item => item.data); // Eixo X (datas)
        const valores = dados.map(item => item.total); // Eixo Y (total por data)

        // Gera o gráfico
        const ctx = document.getElementById('relatorioGrafico').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar', // Tipo do gráfico
            data: {
                labels: labels,
                datasets: [{
                    label: 'Resumo das ctividades ',
                    data: valores,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    } else {
        console.log('Nenhum dado disponível para o gráfico.');
    }
</script>

@endsection

@section('specificpagescripts')
<!-- Table Treeview JavaScript -->
<script src="{{ asset('assets/js/table-treeview.js') }}"></script>
<!-- Chart Custom JavaScript -->
<script src="{{ asset('assets/js/customizer.js') }}"></script>
<!-- Chart Custom JavaScript -->
<script async src="{{ asset('assets/js/chart-custom.js') }}"></script>
@endsection
