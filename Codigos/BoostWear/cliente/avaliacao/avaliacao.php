<!DOCTYPE html>
<html>
    <head>
        <title>BoostWear-Cadastro</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        session_start();
        $pdo = new PDO('mysql:host=localhost;dbname=boostwear', 'root', '') or die("Falha ao estabelecer ligação com a base de dados!\n");
        $stmt = $pdo->prepare("SELECT * FROM avaliacao");
        $stmt->execute();
        if (isset($_GET['go']) && $_GET['go'] != "") {
            while ($linha = $stmt->fetch()) {
                $numero = $linha[0];
            }
            $numero++;
            $sql = "INSERT INTO avaliacao (idAvaliacao,avaliacao_p,avaliacao_v,Produto_id,Vendedor_id,Cliente_id)"
                    . " value (" . $numero . ",'" . $_REQUEST['aval'] . "'," . $_REQUEST['avaliacao'] . "," . $_SESSION['helper'] . "," . $_SESSION['vendedor'] .
                    "," . $_SESSION['codigo'] . ")";
            if ($pdo->query($sql)) {
                header("Location:../inicial/cliente.php");
            } else {
                echo "<br><br><br>";
                print_r($pdo->errorInfo());
                #header("Location:avaliacao.php");
            }
        }
        ?>
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
                            echo "<li>";
                            echo "<a href='#'>" . $_SESSION['usuario'] . "</a>";
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
    </div>

    <form action="avaliacao.php?go=1" method="POST" class="form-horizontal">
        <div class="container" style="position:absolute;left:32%;top:20%;border-style:outset;border-width:thin;border-radius:10px;border-radius:10px;background-color:#DCDCDC;width:500px;height:370px;">
            <fieldset>
                <!-- Text input-->

                <div class="control-group">
                    <label class="control-label">Avaliação Usuario:</label>
                    <div class="controls">
                        <input id="nome" name="avaliacao" type="number" min="0" max="5" placeholder="0 a 5 estrelas" class="form-control" required style="width:449px">
                        <p class="help-block">* Campo Obrigatório</p>
                    </div>
                </div>

                <div class="control-group">
                    <div class="form-group" style="position:absolute;width:90.5%;left:6%;">
                        <label  for="comment">Avaliação Produto:</label>
                        <textarea name="aval" class="form-control" rows="5" id="texto"></textarea>
                        <p class="help-block">* Campo Obrigatório</p>
                    </div>
                </div>
            </fieldset>
        </div> 
        <div style="position:absolute;top:70%;left:45%;">
            <input type="submit" value="Enviar" class="btn btn-primary">
            <a href="../inicial/cliente.php" class="btn btn-primary">Voltar</a>
        </div>
    </form>
</body>
</html>