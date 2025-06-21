<?= $this->extend('base-layout/main.blade.php') ?>

<?= $this->section('content') ?>
<div class="container-xlg pt-3 mx-5">
    <div class="row">
        <h2 class="d-flex justify-content-center">OVERDUE BOOKS</h2>
        <table class="table table-responsive table-hover text-center text-capitalize">
            <thead>
                <tr>
                    <th scope="col">Book ID</th>
                    <th scope="col">Member ID</th>
                    <th scope="col">Borrowed Date</th>
                    <th scope="col">Date to Return</th>
                </tr>
            </thead>
            <tbody class="table-container">
                <?php foreach ($overdueBooks as $overdueBook) : ?>
                    <tr>
                        <td class="book-id"><?= $overdueBook['book_id'] ?></td>
                        <td class="member-id"><?= ($overdueBook['member_id']) ? $overdueBook['member_id'] : $overdueBook['user_id'] ?></td>
                        <td class="borrowed-date"><?= $overdueBook['borrowed_date'] ?></td>
                        <td class="book-return"><?= $overdueBook['book_return'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?= $this->endSection() ?>