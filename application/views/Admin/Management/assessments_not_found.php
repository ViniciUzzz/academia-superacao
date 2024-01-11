<?php include_once('C:/wamp64/www/superacao-academia/application/views/Admin/templates/aside.php'); ?>

<div class="body-wrapper">

    <?php include_once('C:\wamp64\www\superacao-academia\application\views\Admin\templates\head.php'); ?>

    <div class="container-fluid">
        <div class="container-fluid">
            <div class="d-flex flex-column align-content-center">
                <?php if($user_info->admin): ?>
                    <p class="m-0 pt-3 fs-6"><strong>Nenhuma avaliação encontrada!</strong><br>
                        Faça uma agora mesmo <?php echo "\xf0\x9f\x98\x89"?>
                    </p>
                <?php else: ?>
                    <p class="m-0 pt-3 fs-6"><strong>Nenhuma avaliação encontrada!</strong><br>
                        Solicite a sua avaliação com um profissional da academia <?php echo "\xf0\x9f\x98\x89"?>
                    </p>
                <?php endif; ?>
                <div class="mt-3" style="display: <?php echo $user_info->admin ? "flex" : "none" ?>;">
                    <a href="<?php echo base_url("gerenciamento/registrar_avaliacao") ?>" class="btn btn-primary">
                    <i class="bi bi-file-earmark-plus fs-6"></i> <span class="ms-2">Nova avaliação</span>
                    </a>
                </div>
            </div>
            <div class="container-fluid" style="display: <?php $msg = $this->session->tempdata('msg_register_correct'); echo isset($msg) ? "block" : "none"; ?>;">
                <div class='alert alert-success'>
                    <?php 
                        $msg = $this->session->tempdata('msg_register_correct'); 
                        echo isset($msg) ? $this->session->tempdata('msg_register_correct') : ""; 
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>