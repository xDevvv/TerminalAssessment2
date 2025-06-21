<?= $this->extend('base-layout/main.blade.php') ?>

<?= $this->section('content') ?>
    <div class="container-xlg pt-3 mx-5 d-none d-lg-block">
        <div class="row">
            <h2 class="d-flex justify-content-center">BORROWED BOOK</h2>
            <table class="table table-responsive table-hover text-center text-capitalize">
                <thead>
                    <tr>
                        <th scope="col">Borrow ID</th>
                        <th scope="col">Book ID</th>
                        <th scope="col">Member ID</th>
                        <th scope="col">Borrowed Date</th>
                        <th scope="col">Date to Return</th>
                        <th>
                            <a href="/returned" class="btn btn-outline-danger" scope="col">Returned Logs</a>
                        </th>
                    </tr>
                </thead>
                <tbody class="table-container">
                    <?php foreach ($borrowedBooks as $borrowedBook) : ?>
                        <tr>
                            <td class="borrow-id"><?= $borrowedBook['borrow_id'] ?></td>
                            <td class="book-id"><?= $borrowedBook['book_id'] ?></td>
                            <td class="member-id"><?= ($borrowedBook['member_id']) ? $borrowedBook['member_id'] : $borrowedBook['user_id'] ?></td>
                            <td class="borrowed-date"><?= $borrowedBook['borrowed_date'] ?></td>
                            <td class="return-date"><?= $borrowedBook['book_return'] ?></td>
                            <th>
                                <a href="returned/<?= $borrowedBook['borrow_id'] ?>" class="btn btn-outline-success">Return Book</a>
                            </th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container-xlg d-block d-lg-none pt-3 mx-5">
        <div class="row d-flex justify-content-center">
            <div class="container d-flex justify-content-around mb-3">
                <h2>Borrowed Logs</h2>
                <a href="/returned" class="btn btn-outline-danger" scope="col">Returned Logs</a>
            </div>
            <?php foreach ($borrowedBooks as $borrowedBook) : ?>
                <div class="col-sm-6 mb-3 mb-sm-0 d-flex flex-column">
                    <div class="card flex-fill">
                        <div class="card-body flex-fill">
                            <h5 class="card-title">Borrow ID: <?= $borrowedBook['borrow_id'] ?> </h5>
                            <p class="card-text">Book ID: <span><?= $borrowedBook['book_id']  ?></span></p>
                            <p class="card-text">Member ID: <span><?= $borrowedBook['member_id'] ?></span></p>
                            <p class="card-text">Borrowed Date: <span><?= $borrowedBook['borrowed_date'] ?></span></p>
                            <p class="card-text">Book Return: <span><?= $borrowedBook['book_return'] ?></span></p>
                        </div>
                        <a href="#" class="btn btn-outline-success">Return Book</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?= $this->endSection() ?>