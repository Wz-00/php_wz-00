    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.3/css/dataTables.bootstrap5.css">

    <div class="container">
        <div class="table-person my-5">
            <h1>DataTable Person</h1>
            <table class="table table-striped" id="example">
                <thead>
                    <tr class="align-self-center">
                        <th scope="col" class="text-start">Id</th>
                        <th scope="col" class="text-start">Nama</th>
                        <th scope="col" class="text-start">Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $persons = getAllPerson($pdo);
                        foreach ($persons as $person):
                    ?>
                        <tr>
                            <td class="text-start"><?= $person['id'] ?></td>
                            <td class="text-start"><?= $person['nama'] ?></td>
                            <td class="text-start"><?= $person['alamat'] ?></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
