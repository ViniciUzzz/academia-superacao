<?php include_once('C:/wamp64/www/superacao-academia/application/views/Admin/templates/aside.php'); ?>

<div class="body-wrapper">

    <?php include_once('C:\wamp64\www\superacao-academia\application\views\Admin\templates\head.php'); ?>

    <div class="container-fluid">
        <div class="container-fluid">
            <div class="container-fluid d-flex justify-content-between mb-3">
                <h1>Usuários</h1>
                <a href="<?php echo base_url("gerenciamento/registrar") ?>" class="btn btn-primary">
                    <i class="bi bi-person-add fs-6"></i>
                </a>
            </div>
            <div class="container-fluid mb-4">
                <label for="search-input" class="form-label">Pesquisar</label>
                <input type="text" name="search-input" id="search-input" class="form-control" placeholder="Digite o nome do usuário...">
            </div>
            <div class="container-fluid" style="display: <?php $msg = $this->session->tempdata('msg_register_correct'); echo isset($msg) ? "block" : "none"; ?>;">
                <div class='alert alert-success'>
                    <?php 
                        $msg = $this->session->tempdata('msg_register_correct'); 
                        echo isset($msg) ? $this->session->tempdata('msg_register_correct') : ""; 
                    ?>
                </div>
            </div>
            <div class="card">
                <div class="table-responsive custom-table">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="col" style="min-width: 200px">Nome</th>
                                <th class="col" style="min-width: 150px">Celular</th>
                                <th style="min-width: 150px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($get_users as $user): ?>
                            <tr>
                                <td class="col"><?php echo $user->full_name ?></td>
                                <td class="col"><?php echo $user->phone ?></td>
                                <td class="col">
                                    <a href="<?php echo base_url("gerenciamento/alterar_usuario/$user->id")?>">
                                        <i class="bi bi-pencil-square fs-5 me-3" title="Alterar"></i>
                                    </a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delete_user_<?php echo $user->id ?>">
                                        <i class="bi bi-trash fs-5 me-3" title="Excluir"></i>
                                    </a>
                                    <a href="<?php echo base_url("gerenciamento/avaliacoes_usuario/$user->id")?>">
                                        <i class="bi bi-card-checklist fs-5 me-3" title="Avaliações"></i>
                                    </a>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="delete_user_<?php echo $user->id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete_userLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="delete_userLabel">Deseja excluir permanentemente essa Avaliação?</h1>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Fechar
                                            </button>
                                            <a href="<?php echo base_url("admin/managerusers/delete_user/$user->id")?>" class="btn btn-primary">
                                                Sim
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>