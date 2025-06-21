<?= $this->extend('base-layout/main.blade.php') ?>

<?= $this->section('content') ?>

<div class="container-xlg pt-3 mx-4 p-5">
    <div class="row d-flex justify-content-center">
        <div class="col col-md-9 col-lg-8">
            <div class="card">
                <h5 class="card-header">Borrow Book</h5>
                <div class="card-body">
                    <div class="row">
                        <form action="/book/borrow/" method="POST">
                            <?php csrf_field () ?>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label fw-bold">Title</label>
                                <input type="text" class="form-control" name="title" value="<?= $books['title'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label fw-bold">Book ID</label>
                                <input type="number" class="form-control" name="bookId" value="<?= $books['book_id'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label fw-bold">Member Id</label>
                                <input type="number" class="form-control" name="memberId">
                            </div>
                            <a href="/home" class="btn btn-danger ms-4">Back</a>
                            <button type="submit" class="btn btn-primary m-4">Borrow Book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>