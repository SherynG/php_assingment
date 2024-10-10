<?php

// 1. Connect to the database
$database = connectToDB();



require "parts/header_a.php";
?>

<div class="container mt-5 mb-2 mx-auto" style="max-width: 900px;">
    <h2>Your Bookmarked Books</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php if (isset($bookmark) && is_array($bookmark) && count($bookmark) > 0) : ?>
            <?php foreach($bookmarks as $book) : ?>
                <div class="col">

                    <!-- Book Item -->
                    <div class="card h-100">
                        <form method="POST" action="user/bookmark">
                            <input type="hidden" name="id" value="<?= $book['id']; ?>">
                            <button class="btn btn-link p-0 m-0" style="position: absolute; top: 10px; right: 10px;">
                                <i class="bi bi-heart-fill" style="font-size: 1.5rem; color: #f00;"></i>
                            </button>
                        </form>
                        <img
                            src="<?= $book['image_url'];?>"
                            class="card-img-top"
                            alt="<?= $book['title'];?>"
                        />
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= htmlspecialchars($book['title']); ?></h5>
                            <p class="card-text">
                                Author: <?= htmlspecialchars($book['author']); ?>
                            </p>
                            <a href="/book/read-more?id=<?= $book['id']; ?>" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                    
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>You have not bookmarked any books yet.</p>
        <?php endif; ?>
    </div>
</div>

<?php require "parts/footer.php"; ?>