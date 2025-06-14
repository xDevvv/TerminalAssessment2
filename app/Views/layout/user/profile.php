<?= $this->extend('base-layout/user.blade.php') ?>

<?= $this->section('content') ?>

    <div class="container-xlg pt-3 mx-4">

        <h2 class="mb-4">👤 My Profile</h2>
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <table class="table table-borderless">
                            <tr>
                                <th>Name:</th>
                                <td><?= session()->get('name') ?></td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td><?= $user['email'] ?></td>
                            </tr>
                            <tr>
                                <th>Role:</th>
                                <td><span class="badge bg-info text-dark">user</span></td>
                            </tr>
                            <tr>
                                <th>Member Since:</th>
                                <td><?= $user['date_registered'] ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($user['username']) ?>&size=120&background=0D8ABC&color=fff" alt="Avatar" class="rounded-circle mb-3">
                        <div>
                            <a href="/user/edit_profile" class="btn btn-outline-primary btn-sm">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>