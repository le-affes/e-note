<?php
require_once('bdd.php');

/*if (!isset($_GET['id'])) {
    header("Location: ../index.php"); // Redirecionamento para pÃƒÂ¡gina inicial
    
}
 /*
 */
$id=$_GET["id"];

$sql = "SELECT id, title, start, end, color FROM evento c JOIN professor_has_turma r ON Professor_idProfessor=$id JOIN turma t ON r.Turma_idTurma=t.idTurma  WHERE c.Turma_idTurma=t.idTurma" ;

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Professor-Calendário</title>
  <link href="multipla/multiple-select.css" rel="stylesheet"/>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!-- FullCalendar -->
	<link href='css/fullcalendar.css' rel='stylesheet' />

        <link href='../css/logo-nav.css' rel='stylesheet' />

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
	#calendar {
		max-width: 800px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
    </style>

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
                            <a href="../index.php" style=" ">Home</a>
                        </li>     
                        <li >
                            <a href="index.php">Calendário</a>
                        </li>  
                        <li >
                            <button type="button"  id ="mm" class="btn btn-info btn-lg " data-toggle="modal" data-target="#myModal" ">Aprovar Cadastro</button>
                        </li>
                        <li >
                            <button type="button"  id ="mm" class="btn btn-info btn-lg " data-toggle="modal" data-target="#Modalmy" ">Atualizar dados</button>
                        </li>
                        <!-- Modal -->



                    </ul>



                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Calendário do Professor</h1>
                <p class="lead">Clique no dia para agendar evento</p>
                <div id="calendar" class="col-centered">
                </div>
            </div>
			
        </div>
        <!-- /.row -->
		
		<!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Cadastrar evento</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Título</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Título">
					</div>
				  </div>
                              
				  <div class="form-group">
					<label for="disciplina" class="col-sm-2 control-label">Disciplina</label>
					<div class="col-sm-10">
                                             
					 <?php 
                                         //include "../../ProfessorDAO.php";
                                        class professord{
                                            
                                            function disciplinas(){
                              $Server = "localhost";
    $Username = "root";
    $Password = "";
    $Database = "e_note";
   // $variavel=new ProfessorDao();
  //  echo $variavel->getIdUsuario();
 $id=$_GET["id"];
    $conexao=mysqli_connect($Server, $Username, $Password, $Database);
            mysqli_set_charset($conexao,'utf8');

     $consulta = mysqli_query($conexao, "SELECT  g.nome, f.Professor_idProfessor,g.idDisciplina  FROM disciplina g JOIN turma c ON g.idDisciplina=c.Disciplina_idDisciplina JOIN professor_has_turma f ON f.Turma_idTurma=c.idTurma AND f.Professor_idProfessor=$id;");
        $campos = mysqli_num_rows($consulta);
        $contador=1;
        echo "<select class='form-control' name='disciplina' id='tipo' placeholder='Tipo: '  style='width:100%;height:34px;border-radius:4px;border-color:#ccc;    padding: 6px 8px; '>";
            echo "<option value='' disabled selected hidden style='color:grey'>Disciplina:</option>";
        if ($campos != 0) {
         
            
            while ($query = mysqli_fetch_array($consulta)) {
               
                $i=$query['idDisciplina'];
                echo " <option value='$i'>".$query['nome']."</option>";
                $contador++;
              
            
            
                
            }
          
        }
         echo " </select>";
         
                                        }
                                        }
    
                              ?>
                                        <?php
                                        $t=new professord();
                                        echo $t->disciplinas();
                                       echo "</div>";
				  echo "</div>";
                                        ?>
                                            
					
				 <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Início</label>
					<div class="col-sm-10">
					 <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Fim</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>
				 <div class="form-group">
					<label for="tipo" class="col-sm-2 control-label">Tipo</label>
					<div class="col-sm-10">
                                            <?php
                                               $Server = "localhost";
    $Username = "root";
    $Password = "";
    $Database = "e_note";
   // $variavel=new ProfessorDao();
  //  echo $variavel->getIdUsuario();
 //$id=$_GET["id"];
    $conexao=mysqli_connect($Server, $Username, $Password, $Database);
           mysqli_set_charset($conexao,'utf8');

     $consulta = mysqli_query($conexao, "SELECT  * FROM tipo");
        $campos = mysqli_num_rows($consulta);
        $contador=1;
        echo "<select class='form-control' name='tipo' id='tipo' placeholder='Tipo: '  style='width:100%;height:34px;border-radius:4px;border-color:#ccc;    padding: 6px 8px; margin-bottom:15px;'name='tipo'>";
            echo "<option value='' disabled selected hidden style='color:grey'>Tipo:</option>";
        if ($campos != 0) {
         
            
            while ($query = mysqli_fetch_array($consulta)) {
               
                $i2=$query["idTipo"];
                echo " <option value='$i2'>".$query['nome']."</option>";
                $contador++;
              
            
            
                
            }
          
        }
         echo " </select>";
                                            
                                            ?>
                                            </div></div>
                                            <center>
                                            <button type="submit" class="btn btn-info btn-lg"style=" padding: 10px 16px;font-size: 18px;line-height: 1.3333333;    border-radius: 6px;" >Salvar</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                            </center>
			  </div>
                                        
			  <div class="modal-footer">
				
			  </div>
			</form>
			</div>
		  </div>
		</div>
		
		
		
		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="editEventTitle.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Editar Evento</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Título</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">Choose</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
						  <option style="color:#008000;" value="#008000">&#9724; Green</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
						  <option style="color:#000;" value="#000">&#9724; Black</option>
						  
						</select>
					</div>
				  </div>
				    <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete"> Deletar Evento</label>
						  </div>
						</div>
					</div>
				  
				  <input type="hidden" name="id" class="form-control" id="id">
                                  <center>
                                 <button type="submit" class="btn btn-info btn-lg">Salvar</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				
                                                                  </center>

				
			  </div>
			  <div class="modal-footer">
				
			  </div>
			</form>
			</div>
		  </div>
		</div>

    </div>
         <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Aprovar Cadastro</h4>
                    </div>
                    <div class="modal-body">
                        <form action="../../Controller/ControllerProfessor.php" method="post" class="form-signin">
                            <?php
                            $Server = "localhost";
    $Username = "root";
    $Password = "";
    $Database = "e_note";
   // $variavel=new ProfessorDao();
  //  echo $variavel->getIdUsuario();
    echo "<center>";
   echo '<label>Professores com cadastro pendente</label><br/><br/>';
   echo '<form method="POST" action="ins.php">';
        echo '<table>';
           echo '<tr>';
                //echo '<th></th>';
                echo '<th>Professor</th>';                           
                echo '<th>Aprovado</th>';
            echo '</tr>';
           
    $conexao=mysqli_connect($Server, $Username, $Password, $Database);
            mysqli_set_charset($conexao,'utf8');

    echo mysqli_set_charset($conexao, 'utf-8');
     $consulta = mysqli_query($conexao, "SELECT *FROM professor WHERE aprovado=0");
        $campos = mysqli_num_rows($consulta);
        $contador=1;
        if ($campos != 0) {
         
           
            while ($query = mysqli_fetch_array($consulta)) {
               
                echo '<tr>';
                 echo "<td>".$query['nome']."</br>".$query['email'].'<br/>'.'<br/>'."</td>";
                 $id=$query['idProfessor'];
                 echo "<td><input type='checkbox'  name='aprovado[]' value='$id' style='margin-left:50px;overflow:auto'></label></td>" ;
                echo '</tr>';
                $contador++;
              
            
            
                
            }
          
        }
       
         echo " </table><br/><br/>";
          echo "</center>";
          
         
                                ?>
                         
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
    <!-- /.container -->
 <div class="modal fade" id="Modalmy" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" id="GG">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Atualiza&#231&#245es</h4>
        </div>
        <div class="modal-body" >
 <ul class="nav nav-pills nav-stacked" style="margin-left:0px; margin-right:0px;padding-right:0px;float:left; ">
   <li role="presentation" class="active" id="Curso"><a href="#">Curso</a></li>
  <li role="presentation" class="active"id='Disciplina'><a href="#">Disciplina</a></li>
  <li role="presentation" class="active"id='Turma'><a href="#">Turma</a></li>
    <li role="presentation" class="active" id="Nivel"><a href="#">N�vel</a></li>
    <li role="presentation" class="active"id='Tipo'><a href="#">Tipo</a></li>
