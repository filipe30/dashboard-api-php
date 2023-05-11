<?php
global $end_url;
$btns = [
    0 => [
        'url' => 'alterar-pass.php',
        'title' => 'Alterar Senha',
    ],
    1 => [
        'url' => 'dados-cadastrais.php',
        'title' => 'Dados Cadastrais e cancelamento'
    ],
    2 => [
        'url' => 'planos.php',
        'title' => 'Planos'
    ],
    3 => [
        'url' => 'components/login/logout.php',
        'title' => 'Sair da conta <i class="material-icons-outlined position-relative" style="top: 5px">
logout
</i>',
    ]
];

?>

<div class="col-12 d-flex justify-content-between align-items-center flex-wrap">
    <h3>{Título da página}</h3>

    <div class="d-flex">
        <a href="#" class="btn">
            <i class="material-icons-outlined position-relative" style="top: 5px">
                notifications
            </i>
        </a>
        <div class="dropdown menu-admin">
            <button class="btn text-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="material-icons-outlined position-relative" style="top: 5px">account_circle</i> Minha conta
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li class="dropdown-item" type="button">
                    <div class="form-check form-switch ps-0 d-flex justify-content-between align-items-center">
                        <label class="form-check-label" for="tema-perfil">
                        <i class="material-icons-outlined position-relative" style="top: 5px; margin-right: 5px;" id="icon-prof">light_mode</i> <span id="text-perfil">Tema Claro</span>
                        </label>
                        <input class="form-check-input" type="checkbox" id="tema-perfil">
                    </div>
                </li>
                <li class="dropdown-item" type="button">
                    <div class="form-check p-3 d-flex justify-content-between align-items-center">
                        <a href="#">
                            <i class="material-icons-outlined position-relative text-dark" style="top: 0px; margin-right: 10px;" id="icon-prof">business</i>
                            <span class="text-primary">{Nome da loja}</span>
                        </a>
                    </div>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li><h6 class="dropdown-item-text">Minha conta</h6></li>
                <?php foreach ($btns as $btn) : ?>
                <li class="mt-2">
                    <a href="<?= $btn['url'] ?>" class="dropdown-item <?= $btn['url'] === $end_url ? 'active' : '' ?>" <?= $btn['url'] === $end_url ? 'aria-current="true"' : '' ?>><?= $btn['title'] ?></a>
                </li>
                <?php endforeach; ?>

            </ul>
        </div>
    </div>
</div>