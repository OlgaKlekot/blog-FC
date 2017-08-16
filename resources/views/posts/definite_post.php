<div class="definite">
<?php foreach ($articles as $article): ?>
    <div class="article">
        <h3 class="title"><?= $article['title'] ?></h3>
        authored by <span class="author"><?= $article['username'] ?></span>
        <p class="art"><?= $article['article_text'] ?></p>
        <span class="data"><?= $article['creation_date'] ?></span>
    </div>
<?php endforeach; ?>
</div>
