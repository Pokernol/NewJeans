<?php
require_once 'conexao.php';

include('../usuario/protect.php');
    
    $email = $_SESSION['email'];
    
    $sql_usuario="SELECT * from usuario where email = '$email';";

    $result_usuario = $conexao->query($sql_usuario);

    $row = $result_usuario->fetch_assoc();

if (isset($_POST['endereco']) || isset($_POST['cidade']) || isset($_POST['estado']) || isset($_POST['cep'])) {

    if (strlen($_POST['endereco']) == 0) {
        $message = "Preencha seu endereco!";
    } elseif (strlen($_POST['cidade']) == 0) {
        $message = "Preencha sua cidade!";
    } elseif (strlen($_POST['estado']) == 0) {
        $message = "Selecione um estado!";
    } elseif (strlen($_POST['cep']) == 0) {
        $message = "Preencha seu cep!";
    } else {

        $email = $_SESSION['email'];
        $endereco = $_POST['endereco'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $cep = $_POST['cep'];

        $sql_code = "UPDATE usuario SET endereco = '$endereco', cidade = '$cidade', estado = '$estado', cep = '$cep' where email = '$email';";
        $sql_query = $conexao->query($sql_code) or die("Falha na execução");

        header("Location:entrega.php");
    }

}

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Finalizar </title>
    <style>
        .dropdown-menu {
            min-width: 6rem!important;
        }
    </style>
</head>

<body>
    <header class="cabeçalho bg-light">
        <nav class="navbar navbar-light">
            <a class="navbar-brand" href="../index.php"><img class="blockquote text-center"
                    src="../imagens/LOGO-removebg-preview.png" width="120px"></a>
        </nav>
        <ul class="nav justify-content-center">
            <li class=" col-2 nav-iten"><img src="../imagens/procurar.svg" width="23px"></li>
            <li class="col-10 nav-item"><input class="form-control mx-auto" type="search" placeholder="Pesquisar"></li>
        </ul>
        <ul class="nav justify-content-end ">
            <li class="nav-item">
                <div class="dropdown">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a class="nav-link"><img src="../imagens/menu-hamburguer.svg" width="20px"></a>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="../index.php">Página Inicial</a>
                            <a class="dropdown-item" href="../produtos.php">Produtos</a>
                            <a class="dropdown-item" href="../quemsomos.php">Sobre a Loja</a>
                            <a class="dropdown-item" href="../faleconosco.php">Fale Conosco</a>
                        </div>
                    </div>
                </div>
            </li>
            <?php
            require_once 'conexao.php';
            $cont = 0;
            $sql = "select * from carrinho";
            $result = $conexao->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $cont++;
                }
            } else {
                $cont = 0;
            }
            ?>
            <li class="nav-item">
                <div class="dropdown">
                    <div class="dropdown">
                        <button class="btn btn-light btn-sm pb-4" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            onclick="window.location.href='../bd/compra.php'">
                            <a class="nav-link">
                                <img class="mx-1" src="../imagens/bolsa-de-compras.svg" width="20px">
                                <span>
                                    <sup class="text-dark">
                                        <?php echo $cont; ?>
                                    </sup>
                                </span>
                            </a>
                        </button>
                    </div>
                </div>
            </li>
            <li class="nav-item mr-5">
                <?php
                if (isset($_SESSION['nome'])) {
                    ?>
                    <div class="dropdown">
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <a class="nav-link" href="menu.html"><img src="../imagens/do-utilizador.svg"
                                        width="20px"></a>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="../usuario/logout.php">Logout</a>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                <div class="dropdown">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a class="nav-link" href="menu.html"><img src="../imagens/do-utilizador.svg" width="20px"></a>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="../usuario/login.php">login</a>
                            <a class="dropdown-item" href="../usuario/cadastro.php">cadastrar</a>
                        </div>
                    </div>
                </div>
                    <?php
                }
                ?>
            </li>
        </ul>
    </header>

    <?php
    if (isset($message)) {
        echo "
            <div class='alert alert-warning justify-content-center' role='alert'>
            <strong>$message</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
            </div>";
    }
    $conexao->close();
    ?>

    <div class="container">
        <div class="container-fluid blockquote text-center">
            <h1 class="display-3"><b>Endereço de entrega</b></h1>
        </div></br>
        <form action="" method="post">
            <div class="form-group">
                <label for="inputAddress">Endereço</label>
                <input type="text" class="form-control" id="inputAddress"
                    placeholder="Rua dos Bobos, nº 0, bl.0 apto. 00" name="endereco" required>
            </div></br>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Cidade</label>
                    <input type="text" class="form-control" id="inputCity" placeholder="Mogi das Cruzes" name="cidade" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEstado">Estado</label>
                    <select name="estado" id="inputEstado" class="form-control" required>
                        <option disabled>Selecione</option>
                        <option value="DF">DF</option>
                        <option value="MG">MG</option>
                        <option value="RJ">RJ</option>
                        <option value="RS">RS</option>
                        <option value="SP">SP</option>
                    </select>
                </div></br>
                <div class="form-group col-md-2">
                    <label for="inputCEP">CEP</label>
                    <input type="cep" class="form-control" placeholder="00000-000" name="cep" required>
                </div>
                </br>
                </br>
                <div>
                    <p>Método de pagamento: </p>

                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Cartão de
                        Crédito</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal2">Boleto -
                        À vista</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal3">Pix - À
                        vista</button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Pagamento com Cartão de Crédito</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span
                                            aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Numero do cartão de
                                                credito:</label>
                                            <input type="text" class="form-control" id="recipient-name"
                                                placeholder="xxxx xxxx xxxx xxxx">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Validade do cartão de
                                                credito:</label>
                                            <input type="date" class="form-control" id="recipient-name"
                                                placeholder="xx/xx">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">CVC do cartão de
                                                credito:</label>
                                            <input type="number" class="form-control" id="recipient-name"
                                                placeholder="xxx">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button class="btn btn-success">Pagar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModal2Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModal2Label"> Pagamento com Boleto</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Fechar"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Numero do Boleto (copie o
                                                número do boleto):</label>
                                            <input type="text" class="form-control" id="recipient-message"
                                                value="34191.79001 01043.510047 91020.150008 1 95480026000">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Validade do
                                                Boleto:</label>
                                            <input class="form-control" id="recipient-name"
                                                value="Após de 5 dias de sua emissão.">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button class="btn btn-success">Pagar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModal3Label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModal3Label"> Pagamento com Pix - Á vista</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Fechar"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Numero do Pix (copie o
                                                número da chave aleatória do Pix):</label>
                                            <input type="text" class="form-control" id="recipient-message"
                                                value="3419179001 01043510047 9102150008 195480026000 1152223636554855522 22255">
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Validade do pix:</label>
                                            <input class="form-control" id="recipient-name"
                                                value="Após de 30 minutos de sua emissão.">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button class="btn btn-success">Pagar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div></br>
        </form>
    </div>
</div>
    <!-- RODAPE -->
    <footer class="rodape py-3 mt-5">
        <div class="container">
            <table class="table table-dark table-borderless blockquote text-center">
                <tbody>
                    <tr class="titulo-rodape">
                        <th scope="row"></th></br>
                        <td><p>Patrocinadores:</p></td>
                        <td><p>Ajuda:</p></td>
                        <td><p>Informações:</p></td>
                    </tr>
                    <tr class="inforodape">
                        <th scope="row"></th>
                        <td><p><img src="../imagens/patro-1.png" width="100px"></p></td>
                        <td><a href="../faleconosco.php" class="nav-link">Fale Conosco</a></td>
                        <td><a href="../quemsomos.php" class="nav-link">Sobre a Loja</a></td>
                    </tr>
                    <tr class="inforodape">
                        <th scope="row"></th>
                        <td><p><img src="../imagens/patro2.png" width="100px"></p></td>
                        <td><a href="../feedback.php" class="nav-link">Feedback</a></td>
                        <td>
                            <a>
                                <img src="../imagens/INSTA_adobe_express.png" width="30px">
                                <img src="../imagens/ttk.png" width="35px"> 
                                <img src="../imagens/face_adobe_express.png" width="20px">
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </footer>
</body>

</html>