@extends('template')

@section('title', 'Relatório por deslocamentos')

@section('css')
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="\bower_components\datatables.net-bs4\css\dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="/js/sweetalert2/dist/sweetalert2.min.css">
@endsection

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <!-- Main-body start -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- Page-header start -->
                    <div class="page-header">
                        <div class="row align-items-end">
                            <div class="col-lg-8">
                                <div class="page-header-title">
                                    <div class="d-inline">
                                        <h4>LOCALIZAÇÃO POR DESLOCAMENTOS</h4>
                                        <span>Selecione o veículo e o dia que deseja buscar os deslocamentos.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->

                    <!-- Page body start -->
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Default Date-Picker card start -->
                                <div class="card">
                                    <form method="POST" action="{{ route('report.displacements') }}">
                                        {{ csrf_field() }}
                                        <div class="card-block">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Veículo</label>
                                                <div class="col-sm-10">
                                                    <select name="number_module" class="form-control" required>
                                                        <option value="">Selecione um veículo</option>
                                                        @foreach($vehicles as $vehicle)
                                                            <option value="{{ $vehicle->number_module }}">{{ $vehicle->board }} - {{ $vehicle->model }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Data</label>
                                                <div class="col-sm-10">
                                                    <input name="date" class="form-control" type="date" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary m-b-0">Buscar pontos</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page body end -->

                    <!-- Page-body start -->
                    <div class="page-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Zero config.table start -->
                                <div class="card">
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Placa</th>
                                                        <th>Modelo</th>
                                                        <th>Latitude inicial</th>
                                                        <th>Logitude inicial</th>
                                                        <th>Data inicial</th>
                                                        <th>Ponto inicial</th>
                                                        <th>Latitude final</th>
                                                        <th>Logitude final</th>
                                                        <th>Data final</th>
                                                        <th>Ponto final</th>
                                                        <th>Distância entre pontos</th>
                                                        <th>Tempo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @if(isset($positions))
                                                    @foreach($positions as $position)
                                                        <tr>
                                                            <td>{{ $position['board'] }}</td>
                                                            <td>{{ $position['model'] }}</td>
                                                            <td>{{ $position['startLat'] }}</td>
                                                            <td>{{ $position['startLng'] }}</td>
                                                            <td>{{ $position['startDate'] }}</td>
                                                            <td>{{ $position['startAddress'] }}</td>
                                                            <td>{{ $position['finalLat'] }}</td>
                                                            <td>{{ $position['finalLng'] }}</td>
                                                            <td>{{ $position['finalDate'] }}</td>
                                                            <td>{{ $position['finalAddress'] }}</td>
                                                            <td>{{ $position['distance'] }}</td>
                                                            <td>{{ $position['time'] }}</td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Zero config.table end -->
                            </div>
                        </div>
                    </div>
                    <!-- Page-body end -->
                </div>
            </div>
        </div>
    </div>


@endsection

@section('javascript')
    <!-- data-table js -->
    <script src="\bower_components\datatables.net\js\jquery.dataTables.min.js"></script>
    <script src="\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js"></script>
    <script src="\pages\data-table\js\data-table-custom.js"></script>
    <script src="/js/sweetalert2/dist/sweetalert2.min.js"></script>

    @if(session('error'))
        <script>
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}"
            });
        </script>
    @endif
@endsection
