<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
         <link href="multipla/multiple-select.css" rel="stylesheet"/>
        <title>Home</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/logo-nav.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            .ms-choice{
                border:none;
                width: 100%;
                padding:5px;
   
            }
        </style>
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

                         <?php include "../Controller/ControllerNivel.php"?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Professor<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <button type="button"  id ="hh" class="btn btn-info btn-lg hidden-xs" data-toggle="modal" data-target="#Modalmy" width="30px">Cadastro</button><button type="button"  id ="gg" class="btn btn-info btn-lg hidden-lg hidden-md hidden-sm" data-toggle="modal" data-target="#Modalmy" style="margin-right:190px" >Cadastro</button>
                                <button type="button"  id ="hh" class="btn btn-info btn-lg hidden-xs" data-toggle="modal" data-target="#myModal" ">Login</button><button type="button"  id ="gg" class="btn btn-info btn-lg hidden-lg hidden-md hidden-sm" data-toggle="modal" data-target="#myModal" >Login</button>

                                <!-- Modal -->



                            </ul>
                        </li>

                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 hidden-xs hidden-sm" style="padding-top:70px;">

                    <img class="imgh" src="S.png"/>
                </div>
                <div class="col-lg-12 hidden-md hidden-lg  " style="padding-top:70px;"> 

                    <img class="imgh" src="g.png"/>
                </div>
            </div>
        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="../Controller/ControllerProfessor.php" method="post" class="form-signin">
                            <label for="inputEmail" class="sr-only">Email: </label>
                            <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email: " required autofocus>
                            </br>
                            <label for="inputPassword" class="sr-only" >Senha: </label>
                            <input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Senha: " required >
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="remember-me"> Lembrar-me dos dados 
                                </label>
                            </div>
                            <!--<a href="admin.html"><button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button></a>-->
                            <center><input type="submit"  value="Entrar" class="btn btn-info btn-lg" ><button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button></center>
                        </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>

            </div>
        </div>
        <div class="modal fade" id="Modalmy" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Cadastro</h4>
                    </div>
                    <div class="modal-body">
                          <form action="../Controller/ControllerProfessor.php" method="post" class="form-signin">
                         <label for="inputEmail" class="sr-only">Email: </label>
                            <input  type="email" id="inputEmail" class="form-control" name="email" placeholder="Email: " required autofocus>
                            </br>
                            <label for="inputPassword" class="sr-only" >Senha: </label>
                            <input  type="password" id="inputPassword" class="form-control" name="senha" placeholder="Senha: " required >
                            <label for="inputNome" class="sr-only">Nome: </label></br>
                            <input type="" id="inputNome" class="form-control" name="nome" placeholder="Nome: " required autofocus>
                           
                                <?php include "../Controller/ControllerCurso.php";?>
                             
                               
                                
                                <br/><br/><br/>
                                 <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="remember-me"> Lembrar-me dos dados 
                                </label>
                            <!--<a href="admin.html"><button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button></a>-->
                            <center><input type="submit"  value="Entrar" class="btn btn-info btn-lg" ><button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button></center>
                        </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>

            </div>
        </div>
                  </div>
        
        <script src="js/jquery.js"></script>
 <script src="multipla/multiple-select.js"></script>
        <!-- Bootstrap Core JavaScript -->

        <script src="js/bootstrap.min.js"></script>
     
 <!--  <script>
			$("#search").on("click", function(){
				var modal = $('#pesquisa').remodal();
				modal.open();
			});
		</script>
		<script>
			$("#menu").click(function(){
				$("#menu1").toggle();
			});
		</script>
		<script>
			$("#tipo").on("change", function(){
				$("#first").hide();
				if($("#tipo").val() == "1"){
					$("#1").show();
					$("#2").hide();
					$("#3").hide();
					
				} else if($("#tipo").val() == "2"){
					$("#2").show();
					$("#3").hide();
					$("#1").hide();
					
				} else if($("#tipo").val() == "3"){
					$("#3").show();
					$("#1").hide();
					$("#2").hide();
					
					
				} 
			});
		</script>
 -->
    </body>
     <script>
        (function($){
	$(document).ready(function(){
		$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
			event.preventDefault(); 
			event.stopPropagation(); 
			$(this).parent().siblings().removeClass('open');
			$(this).parent().toggleClass('open');
		});
	});
})(jQuery);
//$("ul.dropdown-menu [data-toggle=dropdown]").animate({width:'toggle'},350);

        </script>
        	


<script>
    $(function(){
        $('.a').click(function(e){
            var id = $(this).attr('id');
            
            location.replace("Aluno/index.php?id="+id);
        });
    })
</script>
<script>
 
     
$("select").multipleSelect({
            filter: true,
            multiple: true,
            
        });


</script>

</html>

