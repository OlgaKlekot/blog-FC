<div class="definite">

<?php foreach ($articles as $article): ?>
    <div class="article">
        <h3 class="title"><?= $article['title'] ?></h3>
        authored by <span class="author"><?= $article['username'] ?></span>
        <p class="art"><?= $article['article_text'] ?></p>
        <span class="data"><?= $article['creation_date'] ?></span>
        <a href="<?= \app\core\createUrl('comments', ['article' => $article['id'], 'comment' => 'comment']) ?>"><div class="add_comment"></div></a>
    </div>
<?php endforeach; ?>

</div>

<?php if ($comment): ?>

<div class="comments">

    <?php foreach ($comments as $comment): ?>
        <div class="comment">
            <span class="data"><?= $comment['creation_date'] ?></span>
            <span class="author"><?= $comment['username'] ?></span>
            <p class="com"><?= $comment['comment_text'] ?></p>
        </div>
    <?php endforeach; ?>

</div>

<?php endif; ?>
