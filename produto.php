<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
require_once('lib/connect-api-client-wc.php');
session_start() ;
$token = $_SESSION['tokenAcess'];
$url = "http://ciaserver/t/trido.com.br/public/wp-json/api/usuario";

$auth = 'authorization: Bearer';
$options  = array (
    'http' =>
        array (
            'ignore_errors' => true,
            'method' => 'GET',
            'header' =>
                array (
                    0 => $auth . $token,
                    1 => 'Content-Type: application/x-www-form-urlencoded',
                ),
        ),
);

$context  = stream_context_create( $options );
$response = file_get_contents(
    $url,
    false,
    $context
);
$response = json_decode( $response );
?>
<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.png">
    <title>Loja Trido</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/libs/swiper/css/swiper.css">
    <link rel="stylesheet" href="assets/libs/swiper/css/custom-swiper.css">
    <script type="text/javascript" src="assets/libs/swiper/swiper.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-xxl-2">
            <div class="sidebar">
                <div class="side-item">
                    <div class="title">
                        <i class="material-icons-outlined">person_pin</i>
                        <h6 class="mb-0">
                            <?= $response->{'nome'}; ?>
                        </h6>
                    </div>
                    <a href="dashboard.php" class="btn primary-button active">
                        <i class="material-icons-outlined">home</i>
                        <span>Início</span>
                    </a>
                    <a href="" class="btn primary-button">
                        <i class="material-icons-outlined">savings</i>
                        <span>Vendas</span>
                    </a>
                </div>
                <!-- Administre -->
                <div class="side-item">
                    <div class="title">
                        <i class="material-icons-outlined">admin_panel_settings</i>
                        <h6 class="mb-0">
                            Administre
                        </h6>
                    </div>
                    <a href="produto.php" class="btn primary-button">
                        <i class="material-icons-outlined">inventory_2</i>
                        <span>Produtos</span>
                    </a>
                    <a href="" class="btn primary-button">
                        <i class="material-icons-outlined">local_shipping</i>
                        <span>Pagamento e entrega</span>
                    </a>
                    <a href="" class="btn primary-button">
                        <i class="material-icons-outlined">account_tree</i>
                        <span>Análises</span>
                    </a>
                    <a href="" class="btn primary-button">
                        <i class="material-icons-outlined">campaign</i>
                        <span>Marketing</span>
                    </a>
                </div>
                <!-- Personalize -->
                <div class="side-item">
                    <div class="title">
                        <i class="material-icons-outlined">brush</i>
                        <h6 class="mb-0">
                            Personalize
                        </h6>
                    </div>
                    <a href="" class="btn primary-button">
                        <i class="material-icons-outlined">store_mall_directory</i>
                        <span>Minha loja</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-xxl-10">
            <div class="content-info">
                <div class="row topo-home">
                    <div class="col-12 d-flex justify-content-between align-items-center flex-wrap">
                        <h3>Painel</h3>
                        <a href="#"><i class="material-icons-outlined">account_circle</i> Minha conta</a>
                    </div>
                    <div class="col-12 d-flex justify-content-between align-items-center flex-wrap">
                        <p>Bem-vindo(a) de volta, <b><?= $response->{'nome'}; ?></b>.<br>Tudo certo para vender muito hoje?</p>
                        <p><strong>Meu Plano</strong> <span class="badge text-bg-primary">Enterprise</span></p>
                    </div>
                </div>
                <div class="content">
                    <h5>Produtos</h5>
                    <?php
                    $prods = $client->products->get();
                    //print_r($client->products->get());
                    if($prods) :
                    ?>
                    <div class="container-fluid product-list">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>SKU</th>
                                <th>Estoque</th>
                                <th>Preço</th>
                                <th>Categorias</th>
                                <th>Tags</th>
                                <th>Data</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($prods as $prod) :
                                foreach ($prod as $item) :
                                ?>
                            <tr>
                                <td>
                                    <div class="col-12 px-0">
                                        <?php if($item->featured_src) : ?>
                                            <img class="img-fluid img-rounded" src="<?= $item->featured_src; ?>" alt="<?= $item->alt; ?>">
                                        <?php endif; ?>
                                        <?= $item->title; ?>
                                    </div>
                                    <div class="col-12 px-0 d-flex align-items-center justify-content-between btn-list">
                                        <a href="#" class="text-primary d-inline-flex">Editar</a>
                                        <a href="#" class="text-primary d-inline-flex">Duplicar</a>
                                        <a href="#" class="text-danger d-inline-flex"><i class="material-icons-outlined">
delete
</i> Excluir</a>
                                    </div>
                                </td>

                                <td><?= $item->sku; ?></td>

                                <td><span class="badge rounded-pill <?= $item->managing_stock == '' && $item->stock_quantity == '' && $item->in_stock == '' ? 'bg-danger' : 'bg-success' ?>"><?= $item->managing_stock == '' && $item->stock_quantity == '' && $item->in_stock == '' ? "Sem estoque" : "Em estoque";  if($item->stock_quantity >= 1) : ?> (<?= $item->stock_quantity ?>)<?php endif; ?></span></td>
                                <td><?= $item->price_html; ?></td>

                                <td>
                                    <?php foreach ($item->categories as $cat) : ?>
                                        <a class="text-primary" href="#"><?= $cat ?></a>
                                    <?php endforeach; ?>
                                </td>

                                <td>
                                    <?php foreach ($item->tags as $tag) : ?>
                                        <a class="text-primary" href="#"><?= $tag ?></a>
                                    <?php endforeach; ?>
                                </td>

                                <td>
                                    <?= substr($item->created_at, 0, 10); ?>
                                </td>
                            </tr>
                            <?php endforeach;
                            endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="content-info mt-5">
                <h5>Cadastre um Produto</h5>
                <?php
                $title = $_POST['nomeProduto'];
                $type = $_POST['tipoProduto'];
                $price = $_POST['precoProduto'];
                $description = $_POST['descricaoProduto'];
                if($title && $type && $price && $description ) {
                    $client->products->create(array('title' => $title, 'type' => $type, 'regular_price' => $price, 'description' => $description));
                }
                ?>
                <form method="post" action="#">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label for="exampleFormControlTextarea1">Nome do Produto</label>
                                <input name="nomeProduto" type="text" class="form-control" placeholder="Nome do Produto" required>
                            </div>
                            <div class="col">
                                <label  for="exampleFormControlTextarea2">Preço</label>
                                <input name="precoProduto" type="text" class="form-control" placeholder="Preço" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <label  for="exampleFormControlTextarea3">Selecione o Tipo de Produtos</label>
                        <select name="tipoProduto" class="form-control" required>
                            <option value="simple">Simples</option>
                            <option value="simple">Variavél</option>
                        </select>
                    </div>

                    <div class="form-group mt-2">
                        <label for="exampleFormControlTextarea1">Descrição do Produto</label>
                        <textarea name="descricaoProduto" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>


