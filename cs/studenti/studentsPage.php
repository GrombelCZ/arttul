<div id="Projects">

    <?php

        include '../../config/connect.php';

        $sql = "SELECT folder, name, surname, year, title_cz, title_en, text_cz, text_en, about_cz, about_en, video_one, video_two FROM projects WHERE hidden = 0 ORDER BY folder DESC";
        $statement = $databaseConnection->prepare($sql);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach($rows as $row ) {
            echo "<a id='ProjectLink' href='project.php?id=" . $row["folder"] . "'>";
            echo "<div id='" . $row["folder"] . "' class='container'>";
            echo "<img src='../../www/projects/" . $row["folder"] . "/1.jpg' alt='image' loading='lazy'>";
            echo "<div class='middle'>";
            echo "<div class='text'>";
            echo "<div class='text-center'>";
            echo "<span class='projectTitle'>" . $row["title_cz"] . "</span>";
            echo "<span class='projectAuthor'>" . $row["name"] . " " . $row["surname"] . " | " . $row["year"] . "</span>";
            echo "<span class='projectLabel'>" . $row["about_cz"] . "</span>";
            echo "<span class='projectDetailButton'><i class='fa fa-chevron-right' aria-hidden='true'></i></span>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</a>";
        }

        echo "<a class='content-extender'>";
        echo "<div class='container'>";
        echo "<div class='middle'>";
        echo "<div class='text'>";
        echo "<div class='text-center'>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</a>";


    ?>

</div>
