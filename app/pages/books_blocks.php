<div class="main-block__books">
    <ul class="books-list">
        <?php foreach($books as $key => $book): ?>
        <li class="books-list__item">
            <img class="books-list__item_img" src="<?php if ($book['photo_path']) {echo BASE_URL . '/images/books/'. $book['photo_path'];} else {echo BASE_URL . '/images/no_photo.png';}?>">
            <div class="books-list__item_info">
            <a class="book-name" href="<?php echo BASE_URL.'/app/pages/book_02.php?id='.$book['id_book']?>"><?=$book['name']?></a>
            <div>
            <?php $book_authors = findAuthorsByBookID($book['id_book']);
                foreach($book_authors as $key => $author):?>
                <a class="book-author" href="<?php echo BASE_URL .'/app/pages/author.php?id_author='.$author['id_author']?>">   
                    <?php 
                        echo $author['first_name'] . " " . $author['last_name'] . "<br>";
                    ?>
                </a>
            <?php endforeach;?>
                </div>
            <div class="book-rating">
                <svg width="16" height="16" fill="#ffc72c"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.486 13.376a1 1 0 00-.973 0l-2.697 1.502a1 1 0 01-1.474-1.033l.543-3.35a1 1 0 00-.27-.855L1.277 7.225a1 1 0 01.566-1.684l3.136-.483a1 1 0 00.754-.566l1.361-2.921a1 1 0 011.813 0l1.362 2.921a1 1 0 00.754.566l3.136.483a1 1 0 01.566 1.684l-2.34 2.415a1 1 0 00-.269.856l.542 3.349a1 1 0 01-1.473 1.033l-2.698-1.502z"></path></svg>
                <span class="book-rating__dig"><?=substr(strval(findRatingByBookId($book['id_book'])['avg_rating']), 0, 3);?></span>
            </div>
            </div>
        </a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>