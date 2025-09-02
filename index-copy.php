<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.3/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a href="/" class="navbar-brand">PHP Wz-00</a>
            <div class="justify-content-center">
                <ul class="navbar-nav gap-5">
                    <li class="nav-item"><a class="nav-link fw-medium scroll-link" href="?page=soal1/soal1a">Soal 1</a></li>
                    <li class="nav-item">
                        <div class="dropdown-center">
                            <a class="nav-link fw-medium scroll-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Soal 2</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?page=soal2/soal2a">Soal 2A</a></li>
                                <li><a class="dropdown-item" href="?page=soal2/soal2b">Soal 2B</a></li>
                                <li><a class="dropdown-item" href="?page=soal2/soal2c">Soal 2C</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="content">
            <div class="title d-flex justify-content-center">
                <h1>See my final test</h1>
            </div>
            <div class="row">
                <div class="col-6">
                    <a href="?page=soal1/soal1a" class="btn btn-primary">Soal 1</a>
                </div>
                <div class="col-6">
                    <div class="dropdown-center">
                        <button class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Soal 2</button>
                        <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="soal2/soal2a.php">Soal 2A</a></li>
                                <li><a class="dropdown-item" href="soal2/soal2b.php">Soal 2B</a></li>
                                <li><a class="dropdown-item" href="soal2/soal2c.php">Soal 2C</a></li>
                            </ul>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.3/js/dataTables.bootstrap5.js"></script>
</body>
</html>