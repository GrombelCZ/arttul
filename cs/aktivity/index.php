<!DOCTYPE html>
<html lang="cs" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="Jan Rouha">
    <meta name="description" content="TUL, FUA, KUM">
    <meta name="keywords" content="TUL, FUA, KUM">

    <link rel="stylesheet" href="../../www/css/styles.min.css?123">

    <link rel="icon" sizes="32x32" href="../../favicon.png">

    <script src="../../www/js/fontAwesome.js" crossorigin="anonymous"></script>
    <script src="../../www/js/sadQuery.js"></script>
    <script src="../../www/js/main.min.js"></script>

    <title>AKTIVITY | TUL</title>
</head>
<body>
<div id="MoreApps" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>aplikace</h3>
        <p>
            <a href="https://art.tul.cz/sklad/" target="_blank"><i class="fas fa-box-open"></i> sklad A0</a>
            <a href="https://art.tul.cz/kumbot/" target="_blank"><i class="fas fa-plus-square"></i> uložit projekt</a>
            <a href="https://art.tul.cz/zapis-atelieru/" target="_blank"><i class="fa    fa-users"></i> vybrat ateliér</a>
        </p>
        <h3>projekty</h3>
        <p>
            <a href="https://art.tul.cz/experimentalni-plocha/" target="_blank">experimentální plocha <i class="fas fa-external-link-alt"></i></a>
        </p>
        <h3>ostatní</h3>
        <p>
            <a href="https://art.tul.cz/sklad/realita/" target="_blank">VR | AR | XR - teorie <i class="fas fa-external-link-alt"></i></a>
            <a href="https://art.tul.cz/sklad/bozp/" target="_blank">bezpečnost práce <i class="fas fa-external-link-alt"></i></a>
        </p>
        <h3>workshopy & soubory</h3>
    </div>
</div>
<div id="MobileMenuArea">
    <div class="menuArea">
        <span id="WeTest"><a href="../#WeTitle">O NÁS</a></span>
        <span id="StudyTest"><a href="../#StudyTitle">STUDIUM</a></span>
        <span><a href="../studenti/">STUDENTI</a></span>
        <span><a href="./">AKTIVITY</a></span>
        <span id="ContactTest"><a href="../#ContactTitle">KONTAKT</a></span>
    </div>
</div>
<div id="FixedTopBar" class="noselect">
    <div class="centeredTopBar">
        <span class="homeLogo"><a href="../">KUM</a></span>
        <div class="separator"><div class="separatorInner"></div></div>
        <a href="https://www.facebook.com/groups/131177922231/" target="_blank"><i class="fa fa-facebook-square social" aria-hidden="true"></i></a>
        <a href="" target="_blank"><i class="fa fa-instagram social" aria-hidden="true"></i></a>
        <a href="https://www.youtube.com/channel/UCfNQmsoowW_d7E2or1EcNog" target="_blank"><i class="fa fa-youtube-play social" aria-hidden="true"></i></a>
        <a href="https://discord.gg/zb786VkXz6" target="_blank"><i class="fab fa-discord social"></i></a>
        <a id="MoreAppsBtn"><i class="fas fa-angle-double-down"></i></a>
        <i id="BurgerMenu" class="fa fa-times" aria-hidden="true"></i>
        <i id="MobileMenu" class="fa fa-bars" aria-hidden="true"></i>
        <a id="LangButton" href="../../en/">en</a>
    </div>
</div>
<div id="FixedMenu">
    <div class="menuBox noselect">
        <div id="CleverMenu" class="menu">
            <span id="WeTest"><a href="../#WeTitle">O NÁS</a></span>
            <span id="StudyTest"><a href="../#StudyTitle">STUDIUM</a></span>
            <span><a href="../studenti/">STUDENTI</a></span>
            <span><a href="./">AKTIVITY</a></span>
            <span id="ContactTest"><a href="../#ContactTitle">KONTAKT</a></span>
        </div>
    </div>
</div>

<?php
	require_once "activitiesPage.php";
?>

<div class="lastContainer"></div>

<?php
    require_once "../parts/footer.php";
?>

<script></script>
</body>
</html>
