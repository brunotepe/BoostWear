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
        <?php
        require_once("class/class.phpmailer.php");
        session_start();
        $pdo = new PDO('mysql:host=localhost;dbname=boostwear', 'root', '') or die("Falha ao estabelecer ligação com a base de dados!\n");
        $stmt = $pdo->prepare("SELECT * FROM produto");
        $stmt->execute();
        while ($linha = $stmt->fetch()) {
            if ($linha[0] == $_SESSION['helper']) {
                break;
            }
        }
        $stmt2 = $pdo->prepare("SELECT * FROM vendedor");
        $stmt2->execute();
        while ($aux = $stmt2->fetch()) {
            if ($aux[0] == $linha[7]) {
                break;
            }
        }
        $stmt3 = $pdo->prepare("SELECT * FROM cliente");
        $stmt3->execute();
        while ($aux2 = $stmt3->fetch()) {
            if ($aux2[0] == $_SESSION['codigo']) {
                break;
            }
        }
        if (isset($_REQUEST['go']) && $_REQUEST['go'] != "") {
            try {
                $mail = new PHPMailer(true);
                $mail->IsSMTP();

                $mail->Host = 'smtp-mail.outlook.com';
                $mail->SMTPAuth = true;
                $mail->Port = 587;
                $mail->Username = 'boostwear@hotmail.com';
                $mail->Password = '32154866@';

                $mail->SetFrom('boostwear@hotmail.com', 'BoostWear');
                $mail->AddReplyTo('boostwear@hotmail.com', 'BoostWear');
                $mail->Subject = 'Interesse em Roupas';

                $mail->AddAddress('brunotepe@hotmail.com', 'Bruno');

                $corpoEmail = "Olá estou interessado neste produto " . $linha[1] . ", seu codigo eh " . $linha[0] .
                        ".\n\n\n" . $_REQUEST['texto'] . "\n\n\nEntre em Contato Comigo:\n"
                        . "Email: " . $aux2[4] . "\nNome: " . $aux2[1] . "\nTelefone: " . $aux2[2] . "";

                $mail->MsgHTML($corpoEmail);

                $mail->Send();

                echo "Mensagem enviada com sucesso</p>\n";
            } catch (phpmailerException $e) {
                echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
            }
        }

        echo '<form action = "contato.php?go=1" method = "POST">';
        ?>
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
                        if (isset($_GET['id']) && $_GET['id'] == '1') {
                            $_SESSION['usuario'] = "";
                        }
                        if (isset($_SESSION['usuario']) && $_SESSION['usuario'] != "") {
                            if (isset($_SESSION['tipo']) && $_SESSION['tipo'] != '') {
                                echo "<li>";
                                echo "<a href='../../vendedor/edicaoProdutos/intermedio/intermedio.php'>" . $_SESSION['usuario'] . "</a>";
                                echo "</li>";
                            } else {
                                echo "<li>";
                                echo "<a href='../../cliente/edicaoCliente/edicaoCliente.php'>" . $_SESSION['usuario'] . "</a>";
                                echo "</li>";
                            }
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
        </nav><br><br
            <div>
                <?php
                echo '<div style = "padding-left:10%;">';
                echo '<label>Nome</label>';
                echo '<p>' . $aux[1] . '</p><br><br>';
                echo '<label>Telefone</label>';
                echo '<p>' . $aux[2] . '</p><br><br>';
                echo '<label>Endereço</label>';
                echo '<p>' . $aux[6] . '</p><br><br>';
                echo '<label>Email</label>';
                echo '<p>' . $aux[4] . '</p><br><br>';

                echo '<div class = "form-group" style = "width:50%;">';
                echo '<label for = "comment">Texto do Email:</label>';
                echo '<textarea name ="texto" class = "form-control" rows = "5" id = "texto"></textarea>';
                echo '</div>';
                echo '<a><input type = "submit" value = "Enviar" class = "btn btn-primary"></a>';
                echo "  ";
                echo '<a href = "..\..\cliente\inicial\cliente.php"><input type = "button" value = "Voltar" class = "btn btn-primary"></a>';
                echo '</div>';
                ?>
        </div>
    </form>
    <!-- /.container -->
    <br><br>
    <br><br>
    <br><br>
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
