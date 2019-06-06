@extends('layouts.app')
@section('body-class','profile-page')
@section('content')
    <style>
        .btn.btn-info{
            background-color: #166b91;
        }
        .my-custom-scrollbar {
            position: relative;
            height: 450px;
            overflow: auto;
        }
        .table-wrapper-scroll-y {
            display: block;
        }
    </style>

    <div class="page-header header-filter" data-parallax="true" style="background-image: url({{url('img/HP_background.jpg')}});"></div>
    <div class="main main-raised">
        <div class="profile-content">
            <a href="{{url('device/equipmentassignments')}}" class="btn btn-info" style="color:rgb(255,255,255)" title="asignacion">Asignacion de equipos</a>
            <div class="container-fluid">
                <div class="row content">
                    <div style="padding-left: 10%" class="col-sm-10 sidenav">
                        <br>
                        <div class="card">
                            <div class="card-header card-header-text card-header-info">
                                <div class="card-text"><h4 class="card-title text-center">Listado de usuarios</h4></div></div>
                            <div class="card-body">
                                <form class="form-horizontal" method="POST" action="">
                                    @csrf
                                    {{ csrf_field() }}
                                    {{--<a class="btn btn-success btn-fab btn-fab-mini btn-round create-modals" style="color: white">--}}
                                        {{--<i class="material-icons">add</i>--}}
                                    {{--</a>--}}

                                    {{-----------------------alerta---------------------}}
                                    <script>
                                                @if(Session::has('message'))
                                        var type = "{{ Session::get('alert-type', 'info') }}";
                                        switch(type){
                                            case 'info':
                                                toastr.info("{{ Session::get('message') }}");
                                                break;

                                            case 'warning':
                                                toastr.warning("{{ Session::get('message') }}");
                                                break;

                                            case 'success':
                                                toastr.success("{{ Session::get('message') }}");
                                                break;

                                            case 'error':
                                                toastr.error("{{ Session::get('message') }}");
                                                break;
                                        }
                                        @endif
                                    </script>
                                    <div class="form-row">
                                        <div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive" >
                                            <table class="table table-sm w-auto" id="tabla">
                                                <thead>
                                                <tr>
                                                    <th class="text-left">Nombre</th>
                                                    <th class="text-center">Apellido Paterno</th>
                                                    <th class="text-center">Apellido Materno</th>
                                                    <th class="text-center">Sucursal</th>
                                                    <th class="text-center">Cargo</th>
                                                    <th class="text-center">Area</th>
                                                    <th class="text-center"></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse ($user as $us)
                                                    @if($us->permiso == 0)
                                                    <tr>
                                                        <td class="text-left" style="width: 20%"> {{$us->name}}</td>
                                                        <td class="text-center" style="width: 20%">{{$us->apellido_p}}</td>
                                                        <td class="text-center">{{$us->apellido_m}}</td>
                                                        @foreach($branch as $bran)
                                                            @if($us->idbranch == $bran->id)
                                                                <td class="text-center"> {{$bran->name}}</td>
                                                            @endif
                                                        @endforeach
                                                        @foreach($posi as $ca)
                                                            @if($us->idposition == $ca->id)
                                                                <td class="text-center"> {{$ca->name}}</td>
                                                            @endif
                                                        @endforeach
                                                        @foreach($area as $ar)
                                                            @if($us->idarea == $ar->id)
                                                                <td class="text-center"> {{$ar->name}}</td>
                                                            @endif
                                                        @endforeach

                                                        {{--<td class="td-actions text-right">--}}
                                                            {{--<a href="{{url('/home/form/jobEdit/'.$job->id.'')}}" class="btn btn-info btn-fab btn-fab-mini" id="edit-item" rel="tooltip" style="color:rgb(255,255,255)" title="Editar"><i class="material-icons">edit</i></a>--}}
                                                            {{--<a href="{{url('/home/form/jobEdit/'.$job->id.'/delete')}}" class="btn btn-danger btn-fab btn-fab-mini" style="color:rgb(255,255,255)" title="Eliminar" data-confirm="¿Esta seguro que quiere borrar?"><i class="material-icons">delete_outline</i></a>--}}
                                                        {{--</td>--}}
                                                    </tr>
                                                    @endif
                                                @empty
                                                    <div class="alert alert-danger">
                                                        <div class="container">
                                                            <div class="alert-icon">
                                                                <i class="material-icons">error_outline</i>
                                                            </div>
                                                            <b>No tiene datos agregados</b>
                                                        </div>
                                                    </div>
                                                @endforelse
                                                </tbody>
                                            </table>
                                            {{--------------Paginacion--------------}}
                                            {{ $user->links() }}
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div style="padding-left: 10%" class="col-sm-10 text-center">
                        <br>
                        <div class="card">
                            <div class="card-header card-header-text card-header-info">
                                <div class="card-text"><h4 class="card-title text-center">Listado de Pc's</h4></div></div>
                            <div class="card-body">
                                <form class="form-horizontal" method="POST" action="">
                                    @csrf
                                    {{ csrf_field() }}

                                    <div class="form-row">
                                        <div class="table-wrapper-scroll-y my-custom-scrollbar table-responsive" >
                                            <table class="table table-sm w-auto" id="tabla">
                                                <thead>
                                                <tr>
                                                    <th class="text-left" >RAM</th>
                                                    <th class="text-left" >HD</th>
                                                    <th class="text-left">Procesador</th>
                                                    <th class="text-left" >Marca</th>
                                                    <th class="text-left" >Modelo</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse ($pc as $pcs)
                                                    <tr>
                                                        <td class="text-left"> {{$pcs->ram}}</td>
                                                        <td class="text-left">{{$pcs->hd}}</td>
                                                        <td class="text-left">{{$pcs->procesador}}</td>
                                                        <td class="text-left">{{$pcs->marca}}</td>
                                                        <td class="text-left">{{$pcs->modelo}}</td>
                                                        <td class="td-actions text-right">
                                                            <a href=" " class="btn btn-info btn-fab btn-fab-mini" id="edit-item" rel="tooltip" style="color:rgb(255,255,255)" title="Editar"><i class="material-icons">edit</i></a>
                                                            <a href=" " class="btn btn-danger btn-fab btn-fab-mini" style="color:rgb(255,255,255)" title="Eliminar" data-confirm="¿Esta seguro que quiere borrar?"><i class="material-icons">delete_outline</i></a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <div class="alert alert-danger">
                                                        <div class="container">
                                                            <div class="alert-icon">
                                                                <i class="material-icons">error_outline</i>
                                                            </div>
                                                            <b>No hay postulantes vigentes</b>
                                                        </div>
                                                    </div>
                                                @endforelse
                                                </tbody>
                                            </table>
                                            {{--------------Paginacion--------------}}
                                            {{ $pc->links() }}
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer footer-default">
        <div class="container">
            <nav class="float-left">

            </nav>
            <div class="copyright float-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>, made with <i class="material-icons">favorite</i> by HP

            </div>
        </div>
    </footer>

@endsection