</ul>
            <form action="../../Controller/ControllerTipo.php" method="post" class="form-signin" id="them" style="margin-left:100px;margin-top:0px;padding-top:10px; ">
                                                                                <label for="inputEmail" class="sr-only">Email: </label>
                                                                                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Clique no menu ao lado para atualizar: " required autofocus disabled>
                                                                                </br>
                                                                               
                                                                                
                                                                                <div class="checkbox">
                                                                                    <label>
                                                                                        <input type="checkbox" value="remember-me"> Lembrar-me dos dados 
                                                                                    </label>
                                                                                </div>
                                                                                <!--<a href="admin.html"><button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button></a>-->
                                                                               <center><input type="submit" class="btn btn-info btn-lg" ><button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button></center>
                                                                            </form>
            </div>
                  
        <div class="modal-footer" style='margin-left:100px;margin-top:0px;padding-top:10px;'>
     
        </div>
      </div>
      
    </div>
  </div>
    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	<script src="multipla/multiple-select.js"></script>
	<!-- FullCalendar -->
	<script src='js/moment.min.js'></script>
	<script src='js/fullcalendar.min.js'></script>
	
	<script>

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
                        buttonText: {
     
        today: "Hoje",
        month: "Mês",
        week: "Semana",
        day: "Dia"
    },
	
			defaultDate: '2017-09-19',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
                              dayNamesShort: [
    'Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'
    ],
     monthNames: [  'Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro',
    'Outubro','Novembro','Dezembro'
    ],
     dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'
        ],
			select: function(start, end) {
				
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
			},
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<?php foreach($events as $event): 
			
				$start = explode(" ", $event['start']);
				$end = explode(" ", $event['end']);
				if($start[1] == '00:00:00'){
					$start = $start[0];
				}else{
					$start = $event['start'];
				}
				if($end[1] == '00:00:00'){
					$end = $end[0];
				}else{
					$end = $event['end'];
				}
			?>
				{
					id: '<?php echo $event['id']; ?>',
					title: '<?php echo $event['title']; ?>',
					start: '<?php echo $start; ?>',
					end: '<?php echo $end; ?>',
					color: '<?php echo $event['color']; ?>',
				},
			<?php endforeach; ?>
			]
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Salvo');
					}else{
						alert('Não foi possível salvar.'); 
					}
				}
			});
		}
		
	});
        

