<?= $this->extend('base-layout/user.blade.php') ?>

<?= $this->section('content') ?>

    <div class="container-xlg pt-3 mx-4">
        <div class="table-responsive shadow-sm">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="text-align: center;">Book ID</th>
                        <th style="text-align: center;">Borrow Date</th>
                        <th style="text-align: center;">Return Date</th>
                        <th style="text-align: center;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($borrowedBooks as $borrowedBook) : ?>
                        <tr>
                            <td style="text-align: center;"><?= $borrowedBook['book_id'] ?></td>
                            <td style="text-align: center;"><?= $borrowedBook['borrowed_date'] ?></td>
                            <td style="text-align: center;"><?= $borrowedBook['book_return'] ?></td>
                            <td style="text-align: center;">
                                <a href="returned/<?= $borrowedBook['borrow_id'] ?>" class="btn btn-outline-success">Return Book</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?= $this->endSection() ?>