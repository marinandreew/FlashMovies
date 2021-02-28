<?php
include "db.php";

include "layout/header.php";

if(isset($_GET["movie_id"])) {
    $movie_id = intval($_GET["movie_id"]);

    if($movie_id == 0) {
        header("Location: movies.php");
    }
    //get movie details
    ?>
    <div id="movie-details" class="col-12">
    </div>
    <script src="js/movie_details.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        getMovieDetails(<?=$movie_id;?>);
    });
    </script>
    <?php
} else {
    header("Location: movies.php");
}