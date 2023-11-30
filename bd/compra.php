<?php
    require_once 'conexao.php';
    //Update//

    if (isset($_POST['update_quant_produto'])){

        $update_value = $_POST['update_quant'];
        $update_id = $_POST['update_quant_id'];
        $preco_prod = $_POST['preco_prod'];

        $update_total = ($update_value * $preco_prod);

        $sql = "UPDATE carrinho SET qtdade = '$update_value', total = '$update_total' where id = '$update_id';";
        
        $update_quant_query = $conexao->query($sql) or die("Erro: " . $conexao->connect_error);

        if ($update_quant_query) {
            header("location:compra.php");
        }
    }   
    
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];

        $sql = "DELETE from carrinho where id='$delete_id';";
        $result = $conexao->query($sql) or die("Erro: " . $conexao->connect_error);
        if ($result) {
            echo 'O Produto foi Deletado';
            header('location:compra.php');
        } else {
            echo 'O Produto não foi Deletado';
            header('location:compra.php');
        }
    }

    if (isset($_GET['delete_all'])){
        $conexao->query('DELETE from carrinho');
        header('location:compra.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title> Carrinho</title>

    <style>
        .inputquant {
            width: 50px;
            padding-bottom: 5px;
            border-color: rgba(0, 0, 0, 0.1);
            border-radius: 15%;
        }
        .table_butao {
            height: 100px;
        }
        .dropdown-menu {
            min-width: 6rem!important;
        }
    </style>

</head>

<body>
    <!-- cabeçalho-- > <-->
    <header class="cabeçalho bg-light">
        <nav class="navbar navbar-light">
            <a class="navbar-brand" href="../index.php"><img class="blockquote text-center" src="../imagens/LOGO-removebg-preview.png" width="120px"></a>
        </nav>
        <ul class="nav justify-content-center">
            <li class=" col-2 nav-iten"><img src="../imagens/procurar.svg" width="23px"></li>
            <li class="col-10 nav-item"><input class="form-control mx-auto" type="search" placeholder="Pesquisar"></li>
        </ul>
        <ul class="nav justify-content-end ">
            <li class="nav-item">
                <div class="dropdown">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="dropdownMenuButton"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a class="nav-link" ><img src="../imagens/menu-hamburguer.svg" width="20px"></a>
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
                session_start();
                $cont=0;
                $sql = "select * from carrinho";
                $result = $conexao->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()){
                        $cont++;
                    }
                }else{
                    $cont=0;
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
                                <a class="nav-link" href="menu.html"><img src="../imagens/do-utilizador.svg" width="20px"></a>
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
    <!-- CARRINHO DE COMPRA CONTEUDO-- > <-->
    <div>
        </br></br></br></br>
        <div class="container-fluid blockquote text-center">
            <h1 class="h1-secundario">Carrinho de compras</h1>
        </div></br></br>

        <div class="tabela container">
            <table class="table table-light">
                <?php
                $cont = 1;
                $total_compra = 0;
                $sql = "select * from carrinho;";
                $result = $conexao->query($sql);

                if ($result->num_rows > 0) {
                    echo
                        "<tr>
                                <th class='text-center'>#</th>
                                <th class='text-center'>Produto</th>
                                <th class='text-center'>Img</th>
                                <th class='text-center'>Cor</th>
                                <th class='text-center'>Tamanho</th>
                                <th class='text-center'>Preco Produto</th>
                                <th class='text-center'>Quantidade</th>
                                <th class='text-center'>Preco Total</th>
                                <th class='text-center'>Ação</th>
                            </tr>";

                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td class="align-middle text-center">
                                <?php echo $cont ?>
                            </td>
                            <td class="align-middle text-center">
                                <?php echo $row['produto'] ?>
                            </td>
                            <td class="align-middle text-center"><img src="<?php echo $row['img'] ?>" width="130px"
                                    alt="<?php $row['produto'] ?>"></td>
                            <td class="align-middle text-center">
                                <?php echo $row['cor'] ?>
                            </td>
                            <td class="align-middle text-center">
                                <?php echo $row['tamanho'] ?>
                            </td>
                            <td class="align-middle text-center">
                            R$ <?php echo $row['preco'] ?>
                            </td>
                            <td class="align-middle text-center">
                                <form action="" method="post">
                                    <input type="hidden" value="<?php echo $row['id'] ?>" name="update_quant_id">
                                    <input type="hidden" value="<?php echo $row['preco'] ?>" name="preco_prod">
                                    <div>
                                        <input class="text-center inputquant" type="number" min="1" value="<?php echo $row['qtdade'] ?>" name="update_quant">
                                        <input type="submit" class="btn btn-dark" value="Update" name="update_quant_produto">
                                    </div>
                                </form>
                            </td>
                            <td class="align-middle text-center">R$ <?php echo $row['total'] ?>
                            </td>
                            <td class="align-middle text-center">
                                <a href="compra.php?delete=<?php echo $row['id'] ?>"
                                    onclick="return confirm('Você tem certeza que deseja remover esse Produto do carrinho?');">
                                    <img src="../imagens/Lixeira_fechada.png"
                                        onmouseover="this.src='../imagens/Lixeira_aberta.png'"
                                        onmouseout="this.src='../imagens/Lixeira_fechada.png'" width="30px">
                                </a>
                            </td>
                        </tr>
                        <?php
                        $total_compra += $row['total'];
                        $cont++;
                    }
                } else {
                    ?>
                    <div class="container-fluid blockquote text-center">
                        <p class="titulo-secundario">SEU CARRINHO ESTÁ VAZIO</p>
                        <p class="texto-secundario">Navegue pelas categorias da loja ou faça uma busca pelo seu produto.</p>
                        </br>
                    </div>
                    <?php
                }
                $total_compra = number_format($total_compra,2);
                $conexao->close();
                ?>
            </table>
            <div class="d-flex flex-row-reverse mb-2">
                <form action="" method="post">
                    <input type="hidden" value="<?php echo $row[''] ?>" name="">
                    <a class="mx-3 badge badge-light d-flex align-items-center" href="compra.php?delete_all" onclick="return confirm('Você tem certeza que deseja remover TODOS os Produto do carrinho?');">
                    <p class="h6">Deletar Todos Os itens</p> <img src="../imagens/Lixeira_fechada.png"
                        onmouseover="this.src='../imagens/Lixeira_aberta.png'"
                        onmouseout="this.src='../imagens/Lixeira_fechada.png'" width="30px">
                    </a>
                </form>
            </div>

            <div class="bg-light mb-2 container table_butao d-flex align-items-center justify-content-between">
                <button type="button" class="btn btn-outline-dark btn-lg" onclick="window.location.href='../produtos.php'">Continuar Comprando</button>
                <h3 class="btn btn-outline-dark btn-lg">Valor Total: <span class="text-success h5">R$ <?php echo $total_compra?></span></h3>
                <a href="finalizar.php" class="btn btn-outline-dark btn-lg">Finalizar Compra</a>
            </div>

            </br></br></br></br>
            <div class=' text-center'><img src='../imagens/carrinhopag.png'>
            </div>
        </div>



        <!-- rodapé-- > <-->
        <footer class="rodape py-3">
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