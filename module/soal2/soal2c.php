    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.3/css/dataTables.bootstrap5.css">

    <div class="container">
        <div class="table-hobi-count my-5">
            <h1>DataTable Hobi</h1>
            <table class="table table-striped" id="example">
                <thead>
                    <tr class="align-self-center">
                        <th scope="col" class="text-start">Hobi</th>
                        <th scope="col" class="text-start">Jumlah Person</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $counts = hobbyCount($pdo);
                        foreach ($counts as $count):
                    ?>
                        <tr>
                            <td class="text-start"><?= htmlspecialchars($count['hobi'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></td>
                            <td class="text-start"><?= (int)$count['jumlah_person'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    