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
        <form action="cadastroProdutos3.php?go=1" method="POST">
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
                if (isset($_REQUEST['tipo'])) {
                    $qt = $qt + count($_REQUEST['tipo']);
                    foreach ($_REQUEST['tipo'] as $aux) {
                        $stmt = $pdo->prepare("SELECT * FROM tipo");
                        $stmt->execute();
                        while ($linha = $stmt->fetch()) {
                            $number = $linha[0];
                        }
                        $number=$number+1;
                        $sql = "INSERT INTO tipo (idTipo,tipo_roupa,Produto_id) values (" . $number . ",'" . $aux . "'," . $numero . ")";
                        if ($pdo->query($sql)) {
                            $cont = $cont + 1;
                        }
                    }
                }
                if ($qt == $cont) {
                    header("Location:../inicial/vendedor.php");
                } else {
                    header("Location:../inicial/vendedor.php");
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
        <div class="container" style="position:absolute;left:26%;top:15%;bottom:120px;border-style:outset;border-width:thin;border-radius:10px;border-radius:10px;background-color:#DCDCDC;width:780px;height:550px;">
            <div class="control-group">
                <label class="control-label">Tipo de Roupa</label>
                <div class="controls">
                    <table height=420 width=800>
                        <tr>
                            <td>
                                <input type="checkbox" name="tipo[]" value="1"> Camisa
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="2"> Calça
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="4"> Camiseta
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="5"> Casaco
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" name="tipo[]" value="6"> Camisa Gola Polo
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="7"> Camisa Manga Longa
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="8"> Camisa Manga Curta
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="9"> Calça Jeans
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" name="tipo[]" value="10"> Calça Moleton
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="11"> Calça Social
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="12"> Camiseta Manga Curta
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="13"> Camiseta Manga Longa
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" name="tipo[]" value="14"> Blusa
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="15"> Bermuda
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="16"> Colete
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="49"> Calça Skinny
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" name="tipo[]" value="18"> Jaqueta
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="19"> Casaco Moletom
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="20"> Sueter
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="21"> Blazer
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" name="tipo[]" value="22"> Bolero
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="23"> Saia
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="24"> Short
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="25"> Vestido
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" name="tipo[]" value="26"> Macacão
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="27"> Blusa Bata
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="28"> Baby look
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="29"> Blusa com Alça
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" name="tipo[]" value="30"> Top
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="31"> Tunica
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="32"> Blusa Tomara que Caia
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="33"> Regata
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" name="tipo[]" value="34"> Blusa sem ombro
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="35"> Calça Legging
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="36"> Calça Corsario
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="37"> Mini Saia
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" name="tipo[]" value="38"> Saia Longa
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="39"> Saia Media
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="40"> Short Jeans
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="41"> Short Social
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" name="tipo[]" value="42"> Vestido Curto
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="43"> Vestido Longo
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="44"> Vestido Manga Longa
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="45"> Vestido Medio
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" name="tipo[]" value="46"> Vestido Festa
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="47"> Macaquinho
                            </td>
                            <td>
                                <input type="checkbox" name="tipo[]" value="48"> Cardigan
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Button -->
        <div class="control-group" style="position:absolute;left:46%;top:85%;">
            <label class="control-label"></label>
            <div class="controls">
                <a href="..\inicial\vendedor.php"><input type="submit" value="Enviar"  class="btn btn-primary"></a>
                <a href="cadastroProdutos2.php" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </form>
</body>
</html>


