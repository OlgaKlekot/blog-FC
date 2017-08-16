<?php
namespace app\src\definite_post;
use function app\core\renderView;

function definite($article) {

    global $app;

    /** @var \PDO $DBH */

    $DBH = $app['db'];

        $STH = $DBH->prepare("SELECT a.*, u.username FROM articles a LEFT JOIN users u ON u.id = a.user_id WHERE a.id = :id");
        $STH->bindValue(':id', $article);

    $STH->execute();
    $result = $STH->fetchAll(\PDO::FETCH_ASSOC);

    return renderView(['template.php', 'posts/definite_post.php'], ['articles' => $result]);
};