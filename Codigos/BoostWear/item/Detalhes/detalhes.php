<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>BoostWear - Item</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/shop-item.css" rel="stylesheet">

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
                            $_SESSION['tipo'] = "";
                        }
                        if (isset($_SESSION['usuario']) && $_SESSION['usuario'] != "") {
                            if ($_SESSION['tipo'] != '') {
                                echo "<li>";
                                echo "<a href='../../vendedor/edicaoProdutos/intermedio/intermedio.php'>" . $_SESSION['usuario'] . "</a>";
                                echo "</li>";
                            } else {
                                echo "<li>";
                                echo "<a href='../../cliente/edicaoCliente/edicaoCliente.php'>" . $_SESSION['usuario'] . "</a>";
                                echo "</li>";
                            }
                            echo "<li>";
                            echo "<a href='..\..\cliente\inicial\cliente.php?id=1'>Sair</a>";
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


        <!-- Page Content -->
        <div class="container">

            <div class="row">


                <?php
                $pdo = new PDO('mysql:host=localhost;dbname=boostwear', 'root', '') or die("Falha ao estabelecer ligação com a base de dados!\n");
                $stmt = $pdo->prepare("SELECT * FROM produto");
                $stmt->execute();
                $_SESSION['helper'] = $_REQUEST['help'];
                while ($linha = $stmt->fetch()) {
                    if ($linha[0] == $_REQUEST['help']) {
                        break;
                    }
                }
                $_SESSION['vendedor'] = $linha[7];
                $stmt2 = $pdo->prepare("SELECT img_local FROM img where Produto_id=$linha[0]");
                $stmt2->execute();
                $local = $stmt2->fetch();
                echo "<div class = 'col-md-9'>";

                echo "<div class = 'thumbnail'>";
                echo '<img class = "img-responsive" src = "..\..\vendedor\produtos\img\\' . $local[0] . '" alt = "">';
                echo '<div class = "caption-full">';
                echo '<h4 class = "pull-right">R$' . $linha[6] . '</h4>';
                echo '<h4><a href = "#">' . $linha[1] . '</a>';
                echo '</h4>';
                echo '<hr class = "intro-divider">';
                if (isset($_SESSION['usuario']) && $_SESSION['usuario'] != "") {
                    echo "<a href='..\Contato\contato.php' class='btn btn-primary'> <span class='network-name' >Contatar Vendedor</span></a></br></br>";
                } else {
                    echo "<a href='..\Login\login.php' class='btn btn-primary'> <span class='network-name' >Contatar Vendedor</span></a></br></br>";
                }
                echo '<p>' . $linha[2] . '</p>';
                ?>
            </div>
            <div class="ratings">
                <?php
                $stmt = $pdo->prepare("SELECT * FROM avaliacao where Produto_id=" . $_REQUEST['help'] . "");
                $stmt->execute();
                $cont = 0;
                $sum = 0;
                while ($linha = $stmt->fetch()) {
                    $cont++;
                    $sum = $sum + $linha[2];
                }
                if ($cont == 0 || $sum == 0) {
                    $aux = 0;
                } else {
                    $aux = ($sum / $cont);
                }
                $resultado = floor($aux);
                echo '<p class = "pull-right">' . $cont . ' Opiniões</p>';
                echo '<p>';

                function estrelas($resultado) {
                    switch ($resultado) {
                        case 0:
                            echo '<span class = "glyphicon glyphicon-star-empty"></span>';
                            echo '<span class = "glyphicon glyphicon-star-empty"></span>';
                            echo '<span class = "glyphicon glyphicon-star-empty"></span>';
                            echo '<span class = "glyphicon glyphicon-star-empty"></span>';
                            echo '<span class = "glyphicon glyphicon-star-empty"></span>';
                            break;
                        case 1:
                            echo '<span class = "glyphicon glyphicon-star"></span>';
                            echo '<span class = "glyphicon glyphicon-star-empty"></span>';
                            echo '<span class = "glyphicon glyphicon-star-empty"></span>';
                            echo '<span class = "glyphicon glyphicon-star-empty"></span>';
                            echo '<span class = "glyphicon glyphicon-star-empty"></span>';
                            break;
                        case 2:
                            echo '<span class = "glyphicon glyphicon-star"></span>';
                            echo '<span class = "glyphicon glyphicon-star"></span>';
                            echo '<span class = "glyphicon glyphicon-star-empty"></span>';
                            echo '<span class = "glyphicon glyphicon-star-empty"></span>';
                            echo '<span class = "glyphicon glyphicon-star-empty"></span>';
                            break;
                        case 3:
                            echo '<span class = "glyphicon glyphicon-star"></span>';
                            echo '<span class = "glyphicon glyphicon-star"></span>';
                            echo '<span class = "glyphicon glyphicon-star"></span>';
                            echo '<span class = "glyphicon glyphicon-star-empty"></span>';
                            echo '<span class = "glyphicon glyphicon-star-empty"></span>';
                            break;
                        case 4:
                            echo '<span class = "glyphicon glyphicon-star"></span>';
                            echo '<span class = "glyphicon glyphicon-star"></span>';
                            echo '<span class = "glyphicon glyphicon-star"></span>';
                            echo '<span class = "glyphicon glyphicon-star"></span>';
                            echo '<span class = "glyphicon glyphicon-star-empty"></span>';
                            break;
                        case 5:
                            echo '<span class = "glyphicon glyphicon-star"></span>';
                            echo '<span class = "glyphicon glyphicon-star"></span>';
                            echo '<span class = "glyphicon glyphicon-star"></span>';
                            echo '<span class = "glyphicon glyphicon-star"></span>';
                            echo '<span class = "glyphicon glyphicon-star"></span>';
                            break;
                    }
                }

                estrelas($resultado);
                echo '' . $resultado . ' estrelas';
                echo '</p>';
                ?>
            </div>
        </div>

        <div class="well">
            <?php
            if (isset($_SESSION['usuario']) && $_SESSION['usuario'] != "") {
                echo '<div class = "text-right">';
                echo '<a href = "../../cliente/avaliacao/avaliacao.php" class = "btn btn-success">Deixe uma Opinião</a>';
                echo '</div>';
            } else {
                echo '<div class = "text-right">';
                echo '<a href = "..\Login\login.php?auxiliar=1" class = "btn btn-success">Deixe uma Opinião</a>';
                echo '</div>';
            }
            ?>

            <hr>
            <?php
            $stmt = $pdo->prepare("SELECT * FROM avaliacao where Produto_id=" . $_REQUEST['help'] . "");
            $stmt->execute();
            $cont = 0;
            while ($linha = $stmt->fetch()) {
                $cont++;
                if ($cont == 4) {
                    break;
                }
                echo '<div class="row">';
                echo '<div class="col-md-12">';
                estrelas($linha[2]);
                $aux = $pdo->prepare("SELECT * FROM cliente where idCliente=" . $linha[5] . "");
                $aux->execute();
                $auxiliar = $aux->fetch();
                echo '' . $auxiliar[1] . '';
                echo '<p>' . $linha[1] . '</p>';
                echo '</div>';
                echo '</div>';

                echo '<hr>';
            }
            ?>
        </div>

    </div>

</div>

</div>
<!-- /.container -->

<div class="container">

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Equipe BoostWear 2016. Todos os direitos Reservados</p>
            </div>
        </div>
    </footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
