<?php
function e($value) { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
function base_url($path='') {
    $folder = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
    if (strpos($folder, '/admin') !== false) $folder = dirname($folder);
    return ($folder === '/' ? '' : $folder) . ($path ? '/' . ltrim($path, '/') : '');
}
function redirect($url) { header("Location: $url"); exit; }
function cart_count() { return array_sum($_SESSION['cart'] ?? []); }
function money($n) { return $n !== null && $n !== '' ? '₹' . number_format((float)$n, 2) : 'Get Quote'; }
?>