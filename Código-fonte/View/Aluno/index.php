<?php
require_once('bdd.php');
$periodo = $_GET["id"];
$nivel = explode(".", $periodo);
$curso1 = $nivel[0];
$periodo1 = $nivel[1];
$sql = "SELECT id, title, start, end, color FROM events C JOIN turma H ON C.Turma_idTurma=H.idTurma AND ano=$periodo1 JOIN curso_has_disciplina G ON Curso_idCurso=$curso1 AND G.Disciplina_idDisciplina=C.Disciplina_idDisciplina; ";
$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

function m() {
    echo "Hhhh";
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>

        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
        <link rel='stylesheet prefetch' href='https://davidstutz.github.io/bootstrap-multiselect/dist/css/bootstrap-multiselect.css'>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Aluno-Calendário</title>

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
            html {
                font-size: 12px;
            }

            [multiselect] {
                position: relative;
            }
            [multiselect]:after {
                display: none;
            }
            [multiselect] select {
                display: none;
            }
            .form-wrapper {
                margin: 0 auto;
                margin: 0 10%;
            }
            .form-wrapper .react-mount {
                width: 100%;
            }
            .form-wrapper .react-mount input[type="checkbox"] {
                display: none;
            }
            .form-wrapper .select-wrapper .checkbox-wrapper {
                max-height: 0;
                background-color: #fff;
                overflow: hidden;
                -webkit-transition: all 0.2s ease-in-out;
                transition: all 0.2s ease-in-out;
            }
            .form-wrapper .select-wrapper.open .checkbox-wrapper {
                max-height: 300px;
                overflow: auto;
                padding: em;
            }
            .form-wrapper .select-wrapper.open .select-value:after {
                -webkit-transform: translateY(-50%) rotate(180deg);
                transform: translateY(-50%) rotate(180deg);
            }
            .form-wrapper .item-label {
                color: #161414;
                font-size: 1rem;
                display: block;
                padding: 1em;
                -webkit-transition: background 0.1s linear;
                transition: background 0.1s linear;
                cursor: pointer;
            }
            .form-wrapper .item-label:hover,
            .form-wrapper .item-label:active,
            .form-wrapper .item-label:focus {
                background-color: #c9e0dc;
            }
            .form-wrapper .select-value {
                min-height: 38px;
                border: 1px solid #dddedf;
                display: block;
                padding: 5px;
                border-radius: 5px;
                background-color: #fff;
                position: relative;
                cursor: pointer;
                vertical-align: middle;
                padding-top: 5px;


            }
            .form-wrapper .select-value:after {
                content: "\f063";
                font-family: 'FontAwesome', icon;
                position: absolute;
                right: 1em;
                top: 50%;
                -webkit-transform: translateY(-50%);
                transform: translateY(-50%);
                -webkit-transition: -webkit-transform 0.5s ease-in-out;
                transition: -webkit-transform 0.5s ease-in-out;
                transition: transform 0.5s ease-in-out;
                transition: transform 0.5s ease-in-out, -webkit-transform 0.5s ease-in-out;
                -webkit-transform-origin: 50% 50%;
                transform-origin: 50% 50%;
            }
            .form-wrapper .select-value .placeholder {
                font-size: 15px;
                font-weight: bold;
            }
            .form-wrapper .select-value label {
                padding: 0.5em 1em;
                background-color: #e9f3f1;
                color: #161414;
                font-size: 1rem;
                border-radius: 5px;
                display: inline-block;
                margin: 0.1em 0.25em;
            }
            .form-wrapper .select-value label:first-child {
                margin-left: 0;
            }
            .form-wrapper .select-value label:after {
                content: 'X';
                font-size: 0.8em;
                margin-left: 1em;
            }
            label {
                display: block;
                color: #161414;
                font-size: 1.3rem;
                margin: 1em 0;
            }
            select {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                border: 1px solid #dddedf;
                background: #fff;
                display: inline-block;
                padding: 14px 40px 12px 16px;
                border-radius: 5px;
                width: 100%;
                font-size: 1.5rem;
                font-weight: bold;
                cursor: pointer;
            }
            select option {
                font-size: 1rem;
            }
            .form-group {
                width: 100%;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
            }
            .form-group .input-group {
                -webkit-box-flex: 1;
                -ms-flex: 1 1 50%;
                flex: 1 1 50%;
                margin: 0 1em;
                position: relative;
            }
            .form-group .input-group:after {
                content: "\f063";
                font-family: 'FontAwesome', icon;
                position: absolute;
                right: 1em;
                padding-top: 4rem;
                top: 50%;
                -webkit-transform: translateY(-50%);
                transform: translateY(-50%);
            }
            .form-group [type="submit"] {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                background-color: #88bbb2;
                border-radius: 5px;
                color: #fff;
                border: none;
                padding: 1rem;
                font-size: 1.4rem;
                font-weight: bold;
                margin: 1em auto;
                -webkit-transition: background-color 0.1s ease;
                transition: background-color 0.1s ease;
                -webkit-animation: roll-gradient 0.2s linear infinite alternate;
                animation: roll-gradient 0.2s linear infinite alternate;
                cursor: pointer;
            }
            .form-group [type="submit"]:hover,
            .form-group [type="submit"]:active,
            .form-group [type="submit"]:focus {
                outline: none;
                background-color: #518c82;
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
                        <img  class="img-responsive2" src="Imagem2.png" alt="" style="width:200px; padding-top:10px;">
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav" style="padding:5px">

                        <li >
                            <a href="../index.php" style=" ">Home</a>
                        </li>     


                        <li >
                            <button type="button"  id ="mm" class="btn btn-info btn-lg " data-toggle="modal" data-target="#myModal" >Receber notificações</button>
                        </li>
                        <li >
                            <button type="button"  id ="mm" class="btn btn-info btn-lg " data-toggle="modal" data-target="#myModal2" >Cancelar notificações</button>
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
                    <h1 style="">Calendário do Aluno</h1>

                    <div id="calendar" class="col-centered">
                    </div>
                </div>

            </div>
            <!-- /.row -->

            <!-- Modal -->







            <!-- Modal -->

            <!-- /.container -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Receber Notificações</h4>
                        </div>
                        <div class="modal-body">
                            <form name='notificacoes' id='notificacoes' method="post" class="form-signin">
                                <label for="inputEmail" class="sr-only">Email: </label>
                                <input  type="email" id="Emailnt" class="form-control" name="Emailnt" placeholder="Email: " required autofocus>
                                <div class="form-wrapper" style='margin: 0px; background: transparent; width: 100%; align-content: left; align-items: left; align-self: left; alignment-adjust: left; alignment-baseline: left; '>
                                    <div class="search-form" ></div>
                                    <br>
                                    <div class="form-group" >
                                        <div class="input-group" multiselect="multiselect" style="width: 99.9% ;  margin-left: -.05%; align-content: left; align-items: left; align-self: left; alignment-adjust: left; alignment-baseline: left;">
                                            <select  value = "disciplinas" name="disciplinas" multiple="multiple" id="disciplinas">
                                                <option selected="" value="">Disciplinas para receber notificações</option>
                                                <optgroup label="">
                                                    <?php
                                                    require_once('bdd.php');
                                                    $query = "SELECT idDisciplina, nome FROM disciplina, curso_has_disciplina, turma WHERE disciplina.idDisciplina=curso_has_disciplina.Disciplina_idDisciplina AND disciplina.idDisciplina=turma.Disciplina_idDisciplina AND turma.ano=" . $periodo1 . " AND curso_has_disciplina.Curso_idCurso=" . $curso1 . "";
                                                    $stmt = $bdd->prepare($query);
                                                    $stmt->execute();
                                                    $array = $stmt->fetchAll();
                                                    //echo var_dump($array);
                                                    for ($i = 0; $i < count($array); $i++) {
                                                        echo'<option value="' . $array[$i]["idDisciplina"] . '">' . $array[$i]["nome"] . '</option>';
                                                    }
                                                    ?>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="checkbox">
                                    <!--<a href="admin.html"><button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button></a>-->
                                    <center><input type="submit"  value="Entrar" class="btn btn-info btn-lg" id="entrarnt" name="entrarnt" ><button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button></center>

                                </div>
                            </form>
                            <div class="modal-footer">
                                <center><div class="row" style="font-size: 19px;">Nota: Os alertas são enviados aos Sábados. Verifique sua caixa de Spans.</div></center>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="myModal2" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Cancelar Notificações</h4>
                        </div>
                        <div class="modal-body">
                            <form  method="post" class="form-signin" name='cancelar' id='cancelar' >
                                <label for="inputEmail" class="sr-only">Email: </label>
                                <input  type="email" id="emailcan" class="form-control" name="emailcan" placeholder="Email: " required autofocus>
                                <label for="inputNome" class="sr-only">Nome: </label></br>

                                <input  type="nome" id="nomecan" class="form-control" name="nomecan" placeholder="Nome: " required autofocus>
                                <br/>


                                <!--<a href="admin.html"><button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button></a>-->
                                <center><input type="submit"  value="Entrar" class="btn btn-info btn-lg" id="cannt" name="cannt" ><button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button></center>
                            </form>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>

                </div>
            </div>


    </body>
    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- FullCalendar -->
    <script src='js/moment.min.js'></script>
    <script src='js/fullcalendar.min.js'></script>

    <script>

        $(document).ready(function () {

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                defaultDate: '2017-09-19',
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                selectable: true,
                selectHelper: true,
                dayNamesShort: [
                    'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'
                ],
                monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro',
                    'Outubro', 'Novembro', 'Dezembro'
                ],
                dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'
                ],
                select: function (start, end) {

                    $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                    $('#ModalAdd').modal('show');
                },
                eventRender: function (event, element) {
                    element.bind('dblclick', function () {
                        $('#ModalEdit #id').val(event.id);
                        $('#ModalEdit #title').val(event.title);
                        $('#ModalEdit #color').val(event.color);
                        $('#ModalEdit').modal('show');
                    });
                },
                eventDrop: function (event, delta, revertFunc) { // si changement de position

                    edit(event);
                },
                eventResize: function (event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur

                    edit(event);
                },
                events: [
<?php
foreach ($events as $event):

    $start = explode(" ", $event['start']);
    $end = explode(" ", $event['end']);
    if ($start[1] == '00:00:00') {
        $start = $start[0];
    } else {
        $start = $event['start'];
    }
    if ($end[1] == '00:00:00') {
        $end = $end[0];
    } else {
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
            function edit(event) {
                start = event.start.format('YYYY-MM-DD HH:mm:ss');
                if (event.end) {
                    end = event.end.format('YYYY-MM-DD HH:mm:ss');
                } else {
                    end = start;
                }

                id = event.id;
                Event = [];
                Event[0] = id;
                Event[1] = start;
                Event[2] = end;
            }

        });
    </script>
    <script type='text/javascript'>
        // receber notificações
        $("#entrarnt").click(function () {
            // serializa os dados do formulário e os envia para o script de inserção
            var teste = document.getElementById('disciplinas').value;
//            alert(teste);
            if ($('#Emailnt').val().trim() == "" || teste == "") {
                alert("Coloque seu email e as disciplinas para ser notificado.");
            } else {

                var parametros = $('#notificacoes').serialize();
                $.post('../../Controller/ControllerAlerta.php', parametros, function (response) {
                    $('Emailnt').val("");
                    $('disciplinas').val("");
                }
                );
            }
        });
        //cancelar notificações
        $("#cannt").click(function () {
            // serializa os dados do formulário e os envia para o script de inserção
            var teste = document.getElementById('nomecan').value;
//            alert(teste);
            if ($('#emailcan').val().trim() == "" || teste == "") {
                alert("Coloque seu nome e email para cancelar seu cadastro.");
            } else {

                var parametros = $('#cancelar').serialize();
                $.post('../../Controller/ControllerAlerta.php', parametros, function (response) {
                    $('emailcan').val("");
                    $('nomecan').val("");
                }
                );
            }
        });
    </script>
    
    <script src='https://npmcdn.com/react@15.3.0/dist/react.min.js'></script>
    <script src='https://npmcdn.com/react-dom@15.3.0/dist/react-dom.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/classnames/2.2.5/index.min.js'></script>

    <script>
        'use strict';
        function _classCallCheck(instance, Constructor) {
            if (!(instance instanceof Constructor)) {
                throw new TypeError("Cannot call a class as a function");
            }
        }

        function _possibleConstructorReturn(self, call) {
            if (!self) {
                throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            }
            return call && (typeof call === "object" || typeof call === "function") ? call : self;
        }

        function _inherits(subClass, superClass) {
            if (typeof superClass !== "function" && superClass !== null) {
                throw new TypeError("Super expression must either be null or a function, not " + typeof superClass);
            }
            subClass.prototype = Object.create(superClass && superClass.prototype, {constructor: {value: subClass, enumerable: false, writable: true, configurable: true}});
            if (superClass)
                Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass;
        }

        var _React = React;
        var Component = _React.Component;
        var _ReactDOM = ReactDOM;
        var render = _ReactDOM.render;
        var findDOMNode = _ReactDOM.findDOMNode;
        var MultiSelect = function (_Component) {
            _inherits(MultiSelect, _Component);
            function MultiSelect(props) {
                _classCallCheck(this, MultiSelect);
                var _this = _possibleConstructorReturn(this, _Component.call(this, props));
                _this.state = {
                    selected: [],
                    open: false
                };
                return _this;
            }

            MultiSelect.prototype.handleChange = function handleChange(e) {
                var select = findDOMNode(this.refs.selectWrapper);
                var selected = select.querySelectorAll('input:checked');
                var realSelect = select.parentNode.parentNode.querySelectorAll('[selected]');
                var values = Array.prototype.map.call(selected, function (el) {
                    return {
                        name: el.value,
                        id: el.id
                    };
                });
                realSelect[0].value = values.map(function (value) {
                    return value.id;
                }).join(',');
                this.setState({
                    selected: values,
                    open: false
                });
            };
            MultiSelect.prototype.buildGroup = function buildGroup(group) {
                var _this2 = this;
                return group.options.map(function (item) {
                    return React.createElement(
                            'li',
                            null,
                            React.createElement('input', {
                                onChange: _this2.handleChange.bind(_this2),
                                type: 'checkbox',
                                id: item.id,
                                value: item.name}),
                            React.createElement(
                                    'label',
                                    {
                                        htmlFor: item.id,
                                        className: 'item-label'},
                                    item.name
                                    )
                            );
                });
            };
            MultiSelect.prototype.toggleMenu = function toggleMenu() {
                this.setState({
                    open: !this.state.open
                });
            };
            MultiSelect.prototype.render = function render() {
                var _this3 = this;
                var options = this.props.options;
                var _state = this.state;
                var selected = _state.selected;
                var open = _state.open;
                return React.createElement(
                        'div',
                        {ref: 'selectWrapper', className: classNames('select-wrapper', {
                                open: open
                            })},
                        selected && React.createElement(
                                'div',
                                {className: 'select-value', onClick: this.toggleMenu.bind(this)},
                                selected.length < 1 && React.createElement(
                                        'span',
                                        {className: 'placeholder'},
                                        'Disciplinas para receber notificações'
                                        ),
                                selected.map(function (el) {
                                    return React.createElement(
                                            'span',
                                            {key: el.id},
                                            React.createElement(
                                                    'label',
                                                    {
                                                        htmlFor: el.id},
                                                    el.name
                                                    )
                                            );
                                })
                                ),
                        options && React.createElement(
                                'div',
                                {className: 'checkbox-wrapper', onClick: this.toggleMenu.bind(this)},
                                options.map(function (group) {
                                    return React.createElement(
                                            'ul',
                                            null,
                                            React.createElement(
                                                    'label',
                                                    null,
                                                    group.group
                                                    ),
                                            _this3.buildGroup(group)
                                            );
                                })
                                )
                        );
            };
            return MultiSelect;
        }(Component);
        ;
        var selectForms = document.querySelectorAll('[multiselect]');
        [].slice.call(selectForms).forEach(function (select) {
            var mount = document.createElement('div');
            mount.className = 'react-mount';
            select.appendChild(mount);
            var selectOptions = select.querySelectorAll('optgroup');
            var options = Array.prototype.map.call(selectOptions, function (o) {
                var items = o.querySelectorAll('option');
                var formattedItems = Array.prototype.map.call(items, function (item) {
                    return {
                        name: item.innerText,
                        id: item.value
                    };
                });
                return {
                    group: o.label,
                    options: formattedItems
                };
            });
            render(React.createElement(MultiSelect, {options: options}), mount);
        });
    </script>

</html>



