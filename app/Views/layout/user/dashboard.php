<?= $this->extend('base-layout/user.blade.php') ?>

<?= $this->section('content') ?>
    <div class="container-xlg pt-3 mx-4">
        <div class="row mb-4">
            <div class="col-12">
                <div class="bg-light p-4 rounded shadow-sm">
                    <h2 class="mb-2">
                        Welcome, <?= session()->get('name') ?>
                    </h2>
                    <p class="text-muted">Here's a quick overview of your library activity.</p>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center g-4">
            <!-- Card: Borrowed Books -->
            <div class="col-md-4">
                <div class="card shadow border-0 h-100">
                    <div class="card-body">
                        <h5 class="card-title">Borrowed Books</h5>
                        <p class="display-5 fw-bold text-primary"><?= $borrowedBooksCount ?></p>
                        <a href="/user_borrowed_Books" class="btn btn-sm btn-outline-primary">View Borrowed Books</a>
                    </div>
                </div>
            </div>

            <!-- Card: Available Books -->
            <div class="col-md-4">
                <div class="card shadow border-0 h-100">
                    <div class="card-body">
                        <h5 class="card-title">Available Books</h5>
                        <p class="display-5 fw-bold text-success"><?= $bookCount ?></p>
                        <a href="/available" class="btn btn-sm btn-outline-success">Browse Library</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

<?= $this->endSection() ?>