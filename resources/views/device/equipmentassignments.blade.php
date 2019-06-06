@extends('layouts.app')
@section('content')
    <style>
        ::-webkit-input-placeholder {
            text-align: center;
        }

        :-moz-placeholder { /* Firefox 18- */
            text-align: center;
        }

        ::-moz-placeholder {  /* Firefox 19+ */
            text-align: center;
        }

        :-ms-input-placeholder {
            text-align: center;
        }
        .my-custom-scrollbar {
            position: relative;
            height: 300px;
            overflow: auto;
        }
        .table-wrapper-scroll-y {
            display: block;
        }
        .btn.btn-info{
            background-color: #166b91;
        }
        .card .card-header-info{
            background: linear-gradient(60deg, #166b91, #0097a7);
        }
    </style>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

    {{--prueba--------------------------}}
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />--}}
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <div class="page-header header-filter" style="background-image: url({{asset('img/HP_background.jpg')}}); background-size: cover; background-position: top center;">
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header"><h5>{{ __('Asignacion de equipos') }}</h5></div>

                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="{{ url('/device/equipmentassignment') }}">
                                @csrf
                                {{ csrf_field() }}
                                <a  class="btn btn-success btn-fab btn-fab-mini btn-round create-modal" style="color: white">
                                    <i class="material-icons">add</i>
                                </a>
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
                                        <table class="table table-sm" id="tabla">
                                            <thead>
                                            <tr>
                                                <th class="text-left">Nombre</th>
                                                <th class="text-left">Apellido</th>
                                                <th class="text-left">Cargo</th>
                                                <th class="text-left">Sucursal</th>
                                                <th class="text-left">Marca Equipo</th>
                                                <th class="text-left">Periferico</th>
                                                <th class="text-left">Caso</th>
                                                <th class="text-left"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($asig as $as)
                                                <tr>
                                                    @foreach($user as $us)
                                                        @if($us->id == $as->iduser)
                                                            <td class="text-left">{{$us->name}}</td>
                                                        @endif
                                                    @endforeach
                                                    @foreach($user as $us)
                                                        @if($us->id == $as->iduser)
                                                            <td class="text-left">{{$us->apellido_p}} {{$us->apellido_m}}</td>
                                                        @endif
                                                    @endforeach
                                                    @foreach($user as $us)
                                                        @if($us->id == $as->iduser)
                                                            @foreach($posi as $pos)
                                                            @if($us->idposition == $pos->id)
                                                            <td class="text-left">{{$pos->name}}</td>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                    @foreach($user as $us)
                                                        @if($us->id == $as->iduser)
                                                            @foreach($branch as $bran)
                                                                @if($us->idbranch == $bran->id)
                                                                    <td class="text-left">{{$bran->name}}</td>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                    @foreach($pc as $pcs)
                                                        @if($pcs->id == $as->idpc)
                                                            <td class="text-left">{{$pcs->marca}}</td>
                                                        @endif
                                                    @endforeach
                                                    @foreach($peri as $pe)
                                                        @if($pe->id == $as->idperipheral)
                                                            <td class="text-left">{{$pe->nombre}}</td>
                                                        @endif
                                                    @endforeach
                                                    @foreach($occu as $oc)
                                                        @if($oc->id == $as->idoccurence)
                                                            <td class="text-left">{{$oc->descripcion}}</td>
                                                        @endif
                                                    @endforeach
                                                    <td class="td-actions text-right">
                                                        <a href=" " class="btn btn-info btn-sm" id="edit-item" rel="tooltip" style="color:rgb(255,255,255)">editar</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="alert alert-danger" role="alert">No existen Datos</div>
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group row mb-0 py-1">
                                    <div class="col-md-12 text-center ">
                                        {{--<a href="{{url('/home/form/index/'.$form->id.'')}}"  class="btn btn-info">--}}
                                            {{--{{ __('Atras') }}--}}
                                        {{--</a>--}}

                                        {{--<a href="{{url('/home/form/title/'.$form->id.'')}}" class="btn btn-info">--}}
                                            {{--Siguiente--}}
                                        {{--</a>--}}
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- new -->
    <div class="modal fade" id="news">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title" id="exampleModalLabel" style="position: absolute;">Registro de Conocimientos y habilidades</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action=" " class="form-horizontal form-material">
                        {!! csrf_field() !!}
                        <div class="panel-body">
                            <div class="form-group col-md-12">
                                <label for="name" class="control-label">Nombre usuario</label>
                                <select name="nivel" class="form-control" id="nivel">
                                    <option value="1">--Seleccione Usuario--</option>
                                    @foreach($user as $us)
                                        <option value="{{$us->id}}">{{$us->name}} {{$us->apellido_p}} {{$us->apellido_m}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="name" class="control-label">Equipo</label>
                                <select name="nivel" class="form-control" id="nivel">
                                    <option value="1">--Seleccione Equipo--</option>
                                    @foreach($pc as $pcs)
                                        <option value="{{$pcs->id}}">{{$pcs->marca}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="name" class="control-label">Periferico</label>
                                <select name="nivel" class="form-control" id="nivel">
                                    <option value="1">--Seleccione Periferico--</option>
                                    @foreach($peri as $pe)
                                        <option value="{{$pe->id}}">{{$pe->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="name" class="control-label">Caso</label>
                                <select name="nivel" class="form-control" id="nivel">
                                    <option value="1">--Seleccione Caso--</option>
                                    @foreach($occu as $oc)
                                            <option value="{{$pe->id}}">{{$oc->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        </form>
                        <div class="modal-footer">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-info add">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // add a new post
        $(document).on('click', '.create-modal', function() {
            $('#news').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: "{{url('/home/skills')}}"+'/'+id,
                // url: 'skills.guardar',
                data: {
                    'name': $('#name').val(),
                    'nivel': $('#nivel').val()
                },
                success: function(data) {
                    $('.errorTitle').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#newskill').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.name) {
                            $('.errorTitle').removeClass('hidden');
                            $('.errorTitle').text(data.errors.name);

                        }
                    }else {
                        toastr.success('Successfully added Post!', 'Success Alert', {timeOut: 5000});
                        $('#tabla').append("<tr><td>" + data.name + "</td><td>" + data.nivel + "</td></tr>");
                    }
                }
            });
        });
    </script>
@endsection
