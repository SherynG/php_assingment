<?php


    //link to db
    $database = connectToDB();
    //chooses table
    $sql = "SELECT * FROM books";
    //prep
    $query = $database -> prepare($sql); 
    //exec
    $query->execute();
    //grabs data
    $products = $query -> fetchAll();

    require 'parts/header.php';

?>      
<div class="container mt-5">
<div class="text-start">
    <a href="/manage-users" class="btn btn-sm">
    <i class="bi bi-person-fill"></i>
</div>

<div class="text-end">
    <a href="/adminbook" class="btn btn-sm">
    <i class="bi bi-plus-circle"></i>
</div>
</div>


<div class="container mt-5 mb-2 mx-auto" style="max-width: 900px;">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php foreach($products as $index => $book) : ?>
                        <div class="col">
                        
                            <!--item-->
                                <div class="card h-100">
                                <img
                                        src="<?= $book['image_url'];?>"
                                        class="card-img-top" 
                                        alt=""
                                    />
                                    <form method="POST" action="/auth/submit">
                                        <input type="hidden" name="book_id" value="<?= $book['id']; ?>">
                                        <input type="hidden" name="is_wishlist" value="<?= isset($bookmark['is_wishlist']) ? $bookmark['is_wishlist'] : 0; ?>">
                                        
                                            <button class="btn btn-link p-0 m-0">
                                                <?php if (isset($bookmark["is_wishlist"]) && $bookmark["is_wishlist"] == 1) : ?>
                                                    <i class="bi bi-bookmark-fill" style="position: absolute; top: 10px; right: 10px; font-size: 1.5rem;"></i>
                                           
                                            <?php else : ?>
                                            
                                                <i class="bi bi-bookmark" style="position: absolute; top: 10px; right: 10px; font-size: 1.5rem;"></i>
                                            </button>
                                            <?php endif; ?>
                                        
                                    </form>
                                    <div class=" text-center">
                                        <a href="/desc?id=<?=$book['id']; ?>" class="btn btn-link btn-sm" >Read More</h5>
                                    </div>

                                </div><!--end of card-->
                                
                        </div><!--end of column-->

                    <?php endforeach; ?>

                </div><!-- row -->

            </div><!-- .container -->
            
            <div class="mt-4 d-flex justify-content-center gap-3">
                <?php if ( isset( $_SESSION['user'] ) ) : ?>
                    <a href="/logout" class="btn btn-link btn-sm">Logout</a>
                <?php else : ?>
                    <!-- show login and signup link if user is not logged in -->
                    <a href="/login" class="btn btn-link btn-sm">Login</a>
                    <a href="/signup" class="btn btn-link btn-sm">Sign Up</a>
                <?php endif; ?>
        </div>

        <div class=""></div>
</div>
 <?php require 'parts/footer.php' ?>

 