<div class="articles">

    <?php foreach ($articles as $article): ?>

    <div class="article">
        <a href="<?= \app\core\createUrl('article', ['article' => $article['id']]) ?>"><h3 class="title"><?= $article['title'] ?></h3></a>
        authored by <span class="author"><?= $article['username'] ?></span>

        <?php if (strlen($article['article_text']) > 400) {
            $article['article_text'] = substr($article['article_text'],0,400) . "...";
        } ?>

        <p class="art"><?= $article['article_text'] ?></p>
        <span class="data"><?= $article['creation_date'] ?></span>
    </div>

    <?php endforeach; ?>

</div>


<div class="pagesNum">
    <?php if (($str_pag > 1) || (empty($_GET['page']))): ?>

            <?php if ($page != 1): ?>
                <a href="<?= isset($_GET['title']) ? '?title=' . $_GET['title'].'&' : '?'?>page=1"> << </a>
                <a href="<?= isset($_GET['title']) ? '?title=' . $_GET['title'].'&' : '?'?>page=<?= $page - 1 ?>"> < </a>
            <?php endif; ?>

            <?php if (($page - 2) > 1): ?>
                <a href="<?= isset($_GET['title']) ? '?title=' . $_GET['title'].'&' : '?'?>page=<?= $page - 2 ?>"> <?= $page - 2 ?></a>
            <?php endif; ?>
            <?php if (($page - 1) > 1): ?>
                <a href="<?= isset($_GET['title']) ? '?title=' . $_GET['title'].'&' : '?'?>page=<?= $page - 1 ?>"><?= $page - 1 ?></a>
            <?php endif; ?>
            <?php if ($page): ?>
                <a href="<?= isset($_GET['title']) ? '?title=' . $_GET['title'].'&' : '?'?>page=<?= $page ?>" class="now"><?= $page ?></a>
            <?php endif; ?>
            <?php if (($page + 1) <= $str_pag): ?>
                <a href="<?= isset($_GET['title']) ? '?title=' . $_GET['title'].'&' : '?'?>page=<?= $page + 1 ?>"><?= $page + 1 ?></a>
            <?php endif; ?>
            <?php if (($page + 2) <= $str_pag): ?>
                <a href="<?= isset($_GET['title']) ? '?title=' . $_GET['title'].'&' : '?'?>page=<?= $page + 2 ?>"><?= $page + 2 ?></a>
            <?php endif; ?>

            <?php if ($page != $str_pag): ?>
                <a href="<?= isset($_GET['title']) ? '?title=' . $_GET['title'].'&' : '?'?>page=<?= $page + 1 ?>"> > </a>
                <a href="<?= isset($_GET['title']) ? '?title=' . $_GET['title'].'&' : '?'?>page=<?= $str_pag ?>"> >> </a>
            <?php endif; ?>

    <?php endif; ?>

</div>
