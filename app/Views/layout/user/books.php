<?= $this->extend('base-layout/user.blade.php') ?>

<?= $this->section('content') ?>

    <div class="container-xlg pt-3 mx-4">
        <h2 class="mb-4">📖 Browse Books</h2>
        <?php if (session()->getFlashdata('confirm')) : ?>
            <div class="alert alert-success alert-dismissible fade show w-100 text-center" role="alert">
                <?= session()->getFlashdata('confirm')  ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <div class="row px-4 d-flex justify-content-center card-container">
    
        <?php foreach ($books as $book) : ?>
            <div class="col d-flex justify-content-center mt-3" id="<?= $book['book_id'] ?>">
                <div class="card p-2 rounded-4" style="width: 18rem;">
                    <img src="<?= base_url('images/' . $book['book_img']) ?>" class="card-img-top img-fluid" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title title"><?= $book['title'] ?></h5>
                        <p class="card-text author"><?= $book['author'] ?></p>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="user/borrow/<?= $book['book_id'] ?>" type="button" class="btn btn-outline-success card-btn">Borrow Books</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


<?= $this->endSection() ?>