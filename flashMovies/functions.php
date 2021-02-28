<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

function validateRegister($userData) {
    if($userData["username"] == "" || $userData["password"] == "" || $userData["email"] == "") {
        return false;
    }

    if($userData["password"] != $userData["confirmPassword"]) {
        return false;
    }
    return true;
}

function userExistsByUsername($username) {
    global $db;
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    return ($result->num_rows > 0);
}

function userExistsByEmail($email) {
    global $db;
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();   
    return ($result->num_rows > 0);
}

function addUser($userData) {
    global $db;
    $sql = "INSERT INTO users (username, password, email, userKey, shareKey, time) VALUES(?, ?, ?, ?, ?, ?)";

    $stmt = $db->prepare($sql);

    $encryptedPassword = password_hash($userData["password"], PASSWORD_DEFAULT);
    $time = time();
    $shareKey = md5(uniqid());
    $userKey = "";
    $stmt->bind_param("sssssi",
        $userData["username"], 
        $encryptedPassword,
        $userData["email"],
        $userKey,
        $shareKey,
        $time
    );
    return $stmt->execute();

}

function getUserByUsername($username) {
    global $db;
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return NULL;
    }
}

function getUserByKey($userKey) {
    global $db;
    $sql = "SELECT * FROM users WHERE userKey = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $userKey);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return NULL;
    }
}

function setUserKey($user_id, $key) {
    global $db;
    $sql = "UPDATE users SET userKey = ? WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("si", $key, $user_id);
    return $stmt->execute();
}

function addFavouriteMovie($user_id, $movie_id, $movie_title, $movie_image) {
    global $db;
    $sql = "INSERT INTO user_favourites (user_id, movie_id, movie_title, movie_image) VALUES(?, ?, ?, ?)";

    $stmt = $db->prepare($sql);

    $stmt->bind_param("iiss",
        $user_id,
        $movie_id,
        $movie_title,
        $movie_image
    );
    return $stmt->execute();
}


function getFavouriteMoviesByUser($user_id) {
    global $db;
    $sql = "SELECT movie_id, movie_title, movie_image FROM user_favourites WHERE user_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $favourites = array();
    while($record = $result->fetch_assoc()) {
        $favourites[] = $record;
    }

    return $favourites;
}

function getUserIdByShareKey($shareKey) {
    global $db;
    $sql = "SELECT id FROM users WHERE shareKey = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $shareKey);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        $userinfo = $result->fetch_assoc();

        return $userinfo["id"];
    } else {
        return NULL;
    }
}

function getFavouriteMoviesByShareKey($shareKey) {
    global $db;
    $user_id = getUserIdByShareKey($shareKey);
    //join query as alternative
    $sql = "SELECT movie_id, movie_title, movie_image FROM user_favourites WHERE user_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $favourites = array();
    while($record = $result->fetch_assoc()) {
        $favourites[] = $record;
    }

    return $favourites;
}

function removeFavouriteMovie($user_id, $movie_id) {
    global $db;

    $sqlDelete = "DELETE FROM user_favourites WHERE user_id = ? AND movie_id = ?";
    $stmt = $db->prepare($sqlDelete);
    $stmt->bind_param("ii", $user_id, $movie_id);
    $successful = $stmt->execute();

    return $successful;    
}