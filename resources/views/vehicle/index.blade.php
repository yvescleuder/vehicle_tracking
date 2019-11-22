@extends('template')

@section('title', 'Cadastrar veículo')

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
                                        <h4>LISTAR VEÍCULO</h4>
                                        <span>Todos os seus veículos</span>
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
                                <!-- Zero config.table start -->
                                <div class="card">
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">
                                            <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                <thead>
                                                <tr>
                                                    <th>Placa</th>
                                                    <th>Modelo</th>
                                                    <th>Modulo</th>
                                                    <th>Ação</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(isset($vehicles))
                                                    @foreach($vehicles as $vehicle)
                                                        <tr>
                                                            <td>{{ $vehicle['board'] }}</td>
                                                            <td>{{ $vehicle['model'] }}</td>
                                                            <td>{{ $vehicle['number_module'] }}</td>
                                                            <td><a href=""><i class="icofont icofont-trash"></i></a></td>
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
                    <!-- Page body end -->
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

    @if(session('success'))
        <script>
            Swal.fire({
                type: 'success',
                title: 'Sucesso',
                text: "{{ session('success') }}"
            });
        </script>
    @endif
@endsection
