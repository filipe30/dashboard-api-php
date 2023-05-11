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
                        <p>Bem-vindo(a) de volta, <b><?= $response->{'nome'}; ?></b>.<br>Tudo certo para vender muito hoje?</p>
                        <p><strong>Meu Plano</strong> <span class="badge bg-primary">Enterprise</span></p>
                    </div>
                </div>
                <div class="content">

                    <h4>Acesso rápido</h4>

                    <div class="row">
                        <div class="col-6 col-lg-3 col-xxl-2">
                            <div class="card mini-card">
                                <div class="card-body">
                                    <i class="material-icons-outlined">brush</i>
                                    <h6>Personalização da loja</h6>
                                    <a href="" class="btn primary-button reverse">Acessar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-xxl-2">
                            <div class="card mini-card">
                                <div class="card-body">
                                    <i class="material-icons-outlined">sell</i>
                                    <h6>Cadastro de produtos</h6>
                                    <a href="produto.php" class="btn primary-button reverse">Acessar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-xxl-2">
                            <div class="card mini-card">
                                <div class="card-body">
                                    <i class="material-icons-outlined">local_shipping</i>
                                    <h6>Forma de entrega</h6>
                                    <a href="" class="btn primary-button reverse">Acessar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-xxl-2">
                            <div class="card mini-card">
                                <div class="card-body">
                                    <i class="material-icons-outlined">account_balance_wallet</i>
                                    <h6>Meios de pagamento</h6>
                                    <a href="" class="btn primary-button reverse">Acessar</a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- row -->
                    <div class="row mt-5 mx-0">
                        <h4><i class="material-icons-outlined">star_border</i> Novidades da Trido para a sua loja</h4>
                        <div id="promos" class="swiper mt-2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <figure>
                                        <img class="img-fluid" src="imgs/slide-first-01.jpg" alt="">
                                    </figure>
                                </div>
                                <div class="swiper-slide">
                                    <figure>
                                        <img class="img-fluid" src="imgs/slide-first-02.jpg" alt="">
                                    </figure>
                                </div>
                                <div class="swiper-slide">
                                    <figure>
                                        <img class="img-fluid" src="imgs/slide-first-03.jpg" alt="">
                                    </figure>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <script>
                            const clientSlide = new Swiper('#promos', {
                                loop: false,
                                simulateTouch: true,
                                autoplay: { delay: 5000 },
                                speed: 1000,
                                pagination: {
                                    el: '.swiper-pagination',
                                    type: 'bullets',
                                    clickable: true,
                                },
                                slidesPerView: 1.1,
                                spaceBetween: 15,
                                // Responsive breakpoints
                            });
                        </script>
                    </div> <!-- Carrossel 01 -->

                    <div class="row mt-5 mx-0">
                        <h4><i class="material-icons-outlined">video_library</i> Aprenda a deixar sua loja ainda mais profissional com nossos tutoriais</h4>
                        <div id="videos" class="swiper mt-2">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <figure>
                                        <img class="img-fluid" src="imgs/slide-sec-01.jpg" alt="">
                                    </figure>
                                </div>
                                <div class="swiper-slide">
                                    <figure>
                                        <img class="img-fluid" src="imgs/slide-sec-02.jpg" alt="">
                                    </figure>
                                </div>
                                <div class="swiper-slide">
                                    <figure>
                                        <img class="img-fluid" src="imgs/slide-sec-03.jpg" alt="">
                                    </figure>
                                </div>
                                <div class="swiper-slide">
                                    <figure>
                                        <img class="img-fluid" src="imgs/slide-sec-04.jpg" alt="">
                                    </figure>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <script>
                            const courseSlide = new Swiper('#videos', {
                                loop: false,
                                simulateTouch: true,
                                autoplay: { delay: 5000 },
                                speed: 1000,
                                pagination: {
                                    el: '.swiper-pagination',
                                    type: 'bullets',
                                    clickable: true,
                                },
                                slidesPerView: 3.1,
                                spaceBetween: 15,
                                // Responsive breakpoints
                            });
                        </script>
                    </div> <!-- Carrossel 02 -->

                </div>
            </div>
        </div>
    </div>
</div>
<?php // Footer
require_once ('components/footer/footer.php'); ?>
</body>
</html>