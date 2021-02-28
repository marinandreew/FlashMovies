<?php
include "db.php";
if(!$loggedIn)
{
    header("Location: login.php");
}

include "layout/header.php";

?>
<p> </p>
<p> </p>
<h1>Movies List</h1>
<p> </p>
<ul id="movies" class="movie-items">

</ul>
<script src="js/movies.js"></script>