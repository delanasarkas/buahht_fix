<?= $this->extend('template\dashboard_template') ?>

<?= $this->section('content') ?>
    <!-- VALIDATION PLUGIN -->
    <?php $validation = \Config\Services::validation(); ?>
    
    <h1><?= $title ?></h1>

    <!-- LOGIC LOGIN -->
    <form action="/settings/ip-ubah/<?= $data['id_ip'] ?>" method="post">
        <?= csrf_field(); ?>

        <!-- IP ADDRESS -->
        <label for="ipaddress">IP Address</label>
        <input type="text" class="form-control" value="<?= $data['address'] ?>" placeholder="IP Address" name="ipaddress" id="ipaddress">
        <!-- ERROR IP ADDRESS -->
        <?php if($validation->getError('ipaddress')) {?>
            <small style="color: red">
                <?= $error = $validation->getError('ipaddress'); ?>
            </small>
        <?php }?>

        <br/>
        <button type="submit">UBAH</button>
    </form>

<?= $this->endSection() ?>