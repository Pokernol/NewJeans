<?php
    //inserir.php
        require_once '../bd/conexao.php';
        if ($_POST) {

            $produto = $_POST['produto'];
            $cor = $_POST['cor'];
            $tamanho = $_POST['tamanho'];
            $qtdade = $_POST['qtdade'];
            $preco = $_POST['preco'];
    
            $sql_carrinho = "SELECT * from carrinho where produto = '$produto' AND cor = '$cor' AND tamanho = '$tamanho';";
    
            $result_carrinho = $conexao->query($sql_carrinho);
    
            if ($result_carrinho->num_rows == 0){
                $img = $_POST['img'];
                $compra = "em andamento";
                $total = ($preco * $qtdade);
    
                $sql = "insert into carrinho values (default, '$produto', '$img', '$cor', '$tamanho', '$preco','$qtdade', '$total', '$compra');";
                if ($conexao->query($sql)) {
                    $message = "Produto adicionado ao carrinho!";
                } else {
                    echo "Erro: " . $sql . " " . $conexao->connect_error;
                }
            }else if($_POST){
    
                $row = $result_carrinho->fetch_assoc();
                $id = $row["id"];
                $qtdade_atual = $row['qtdade'];
                $qtdade = $_POST['qtdade'];
                $qtdade = $qtdade + $qtdade_atual;
                $total = ($preco * $qtdade);
    
                $sql = "UPDATE carrinho SET qtdade = '$qtdade', total = '$total' Where id = '$id';";               
    
                if ($conexao->query($sql)) {
                    $message = "Produto adicionado ao carrinho!";
                } else {
                    echo "Erro: " . $sql . " " . $conexao->connect_error;
                }
            }
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
    <title> New jeans - Produto</title>
    <style>
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
                            <a class="nav-link" href="menu.html"><img src="../imagens/menu-hamburguer.svg" width="20px"></a>
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
                require_once '../bd/conexao.php';
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
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="window.location.href='../bd/compra.php'">
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
    <div>
         <!-- pop-up efetuada compra-- > <-->
         <?php
            if(isset($message)){
                echo "
                <div class='alert alert-success justify-content-center' role='alert'>
                <strong>$message</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
                </div>";
            }
            $conexao->close();
        ?>

        <!-- imagens produto-- > <-->
        <div class="container">
            <table class="table table-borderless blockquote text-left">
                <tbody>
                    <tr>
                        <th scope="row">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active"><img class="d-block w-100" src="../imagens/modelo07_01.png" alt="Primeiro Slide"></div>
                                    <div class="carousel-item"><img class="d-block w-100" src="../imagens/modelo07_02.png" alt="Segundo Slide"></div>
                                    <div class="carousel-item"><img class="d-block w-100" src="../imagens/modelo07_03.png" alt="Terceiro Slide"></div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Anterior</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Próximo</span>
                                </a>
                            </div>
                        </th>

                        <!--- > FORMULARIO <-->
                        <td>
                            <form method="post" action="">
                                <div>
                                    <input type="hidden" name="img" value="../imagens/modelo07_02.png">
                                    <input type="hidden" name="produto" value="Vintage Graphic Eden T-shirt">
                                    <h4 class="mb-3">Vintage Graphic Eden T-shirt</h4>
                                    <input type="hidden" name="preco" value="80.00">
                                    <p class="preço mx-3">R$80,00</p>
                                </div>

                                <!-- cor escolher-- > <-->
                                <div>
                                    <p class="subtitulo-secundario">COR: </p>
                                    <div class="form-check form-check-inline mx-3">
                                        <input class="form-check-input" type="radio" value="Azul" name="cor">
                                        <label class="form-check-label h6">Marrom</label>
                                    </div>
                                    <div class="form-check form-check-inline mx-3">
                                        <input class="form-check-input" type="radio" value="Azul" name="cor">
                                        <label class="form-check-label h6">Azul</label>
                                    </div>
                                    <div class="form-check form-check-inline mx-3">
                                        <input class="form-check-input" type="radio" value="Azul" name="cor">
                                        <label class="form-check-label h6">Rosa</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="Cinza" name="cor">
                                        <label class="form-check-label h6">Verde</label>
                                    </div></br></br>
                                </div>

                                <!-- tamanho escolher-- > <-->
                                <div>
                                    <p class="subtitulo-secundario">TAMANHO: </p>
                                    <div class="form-check form-check-inline mx-3">
                                        <input class="form-check-input" type="radio" value="GG" name="tamanho">
                                        <label class="form-check-label">GG</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="G" name="tamanho">
                                        <label class="form-check-label">G</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="M" name="tamanho">
                                        <label class="form-check-label">M</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" value="P" name="tamanho">
                                        <label class="form-check-label">P</label>
                                    </div>
                                </div>

                                <!-- quantidade escolher-- > <-->
                                <div class="form-group"></br>
                                    <label>
                                        <p class="subtitulo-secundario">QUANTIDADE: </p>
                                    </label>
                                    <input class="col-3 form-control" type="number" min="1" class="form-control" name="qtdade">
                                </div></br>

                                <!-- botao comprar-- > <-->
                                <input type="submit" class="btn btn-dark col-12" value="Comprar">
                            </form>
                            <br>
                            <!-- textos  produto-- > <-->
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h3>
                                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                <b>Descrição do Produto</b>
                                            </button>
                                        </h3>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            A construção em acrílico promete benefícios naturais,
                                            incluindo absorção de umidade, isolamento, regulação de temperatura,
                                            resistência a odores, respirabilidade e qualidades elásticas – proporcionam
                                            conforto, caimento e sofisticação excepcionais que irão acompanhá-lo de
                                            estação em estação.
                                            </br></br><b>Especificações do produto:</b> Produzido pelos principais
                                            fornecedores parceiros das marcas. Três processos de triagem e revisão para
                                            garantir a qualidade do produto.
                                            </br></br><b>Material:</b> Acrílico (52%), Nylon (28%), Poliéster (20%)
                                            </br></br><b>Detalhes da roupa:</b> Cartoon Goose Print.
                                            </br></br><b>Tecnologia de processo:</b> Tratamento sem ferro.
                                            <img src="../imagens/ex4.png" width="350px">
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h3>
                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
                                                <b>Formas de Pagamento</b>
                                            </button>
                                        </h3>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                        <img src="../imagens/carrinhopag.png" width="450px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div></br>
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