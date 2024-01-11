<?php include_once('C:/wamp64/www/superacao-academia/application/views/Admin/templates/aside.php'); ?>

<div class="body-wrapper">

    <?php include_once('C:\wamp64\www\superacao-academia\application\views\Admin\templates\head.php'); ?>

    <div class="container-fluid">
        <div class="container-fluid">
            <div class="container-fluid d-flex justify-content-between mb-3">
                <h1>Avaliações</h1>
                <a href="<?php echo base_url("gerenciamento/registrar_avaliacao") ?>" class="btn btn-primary" style="display: <?php echo $user_info->admin ? "flex" : "none" ?>;">
                    <i class="bi bi-file-earmark-plus fs-6" title="Nova Avaliação"></i>
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
                <div class="custom-table table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="col" style="min-width: 150px">Nome</th>
                                <th class="col" style="min-width: 150px">Peso atual</th>
                                <th class="col" style="min-width: 200px">Objetivo</th>
                                <th class="col" style="min-width: 140px">Data Avaliação</th>
                                <th class="col" style="min-width: 100px; display: <?php echo $is_details_user ? 'none' : 'block'; ?>">Qtd. Avaliações</th>
                                <th style="min-width: 110px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($sumary_assessments as $assessment): ?>
                            <tr>
                                <td class="col"><?php echo $assessment->full_name ?></td>
                                <td class="col"><?php echo $assessment->current_weight ?> kg</td>
                                <td class="col"><?php echo $assessment->objective ?></td>
                                <td class="col"><?php echo date("d/m/Y", strtotime($assessment->assessment_date)) ?></td>
                                <td class="col" style="display: <?php echo $is_details_user ? 'none' : 'table-cell'; ?>">
                                    <a href=""><?php echo $assessment->assessment_count ?></a>
                                </td>
                                <td class="col">
                                    <a href="<?php echo base_url("gerenciamento/alterar_avaliacao/$assessment->id")?>">
                                        <i class="bi bi-clipboard-data fs-5 me-3" title=<?php echo $user_info->admin ? "Alterar" : "Detalhes" ?>></i>
                                    </a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delete_assessements_<?php echo $assessment->id ?>">
                                        <i class="bi bi-trash fs-5 me-3" title="Excluir"></i>
                                    </a>
                                </td>
                                <!-- Modal -->
                                <div class="modal fade" id="delete_assessements_<?php echo $assessment->id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delete_userLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="delete_assessementsLabel">Deseja excluir permanentemente essa Avaliação?</h1>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Fechar
                                                </button>
                                                <a href="<?php echo base_url("admin/management/assessments/delete_assessment/$assessment->id")?>" class="btn btn-primary">
                                                    Sim
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>