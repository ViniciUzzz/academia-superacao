<?php include_once('C:/wamp64/www/superacao-academia/application/views/Admin/templates/aside.php'); ?>

<div class="body-wrapper">

    <?php include_once('C:\wamp64\www\superacao-academia\application\views\Admin\templates\head.php'); ?>

    <div class="container-fluid custom-user-select">
        <div class="card rounded-4">
            <div class="card-body">
                <?php  echo form_open_multipart("admin/management/assessments/validate_assessments_registration"); ?>
                    <div class="row mb-3">
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="select-user" class="form-label">Usuários</label>
                            <select class="form-select" id="select-user" name="select-user" required>
                                <?php if ($user_info->admin): ?>
                                    <option value="" <?php echo set_select("select-user", "", TRUE); ?>>Selecione o usuário</option>
                                    <?php foreach ($registered_users as $user): ?>
                                        <option value="<?php echo $user->id?>"> <?php echo $user->full_name?> </option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="<?php echo $user_info->id ?>"> <?php echo $user_info->full_name ?> </option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text-birth_date" class="form-label">Data Nasc.</label>
                            <input 
                                type="date" 
                                class="form-control" 
                                id="text-birth_date" 
                                name="text-birth_date"
                                value="<?php echo set_value("text-birth_date") ?>"
                            >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text-height" class="form-label">Altura <span>(cm)</span></label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="text-height" 
                                name="text-height"
                                placeholder="ex: 170"
                                maxlength="3"
                                value="<?php echo set_value("text-height") ?>"
                                oninput="validationInput(this)"
                                required
                                >
                        </div>
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text-current_weight" class="form-label">Peso Atual (kg)<span></span></label>
                            <input 
                                type="text"
                                class="form-control" 
                                id="text-current_weight" 
                                name="text-current_weight"
                                placeholder="ex: 80.520"
                                maxlength="7"
                                value="<?php echo set_value("text-current_weight") ?>"
                                oninput="validationInput(this)"
                                required
                                >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text-waist_circumf" class="form-label">Circunferência da Cintura <span>(cm)</span></label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="text-waist_circumf" 
                                name="text-waist_circumf"
                                placeholder="ex: 60.3"
                                maxlength="7"
                                value="<?php echo set_value("text-waist_circumf") ?>"
                                oninput="validationInput(this)"
                                required
                                >
                        </div>
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text-hip_circumf" class="form-label">Circunferência do quadril <span>(cm)</span></label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="text-hip_circumf" 
                                name="text-hip_circumf"
                                placeholder="ex: 60.3"
                                maxlength="6"
                                value="<?php echo set_value("text-hip_circumf") ?>"
                                oninput="validationInput(this)"
                                required
                                >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text-left_arm_circumf" class="form-label">Circunferência - Braço Esquerdo <span>(cm)</span></label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="text-left_arm_circumf" 
                                name="text-left_arm_circumf"
                                placeholder="ex: 30.00"
                                maxlength="6"
                                value="<?php echo set_value("text-left_arm_circumf") ?>"
                                oninput="validationInput(this)"
                                required
                                >
                        </div>
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text-right_arm_circumf" class="form-label">Circunferência - Braço Direito. <span>(cm)</span></label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="text-right_arm_circumf" 
                                name="text-right_arm_circumf"
                                placeholder="ex: 30.00"
                                maxlength="6"
                                value="<?php echo set_value("text-right_arm_circumf") ?>"
                                oninput="validationInput(this)"
                                required
                                >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text-left_thigh_circumf" class="form-label">Circunferência - Coxa Esquerdo <span>(cm)</span></label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="text-left_thigh_circumf" 
                                name="text-left_thigh_circumf"
                                placeholder="ex: 30.00"
                                maxlength="6"
                                value="<?php echo set_value("text-left_thigh_circumf") ?>"
                                oninput="validationInput(this)"
                                required
                                >
                        </div>
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text-right_thigh_circumf" class="form-label">Circunferência - Coxa Direito. <span>(cm)</span></label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="text-right_thigh_circumf" 
                                name="text-right_thigh_circumf"
                                placeholder="ex: 30.00"
                                maxlength="6"
                                value="<?php echo set_value("text-right_thigh_circumf") ?>"
                                oninput="validationInput(this)"
                                required
                                >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text-body_fat" class="form-label">Gordura Corporal<span>(%)</span></label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="text-body_fat" 
                                name="text-body_fat"
                                placeholder="ex: 15.50"
                                maxlength="5"
                                value="<?php echo set_value("text-body_fat") ?>"
                                oninput="validationInput(this)"
                                required
                                >
                        </div>
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text-lean_mass" class="form-label">Massa Magra <span>(kg)</span></label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="text-lean_mass" 
                                name="text-lean_mass"
                                placeholder="ex: 55.00"
                                maxlength="7"
                                value="<?php echo set_value("text-lean_mass") ?>"
                                oninput="validationInput(this)"
                                required
                                >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="text-fat_mass" class="form-label">Massa Gorda<span>(kg)</span></label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="text-fat_mass" 
                                name="text-fat_mass"
                                placeholder="ex: 15.50"
                                maxlength="7"
                                value="<?php echo set_value("text-fat_mass") ?>"
                                oninput="validationInput(this)"
                                required
                                >
                        </div>
                        <div class="col col-12 col-sm-6 mt-3">
                            <label for="select-objective" class="form-label">Objetivo</label>
                            <select class="form-select" id="select-objective" name="select-objective" required>
                                <option value="" <?php echo set_select("select-objective", "", TRUE); ?>>Selecione o objetivo</option>
                                <option value="Perda de Peso" <?php echo set_select("select-objective", "Perda de Peso"); ?>>Perda de Peso</option>
                                <option value="Ganho de Massa" <?php echo set_select("select-objective", "Ganho de Massa"); ?>>Ganho de Massa</option>
                            </select>
                        </div>
                        <?php echo validation_errors("<div class='alert alert-danger'>", "</div>"); ?>
                        <div class="row my-5">
                            <div class="col-12 d-flex justify-content-end">
                                <a type="button" href="<?php echo base_url("gerenciamento/avaliacoes")?>" class="btn btn-light px-4 mx-3">
                                    <i class="bi bi-arrow-left-circle me-2"></i> Voltar
                                </a>
                                <button type="submit" class="btn btn-primary px-4">
                                    Inserir
                                </button>
                            </div>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>