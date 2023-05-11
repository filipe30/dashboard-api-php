<?php
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
#print_r($response);

// Valida se tem alguém logado
if(!$token){
    session_abort();
    header('Location: index.php');
}
?>
<!doctype html>
<html lang="pt">
<?php // head
require_once ('components/head/head.php');
?>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-xxl-2">
            <?php require_once ('components/sidebar/sidebar.php') ?>
        </div>
        <div class="col-md-9 col-xxl-10">
            <div class="content-info">
                <div class="row topo-home">
                    <?php
                    // Topo do container principal
                    require_once ('components/container/topo-pagina.php');
                    ?>
                    <div class="col-12 d-flex justify-content-between align-items-center flex-wrap">
                        <p>{Administre suas vendas.}</p>
                        <p><strong>Meu Plano</strong> <span class="badge bg-primary">Enterprise</span></p>
                    </div>
                </div>
                <div class="content">

                    <div class="row">
                        <div class="col-12 col-lg-6 col-xxl-4 mb-3">
                            <div class="content-info sell py-5">
                                <i class="material-icons-outlined">leaderboard</i>
                                <h2 class="my-2">R$ {45.746,80}</h2>
                                <p class="mb-0"><span>Líquido em vendas neste mês</span></p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xxl-4">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="status text-success bg-success p-3 br-10">
                                        <i class="material-icons-outlined">pending</i>
                                        <span class="h6">{178} Pedidos</span>
                                        <span>Pendentes</span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="status text-dark bg-dark p-3 br-10">
                                        <i class="material-icons-outlined">hourglass_empty</i>
                                        <span class="h6">{375} Pedidos</span>
                                        <span>Em espera</span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="status text-warning bg-warning p-3 br-10">
                                        <i class="material-icons-outlined">feedback</i>
                                        <span class="h6">{789} Produtos</span>
                                        <span>Com estoque baixo</span>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <div class="status text-danger bg-danger p-3 br-10">
                                        <i class="material-icons-outlined">disabled_by_default</i>
                                        <span class="h6">{148} Produtos</span>
                                        <span>Sem estoque</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- row Finanças -->

                    <div class="row mt-3">
                        <div class="col-12">
                            <h2 class="h5">Dados Gerais</h2>
                        </div>
                        <div class="col-12 mt-2 d-flex flex-wrap">
                            <a href="#" class="btn btn-outline-dark btn-sm br-100 mb-3 me-2">Hoje</a>
                            <a href="#" class="btn btn-outline-dark btn-sm br-100 mb-3 me-2">Últimos 7 dias</a>
                            <a href="#" class="btn btn-outline-dark btn-sm br-100 mb-3 me-2">Este mês</a>
                            <a href="#" class="btn btn-outline-dark btn-sm br-100 mb-3 me-2">Este trimestre</a>
                            <a href="#" class="btn btn-outline-dark btn-sm br-100 mb-3 me-2">Este ano</a>
                            <a href="#" class="btn btn-outline-dark btn-sm active br-100 mb-3">Personalizado</a>
                        </div>
                        <div class="col-12 col-lg-8 mt-2">
                            <form action="#" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12 col-md-6 my-2">
                                        <label for="data-start" class="form-label h6">Desde</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="data-start"><i class="material-icons-outlined">calendar_month</i></span>
                                            <input type="date" name="start" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 my-2">
                                        <label for="data-end" class="form-label h6">Até</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="data-end"><i class="material-icons-outlined">calendar_month</i></span>
                                            <input type="date" name="end" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- Filtros -->

                    <div class="content-info">
                        <table class="table table-light table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Pedido</th>
                                <th scope="col">Data</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a href="#" class="text-primary">#{Número Pedido} {Nome do cliente}</a></td>
                                <td class="d-flex align-items-center"><i class="material-icons-outlined text-primary me-2">
info
</i> {Data do pedido}</td>
                                <td><span class="status bg-success text-success px-2 py-1 br-100"><span>{Status}</span></span></td>
                                <td>R$ {Valor do pedido}</td>
                            </tr>

                            <tr>
                                <td><a href="#" class="text-primary">#5879 Bruno Moreira Alves</a></td>
                                <td class="d-flex align-items-center"><i class="material-icons-outlined text-primary me-2">info</i> 19 de Setembro de 2022</td>
                                <td><span class="status bg-warning text-warning px-2 py-1 br-100 me-2"><span>Em disputa</span></span></td>
                                <td>R$ 1.925,53</td>
                            </tr>

                            <tr>
                                <td><a href="#" class="text-primary">#4857 Matheus M. Quirino</a></td>
                                <td class="d-flex align-items-center"><i class="material-icons-outlined text-primary me-2">info</i> 19 de Setembro de 2022</td>
                                <td><span class="status bg-danger text-danger px-2 py-1 br-100"><span>Mal sucedido</span></span></td>
                                <td>R$ 925,53</td>
                            </tr>

                            <tr>
                                <td><a href="#" class="text-primary">#4847 Filipe T. Praça</a></td>
                                <td class="d-flex align-items-center"><i class="material-icons-outlined text-primary me-2">info</i> 19 de Setembro de 2022</td>
                                <td><span class="status bg-success text-success px-2 py-1 br-100 me-2"><span>Finalizado</span></span> <span class="ms-3 status bg-dark text-dark px-2 py-1 br-100 me-2"><span>Pix de verificação manual Banco 041</span></span></td>
                                <td>R$ 925,53</td>
                            </tr>

                            <tr>
                                <td><a href="#" class="text-primary">#4847 Augusto Brenner</a></td>
                                <td class="d-flex align-items-center"><i class="material-icons-outlined text-primary me-2">info</i> 19 de Setembro de 2022</td>
                                <td><span class="status bg-dark text-dark px-2 py-1 br-100 me-2"><span>Cancelado</span></span></td>
                                <td>R$ 925,53</td>
                            </tr>

                            </tbody>
                        </table>
                    </div><!-- lista de pedidos -->
                    <div class="pagination d-flex align-items-center mt-3">
                        {total de pedidos} <a href="" class="btn btn-outline-primary p-0 py-1 mx-2 d-flex align-items-center justify-content-center"><i class="material-icons-outlined">
keyboard_arrow_left
</i></a> 1 de 2 <a href="" class="btn btn-outline-primary p-0 py-1 ms-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons-outlined">keyboard_arrow_right</i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php // Footer
require_once ('components/footer/footer.php'); ?>
</body>
</html>