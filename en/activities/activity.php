<!DOCTYPE html>
<html lang="cs" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="Jan Rouha">
    <meta name="description" content="TUL, FUA, KUM">
    <meta name="keywords" content="TUL, FUA, KUM">

    <link rel="stylesheet" href="../www/css/styles.min.css?123">
    <link rel="stylesheet" href="../www/css/fancybox.css">

    <link rel="icon" sizes="32x32" href="../favicon.png">

    <script src="../www/js/fontAwesome.js" crossorigin="anonymous"></script>
    <script src="../www/js/sadQuery.js"></script>
    <script src="../www/js/fancybox.js"></script>
    <script src="../www/js/main.min.js"></script>

    <title>ART | TUL</title>
</head>
<body>
<div id="MobileMenuArea">
    <div class="menuArea">
        <span id="WeTest"><a href="../#WeTitle">O NÁS</a></span>
        <span id="StudyTest"><a href="../#StudyTitle">STUDIUM</a></span>
        <span><a href="../studenti/">STUDENTI</a></span>
        <span><a href="../aktivity/">AKTIVITY</a></span>
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
        <a href="https://discord.gg/7pkenaDW" target="_blank"><i class="fab fa-discord social"></i></a>
        <a id="MoreAppsBtn"><i class="fas fa-angle-double-down"></i></a>
        <i id="BurgerMenu" class="fa fa-times" aria-hidden="true"></i>
        <i id="MobileMenu" class="fa fa-bars" aria-hidden="true"></i>
    </div>
</div>
<div id="FixedMenu">
    <div class="menuBox noselect">
        <div id="CleverMenu" class="menu">
            <span id="WeTest"><a href="../#WeTitle">O NÁS</a></span>
            <span id="StudyTest"><a href="../#StudyTitle">STUDIUM</a></span>
            <span><a href="../studenti/">STUDENTI</a></span>
            <span><a href="../aktivity/">AKTIVITY</a></span>
            <span id="ContactTest"><a href="../#ContactTitle">KONTAKT</a></span>
        </div>
    </div>
</div>
<div id="ProjectDetail">
    <div class="returnArrow">
        <a href="./">
            <i class="fa fa-arrow-circle-o-left fa-2x" aria-hidden="true"></i>
        </a>
    </div>

    <?php
    error_reporting(E_ALL);

    include '../../config/connect.php';

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $id = $_GET['id'];

        $sql = "SELECT folder, names, title, year, text, about, video FROM activities WHERE folder = '$id'";
        $statement = $databaseConnection->prepare($sql);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach($rows as $row ) {
            echo "<div class='aboutText'>";
            echo "<span class='detailAuthor'>" . $row["title"] . "</span>";
            echo "<span class='detailInfo'>" . $row["names"] . " | " . $row["year"] . "</span>";
            echo "<span class='detailText'>" . $row["text"] . "</span>";
            echo "</div>";

            echo "<div class='images'>";

            $files = glob("../../www/activities/" . $row["folder"] . "/*.*");

            foreach($files as $file){
                echo "<a data-fancybox='gallery' href='" . $file . "'>";
                echo "<img src='" . $file . "'>";
                echo "</a>";
            }

            echo "</div>";
            if ($row["video"] !== null) {
                echo "<div class='videos'>";
                    echo "<iframe src='" . $row["video"] . "' title='" . $row["names"] . "' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
                echo "</div>";
            }
        }
    } else {
        echo "projekt nenalezen";
    }

    ?>
</div>
<?php
require_once "../parts/footer.php";
?>

</body>
</html>
