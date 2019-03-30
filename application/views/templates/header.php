<!DOCTYPE html>
<html lang="en">
<?php date_default_timezone_set("Asia/Jakarta"); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- New Design -->
    <link href="<?= base_url('assets/css/bs4_default/') ?>bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/css/') ?>icons.min.css" rel="stylesheet" type="text/css" />

    <!-- Old Design -->
    <link rel="stylesheet" href="<?= base_url('assets/css/') ?>fontawesome-all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/') ?>materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/') ?>style.css">
    <link rel="icon" href="<?= base_url('assets/img/') ?>favicon.png" type="image/png">
    <title><?= $_title = (is_object($title)) ? $title->title : $title; ?> | Yoga Hilmi's Blog</title>
</head>

<body>
    <div class="preloader"></div>
    <nav class="navbar navbar-dark navbar-expand-lg navbar-expand-md fixed-top bg-dark">
        <a class="navbar-brand" href="<?= base_url() ?>">
            <img src="<?= base_url('assets/img/') ?>favicon.png" width="30" height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <div class="navbar-nav">
                <a class="nav-item nav-link <?= $act = ($_title == 'Home') ? 'active' : ''; ?>" href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link <?= $act1 = ($_title == 'Story') ? 'active' : ''; ?>" href="<?= base_url('story/') ?>">Story</a>
                <a class="nav-item nav-link" href="https://github.com/yoga-hz?tab=repositories">Repositories</a>
                <a class="nav-item nav-link <?= $act2 = ($_title == 'About') ? 'active' : ''; ?>" href="<?= base_url('about/') ?>">About</a>
            </div>
        </div>
    </nav> 