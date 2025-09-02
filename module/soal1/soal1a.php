<?php
// debug helpers
ini_set('display_errors', 1);
error_reporting(E_ALL);

function e($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }

// limit to 20 rows and cols
define('MAX_ROWS', 20);
define('MAX_COLS', 20);

$step = isset($_POST['step']) ? (int) $_POST['step'] : 0;
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="container my-5">

<?php
// tampilan awal
if ($step === 0):
    $old_baris = isset($_POST['baris']) ? (int)$_POST['baris'] : '';
    $old_kolom = isset($_POST['kolom']) ? (int)$_POST['kolom'] : '';
    ?>
    <div class="card p-3">
        <form method="POST" novalidate>
            <div class="row my-3 align-items-center">
                <div class="col-3"><strong>Inputkan Jumlah Baris:</strong></div>
                <div class="col-9">
                    <input name="baris" type="number" min="1" max="<?=MAX_ROWS?>" value="<?=e($old_baris)?>" class="form-control" placeholder="Contoh: 2" required>
                    <div class="form-text">Maks <?=MAX_ROWS?> baris.</div>
                </div>
            </div>

            <div class="row my-3 align-items-center">
                <div class="col-3"><strong>Inputkan Jumlah Kolom:</strong></div>
                <div class="col-9">
                    <input name="kolom" type="number" min="1" max="<?=MAX_COLS?>" value="<?=e($old_kolom)?>" class="form-control" placeholder="Contoh: 3" required>
                    <div class="form-text">Maks <?=MAX_COLS?> kolom.</div>
                </div>
            </div>

            <input type="hidden" name="step" value="1">
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="submit"><b>Submit</b></button>
            </div>
        </form>
    </div>

<?php
// generate 
elseif ($step === 1):
    $baris = isset($_POST['baris']) ? (int)$_POST['baris'] : 0;
    $kolom = isset($_POST['kolom']) ? (int)$_POST['kolom'] : 0;

    // validasi dasar
    if ($baris < 1 || $kolom < 1) {
        echo "<script>Swal.fire('Error','Jumlah baris & kolom harus >= 1','error');</script>";
    } elseif ($baris > MAX_ROWS || $kolom > MAX_COLS) {
        echo "<script>Swal.fire('Error','Melebihi batas maksimum','error');</script>";
    } else {
        ?>
        <div class="card p-3">
            <form method="POST" novalidate>
                <?php
                for ($i = 1; $i <= $baris; $i++) {
                    echo '<div class="row mb-3">';
                    for ($j = 1; $j <= $kolom; $j++) {
                        echo '<div class="col-sm">';
                        echo '<label class="form-label"><b>' . e("$i.$j") . '</b></label>';
                        echo '<input type="text" name="data['. $i .']['. $j .']" class="form-control" required>';
                        echo '</div>';
                    }
                    echo '</div>';
                }
                ?>
                <input type="hidden" name="baris" value="<?=e($baris)?>">
                <input type="hidden" name="kolom" value="<?=e($kolom)?>">
                <input type="hidden" name="step" value="2">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
        <?php
    }
    // END STEP 1

// Result
elseif ($step === 2):
    $data = isset($_POST['data']) && is_array($_POST['data']) ? $_POST['data'] : null;

    if ($data === null) {
        echo "<script>Swal.fire('Error','Data tidak ditemukan. Coba ulangi.','error');</script>";
    } else {
        ?>
        <div class="card p-3">
            <h4>Hasil Input:</h4>
            <div class="list-group">
                <?php
                foreach ($data as $i => $kol) {
                    if (!is_array($kol)) continue;
                    foreach ($kol as $j => $val) {
                        // escape output
                        $valEsc = e($val);
                        echo "<div class='list-group-item'><strong>$i.$j :</strong> $valEsc</div>";
                    }
                }
                ?>
            </div>

            <div class="mt-3 d-flex gap-2">
                <form method="POST" style="display:inline">
                    <!-- start over -->
                    <button class="btn btn-outline-primary" type="submit">Mulai Lagi</button>
                </form>

                <form method="POST" style="display:inline">
                    <!-- form for edit previous value -->
                    <?php
                    $b = isset($_POST['baris']) ? (int)$_POST['baris'] : '';
                    $k = isset($_POST['kolom']) ? (int)$_POST['kolom'] : '';
                    ?>
                    <input type="hidden" name="baris" value="<?=e($b)?>">
                    <input type="hidden" name="kolom" value="<?=e($k)?>">
                    <input type="hidden" name="step" value="1">
                    <button class="btn btn-outline-secondary" type="submit">Edit</button>
                </form>
            </div>
        </div>
        <?php
    }
endif;
?>



