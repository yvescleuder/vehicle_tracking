@extends('template')

@section('title', 'Localização por dia')

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
                                        <h4>LOCALIZAÇÃO POR DIA</h4>
                                        <span>Selecione o veículo e o dia que deseja buscar os pontos.</span>
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
                                    <div class="card-block">
                                        <form method="POST" action="{{ route('location.day') }}">
                                            {{ csrf_field() }}
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Veículo</label>
                                                <div class="col-sm-10">
                                                    <select name="number_module" class="form-control" required>
                                                        <option value="">Selecione o veículo</option>
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
                                                    <button type="submit" class="btn btn-primary m-b-0">Localizar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- customar project  start -->
                            <div class="col-xl-4 col-md-6">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="row align-items-center m-l-0">
                                            <div class="col-auto">
                                                <i class="feather icon-maximize-2 f-30 text-c-lite-green"></i>
                                            </div>
                                            <div class="col-auto">
                                                <h6 class="text-muted m-b-10">Distância percorrida</h6>
                                                @if(isset($positions['distance']))
                                                    <h2 class="m-b-0">{{ $positions['distance'] }} km</h2>
                                                @else
                                                    <h2 class="m-b-0">0 km</h2>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8 col-md-6">
                                <div class="card">
                                    <div class="card-block">
                                        <div class="row align-items-center m-l-0">
                                            <div class="col-auto">
                                                <i class="feather icon-map-pin f-30 text-c-green"></i>
                                            </div>
                                            <div class="col-auto">
                                                <h6 class="text-muted m-b-10">Localização atual</h6>
                                                @if(isset($positions['lastAddress']))
                                                    <h2 class="m-b-0">{{ $positions['lastAddress'] }}</h2>
                                                @else
                                                    <h2 class="m-b-0">Sem localização</h2>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Google map search card start -->
                                <div class="card">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="gmap1 full-page-google-map">
                                                    <div id="map" style='max-height:800px;height:1067px;'></div>
                                                </div>
                                            </div>
                                            <!-- end -->
                                        </div>
                                    </div>
                                </div>
                                <!-- Google map search card end -->
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
    <script src="/js/module/ajax.js"></script>
    <script src="/js/module/map.js"></script>
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
    <script>
        @isset($positions)
            tracking.map.day({!! json_encode($positions) !!});
        @endisset
    </script>
@endsection
