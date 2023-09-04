<!DOCTYPE html>
<html lang="cs">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="www/css/styles.min.css?312">

    <link rel="icon" sizes="32x32" href="favicon.png">

    <title>ART | TUL</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a7d31a89d0.js" crossorigin="anonymous"></script>


</head>
<body>
<div id="FixedTopBar" class="noselect">
    <div class="centeredTopBar">
        <span class="homeLogo"><a href="./">KUM</a></span>
        <div class="separator"><div class="separatorInner"></div></div>
        <i class="fa fa-facebook-square social" aria-hidden="true"></i>
        <i class="fa fa-instagram social" aria-hidden="true"></i>
        <i class="fa fa-youtube-play social" aria-hidden="true"></i>
        <i class="fab fa-discord social"></i>
        <i id="BurgerMenu" class="fa fa-bars" aria-hidden="true"></i>
    </div>
</div>
<div class="menuide_box noselect">
    <div id="CleverMenu" class="menuide">
        <span id="WeTest"><a href="./">O NÁS</a></span>
        <span id="StudyTest"><a href="./">STUDIUM</a></span>
        <span><a href="">STUDENTI</a></span>
        <span><a href="./">AKTIVITY</a></span>
        <span id="ContactTest"><a href="./">KONTAKT</a></span>
    </div>
</div>
<div id="Projects">

<?php

include_once "studenti/fakeJson.php";

for($i = 0; $i < count($allProjects); $i++) {
    echo "<a href='project.php?id=" . $allProjects[$i]["id"] . "'>";
        echo "<div id='" . $allProjects[$i]["id"] . "' class='container'>";
            echo "<img src='www/projects/" . $allProjects[$i]["id"] . "/1.jpg' alt=''>";
                echo "<div class='middle'>";
                    echo "<div class='text'>";
                        echo "<div class='text-center'>";
                            echo "<span class='projectTitle'>" . $allProjects[$i]["title"] . "</span>";
                            echo "<span class='projectAuthor'>" . $allProjects[$i]["author"] . " | " . $allProjects[$i]["year"] . "</span>";
                            echo "<span class='projectLabel'>" . $allProjects[$i]["items"][0] . "</span>";
                            echo "<span class='projectDetailButton'><i class='fa fa-chevron-right' aria-hidden='true'></i></span>";
                        echo "</div>";
                    echo "</div>";
            echo "</div>";
        echo "</div>";
    echo "</a>";
}



?>

</div>

<script>
    let menuElement = document.getElementById("CleverMenu");
    let menuVisibility = 1;

    $(window).scroll(function() {
        if($(window).scrollTop() > 100 && menuVisibility === 1) {
            menuElement.classList.toggle("menuOpacity");
            menuVisibility = 0;
        } else if($(window).scrollTop() <= 100 && menuVisibility === 0) {
            menuElement.classList.toggle("menuOpacity");
            menuVisibility = 1;
        }
    });

    $(document).ready(function(){
        $("#BurgerMenu").click(function(){
            $("#CleverMenu").toggle();
        });
    });

</script>
</body>
</html>
