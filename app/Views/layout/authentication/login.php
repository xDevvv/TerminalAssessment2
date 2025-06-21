<?= $this->extend('base-layout/auth.blade.php') ?>

<?= $this->section('content') ?>
<div class="container-xlg">
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <?= form_open('login_user') ?>
            <?= csrf_field(); ?>
            <div class="container-xlg mx-5 input-container">
                <?php if (session()->getFlashdata('errors')): ?>
                    <?php foreach (session()->getFlashdata('errors') as $error => $value): ?>
                        <?php if ($error == 'error') : ?>
                            <div class="text-danger text-sm error d-flex justify-content-center">
                                <?= esc($value) ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
                    <label for="floatingInput">Username</label>
                    <?php if (session()->getFlashdata('errors')): ?>
                        <?php foreach (session()->getFlashdata('errors') as $error => $value): ?>
                            <?php if ($error == 'username') : ?>
                                <div class="text-danger text-sm error">
                                    <?= esc($value) ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <select style="text-align: center;" name="role" class="form-select mb-3">
                    <option value="" hidden> -- Select Role -- </option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                <?php if (session()->getFlashdata('errors')): ?>
                    <?php foreach (session()->getFlashdata('errors') as $error => $value): ?>
                        <?php if ($error == 'role') : ?>
                            <div class="text-danger text-sm error">
                                <?= esc($value) ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                    <label for="floatingPassword">Password</label>
                    <?php if (session()->getFlashdata('errors')): ?>
                        <?php foreach (session()->getFlashdata('errors') as $error => $value): ?>
                            <?php if ($error == 'password') : ?>
                                <div class="text-danger text-sm error">
                                    <?= esc($value) ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
                <p class="mt-3"><a class="link-opacity-100 text-decoration-none" href="register">Create An Account</a></p>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>