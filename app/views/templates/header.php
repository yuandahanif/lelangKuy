<?php
     ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] ?></title>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/style.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/index_mas.css">
    <script src="<?= BASE_URL ?>public/js/script.js" defer></script>
</head>
<body>
    <section class="body">
    <nav class="d-flex">
            <div class="nav-atas d-flex">
                <a href="<?= BASE_URL ?>" class="logo" data-page="<?php if (isset($_SESSION['level'])) { echo $_SESSION['level']; } ?>"><span>Lelang</span>Kuy</a>
                <div class="main-nav">
                    <a href="<?= BASE_URL ?>masyarakat/profile" class="profile-link"><?= $data['user'] ?></a>
                    <a href=" <?= BASE_URL ?>Home/logout" class="logout">Logout</a>
                </div>
            </div>