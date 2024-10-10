<?php

function connectToDB() {
    $host = 'localhost';
    $database_name = 'library_management';
    $database_user= 'root';
    $database_password = 'Sheryn0524.';

    $database = new PDO(
        "mysql:host=$host;dbname=$database_name",
        $database_user,
        $database_password
    );

    return $database;
}

function setError( $error_message, $redirect_page ) {
    $_SESSION["error"] = $error_message;
    // redirect back to login page
    header("Location: " . $redirect_page );
    exit;
}


// check if user is logged in or not
function checkIfuserIsNotLoggedIn() {
  if ( !isset( $_SESSION['user'] ) ) {
    header("Location: /login");
    exit;
  }
}

// check if current user is an admin or not
function checkIfIsNotAdmin() {
    if ( isset( $_SESSION['user'] ) && $_SESSION['user']['role'] != 'admin' ) {
        echo "<p>Access denied. Only admins can access this page.</p>";
        header("Location: /");
        exit;
    }
}


