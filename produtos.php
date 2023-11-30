<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title> New jeans</title>
    <style>
            body, html {
        background: #ffffff!important;
    }
        .dropdown-menu {
            min-width: 6rem!important;        
        }
    </style>
</head>

<body>
    <!-- cabeçalho-- > <-->
    <header class="cabeçalho bg-light">
        <nav class="navbar navbar-light ml-3">
            <a class="navbar-brand" href="index.php">
                <img class="blockquote text-center" src="imagens/LOGO-removebg-preview.png" width="120px">
            </a>
        </nav>
        <ul class="nav justify-content-center">
            <li class=" col-2 nav-iten">
                <img src="imagens/procurar.svg" width="23px">
            </li>
            <li class="col-10 nav-item">
                <input class="form-control mx-auto" type="search" placeholder="Pesquisar">
            </li>
        </ul>
        <ul class="nav justify-content-end ">
            <li class="nav-item">
                <div class="dropdown">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle btn-sm" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a class="nav-link" href="menu.html"><img src="imagens/menu-hamburguer.svg"
                                    width="20px"></a>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="index.php">Página Inicial</a>
                            <a class="dropdown-item" href="produtos.php">Produtos</a>
                            <a class="dropdown-item" href="quemsomos.php">Sobre a Loja</a>
                            <a class="dropdown-item" href="faleconosco.php">Fale Conosco</a>
                        </div>
                    </div>
                </div>
            </li>
            <?php
            require_once 'bd/conexao.php';
            session_start();
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
                            onclick="window.location.href='bd/compra.php'">
                            <a class="nav-link">
                                <img class="mx-1" src="imagens/bolsa-de-compras.svg" width="20px">
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
                                <a class="nav-link" href="menu.html"><img src="imagens/do-utilizador.svg" width="20px"></a>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="usuario/logout.php">Logout</a>
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
                                <a class="nav-link" href="menu.html"><img src="imagens/do-utilizador.svg" width="20px"></a>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="usuario/login.php">login</a>
                                <a class="dropdown-item" href="usuario/cadastro.php">cadastrar</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </li>
        </ul>
    </header>

    <!-- CONTEUDO DA PAGINA-- > <-->
    <div class="container-fluid w-75">
        <!-- PRODUTOS-- ><-->
        <h1 class="h1-secundario text-center mb-5 mt-4 text-dark">Produtos</h1>

        <div class="pt-3">
            <div class="container-fluid">
                <table class="table table-borderless text-center">
                    <tbody>
                        <!-- Linhas 1 / Cores -->
                        <tr>
                            <th rowspan="4" style="width: 170px;">
                                <div>
                                    <p class="ml-1 mt-3 h5 text-left"><b>Cores:</b></p>
                                    <!-- Checkboxes de cores -->
                                    <div class="form-check form-check-inline  pl-5 d-flex">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="opcao1">
                                        <label class="form-check-label" for="inlineCheckbox1">Preto</label>
                                    </div>
                                    <div class="form-check form-check-inline pl-5 d-flex">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="opcao2">
                                        <label class="form-check-label" for="inlineCheckbox2">Branco</label>
                                    </div>
                                    <div class="form-check form-check-inline pl-5 d-flex">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="opcao1">
                                        <label class="form-check-label" for="inlineCheckbox1">Rosa</label>
                                    </div>
                                    <div class="form-check form-check-inline pl-5 d-flex">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="opcao1">
                                        <label class="form-check-label" for="inlineCheckbox1">Cinza</label>
                                    </div>
                                    <div class="form-check form-check-inline pl-5 d-flex">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="opcao2">
                                        <label class="form-check-label" for="inlineCheckbox2">Azul</label>
                                    </div>
                                    <div class="form-check form-check-inline pl-5 d-flex">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="opcao1">
                                        <label class="form-check-label" for="inlineCheckbox1">Vermelho</label>
                                    </div>
                                    <div class="form-check form-check-inline pl-5 d-flex">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="opcao1">
                                        <label class="form-check-label" for="inlineCheckbox1">Verde</label>
                                    </div>
                                    <div class="form-check form-check-inline pl-5 d-flex">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="opcao2">
                                        <label class="form-check-label" for="inlineCheckbox2">Amarelo</label>
                                    </div>
                                    <div class="form-check form-check-inline pl-5 d-flex">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="opcao1">
                                        <label class="form-check-label" for="inlineCheckbox1">Outras</label>
                                    </div>
                                    <div class="dropdown-divider col-2"></div>
                                </div>
                                </td>
                                <!-- Imagens da primeira coluna -->
                            <td><img class="produtos" src="imagens/moletom1.png" width="360px"></td>
                            <td><img class="produtos" src="imagens/sueter2.png" width="360px"></td>
                            <td><img class="produtos" src="imagens/stars2.png" width="360px"></td>
                        </tr>

                        <tr class="prodesc">
                            <!-- Nomes dos produtos -->
                            <td>SuéterPatoAelfric Eden Wow </td>
                            <td>Suéter TALISHKO Vintage Tubarão</td>
                            <td>Jaqueta Fleece ShootingStars </td>
                        </tr>

                        <tr class="preço">
                            <!-- Preços -->
                            <td>R$123,00 </td>
                            <td>R$150,00 </td>
                            <td>R$152,00 </td>
                        </tr>

                        <tr class="preço">
                            <!-- Botões de compra -->
                            <td><button type="button" class="btn btn-outline-dark" onclick="window.location.href='prod/modelo1.php'">Comprar</button></td>
                            <td><button type="button" class="btn btn-outline-dark" onclick="window.location.href='prod/modelo2.php'">Comprar</button></td>
                            <td><button type="button" class="btn btn-outline-dark" onclick="window.location.href='prod/modelo3.php'">Comprar</button></td>
                        </tr>

                        <!-- Linha 2 / Tamanho -->

                        <tr>
                            <th rowspan="4">
                                <div>
                                    <p class="ml-1 mt-3 h5 text-left"><b>Tamanho:</b></p>
                                    <!-- Checkboxes de tamanhos -->
                                    <div class="form-check form-check-inline pl-5 d-flex">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="opcao1">
                                        <label class="form-check-label" for="inlineCheckbox1">PP</label>
                                    </div>
                                    <div class="form-check form-check-inline pl-5 d-flex">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="opcao2">
                                        <label class="form-check-label" for="inlineCheckbox2">P</label>
                                    </div>
                                    <div class="form-check form-check-inline pl-5 d-flex">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="opcao1">
                                        <label class="form-check-label" for="inlineCheckbox1">M</label>
                                    </div>
                                    <div class="form-check form-check-inline pl-5 d-flex">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="opcao1">
                                        <label class="form-check-label" for="inlineCheckbox1">G</label>
                                    </div>
                                    <div class="form-check form-check-inline pl-5 d-flex">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="opcao2">
                                        <label class="form-check-label" for="inlineCheckbox2">GG</label>
                                    </div>
                                    <div class="form-check form-check-inline pl-5 d-flex">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="opcao1">
                                        <label class="form-check-label" for="inlineCheckbox1">XGG</label>
                                    </div>
                                    <div class="form-check form-check-inline pl-5 d-flex">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                            value="opcao1">
                                        <label class="form-check-label" for="inlineCheckbox1">Outras</label>
                                    </div>
                                </div>
                            </th>
                            <!-- Imagens da segunda coluna -->
                            <td><img class="produtos" src="imagens/moletom1 (2).png" width="360px"></td>
                            <td><img class="produtos" src="imagens/jaqueta3.png" width="360px"></td>
                            <td><img class="produtos" src="imagens/jaqueta2.png" width="360px"></td>
                        </tr>

                        <tr class="prodesc">
                            <!-- Nomes dos produtos -->
                            <td> Jaqueta TALISHKO Star PU </td>
                            <td> Jaqueta Streetwear Dior </td>
                            <td> Jaqueta Streetwear TALISHKO </td>
                        </tr>

                        <tr class="preço">
                            <!-- Preços -->
                            <td>R$240,00 </td>
                            <td>R$190,00 </td>
                            <td>R$250,00 </td>
                        </tr>

                        <tr class="preço">
                            <!-- Botões de compra -->
                            <td><button type="button" class="btn btn-outline-dark" onclick="window.location.href='prod/modelo4.php'">Comprar</button></td>
                            <td><button type="button" class="btn btn-outline-dark" onclick="window.location.href='prod/modelo5.php'">Comprar</button></td>
                            <td><button type="button" class="btn btn-outline-dark" onclick="window.location.href='prod/modelo6.php'">Comprar</button></td>
                        </tr>

                        <!-- Linhas 3 / Categoria -->

                        <tr>
                            <th rowspan="4">
                                <p class="ml-1 mt-4 h5 text-left"><b>Categoria:</b></p>
                                <!-- Checkboxes de categorias -->
                                <div class="form-check form-check-inline pl-5 d-flex">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="opcao1">
                                    <label class="form-check-label" for="inlineCheckbox1">Camisetas</label>
                                </div>
                                <div class="form-check form-check-inline pl-5 d-flex">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="opcao1">
                                    <label class="form-check-label" for="inlineCheckbox1">Shorts</label>
                                </div>
                                <div class="form-check form-check-inline pl-5 d-flex">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="opcao2">
                                    <label class="form-check-label" for="inlineCheckbox2">Jaquetas</label>
                                </div>
                                <div class="form-check form-check-inline pl-5 d-flex">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="opcao2">
                                    <label class="form-check-label" for="inlineCheckbox2">Suéter</label>
                                </div>
                                <div class="form-check form-check-inline pl-5 d-flex">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="opcao2">
                                    <label class="form-check-label" for="inlineCheckbox2">Moletons</label>
                                </div>
                                <div class="form-check form-check-inline pl-5 d-flex">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="opcao1">
                                    <label class="form-check-label" for="inlineCheckbox1">Outraaas</label>
                                </div></br>
                            </th>
                            <!-- Imagens da terceira coluna -->
                            <td><img class="produtos" src="imagens/camiseta1.png" width="360px"></td>
                            <td><img class="produtos" src="imagens/camiseta2.png" width="360px"></td>
                            <td><img class="produtos" src="imagens/camisa4.png" width="360px"></td>
                        </tr>
                        <tr class="prodesc">
                            <!-- Nomes dos produtos -->
                            <td>Vintage Graphic Eden T-shirt </td>
                            <td>Gatos Graphic T-Shirt</td>
                            <td>Berserk Graphic T-Shirt</td>
                        </tr>
                        <tr class="preço">
                            <!-- Preços -->
                            <td>R$80,00 </td>
                            <td>R$80,00 </td>
                            <td>R$80,00 </td>
                        </tr>
                        <tr class="preço">
                            <!-- Botões de compra -->
                            <td><button type="button" class="btn btn-outline-dark" onclick="window.location.href='prod/modelo7.php'">Comprar</button></td>
                            <td><button type="button" class="btn btn-outline-dark" onclick="window.location.href='prod/modelo8.php'">Comprar</button></td>
                            <td><button type="button" class="btn btn-outline-dark" onclick="window.location.href='prod/modelo9.php'">Comprar</button></td>
                        </tr>



                    </tbody>
                </table>

                </br>
                <nav aria-label="Navegação de página exemplo">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link text-dark" href="#">Anterior</a></li>
                        <li class="page-item"><a class="page-link text-dark" href="#">1</a></li>
                        <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
                        <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
                        <li class="page-item"><a class="page-link text-dark" href="#">Próximo</a></li>
                    </ul>
                </nav>
            </div>
            </br>
        </div>
    </div>

    <!-- rodapé-- > <-->
    <footer class="rodape py-3">
        <div class="container">
            <table class="table table-dark table-borderless blockquote text-center">
                <tbody>
                    <tr class="titulo-rodape">
                        <th scope="row"></th></br>
                        <td>
                            <p>Patrocinadores:</p>
                        </td>
                        <td>
                            <p>Ajuda:</p>
                        </td>
                        <td>
                            <p>Informações:</p>
                        </td>
                    </tr>
                    <tr class="inforodape">
                        <th scope="row"></th>
                        <td>
                            <p><img src="imagens/patro-1.png" width="100px"></p>
                        </td>
                        <td><a href="faleconosco.php" class="nav-link">Fale Conosco</a></td>
                        <td><a href="quemsomos.php" class="nav-link">Sobre a Loja</a></td>
                    </tr>
                    <tr class="inforodape">
                        <th scope="row"></th>
                        <td>
                            <p><img src="imagens/patro2.png" width="100px"></p>
                        </td>
                        <td><a href="feedback.php" class="nav-link">Feedback</a></td>
                        <td>
                            <a>
                                <img src="imagens/INSTA_adobe_express.png" width="30px">
                                <img src="imagens/ttk.png" width="35px">
                                <img src="imagens/face_adobe_express.png" width="20px">
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </footer>
</body>

</html>