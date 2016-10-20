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
        <form action="cadastroProdutos2.php?go=1" method="POST" enctype="multipart/form-data">
            <?php
            if (isset($_GET['go']) && $_GET['go'] != '') {
                $cont = 0;
                $qt = 0;
                session_start();
                $pdo = new PDO('mysql:host=localhost;dbname=boostwear', 'root', '') or die("Falha ao estabelecer ligação com a base de dados!\n");
                $stmt = $pdo->prepare("SELECT * FROM produto");
                $stmt->execute();
                while ($linha = $stmt->fetch()) {
                    $numero = $linha[0];
                }
                if ($_FILES['arquivo']['name'] != "") {
                    $diretorio = "img\\";
                    $img_dir = $diretorio . $_FILES['arquivo']['name'];
                    $nome=$_FILES['arquivo']['name'];
                    $stmt = $pdo->prepare("SELECT * FROM img");
                    $stmt->execute();
                    while ($linha = $stmt->fetch()) {
                        $number = $linha[0];
                    }
                    $number++;
                    $sql = "INSERT INTO img (idImg,img_local,Produto_id) values (" . $number . ",'" . $nome . "'," . $numero . ")";
                    if ($pdo->query($sql)) {
                        $cont = $cont + 1;
                    } else {
                        print_r($pdo->errorInfo());
                        exit();
                    }
                    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $img_dir)) {
                        header("Location:cadastroProdutos3.php");
                    } else {
                        echo "<script>alert('Falha no Upload da imagem!');</script>";
                    }
                }
                if (isset($_REQUEST['estacao'])) {
                    $qt = $qt + count($_REQUEST['estacao']);
                    foreach ($_REQUEST['estacao'] as $aux) {
                        $stmt = $pdo->prepare("SELECT * FROM estacao");
                        $stmt->execute();
                        while ($linha = $stmt->fetch()) {
                            $number = $linha[0];
                        }
                        $number++;
                        $sql = "INSERT INTO estacao (idEstacao,nome_estacao,Produto_id) values (" . $number . ",'" . $aux . "'," . $numero . ")";
                        if ($pdo->query($sql)) {
                            $cont = $cont + 1;
                        }
                    }
                }
                if (isset($_REQUEST['cores'])) {
                    $qt = $qt + count($_REQUEST['cores']);
                    foreach ($_REQUEST['cores'] as $aux) {
                        $stmt = $pdo->prepare("SELECT * FROM cor");
                        $stmt->execute();
                        while ($linha = $stmt->fetch()) {
                            $number = $linha[0];
                        }
                        $number++;
                        $sql = "INSERT INTO cor (idCor,nome_cor,Produto_id) values (" . $number . ",'" . $aux . "'," . $numero . ")";
                        if ($pdo->query($sql)) {
                            $cont++;
                        }
                    }
                }
                if (isset($_REQUEST['material'])) {
                    $qt = $qt + count($_REQUEST['material']);
                    foreach ($_REQUEST['material'] as $aux) {
                        $stmt = $pdo->prepare("SELECT * FROM material");
                        $stmt->execute();
                        while ($linha = $stmt->fetch()) {
                            $number = $linha[0];
                        }
                        $number++;
                        $sql = "INSERT INTO material (idMaterial,nome_material,Produto_id) values (" . $number . ",'" . $aux . "'," . $numero . ")";
                        if ($pdo->query($sql)) {
                            $cont++;
                        }
                    }
                }
                if ($qt == $cont) {
                    header("Location:cadastroProdutos3.php");
                } else {
                    header("Location:cadastroProdutos3.php");
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
                            session_start();
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
        <div class="container" style="position:absolute;left:38%;top:8%;bottom:120px;border-style:outset;border-width:thin;border-radius:10px;border-radius:10px;background-color:#DCDCDC;width:385px;height:520px;">
            <div class="control-group">
                <label class="control-label">Estação</label>
                <div class="controls">
                    <input type="checkbox" name="estacao[]" value="primavera"> Primavera 
                    <input type="checkbox" name="estacao[]" value="outono" > Outono
                    <input type="checkbox" name="estacao[]" value="verao"> Verão
                    <input type="checkbox" name="estacao[]" value="inverno"> Inverno<br><br>
                </div>
            </div>

            <br>
            <div class="control-group">
                <label class="control-label">Cores Predominantes</label>
                <div class="controls">
                    <input type="checkbox" name="cores[]" value="Preto"> Preto
                    <input type="checkbox" name="cores[]" value="Branco"> Branco
                    <input type="checkbox" name="cores[]" value="Azul"> Azul
                    <input type="checkbox" name="cores[]" value="Rosa"> Rosa
                    <input type="checkbox" name="cores[]" value="Vermelho"> Vermelho<br><br>
                    <input type="checkbox" name="cores[]" value="Amarelo"> Amarelo
                    <input type="checkbox" name="cores[]" value="Cinza"> Cinza 
                    <input type="checkbox" name="cores[]" value="Verde"> Verde
                    <input type="checkbox" name="cores[]" value="Marrom"> Marrom <br><br>
                </div>
            </div>
            <br>
            <div class="control-group">
                <label class="control-label">Material</label>
                <div class="controls">
                    <input type="checkbox" name="material[]" value="acetato"> Acetato
                    <input type="checkbox" name="material[]" value="linho"> Linho
                    <input type="checkbox" name="material[]" value="acrilico"> Acrilico
                    <input type="checkbox" name="material[]" value="couro"> Couro
                    <input type="checkbox" name="material[]" value="algodao"> Algodão</br></br>
                    <input type="checkbox" name="material[]" value="pele"> Pele
                    <input type="checkbox" name="material[]" value="sintetico"> Sintetico
                    <input type="checkbox" name="material[]" value="la"> Lã <br><br>
                </div>
            </div>
            <br>
            <div class="control-group">
                <label class="control-label">Imagem</label>
                <div class="controls">
                    <input type="file" name="arquivo" accept=".jpg" value="Escolher Imagem">
                    <p class="help-block">* Campo Obrigatório</p>
                </div>
            </div>

        </div>

        <!-- Button -->
        <div class="control-group" style="position:absolute;left:46%;top:90%;">
            <label class="control-label"></label>
            <div class="controls">
                <a href="..\inicial\vendedor.php"><input type="submit" value="Proximo"  class="btn btn-primary"></a>
                <a href="cadastroProdutos.php" class="btn btn-primary">Voltar</a>
            </div>
        </div>

    </form>
</body>
</html>


