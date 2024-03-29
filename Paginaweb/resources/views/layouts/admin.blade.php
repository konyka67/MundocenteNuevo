<!DOCTYPE html>
<html>
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8" />
    

    <title>Mundocente | @yield('titulo-pagina')</title>
 
    @include('layouts.linksplantilla')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/estilos.css')!!}
    <!-- <script src="../js/jquery-1.12.3.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/estilos.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/estilo-menu.css') }}"> 
</head>

<body>


    @include('layouts.navbar')


    <div class="cuerpo">

        <div class="paneles container">   
            <div class="principal col-xs-12 col-sm-12 col-md-12">
                <div class="contenido">
                    <div id="wrapper">

                        <!-- Navigation -->
                        <!-- <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0"> -->
                            @yield('panel')
                            <!-- /.navbar-static-side -->
                        <!-- </nav> -->

                        <div id="page-wrapper">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 class="page-header">@yield('titulo-pagina')</h1>
                                </div>
                                <!-- /.col-lg-12 -->
                            </div>
                            <!-- /.row -->
                            
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <i class="fa fa-bar-chart-o fa-fw"></i> @yield('titulo-pagina')
                                            <div class="pull-right">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                                        Filtrar
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right" role="menu">
                                                        <li><a href="#">Action</a>
                                                        </li>
                                                        <li><a href="#">Another action</a>
                                                        </li>
                                                        <li><a href="#">Something else here</a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li><a href="#">Separated link</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            @yield('contenido')
                                        </div>
                                        <!-- /.panel-body -->
                                    </div>                   
                                    <!-- /.panel -->
                                </div>
                                <!-- /.col-lg-12 -->

                                <div style="visibility:hidden;position:absolute;z-index=2;height:50px;width:100px;">
                                    <div id="morris-area-chart" style="width:100%;height:100%;"></div>
                                    <div id="morris-bar-chart" style="width:100%;height:100%;"></div>
                                    <div id="morris-donut-chart" style="width:100%;height:100%;"></div>
                                </div>


                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /#page-wrapper -->

                    </div>
                    <!-- /#wrapper -->

                    @yield('pie')
                    
                </div>
            </div>
        </div>
    </div>



    <!-- jQuery -->
    <script type="text/javascript" src="{{ URL::asset('bower_components/jquery/dist/jquery.min.js') }}"></script>    
    <!-- <script src="../bower_components/jquery/dist/jquery.min.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="{{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->

    <!-- Metis Menu Plugin JavaScript -->
    <script type="text/javascript" src="{{ URL::asset('bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>
    <!-- <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script> -->

    <!-- Morris Charts JavaScript -->
    <script type="text/javascript" src="{{ URL::asset('bower_components/raphael/raphael-min.js') }}"></script>
    <!-- <script src="../bower_components/raphael/raphael-min.js"></script> -->
    <script type="text/javascript" src="{{ URL::asset('bower_components/morrisjs/morris.min.js') }}"></script>
    <!-- <script src="../bower_components/morrisjs/morris.min.js"></script> -->
    <script type="text/javascript" src="{{ URL::asset('js/morris-data.js') }}"></script>
    <!-- <script src="../js/morris-data.js"></script> -->

    <!-- Custom Theme JavaScript -->
    <script type="text/javascript" src="{{ URL::asset('dist/js/sb-admin-2.js') }}"></script>
    <!-- <script src="../dist/js/sb-admin-2.js"></script> -->

    <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>

  <script type="text/javascript" src="{{ URL::asset('js/formularios.js') }}"></script>

  <script type="text/javascript" src="{{ URL::asset('js/menu.js') }}"></script>

</body>

</html>
