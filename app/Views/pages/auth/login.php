<?= $this->extend('template\login_template') ?>

<?= $this->section('content') ?>
    <!-- VALIDATION PLUGIN -->
    <?php $validation = \Config\Services::validation(); ?>

    <div class="text-center">
        <h3>LOGIN ADMIN</h3>
        <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <small class="text-danger"><?php echo session()->getFlashdata('error'); ?></small>
        <?php endif; ?>
    </div>
    <!-- LOGIC LOGIN -->
    <form action="/login/submit" method="post" class="mt-3">
        <?= csrf_field(); ?>

        <!-- USERNAME -->
        <label for="username" class="form-label">Username</label>
        <div class="input-group">
            <span class="input-group-text">
                <i class="fas fa-user"></i>
            </span>
            <input type="text" class="form-control is-invalid" placeholder="Username" name="username" id="username" oninput="inputValidation(event); buttonValid();">
        </div>
        <!-- ERROR USERNAME -->
        <?php if($validation->getError('username')) {?>
            <small class="text-danger">
                <?= $error = $validation->getError('username'); ?>
            </small>
        <?php }?>

        <br/>

        <!-- PASSWORD -->
        <label for="password" class="form-label">Password</label>
        <div class="input-group wrap-password">
            <span class="input-group-text">
                <i class="fas fa-lock"></i>
            </span>
            <input type="password" class="form-control is-invalid" placeholder="Password" name="password" id="password" oninput="inputValidation(event); buttonValid();">
            <div class="icon-password">
                <i class="far fa-eye text-secondary is-clickable" id="eye-icon" onclick="seePassword()"></i>
            </div>
        </div>
        <!-- ERROR PASSWORD -->
        <?php if($validation->getError('password')) {?>
            <small class="text-danger">
                <?= $error = $validation->getError('password'); ?>
            </small>
        <?php }?>

        <br/>
        <div class="d-grid">
            <button type="submit" class="btn btn-dark btn-block font-weight-bold" id="btn-login" onclick="buttonLoader()" disabled>LOGIN</button>
            <button type="button" class="btn btn-dark btn-block font-weight-bold d-none" id="btn-loader" disabled><i class="fas fa-spinner fa-pulse"></i> LOGIN</button>
        </div>
    </form>

<?= $this->endSection() ?>