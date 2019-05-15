<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token" />
    <title>Incidentes</title>
    
    <!-- Favicon -->
    <link href="{{URL::asset('images/favicon.ico')}}" rel="shortcut icon">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::asset('css/lightbox.css')}}" rel="stylesheet" type="text/css" />
    
    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{URL::asset('js/ajax.js')}}"></script>
    <script src="{{URL::asset('js/lightbox.js')}}"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right" id="link-white">
            <li class="dropdown">
                <a href="#" style="text-decoration: none">
                    <img src="{{URL::asset('images/diogenes.jpg')}}"
                         class="img-circle" width="26" height="26"
                         style="margin-top: -3px">
                    <span id="underline">Diógenes Garrett</span>
                </a>
            </li>
            <li><a href="{{url('/')}}"
                   style="text-decoration: none">
                    <span class="glyphicon glyphicon-log-out"></span>
                    <span id="underline">Sair</span></a></li>
            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
        </ul>
    </div>
</nav>
@if (session('message'))
<div class="alert alert-success alert-dismissible">
    <a href="#" class="close"
       data-dismiss="alert"
       aria-label="close">&times;</a>
    {{ session('message') }}
</div>
@endif
<div id="line-one">
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="center">
                <h1><b>Incidentes</b></h1>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-8">
                    <h4><b>Incidentes cadastrados: {{$total}}</b></h4>
                </div>
                <div class="col-md-4">
                    <a href="{{route('incidente.create')}}"
                       class="btn btn-default btn-sm pull-right">
                        <span class="glyphicon glyphicon-plus"></span> Adicionar</a>
                </div>
                <br>
                <div class="table-responsive col-md-12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th id="center">Código</th>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th id="center">Criticidade</th>
                            <th id="center">Tipo</th>
                            <th id="center">Status</th>
                            <th id="center">Inclusão</th>
                            <th id="center">Última alteração</th>
                            <th id="center">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($incidentes as $incidente)
                                <tr>
                                    <td id="center">{{$incidente->id}}</td>
                                    <td title="Título">{{$incidente->titulo}}</td>
                                    <td title="Descrição">{{$incidente->descricao}}</td>
                                    <td title="Criticidade" id="center">{{$incidente->criticidade->nome}}</td>
                                    <td title="Tipo" id="center">{{$incidente->tipoincidente->nome}}</td>
                                    <td title="Status" id="center">{{$incidente->status}}</td>
                                    <td id="center">{{$incidente->created_at}}</td>
                                    <td id="center">{{$incidente->updated_at}}</td>

                                    <td id="center">
                                        <a href="{{route('incidente.edit', $incidente->id)}}"
                                           data-toggle="tooltip"
                                           data-placement="top"
                                           title="Alterar"><i class="fa fa-pencil"></i>
                                        </a>
                                        <form style="display: inline-block;" method="POST"
                                                    action="{{route('incidente.destroy', $incidente->id)}}"
                                                    data-toggle="tooltip" data-placement="top"
                                                    title="Excluir"
                                                    onsubmit="return confirm('Confirma exclusão?')">
                                            {{method_field('DELETE')}}{{ csrf_field() }}
                                            <button type="submit" style="background-color: #fff">
                                                <a><i class="fa fa-trash-o"></i></a>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    <img src="{{URL::asset('images/subir.png')}}"
         id="up"
         style="display: none;"
         alt="Ícone Subir ao Topo"
         title="Subir ao topo?">
    <script type="text/javascript">

        $(document).ready(function(){
            $('#formDelete').on('submit', function(){
                var confirmado = confirm('Confirma a exclusão deste incidente?');
                if (! confirmado) return false;
            })
        })
    </script>
</body>
</html>

