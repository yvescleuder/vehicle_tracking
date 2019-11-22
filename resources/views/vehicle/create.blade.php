@extends('template')

@section('title', 'Cadastrar veículo')

@section('css')
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
                                        <h4>CADASTRAR VEÍCULO</h4>
                                        <span>Preencher os dados para efetuar o cadastro de um novo veículo.</span>
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
                                <!-- Basic Form Inputs card start -->
                                <div class="card">
                                    <div class="card-block">
                                        <h4 class="sub-title">Dados</h4>
                                        <form method="POST" action="{{ route('vehicle.store') }}">
                                            {{ csrf_field() }}
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Modelo</label>
                                                <div class="col-sm-10">
                                                    <input name="model" type="text" class="form-control" value="{{ old('model') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Placa</label>
                                                <div class="col-sm-10">
                                                    <input name="board" type="text" class="form-control" value="{{ old('board') }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Modulo</label>
                                                <div class="col-sm-10">
                                                    <input name="number_module" type="text" class="form-control" {{ old('number_module') }}>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label class="col-sm-2"></label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary m-b-0">Cadastrar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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
