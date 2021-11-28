<?= $this->extend('template\login_template') ?>

<?= $this->section('content') ?>
    <!-- VALIDATION PLUGIN -->
    <?php $validation = \Config\Services::validation(); ?>

    <h1>LOGIN</h1>
    <!-- LOGIC LOGIN -->
    <form action="/login/submit" method="post">
        <?= csrf_field(); ?>

        <!-- USERNAME -->
        <label for="username">Username</label>
        <input type="text" class="form-control" placeholder="Username" name="username" id="username">
        <!-- ERROR USERNAME -->
        <?php if($validation->getError('username')) {?>
            <small style="color: red">
                <?= $error = $validation->getError('username'); ?>
            </small>
        <?php }?>

        <br/>

        <!-- PASSWORD -->
        <label for="password">Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
        <!-- ERROR PASSWORD -->
        <?php if($validation->getError('password')) {?>
            <small style="color: red">
                <?= $error = $validation->getError('password'); ?>
            </small>
        <?php }?>

        <br/>
        <button type="submit">LOGIN</button>
    </form>

<?= $this->endSection() ?>