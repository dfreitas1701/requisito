<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Incidentes</title>

        <!-- Favicon -->
        <link href="{{URL::asset('images/favicon.ico')}}" rel="shortcut icon">

        <!-- Fonts -->        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> 

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css" />       

        <!-- JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="{{URL::asset('js/ajax.js')}}"></script>
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
                    <li><a href="#" 
                           style="text-decoration: none">
                            <span class="glyphicon glyphicon-log-out"></span>
                            <span id="underline">Sair</span></a></li>  
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                </ul>
            </div>       
        </nav>        
        <div id="line-one">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb">
                            <li><a href="">Panel</a></li>                  
                            <li><a href="{{route('incidente.index')}}">Incidentes</a></li>
                            <li class="active">Alteração</li>
                        </ol>              
                    </div>          
                </div>
                <div class="row">  
                    <br>
                    <h4 id="center"><b>Alteração de incidente</b></h4>
                    <br> 
                    <form method="post" 
                          action="{{route('incidente.update', $incidente->id)}}"
                          enctype="multipart/form-data">
                        {!! method_field('put') !!}
                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group col-md-2" style="padding:0;">
                                    <label for="codigo">Código</label>
                                    <input type="text" name="codigo"
                                           class="form-control"
                                           value="{{$incidente->id}}"
                                           disabled>
                                </div>
                                <div class="form-group col-md-12" style="padding:0;">
                                    <label for="titulo">Título</label>
                                    <input type="text" name="titulo"
                                           class="form-control"
                                           value="{{$incidente->titulo}}"
                                           required>
                                </div>
                                <div class="form-group col-md-12" style="padding:0;">
                                    <label for="titulo">Descrição</label>
                                    <textarea class="form-control"
                                              rows="10"
                                              name="descricao"
                                              required>{{$incidente->descricao}}
                                    </textarea>
{{--                                        <input type="text" name="descricao"--}}
{{--                                           class="form-control"--}}
{{--                                           value="{{$incidente->descricao}}"--}}
{{--                                           required>--}}
                                </div>
                                <div class="form-group col-md-12" style="padding:0;">
                                    <label class="col-md-2" style="padding: 0;" for="criticidade">Criticidade</label>
                                    <select class="col-md-6" style="padding: 0;"
                                            id="criticidade"
                                            name="criticidade"
                                            value="{{$incidente->criticidade->id}}">
                                        <option value=1>Alta</option>
                                        <option value=2>Média</option>
                                        <option value=3>Baixa</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12" style="padding:0;">
                                    <label class="col-md-2" style="padding: 0;" for="tipo">Tipo</label>
                                    <select class="col-md-6" style="padding: 0;"
                                            id="tipo"
                                            name="tipo"
                                            value="{{$incidente->tipoincidente->id}}">
                                        <option value=1>Ataque Brute Force</option>
                                        <option value=2>Credencias vazadas</option>
                                        <option value=3>Ataque de DDoS</option>
                                        <option value=4>Atividades anormais de usuários</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12" style="padding:0;">
                                    <label class="col-md-2" style="padding: 0;" for="status">Status</label>
                                    <select class="col-md-6" style="padding: 0;"
                                            id="status"
                                            name="status"
                                            value="{{$incidente->status}}">
                                        <option value="A">Aberto</option>
                                        <option value="F">Fechado</option>
                                    </select>
                                </div>
                                <div class="col-md-12" id="center">
                                    <button type="reset" class="btn btn-default">
                                        Limpar
                                    </button>
                                    <button type="submit"
                                            class="btn btn-warning" id="black">
                                        Alterar
                                    </button>
                                </div>

                            </div>
                            <div class="col-md-3"></div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            document.ready
            window.document.getElementById("criticidade").value = "{{$incidente->criticidade->id}}";
            window.document.getElementById("tipo").value = "{{$incidente->tipoincidente->id}}";
            window.document.getElementById("status").value = "{{$incidente->status}}";
        </script>
    </body>
</html>
