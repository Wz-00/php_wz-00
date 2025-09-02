<?php
$config = require 'config.php';
$dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";

try {
    $pdo = new PDO($dsn, $config['user'], $config['pass'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $e) {
    // Jangan tampilkan detail ke user — log saja
    error_log('DB conn error: ' . $e->getMessage());
    // Tampilkan pesan generik atau handle sesuai aplikasi
    http_response_code(500);
    exit('Terjadi kesalahan server.');
}

function getAllPerson(PDO $pdo){
    $sql = "SELECT id, nama, alamat FROM person";
    $stmt = $pdo->query($sql); 
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
function getAllHobby(PDO $pdo){
    $sql = "SELECT id, person_id, hobi FROM hobi";
    $stmt = $pdo->query($sql); 
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
function hobbyCount(PDO $pdo){
    $sql = "
        SELECT
            h.hobi,
            COUNT(DISTINCT h.person_id) AS jumlah_person
        FROM hobi h
        JOIN person p ON p.id = h.person_id
        GROUP BY h.hobi
        ORDER BY jumlah_person DESC, h.hobi ASC
    ";
    // Tidak ada input user -> kita bisa langsung query
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows ?: [];
}
?>