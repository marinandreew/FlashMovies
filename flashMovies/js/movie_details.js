const API_KEY = '809ed0b25766f1b5b6ce426872c7b31b';
function getMovieDetails(movie_id) {
    const movieDetailsUrl = `https://api.themoviedb.org/3/movie/${movie_id}?`;
    const params = {
        api_key: API_KEY
    };

    const queryString = Object.keys(params)
             .map(k => encodeURIComponent(k) + '=' + encodeURIComponent(params[k]))
             .join('&');

    fetch(movieDetailsUrl + queryString, {api_key: API_KEY})
        .then(movie => movie.json())
        .then(movie => addMovieToDOM(movie));
}

function addMovieToDOM(movie) {
    console.log(movie);
    const movieDate = new Date(Date.parse(movie.release_date));
    console.log(movieDate);
    const movieHtml = `
    <p> </p>
    <h1>${movie.original_title} (${movieDate.getFullYear()})</h1>
    <p> </p>
    <img src="https://image.tmdb.org/t/p/original/${movie.backdrop_path}" />
    <p> </p>
    <h3>Overview</h3>
    <p>${movie.overview}</p>
    `;

    $("#movie-details").append(movieHtml);
}