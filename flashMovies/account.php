<?php
include "db.php";
if(!$loggedIn)
{
    header("Location: login.php");
}

include "layout/header.php";

?>
<p> </p>
<h3>Welcome, <?=$userinfo["username"];?></h1>

<script src="js/copyURL.js"></script>

<?php
if(isset($_POST["action"])) {
    $action = $_POST["action"];

    switch($action) {
        case "add":
            addFavouriteMovie($userinfo["id"], $_POST["movie_id"], $_POST["movie_title"], $_POST["movie_image"]);
        break;
        case "remove":
            removeFavouriteMovie($userinfo["id"], $_POST["movie_id"]);
        break;
    
    }
}

$favourites = getFavouriteMoviesByUser($userinfo["id"]);

?>
<h1>Favourites</h1>
<label for="shareURL">Share URL:</label>
<input name="shareURL" id="shareURL" type="text" value="<?=$config["url"];?>sharedList.php?shareKey=<?=$userinfo["shareKey"];?>" />
<button onclick="copyURL()">Copy URL</button>
<?php
if(count($favourites) == 0) {
    ?>
    <p>You don't have any favourite movies. Click <a href="movies.php">here</a> to add movies.</p>
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
            <form method="POST" action="list.php" class="d-inline-block">
                <input type="hidden" name="action" value="remove">
                <input type="hidden" name="movie_id" value="<?=$movie["movie_id"]?>">
                <input type="submit" value="Remove 💔" class="btn btn-primary">
            </form>
            <a href="details.php?movie_id=<?=$movie["movie_id"]?>" class="btn btn-secondary">Details ♒</a>    
        </div>
    </li>
    <?php
}
?>
</ul>