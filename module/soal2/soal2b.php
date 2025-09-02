    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.3/css/dataTables.bootstrap5.css">

    <div class="container">
        <div class="table-hobi my-5">
            <h1>DataTable Hobi</h1>
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
                        $hobbies = getAllHobby($pdo);
                        foreach ($hobbies as $hobby):
                    ?>
                        <tr>
                            <td class="text-start"><?= $hobby['id'] ?></td>
                            <td class="text-start"><?= $hobby['person_id'] ?></td>
                            <td class="text-start"><?= $hobby['hobi'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>