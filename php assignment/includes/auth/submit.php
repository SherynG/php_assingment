<?php

$database = connectToDB();

// Ensure required POST data is set
if (!isset($_POST['user_id']) || !isset($_POST['book_id']) || !isset($_POST['image_url'])) {
    $_SESSION['error'] = "Invalid request.";
    header("Location: /home");
    exit;
}

$user_id = $_POST['user_id'];
$book_id = $_POST['book_id'];
$image_url = $_POST['image_url'];

// Insert new bookmark
$sql = "INSERT INTO bookmarks (user_id, book_id, image_url, is_wishlist) VALUES (:user_id, :book_id, :image_url, 0)";
$query = $database->prepare($sql);
$query->execute([
    'user_id' => $user_id,
    'book_id' => $book_id,
    'image_url' => $image_url
]);

$_SESSION['success'] = "Bookmark added successfully.";
header("Location: /home");
exit;

?>