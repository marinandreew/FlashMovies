const API_KEY = '809ed0b25766f1b5b6ce426872c7b31b';
function getMovies() {
    const trendingMoviesUrl = 'https://api.themoviedb.org/3/trending/movie/week?';
    const params = {
        api_key: API_KEY,
        page: 1
    };

    const queryString = Object.keys(params)
             .map(k => encodeURIComponent(k) + '=' + encodeURIComponent(params[k]))
             .join('&');

    fetch(trendingMoviesUrl + queryString, {api_key: API_KEY})
        .then(data => data.json())
        .then(data => data.results.forEach(movie => {
            addMovieToDOM(movie);    
        }));
}

function addMovieToDOM(movie) {
    console.log(movie);
    const movieHTML = `
    <li class="movie-item">
        <img src="https://image.tmdb.org/t/p/w185/${movie.poster_path}" class="img-fluid img-thumbnail" alt="${movie.original_title}">
        <a href="details.php?movie_id=${movie.id}" class="movie-title">${movie.original_title}</a>
        <div class="movie-controls">
            <form method="POST" action="list.php" class="d-inline-block">
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="movie_id" value="${movie.id}">
                <input type="hidden" name="movie_title" value="${movie.original_title}">
                <input type="hidden" name="movie_image" value="${movie.poster_path}">
                <input type="submit" value="Add ❤" class="btn btn-primary">
            </form>
            <a href="details.php?movie_id=${movie.id}" class="btn btn-secondary">Details ♒</a>
        </div>
    </li>`;
    $("#movies").append(movieHTML);
}

$(document).ready(function() {
    getMovies();
});