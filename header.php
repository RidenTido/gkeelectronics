<?php
require_once __DIR__.'/../config/database.php';
require_once __DIR__.'/functions.php';
if (session_status() === PHP_SESSION_NONE) session_start();
$settings = $pdo->query("SELECT setting_key, setting_value FROM settings")->fetchAll(PDO::FETCH_KEY_PAIR);
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($title ?? ($settings['business_name'] ?? 'Electronics Store')) ?></title>
<meta name="description" content="<?= e($description ?? 'Electronics, solar batteries, solar lights and LED lighting products.') ?>">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
<div class="container">
<a class="navbar-brand fw-bold" href="<?= base_url('index.php') ?>"><i class="bi bi-lightning-charge-fill"></i> <?= e($settings['business_name'] ?? 'PowerLite') ?></a>
<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav"><span class="navbar-toggler-icon"></span></button>
<div class="collapse navbar-collapse" id="nav">
<ul class="navbar-nav ms-auto align-items-lg-center">
<li class="nav-item"><a class="nav-link" href="<?= base_url('index.php') ?>">Home</a></li>
<li class="nav-item"><a class="nav-link" href="<?= base_url('products.php') ?>">Products</a></li>
<li class="nav-item"><a class="nav-link" href="<?= base_url('category.php?slug=solar-lights') ?>">Solar</a></li>
<li class="nav-item"><a class="nav-link" href="<?= base_url('category.php?slug=led-lights') ?>">Lighting</a></li>
<li class="nav-item"><a class="nav-link" href="<?= base_url('about.php') ?>">About</a></li>
<li class="nav-item"><a class="nav-link" href="<?= base_url('offers.php') ?>">Offers</a></li>
<li class="nav-item"><a class="nav-link" href="<?= base_url('contact.php') ?>">Contact</a></li>
<li class="nav-item ms-lg-2"><a class="btn btn-warning btn-sm" href="<?= base_url('quote.php') ?>">Get Quote</a></li>
<li class="nav-item ms-lg-2"><a class="nav-link position-relative" href="<?= base_url('cart.php') ?>"><i class="bi bi-bag"></i> Enquiry <span class="badge bg-danger"><?= cart_count() ?></span></a></li>
</ul>
</div></div></nav>
<main>