</script>
<script>
    $(document).ready(function(){
    $("#Curso").click(function(){
         $.ajax({
                    type: 'POST',
                    url: '../../Controller/ControllerUsuario.php',
                    async: false,
                    success: function (response) {
                       $("#them").html("<label for='inputEmail' class='sr-only'>Email: </label><input type='text' id='inputEmail' class='form-control' name='nome' placeholder='Nome: 'required autofocus><br/>"+response+"<div class='checkbox'> <label> <input type='checkbox' value='remember-me'> Lembrar-me dos dados </label> </div> <center><input type='submit' class='btn btn-info btn-lg' ><button type='button' class='btn btn-default' data-dismiss='modal'>Fechar</button></center></form>");
                    },
                    error: function(){
                        alert("erro");
                    }
                });
        
    });
});
 $(document).ready(function(){
    $("#Disciplina").click(function(){
         $.ajax({
                    type: 'POST',
                    url: '../../Controller/ControllerEvento.php',
                    async: false,
                    success: function (response) {
                       $("#them").html("<label for='inputEmail' class='sr-only'>Email: </label><input type='text' id='inputEmail' class='form-control' name='nome3' placeholder='Nome: 'required autofocus><br/><label for='inputEmail' class='sr-only'>Email: </label><input type='number' id='inputEmail' max='10' min='1' class='form-control' name='periodo' placeholder='Per�odo: 'required autofocus><br/><input type='checkbox' value='1'name='obrigatoria'><label> Obrigatoria</label>"+response+"<div class='checkbox'> <label> <input type='checkbox' value='remember-me'> Lembrar-me dos dados </label> </div> <center><input type='submit' class='btn btn-info btn-lg' ><button type='button' class='btn btn-default' data-dismiss='modal'>Fechar</button></center></form>");
                    },
                    error: function(){
                        alert("erro");
                    }
                });
        
    });
});
 $(document).ready(function(){
    $("#Turma").click(function(){
         $.ajax({
                    type: 'POST',
                    url: '../../Controller/ControllerTurma.php',
                    async: false,
                    success: function (response) {
                       $("#them").html("<label for='inputEmail' class='sr-only'>Email: </label><input type='number' id='inputEmail' class='form-control' max='10' min='1' name='semestre' placeholder='Semestre:'required autofocus><br/><label for='inputEmail' class='sr-only'>Email: </label><input type='number' id='inputEmail' min='1' class='form-control' name='ano' placeholder='Ano:'required autofocus><br/>"+response+"<div class='checkbox'> <label> <input type='checkbox' value='remember-me'> Lembrar-me dos dados </label> </div> <center><input type='submit' class='btn btn-info btn-lg' ><button type='button' class='btn btn-default' data-dismiss='modal'>Fechar</button></center></form>");
                    },
                    error: function(){
                        alert("erroddd");
                    }
                });
        
    });
});

$(document).ready(function(){
    $("#Tipo").click(function(){
        $("#them").html("<label for='inputEmail' class='sr-only'>Email: </label><input type='text' id='inputEmail' class='form-control' name='nome1' placeholder='Nome: 'required autofocus><br/><label for='inputEmail' class='sr-only'>Email: </label><input type='text' id='inputEmail' class='form-control' name='descricao' placeholder='Descri��o: 'required autofocus><div class='checkbox'> <label> <input type='checkbox' value='remember-me'> Lembrar-me dos dados </label> </div> <center><input type='submit' class='btn btn-info btn-lg' ><button type='button' class='btn btn-default' data-dismiss='modal'>Fechar</button></center></form>");
    });
});
$(document).ready(function(){
    $("#Nivel").click(function(){
        $("#them").html("<label for='inputEmail' class='sr-only'>Email: </label><input type='text' id='inputEmail' class='form-control' name='nome' placeholder='Nome: 'required autofocus><div class='checkbox'> <label> <input type='checkbox' value='remember-me'> Lembrar-me dos dados </label> </div> <center><input type='submit' class='btn btn-info btn-lg' ><button type='button' class='btn btn-default' data-dismiss='modal'>Fechar</button></center></form>");
    });
});


$("select").multipleSelect({
            filter: true,
            multiple: true,
            
        });
</script>
</body>

</html>