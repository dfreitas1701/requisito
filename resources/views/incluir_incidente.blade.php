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
                    <li><a href="{{url('/')}}"
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
                            <li><a href="{{route('incidente.index')}}">Incidentes</a></li>
                            <li class="active">Inclusão</li>
                        </ol>
                    </div>
                </div>
                <div class="row">

                    <form method="post"
                          action="{{route('incidente.store')}}"
                          enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <h2><b>Inclusão de incidente</b></h2>
                            <br>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="titulo">Titulo</label>
                                    <input type="text" name="titulo"
                                           class="form-control"
                                           required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descricao">Descrição</label>
                                    <textarea class="form-control"
                                              rows="10"
                                              name="descricao"
                                              required>
                                    </textarea>
{{--                                    <input type="text" name="descricao"--}}
{{--                                           class="form-control"--}}
{{--                                           required>--}}
                                </div>
                            </div>
                            <div class="col-md-12" style="min-height: 30px;">
                                <div class="form-group">
                                    <label class="col-md-2" style="padding: 0;" for="criticidade">Criticidade</label>
                                    <select class="col-md-6" style="padding: 0;"
                                            name="criticidade"
                                            data-index="0">
                                        <option value="1">Alta</option>
                                        <option value="2">Média</option>
                                        <option value="3">Baixa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" style="min-height: 30px;">
                                <div class="form-group">
                                    <label class="col-md-2" style="padding: 0;" for="tipo">Tipo</label>
                                    <select class="col-md-6" style="padding: 0;"
                                            name="tipo"
                                            data-index="0">
                                        <option value="1">Ataque Brute Force</option>
                                        <option value="2">Credencias vazadas</option>
                                        <option value="3">Ataque de DDoS</option>
                                        <option value="4">Atividades anormais de usuários</option>
                                    </select>
                                </div>
                            </div>
                            <div id="center" class="col-md-12" style="margin-top: 10px;">
                                <button type="reset" class="btn btn-default">
                                    Limpar
                                </button>
                                <button type="submit"
                                        class="btn btn-warning" id="black">
                                    Incluir
                                </button>
                            </div>

                        </div>
                        <div class="col-md-3"></div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
