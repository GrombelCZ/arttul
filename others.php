<!DOCTYPE html>
<html lang="cs" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="Jan Rouha">
    <meta name="description" content="TUL, FUA, KUM">
    <meta name="keywords" content="TUL, FUA, KUM">

    <link rel="stylesheet" href="www/css/styles.min.css?123">

    <link rel="icon" sizes="32x32" href="favicon.png">

    <title>ART | TU Liberec</title>

    <script src="www/js/fontAwesome.js" crossorigin="anonymous"></script>
    <script src="www/js/sadQuery.js"></script>
    <script src="www/js/main.min.js"></script>
</head>
<body>
<div id="MobileMenuArea">
    <div class="menuArea">
        <span id="WeTest"><a href="#WeTitle">O NÁS</a></span>
        <span id="StudyTest"><a href="#StudyTitle">STUDIUM</a></span>
        <span><a href="studenti/">STUDENTI</a></span>
        <span><a href="aktivity/">AKTIVITY</a></span>
        <span id="ContactTest"><a href="#ContactTitle">KONTAKT</a></span>
    </div>
</div>
<div id="FixedTopBar" class="noselect">
    <div class="centeredTopBar">
        <span class="homeLogo"><a href="./">KUM</a></span>
        <div class="separator"><div class="separatorInner"></div></div>
        <a href="https://www.facebook.com/groups/131177922231/" target="_blank"><i class="fa fa-facebook-square social" aria-hidden="true"></i></a>
        <a href="" target="_blank"><i class="fa fa-instagram social" aria-hidden="true"></i></a>
        <a href="https://www.youtube.com/channel/UCfNQmsoowW_d7E2or1EcNog" target="_blank"><i class="fa fa-youtube-play social" aria-hidden="true"></i></a>
        <a href="https://discord.gg/7pkenaDW" target="_blank"><i class="fab fa-discord social"></i></a>
        <a href="others.php"><i class="fas fa-angle-double-right"></i></a>
        <i id="BurgerMenu" class="fa fa-times" aria-hidden="true"></i>
        <i id="MobileMenu" class="fa fa-bars" aria-hidden="true"></i>
    </div>
</div>
<div id="FixedMenu">
    <div class="menuBox noselect">
        <div id="CleverMenu" class="menu">
            <span id="WeTest"><a href="#WeTitle">O NÁS</a></span>
            <span id="StudyTest"><a href="#StudyTitle">STUDIUM</a></span>
            <span><a href="studenti/">STUDENTI</a></span>
            <span><a href="aktivity/">AKTIVITY</a></span>
            <span id="ContactTest"><a href="#ContactTitle">KONTAKT</a></span>
        </div>
    </div>
</div>
<?php
require_once "parts/homepageArrow.php";
require_once "parts/abstractHeader.php";
require_once "parts/realPage.php";
require_once "parts/footer.php";
?>

<script>
    let status = 0;
    setInterval(function(){
        if (scrollStatus === 1) {
            if (status === 0){
                $("#AbstractHeader").fadeTo("slow",0, function() {
                    $(this).css("background-image", "url('www/images/2.jpg')");
                }).fadeTo("fast",0.9);
                status = 1;
            } else {
                $("#AbstractHeader").fadeTo("slow",0, function() {
                    $(this).css("background-image", "url('www/images/1.jpg')");
                }).fadeTo("fast",0.9);
                status = 0;
            }
        }
    }, 10000);

    let scrollStatus = 1;
    $(window).scroll(function() {
        if($(window).scrollTop() > 100) {
            scrollStatus = 0;
        } else if($(window).scrollTop() <= 100) {
            scrollStatus = 1;
        }
    });

</script>

</body>
</html>
