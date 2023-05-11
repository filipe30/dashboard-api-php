
<div class="sidebar">
    <figure>
        <img class="img-fluid" src="assets/images/logo.png" alt="Bem vindo <?= $response->{'nome'}; ?>, tenha um dia excelente!">
    </figure>
    <div class="side-item">
        <div class="title">
            <i class="material-icons-outlined">person_pin</i>
            <span class="h6 mb-0">
               <?= $response->{'nome'}; ?>
            </span>
        </div>
        <a href="" class="btn primary-button active">
            <i class="material-icons-outlined">home</i>
            <span>Início</span>
        </a>
        <a href="vendas.php" class="btn primary-button">
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
