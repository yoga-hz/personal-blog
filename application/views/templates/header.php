<!DOCTYPE html>
<html lang="en" class="has-navbar-fixed-top">
<?php date_default_timezone_set("Asia/Jakarta"); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bulma.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link rel="icon" href="<?= base_url() ?>assets/img/favicon.png" type="image/png">
    <title><?= $_title = (is_object($title)) ? $title->title : $title; ?> | Yoga Hilmi's Blog</title>
</head>

<body>
    <div class="preloader"></div>
    <nav class="navbar is-dark is-fixed-top">
        <a role="button" class="navbar-burger" data-target="mobileMenu" aria-label="menu" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </a>
        <div id="mobileMenu" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="<?= base_url() ?>">
                    <img src="<?= base_url() ?>assets/img/favicon.png" alt="web_logo">
                </a>
                <a class="navbar-item" href="<?= base_url() ?>story">
                    Story
                </a>
                <a class="navbar-item" href="https://github.com/yoga-hz?tab=repositories">
                    Repositories
                </a>
                <a class="navbar-item" href="<?= base_url() ?>about/">
                    About Me
                </a>
            </div>
            <div class="navbar-end">
                <span class="navbar-item">
                    <a class="button is-link is-inverted" href="https://github.com/yoga-hz/">
                        <span class="icon">
                            <i class="fab fa-github"></i>
                        </span>
                        <span>My GitHub</span>
                    </a>
                </span>
            </div>
        </div>
    </nav> 