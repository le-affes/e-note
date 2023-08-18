<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href="responsive-calendar/css/responsive-calendar.css" rel="stylesheet">
        <title>Calendário</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="http://static.tumblr.com/5dbytsa/WS3merges/entrada.css" media="screen"/>
        <!-- Custom CSS -->
        <link href="css/logo-nav.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img  class="img-responsive2" src="imagem2.png" alt="" style="width:200px; padding-top:10px;">
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav" style="padding:5px">

                        <li >
                            <a href="index.php" style=" ">Home</a>
                        </li>     
                        <li >
                            <a href="aluno.html">Calendário</a>
                        </li>  
                        <li >
                            <button type="button"  id ="mm" class="btn btn-info btn-lg " data-toggle="modal" data-target="#myModal" ">Cadastrar evento</button>
                        </li>


                        <!-- Modal -->



                    </ul>



                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <div class="jumbotron" id="inicial">

            <div class="container">
                <!-- Responsive calendar - START -->
                <div class="responsive-calendar">
                    <div class="controls">
                        <a class="pull-left" data-go="prev"><div class="btn btn-primary">Anterior</div></a>
                        <h4><span data-head-year></span> <span data-head-month></span></h4>
                        <a class="pull-right" data-go="next"><div class="btn btn-primary">Próximo</div></a>
                    </div><hr/>
                    <div class="day-headers" style=" font-family:Calibri Light !important font-size:200%;">
                        <div class="day header">Seg</div>
                        <div class="day header">Ter</div>
                        <div class="day header">Qua</div>
                        <div class="day header">Qui</div>
                        <div class="day header">Sex</div>
                        <div class="day header">Sab</div>
                        <div class="day header">Dom</div>
                    </div>
                    <div class="days" data-group="days">

                    </div>
                </div>
                <!-- Responsive calendar - END -->
            </div>

        </div>

        <!-- Page Content -->

        <!-- /.container -->

        <!-- jQuery -->
        <div class="modal fade" id="myModal" role="dialog"> 
            <div class="modal-dialog"> 
                <!-- Modal content--> <div class="modal-content"> 
                    <div class="modal-header"> <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Evento</h4> </div> <div class="modal-body"> 
                            <form class="form-signin"> <label for="inputEmail" class="sr-only">Nome: </label> 
                                <input type="email" id="inputEmail" class="form-control" placeholder="Nome: " required autofocus> </br> <label for="inputEmail" class="sr-only">Nome: </label> <input type="date" id="inputEmail" class="form-control" placeholder="Data: " required autofocus>
                                </br> <?php include "../Controller/ControllerEvento.php" ?>
                                
                     </form> </div><div class="checkbox">
                                <label>
                                    <input type="checkbox" value="remember-me"> Lembrar-me dos dados 
                                </label>
                            </div>
                            <!--<a href="admin.html"><button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button></a>-->
                            <center><input type="submit"  value="Entrar" class="btn btn-info btn-lg" ><button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button></center>
                        </form> <div class="modal-footer"> </div> </div> </div> </div>
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="./JS/jquery.min.js"><\/script>')</script>

        <script src="responsive-calendar/js/jquery.js"></script>
        <script src="responsive-calendar/js/bootstrap.min.js"></script>
        <script src="responsive-calendar/js/responsive-calendar.js"></script>
        <?php
         $Server = "localhost";
   $Username = "root";
    $Password = "";
     $Database = "e_note";
     $conectar=mysqli_connect($Server,$Username,$Password,$Database);
          $consulta = mysqli_query($conectar, "SELECT  * FROM evento ;");
     $array=array();
     
        $campos = mysqli_num_rows($consulta);
        $contador=1;
        if ($campos != 0) {
     
            while ($query = mysqli_fetch_array($consulta)) {
                  
              // echo $this->idProfessor;
                
                  $string= $query['data']; 
                  $string2= substr($string,0,11)." ";
              $array[$contador]=$string2;
                $contador++;
              
            
                    //s }
                
            }
          
        }
      //  print_r($array);
        
        echo json_encode($array);
        ?>
        <script type="text/javascript">
          
           //alert(var ar[1]);
           
            $(document).ready(function () {
                var ar = <?php echo json_encode($array) ?>;
                $(".responsive-calendar").responsiveCalendar({
                    time: '2017-07',
                    events: {
                        "2017-07-28": {"number": 6, "url": ""},
                        "2017-04-26": {"number": 1, "url": "http://w3widgets.com"},
                        "2017-05-03": {"number": 1},
                        "201-06-12": {}}
                });
            });
        </script>
    </body>

</html>
