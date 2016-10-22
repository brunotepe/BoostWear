<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>BoostWear - Cliente</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/3-col-portfolio.css" rel="stylesheet">

        <link href="css/arquivo.css" style="text/css" rel="stylesheet">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
        <script src='js/bootstrap.min.js'></script>
        <script>
            $(function () {
                $('.dropdown-toggle').dropdown();
            });
        </script>

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
                    <a class="navbar-brand" href="..\..\..\index.php">BoostWear</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="..\..\..\index.php#about">Sobre</a>
                        </li>
                        <li>
                            <a href="..\..\..\index.php#services">Serviços</a>
                        </li>
                        <li>
                            <a href="..\..\..\index.php#contact">Contato</a>
                        </li>
                        <?php
                        session_start();
                        if (isset($_GET['id']) && $_GET['id'] == '1') {
                            $_SESSION['usuario'] = "";
                            $_SESSION['tipo'] = null;
                        }
                        if (isset($_SESSION['usuario']) && $_SESSION['usuario'] != "") {
                            if (isset($_SESSION['tipo'])) {
                                echo "<li>";
                                echo "<a href='../../vendedor/edicaoProdutos/intermedio/intermedio.php'>" . $_SESSION['usuario'] . "</a>";
                                echo "</li>";
                            } else {
                                echo "<li>";
                                echo "<a href='../edicaoCliente/edicaoCliente.php'>" . $_SESSION['usuario'] . "</a>";
                                echo "</li>";
                            }
                            echo "<li>";
                            echo "<a href='?id=1'>Sair</a>";
                            echo "</li>";
                        } else {
                            echo "<li>";
                            echo "<a href='..\..\loginCliente\loginCliente.php'>Login</a>";
                            echo "</li>";
                        }
                        ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-1" style="position:absolute;top:71px;left:10px;">
                    <form  action="cliente.php" method="POST">
                        <h3>Filtros</h3>
                        <hr>
                        <table width="800">
                            <tr>
                                <td>
                                    <div class="dropdown" >
                                        <a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-primary" data-target="#" href="index.php">
                                            Masculino <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="cliente.php?tipo=1">Camisa</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="cliente.php?tipo=6">Gola Polo</a></li>
                                                    <li><a href="cliente.php?tipo=7">Manga Longa</a></li>
                                                    <li><a href="cliente.php?tipo=8">Manga Curta</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="cliente.php?tipo=2">Calça</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="cliente.php?tipo=9">Jeans</a></li>
                                                    <li><a href="cliente.php?tipo=10">Moletom</a></li>
                                                    <li><a href="cliente.php?tipo=11">Social</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="cliente.php?tipo=4">Camiseta</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="cliente.php?tipo=12">Manga Curta</a></li>
                                                    <li><a href="cliente.php?tipo=13">Manga Longa</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="cliente.php?tipo=14">Blusa</a></li>
                                            <li><a href="cliente.php?tipo=15">Bermuda</a></li>
                                            <li><a href="cliente.php?tipo=16">Colete</a></li>
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="cliente.php?tipo=5">Casaco</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="cliente.php?tipo=18">Jaqueta</a></li>
                                                    <li><a href="cliente.php?tipo=21">Blazer</a></li>
                                                    <li><a href="cliente.php?tipo=19">Moletom</a></li>
                                                    <li><a href="cliente.php?tipo=20">Sueter</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <br>
                                    <div class="dropdown" class="col-md-6">
                                        <a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-primary" data-target="#" href="index.php">
                                            Feminino <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                            <li><a href="cliente.php?tipo=21">Blazer</a></li>
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="cliente.php?tipo=14">Blusa</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="cliente.php?tipo=27">Bata</a></li>
                                                    <li><a href="cliente.php?tipo=28">Baby Look</a></li>
                                                    <li><a href="cliente.php?tipo=29">Com alça</a></li>
                                                    <li><a href="cliente.php?tipo=30">Top</a></li>
                                                    <li><a href="cliente.php?tipo=31">Tunica</a></li>
                                                    <li><a href="cliente.php?tipo=32">Tomara que caia</a></li>
                                                    <li><a href="cliente.php?tipo=33">Regata</a></li>
                                                    <li><a href="cliente.php?tipo=7">Manga longa</a></li>
                                                    <li><a href="cliente.php?tipo=8">Manga Curta</a></li>
                                                    <li><a href="cliente.php?tipo=34">Sem ombro</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="cliente.php?tipo=22">Bolero</a></li>
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="cliente.php?tipo=2">Calça</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="cliente.php?tipo=9">Jeans</a></li>
                                                    <li><a href="cliente.php?tipo=35">Legging</a></li>
                                                    <li><a href="cliente.php?tipo=49">Skinny</a></li>
                                                    <li><a href="cliente.php?tipo=11">Social</a></li>
                                                    <li><a href="cliente.php?tipo=36">Corsario</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="cliente.php?tipo=23">Saia</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="cliente.php?tipo=37">Mini saia</a></li>
                                                    <li><a href="cliente.php?tipo=38">Longa</a></li>
                                                    <li><a href="cliente.php?tipo=39">Media</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="cliente.php?tipo=24">Short</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="cliente.php?tipo=40">Jeans</a></li>
                                                    <li><a href="cliente.php?tipo=41">Social</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="cliente.php?tipo=1">Camisa</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="cliente.php?tipo=40">Manga longa</a></li>
                                                    <li><a href="cliente.php?tipo=41">Manga Curta</a></li>
                                                    <li><a href="cliente.php?tipo=42">Gola Polo</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="cliente.php?tipo=25">Vestido</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="cliente.php?tipo=42">Curto</a></li>
                                                    <li><a href="cliente.php?tipo=43">Longo</a></li>
                                                    <li><a href="cliente.php?tipo=44">Manga Longa</a></li>
                                                    <li><a href="cliente.php?tipo=45">Medio</a></li>
                                                    <li><a href="cliente.php?tipo=46">Festa</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="cliente.php?tipo=26">Macacão</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="cliente.php?tipo=47">Macaquinho</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Colete</a></li>
                                            <li class="dropdown-submenu">
                                                <a tabindex="-1" href="cliente.php?tipo=5">Casaco</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="cliente.php?tipo=18">Jaqueta</a></li>
                                                    <li><a href="cliente.php?tipo=48">Cardigan</a></li>
                                                    <li><a href="cliente.php?tipo=19">Moletom</a></li>
                                                    <li><a href="cliente.php?tipo=20">Sueter</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <br>
                                    <label class="label label-default">Tamanho:</label> <br><br>
                                    <select name="tamanho" class="form-control" style="width:150px" >
                                        <option value="34"> 34 </option>
                                        <option value="36"> 36 </option>
                                        <option value="38"> 38 </option>
                                        <option value="40"> 40 </option>
                                        <option value="42"> 42 </option>
                                        <option value="44"> 44 </option>
                                        <option value="46"> 46 </option>
                                        <option value="48"> 48 </option>
                                        <option value="50"> 50 </option></br></br>
                                        <option value="PP"> PP </option>
                                        <option value="P"> P </option>
                                        <option value="M"> M </option>
                                        <option value="G"> G </option>
                                        <option value="GG"> GG </option>
                                        <option value="XGG"> XGG </option>
                                        <option value="XXG"> XXG </option>
                                        <option value="" selected> Selecione</option>
                                    </select>
                                </td>
                            </tr>   
                            <tr>
                                <td>
                                    <br>
                                    <label class="label label-default">Ordenar:</label> <br><br>
                                    <select name="F1" class="form-control" style="width:150px" >
                                        <option value1="1"> A-Z</option><br>
                                        <option value2="2"> Z-A</option><br>
                                        <option value3="3"> Maior Preço</option><br>
                                        <option value4="4"> Menor Preço</option><br>
                                        <option value5="" selected> Selecione</option><br>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="170px">
                                    <br>
                                    <label class="label label-default">Preço:</label> <br><br>
                                    <select name="F2" class="form-control" style="width:150px" >
                                        <option value1="1"> R$0,00 a R$50,00</option><br>
                                        <option value2="2"> R$51,00 a R$100,00</option><br>
                                        <option value2="3"> R$101,00 a R$150,00</option><br>
                                        <option value3="4"> R$151,00 a R$200,00</option><br>
                                        <option value4="5"> R$200,00 a ..</option><br>
                                        <option value5="" selected> Selecione</option><br>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <br>
                                    <label class="label label-default">Cores:</label><br><br>
                                    <table width="170px" height="150px">
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="cor[]" value="Preto"><div style="border-style:solid;border-color:#000000;background-color:#000000;border-width:1px;border-radius:50%;width:20px;height:20px;"></div>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="cor[]" value="Branco"><div style="border-style:solid;border-color:#000000;background-color:#FFFFFF;border-width:1px;border-radius:50%;width:20px;height:20px;"></div>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="cor[]" value="Azul"><div style="border-style:solid;border-color:#0000FF;background-color:#0000FF;border-width:1px;border-radius:50%;width:20px;height:20px;"></div>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="cor[]" value="Rosa"><div style="border-style:solid;border-color:#FFC0CB;background-color:#FFC0CB;border-width:1px;border-radius:50%;width:20px;height:20px;"></div>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="cor[]" value="Vermelho"><div style="border-style:solid;border-color:#FF0000;background-color:#FF0000;border-width:1px;border-radius:50%;width:20px;height:20px;"></div>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="cor[]" value="Amarelo"><div style="border-style:solid;border-color:#FFFF00;background-color:#FFFF00;border-width:1px;border-radius:50%;width:20px;height:20px;"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="cor[]" value="Cinza"><div style="border-style:solid;border-color:#808080;background-color:#808080;border-width:1px;border-radius:50%;width:20px;height:20px;"></div>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="cor[]" value="Verde"><div style="border-style:solid;border-color:#008000;background-color:#008000;border-width:1px;border-radius:50%;width:20px;height:20px;"></div>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="cor[]" value="Marrom"><div style="border-style:solid;border-color:#8B4513;background-color:#8B4513;border-width:1px;border-radius:50%;width:20px;height:20px;"></div>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <br><label class="label label-default">Estação:</label><br><br>
                                    <table width="170px" height="100px">
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="estacao[]" value="primavera"> <h6 class="label label-warning"><font size="0.5">Primavera</font></h6><br>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="estacao[]" value="verao"> <h6 class="label label-warning"><font size="1">Verão</font></h6><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="estacao[]" value="inverno"> <h6 class="label label-warning"><font size="0.5">Inverno</font></h6><br>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="estacao[]" value="outono"> <h6 class="label label-warning"><font size="1">Outono</font></h6><br>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <br><label class="label label-default">Materiais:</label><br><br>
                                    <table width="170px" height="200px">
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="materiais[]" value="acetato"> <h6 class="label label-pill label-success"><font size="1">Acetato</font></h6><br>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="materiais[]" value="linho"> <h6 class="label label-pill label-success"><font size="1">Linho</font></h6><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="materiais[]" value="acrilico"> <h6 class="label label-pill label-success"><font size="1">Acrilico</font></h6><br>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="materiais[]" value="couro"> <h6 class="label label-pill label-success"><font size="1">Couro</font></h6><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="materiais[]" value="algodao"> <h6 class="label label-pill label-success"><font size="1">Algodão</font></h6><br>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="materiais[]" value="pele"> <h6 class="label label-pill label-success"><font size="1">Pele</font></h6><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="materiais[]" value="Sintetico"> <h6 class="label label-pill label-success"><font size="1">Sintetico</font></h6><br>
                                            </td>
                                            <td>
                                                <input type="checkbox" name="materiais[]" value="la"> <h6 class="label label-pill label-success"><font size="1">Lã</font></h6><br>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input style="position:absolute; top:95%;left:60px;" type="submit" value="Filtrar" class="btn btn-inverse">
                                </td>
                            </tr>
                        </table>
                    </form>
                    <br>
                    <br>
                    <br>
                </div> 
                <div class="col-md-11" style="position:absolute;top:50px;left:150px;">
                    <!-- Page Content -->
                    <div class="container">

                        <!-- Page Header -->
                        <form  action="cliente.php" method="POST">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 class="page-header">Compras
                                        <small>Roupas Mescladas</small>
                                        </br></br>
                                        <div class="control-group">
                                            <div class="controls">
                                                <input id="email" name="pesquisa" type="text" placeholder="Pesquisa" class="form-control" required style="width:449px">
                                            </div>
                                        </div>
                                        <a href="#"><input style="position:absolute; top:118px;left:465px; "type="submit" value="Pesquisar" class="btn btn-inverse"></a>
                                        </br>
                                    </h1>
                                </div>
                            </div>
                        </form>
                        <!-- /.row -->
                        <!-- Projects Row -->
                        <?php
                        $pdo = new PDO('mysql:host=localhost;dbname=boostwear', 'root', '') or die("Falha ao estabelecer ligação com a base de dados!\n");
                        $aux = 0;
                        $qt = 0;
                        $cont = 0;
                        $auxiliar = null;
                        if ((!isset($_REQUEST['F1']) && !isset($_REQUEST['F2']) && !isset($_REQUEST['estacao']) && !isset($_REQUEST['materias']) &&
                                !isset($_REQUEST['cor']) && !isset($_REQUEST['tamanho']) && !isset($_GET['tipo']) && !isset($_REQUEST['pesquisa']))) {
                            $stmt = $pdo->prepare("SELECT * FROM view_produto");
                            $stmt->execute();
                            echo "<div class = 'row'>";
                            while ($linha = $stmt->fetch()) {
                                if (!isset($_REQUEST['num'])) {
                                    if ($qt == 3) {
                                        echo "</div>";
                                        break;
                                    }
                                    $cont++;
                                    echo "<div class = 'col-md-4 portfolio-item'>";
                                    echo "<a href = '..\..\item\detalhes\detalhes.php?help=" . $linha[0] . "'>";
                                    echo '<img width=297 heigh=170 class = "img-responsive" src = "..\..\vendedor\produtos\img\\' . $linha[5] . '" alt = "">';
                                    echo "</a>";
                                    echo "<h3>";
                                    echo "<a href = '..\..\item\detalhes\detalhes.php?help=" . $linha[0] . "'>" . $linha[1] . "</a>";
                                    echo "</h3>";
                                    echo "<p>" . $linha[2] . "</p>";
                                    echo "</div>";

                                    if ($cont == 3) {
                                        echo "</div>";
                                        echo "<div class = 'row'>";
                                        $cont = 0;
                                        $qt++;
                                    }
                                }
                            }
                            echo "</div>";
                        } else {
                            $nome = null;
                            $preco = null;
                            $conferir[] = null;
                            if (isset($_REQUEST['cor'])) {
                                $stmt = $pdo->prepare("SELECT * FROM view_cor");
                                $stmt->execute();
                                foreach ($_REQUEST['cor'] as $novo) {
                                    while ($linha = $stmt->fetch()) {
                                        if ($novo == $linha[3]) {
                                            if (!in_array($linha[0], $conferir)) {
                                                $conferir[] = $linha[0];
                                                $nome[$linha[0]] = $linha[1];
                                                $preco[$linha[0]] = $linha[4];
                                            }
                                        }
                                    }
                                }
                            }
                            if (isset($_REQUEST['estacao'])) {
                                $stmt = $pdo->prepare("SELECT * FROM view_estacao");
                                $stmt->execute();
                                foreach ($_REQUEST['estacao'] as $novo) {
                                    while ($linha = $stmt->fetch()) {
                                        if ($novo == $linha[3]) {
                                            if (!in_array($linha[0], $conferir)) {
                                                $conferir[] = $linha[0];
                                                $nome[$linha[0]] = $linha[1];
                                                $preco[$linha[0]] = $linha[4];
                                            }
                                        }
                                    }
                                }
                            }
                            if (isset($_REQUEST['materiais'])) {
                                $stmt = $pdo->prepare("SELECT * FROM view_material");
                                $stmt->execute();
                                foreach ($_REQUEST['materiais'] as $novo) {
                                    while ($linha = $stmt->fetch()) {
                                        if ($novo == $linha[3]) {
                                            if (!in_array($linha[0], $conferir)) {
                                                $conferir[] = $linha[0];
                                                $nome[$linha[0]] = $linha[1];
                                                $preco[$linha[0]] = $linha[4];
                                            }
                                        }
                                    }
                                }
                            }
                            if (isset($_GET['tipo'])) {
                                $stmt = $pdo->prepare("SELECT * FROM view_tipo where tipo_roupa=" . $_GET['tipo'] . "");
                                $stmt->execute();
                                $helper = null;
                                $ordenado = null;
                                while ($linha = $stmt->fetch()) {
                                    $new[] = $linha[0];
                                    $n[$linha[0]] = $linha[1];
                                    $p[$linha[0]] = $linha[2];
                                    if (in_array($linha[0], $conferir)) {
                                        $helper[] = $linha[0];
                                        $nome_temp[$linha[0]] = $linha[1];
                                        $preco_temp[$linha[0]] = $linha[2];
                                    }
                                }
                                if (count($conferir) != 1) {
                                    $new = $helper;
                                    $n = $nome_temp;
                                    $p = $preco_temp;
                                }
                                if (!isset($new)) {
                                    $new = "vazio";
                                }
                            } else {
                                $new = $conferir;
                            }
                            if (isset($_REQUEST['tamanho']) && $_REQUEST['tamanho'] != "") {
                                $var = 0;
                                if (count($new) == 1 && $new != "vazio") {
                                    $stmt = $pdo->prepare("SELECT * FROM produto");
                                    $stmt->execute();
                                    while ($linha = $stmt->fetch()) {
                                        $new[] = $linha[0];
                                    }
                                }
                                $stmt = $pdo->prepare("SELECT * FROM produto where tamanho=" . $_REQUEST['tamanho'] . "");
                                $stmt->execute();
                                while ($linha = $stmt->fetch()) {
                                    $var++;
                                    if (in_array($linha[0], $new)) {
                                        $auxiliar[] = $linha[0];
                                        $final_n[$linha[0]] = $linha[1];
                                        $final_p[$linha[0]] = $linha[6];
                                    }
                                }
                            } else {
                                $auxiliar = $new;
                            }
                            if (isset($_REQUEST['F2']) && $_REQUEST['F2'] != "Selecione") {
                                if (count($new) == 1) {
                                    $stmt = $pdo->prepare("SELECT * FROM produto");
                                    $stmt->execute();
                                    while ($linha = $stmt->fetch()) {
                                        $new[] = $linha[0];
                                    }
                                }
                                if ($_REQUEST['F2'] == "R$0,00 a R$50,00") {
                                    $stmt = $pdo->prepare("SELECT * FROM produto where preco>0 and preco<=50");
                                    $stmt->execute();
                                    while ($linha = $stmt->fetch()) {
                                        if (in_array($linha[0], $new)) {
                                            $auxiliar[] = $linha[0];
                                            $final_n[$linha[0]] = $linha[1];
                                            $final_p[$linha[0]] = $linha[6];
                                        }
                                    }
                                } elseif ($_REQUEST['F2'] == "R$51,00 a R$100,00") {
                                    $stmt = $pdo->prepare("SELECT * FROM produto where preco>50 and preco<=100");
                                    $stmt->execute();
                                    while ($linha = $stmt->fetch()) {
                                        if (in_array($linha[0], $new)) {
                                            $auxiliar[] = $linha[0];
                                            $final_n[$linha[0]] = $linha[1];
                                            $final_p[$linha[0]] = $linha[6];
                                        }
                                    }
                                } elseif ($_REQUEST['F2'] == "R$101,00 a R$150,00") {
                                    $stmt = $pdo->prepare("SELECT * FROM produto where preco>100 and preco<=150");
                                    $stmt->execute();
                                    while ($linha = $stmt->fetch()) {
                                        if (in_array($linha[0], $new)) {
                                            $auxiliar[] = $linha[0];
                                            $final_n[$linha[0]] = $linha[1];
                                            $final_p[$linha[0]] = $linha[6];
                                        }
                                    }
                                } elseif ($_REQUEST['F2'] == "R$151,00 a R$200,00") {
                                    $stmt = $pdo->prepare("SELECT * FROM produto where preco>150 and preco<=200");
                                    $stmt->execute();
                                    while ($linha = $stmt->fetch()) {
                                        if (in_array($linha[0], $new)) {
                                            $auxiliar[] = $linha[0];
                                            $final_n[$linha[0]] = $linha[1];
                                            $final_p[$linha[0]] = $linha[6];
                                        }
                                    }
                                } elseif ($_REQUEST['F2'] == "R$200,00 a ..") {
                                    $stmt = $pdo->prepare("SELECT * FROM produto where preco>200");
                                    $stmt->execute();
                                    while ($linha = $stmt->fetch()) {
                                        if (in_array($linha[0], $new)) {
                                            $auxiliar[] = $linha[0];
                                            $final_n[$linha[0]] = $linha[1];
                                            $final_p[$linha[0]] = $linha[6];
                                        }
                                    }
                                }
                            }
                            if (isset($auxiliar) && $auxiliar != "vazio") {
                                $auxiliar = array_unique($auxiliar);
                            }
                            if (isset($_REQUEST['F1']) && $_REQUEST['F1'] != "Selecione") {
                                if (count($new) == 1 && $new != "vazio") {
                                    $stmt = $pdo->prepare("SELECT * FROM produto");
                                    $stmt->execute();
                                    while ($linha = $stmt->fetch()) {
                                        $new[] = $linha[0];
                                        $final_n[$linha[0]] = $linha[1];
                                        $final_p[$linha[0]] = $linha[6];
                                    }
                                }
                                if ($_REQUEST['F1'] == "A-Z") {
                                    asort($final_n);
                                    foreach ($final_n as $key => $value) {
                                        $ordenado[] = $key;
                                    }
                                }
                                if ($_REQUEST['F1'] == "Z-A") {
                                    arsort($final_n);
                                    foreach ($final_n as $key => $value) {
                                        $ordenado[] = $key;
                                    }
                                }
                                if ($_REQUEST['F1'] == "Maior Preço") {
                                    arsort($final_p);
                                    foreach ($final_p as $key => $value) {
                                        $ordenado[] = $key;
                                    }
                                }
                                if ($_REQUEST['F1'] == "Menor Preço") {
                                    asort($final_p);
                                    foreach ($final_p as $key => $value) {
                                        $ordenado[] = $key;
                                    }
                                }
                            }
                            if ((isset($ordenado) && count($ordenado) == 0) || !isset($ordenado)) {
                                $ordenado = $auxiliar;
                            }
                            if (!isset($_REQUEST['pesquisa'])) {
                                echo "<div class = 'row'>";
                                for ($i = 0; $i < count($ordenado); $i++) {
                                    $stmt = $pdo->prepare("SELECT * FROM view_produto");
                                    $stmt->execute();
                                    if ($ordenado[0] == "" && count($ordenado) == 1) {
                                        $stmt2 = $pdo->prepare("SELECT * FROM produto");
                                        $stmt2->execute();
                                        while ($linha = $stmt2->fetch()) {
                                            $ordenado[] = $linha[0];
                                            $final_n[$linha[0]] = $linha[1];
                                            $final_p[$linha[0]] = $linha[6];
                                        }
                                    }
                                    while ($linha = $stmt->fetch()) {
                                        if ($linha[0] == $ordenado[$i]) {
                                            if ($qt == 3) {
                                                echo "</div>";
                                                break;
                                            }
                                            $cont++;
                                            echo "<div class = 'col-md-4 portfolio-item'>";
                                            echo "<a href = '..\..\item\detalhes\detalhes.php?help=" . $linha[0] . "'>";
                                            echo '<img width=297 heigh=170 class = "img-responsive" src = "..\..\vendedor\produtos\img\\' . $linha[5] . '" alt = "">';
                                            echo "</a>";
                                            echo "<h3>";
                                            echo "<a href = '..\..\item\detalhes\detalhes.php?help=" . $linha[0] . "'>" . $linha[1] . "</a>";
                                            echo "</h3>";
                                            echo "<p>" . $linha[2] . "</p>";
                                            echo "</div>";

                                            if ($cont == 3) {
                                                echo "</div>";
                                                echo "<div class = 'row'>";
                                                $cont = 0;
                                                $qt++;
                                            }
                                            break;
                                        }
                                    }
                                }
                            }
                            if (isset($_REQUEST['pesquisa']) && $_REQUEST['pesquisa'] != "") {
                                $stmt = $pdo->prepare("SELECT * FROM view_produto where nome_produto like '%" . $_REQUEST['pesquisa'] . "%'");
                                $stmt->execute();
                                echo "<div class = 'row'>";
                                while ($linha = $stmt->fetch()) {
                                    if ($qt == 3) {
                                        echo "</div>";
                                        break;
                                    }
                                    $cont++;
                                    echo "<div class = 'col-md-4 portfolio-item'>";
                                    echo "<a href = '..\..\item\detalhes\detalhes.php?help=" . $linha[0] . "'>";
                                    echo '<img width=297 heigh=170 class = "img-responsive" src = "..\..\vendedor\produtos\img\\' . $linha[5] . '" alt = "">';
                                    echo "</a>";
                                    echo "<h3>";
                                    echo "<a href = '..\..\item\detalhes\detalhes.php?help=" . $linha[0] . "'>" . $linha[1] . "</a>";
                                    echo "</h3>";
                                    echo "<p>" . $linha[2] . "</p>";
                                    echo "</div>";

                                    if ($cont == 3) {
                                        echo "</div>";
                                        echo "<div class = 'row'>";
                                        $cont = 0;
                                        $qt++;
                                    }
                                }
                            }
                        }
                        ?>
                        <!-- /.row -->
                        <br>


                        <!-- Pagination -->
                        <div class="row text-center">
                            <div class="col-lg-12">
                                <ul class="pagination">
                                    <li>
                                        <a href="#">&laquo;</a>
                                    </li>
                                    <?php
                                    if (!isset($_REQUEST['num'])) {
                                        echo "<li class='active'>";
                                    } else {
                                        echo "<li>";
                                    }
                                    ?>
                                    <a href="cliente.php">1</a>
                                    </li>
                                    <?php
                                    if (isset($_REQUEST['num']) && $_REQUEST['num'] == 2) {
                                        echo "<li class='active'>";
                                    } else {
                                        echo "<li>";
                                    }
                                    ?>
                                    <a href="cliente.php?num=2">2</a>
                                    </li>
                                    <?php
                                    if (isset($_REQUEST['num']) && $_REQUEST['num'] == 3) {
                                        echo "<li class='active'>";
                                    } else {
                                        echo "<li>";
                                    }
                                    ?>
                                    <a href="cliente.php?num=3">3</a>
                                    </li>
                                    <?php
                                    if (isset($_REQUEST['num']) && $_REQUEST['num'] == 4) {
                                        echo "<li class='active'>";
                                    } else {
                                        echo "<li>";
                                    }
                                    ?>
                                    <a href="cliente.php?num=4">4</a>
                                    </li>
                                    <?php
                                    if (isset($_REQUEST['num']) && $_REQUEST['num'] == 5) {
                                        echo "<li class='active'>";
                                    } else {
                                        echo "<li>";
                                    }
                                    ?>
                                    <a href="cliente.php?num=5">5</a>
                                    </li>
                                    <li>
                                        <a href="#">&raquo;</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.row -->
                        <hr>

                        <!-- Footer -->
                        <footer>
                            <div class="row">
                                <div class="col-lg-12" style="position:absolute; top:100%;">
                                    <center><p>Copyright &copy; Equipe BoostWear 2016. Todos os direitos Reservados</p></center>
                                </div>
                            </div>
                            <!-- /.row -->
                        </footer>

                    </div>
                </div>
            </div>
        </div>

        <!-- /.container -->

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

    </body>


    <script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
    <script src='js/bootstrap.min.js'></script>
    <script>
            $(function () {
                $('.dropdown-toggle').dropdown();
            });
    </script>
</html>