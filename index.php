<?php
require 'template/header.php';
require 'template/navbar.php';

$moduleBase = realpath(__DIR__ . '/module');
$pageParam = isset($_GET['page']) ? trim($_GET['page'], "/\0") : '';

if ($pageParam === '') {
    include 'template/content.php';
} else {
    // blokir upaya traversal
    if (strpos($pageParam, '..') !== false) {
        http_response_code(400);
        echo 'Bad request';
    } else {
        // kumpulkan kandidat path yang mungkin
        $candidates = [];
        if (pathinfo($pageParam, PATHINFO_EXTENSION) === '') {
            // jika diberikan direktori: coba module/<page>/index.php lalu module/<page>.php
            $candidates[] = $moduleBase . DIRECTORY_SEPARATOR . $pageParam . DIRECTORY_SEPARATOR . 'index.php';
            $candidates[] = $moduleBase . DIRECTORY_SEPARATOR . $pageParam . '.php';
        } else {
            // jika sudah menyertakan ekstensi (.php)
            $candidates[] = $moduleBase . DIRECTORY_SEPARATOR . $pageParam;
        }

        $found = false;
        foreach ($candidates as $cand) {
            $real = realpath($cand);
            // pastikan file ada dan benar berada di dalam folder module
            if ($real && is_file($real) && strpos($real, $moduleBase) === 0) {
                include $real;
                $found = true;
                break;
            }
        }

        if (! $found) {
            http_response_code(404);
            echo 'Halaman tidak ditemukan.';
        }
    }
}

include 'template/footer.php';
?>