<div id="Projects">

    <?php

        include '../../config/connect.php';

        $sql = "SELECT folder, names, title, year, text, about, video FROM activities";
        $statement = $databaseConnection->prepare($sql);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach($rows as $row) {
            echo "<a href='activity.php?id=" . $row["folder"] . "'>";
            echo "<div id='" . $row["folder"] . "' class='container'>";
            echo "<img src='../../www/activities/" . $row["folder"] . "/1.jpg' alt=''>";
            echo "<div class='middle'>";
            echo "<div class='text'>";
            echo "<div class='text-center'>";
            echo "<span class='projectTitle'>" . $row["title"] . "</span>";
            echo "<span class='projectAuthor'>" . $row["names"] . " " . " | " . $row["year"] . "</span>";
            echo "<span class='projectDetailButton'><i class='fa fa-chevron-right' aria-hidden='true'></i></span>";
            echo "<span class='projectLabel'>" . $row["about"] . "</span>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</a>";
        }
	
	    //echo "<div class='container lastContainer'></div>";
	   

    ?>

</div>
