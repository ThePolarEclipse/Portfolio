<?php
// Determine if the current file is in the "internal-pages" directory
$isInternal = strpos($_SERVER['SCRIPT_NAME'], '/internal-pages/') !== false;

// Set base paths depending on the current directory
$baseInternalPath = $isInternal ? '' : 'internal-pages/';
$baseRootPath = $isInternal ? '../' : '';
?>
<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Richard Searle | Portfolio</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="<?= $baseInternalPath ?>../css/application.css">
    </head>
<body id="top">  
    <div id="burger-menu">
        <details id="burger-menu-no-js">
            <summary class="btn-hamburger icon icon-hamburger"></summary>
            <div class="container">
                <h2><a href="<?= $baseInternalPath ?>about-me.php">About Me</a></h2>
                <h2><a href="<?= $baseRootPath ?>index.php#project-list">My Portfolio</a></h2>
                <h2><a href="<?= $baseInternalPath ?>coding-examples.php">Coding Examples</a></h2>
                <h2><a href="<?= $baseInternalPath ?>scs-scheme.php">SCS Scheme</a></h2>
                <div>
                    <h2><a href="<?= $baseRootPath ?>index.php#get-in-touch">Contact Me</a></h2>
                </div>
            </div>
        </details>
    </div>
    <header>
        <nav>
            <div id="sidebar">
                <div class="initials-box">
                    <h1 class="initials"><a href="<?= $baseRootPath ?>index.php"><span class="primary-purple_text">R </span><span class="primary-orange_text">S</span></a></h1>
                </div>
                <div class="sidebar-items">
                    <h2><a href="<?= $baseInternalPath ?>about-me.php">About Me</a></h2>
                    <h2><a href="<?= $baseRootPath ?>index.php#project-list">My Portfolio</a></h2>
                    <h2><a href="<?= $baseInternalPath ?>coding-examples.php">Coding Examples</a></h2>
                    <h2><a href="<?= $baseInternalPath ?>scs-scheme.php">SCS Scheme</a></h2>
                    <div id="sidebar-contact">
                        <h2><a href="<?= $baseRootPath ?>index.php#get-in-touch">Contact Me</a></h2>
                    </div>
                    <div id="header-socials">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </nav>