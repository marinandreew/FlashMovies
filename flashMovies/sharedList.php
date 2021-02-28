<?php
include "db.php";

include "layout/header.php";

$shareKey = $_GET["shareKey"];

$favourites = getFavouriteMoviesByShareKey($shareKey);

?>
<h1>Favourites</h1>
<?php
if(count($favourites) == 0) {
    ?>
    <p>This user does not have any favourite movies.</p>
    <?php
}
?>

<ul id="movies" class="movie-items">
<?php
foreach($favourites as $movie) {
    ?>
    <li class="movie-item">
        <img src="https://image.tmdb.org/t/p/w185/<?=$movie["movie_image"]?>" class="img-fluid img-thumbnail" alt="<?=$movie["movie_title"]?>">
        <a href="#" class="movie-title"><?=$movie["movie_title"]?></a>
        <div class="movie-controls">
            <a href="details.php?movie_id=<?=$movie["movie_id"]?>" class="btn btn-secondary">Details</a>    
        </div>
    </li>
    <?php
}
?>
</ul>
<?php
include "layout/footer.php";