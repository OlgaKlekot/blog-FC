<?php
namespace app\src\definite_post;
use function app\core\renderView;

function definite($article, $comm = null) {

    global $app;
    /** @var \PDO $DBH */
    $DBH = $app['db'];

        $STH = $DBH->prepare("SELECT a.*, u.username FROM articles a LEFT JOIN users u ON u.id = a.user_id WHERE a.id = :id");
        $STH->bindValue(':id', $article);

    $STH->execute();
    $result1 = $STH->fetchAll(\PDO::FETCH_ASSOC);



    $STH = $DBH->prepare("SELECT c.*, u.username FROM comments c LEFT JOIN users u ON u.id = c.user_id WHERE article_id = :id GROUP BY c.id ORDER BY c.creation_date");
    $STH->bindValue(':id', $article);

    $STH->execute();
    $result2 = $STH->fetchAll(\PDO::FETCH_ASSOC);


    return renderView(['template.php', 'posts/definite_post.php'], ['articles' => $result1, 'comments' => $result2, 'comment' => $comm]);
};

function addComment($article) {

    global $app;
    /** @var \PDO $DBH */
    $DBH = $app['db'];

    if (!empty($_POST['adding'])) {
        $DBH->beginTransaction();

        $STH = $DBH->prepare('INSERT INTO blog.comments (article_id, comment_text, user_id) VALUES (:article_id, :text, :user_id)');
        $newArticle = [
            ':article_id' => $article,
            ':text' => $_POST['text'],
            ':user_id' => $app['user']['id']
        ];

        $STH->execute($newArticle);
        $DBH->commit();

        header("Location: http://blog.log/" . $article . "/comment");
    };
//    if (isset($_POST['add_comment'])) {
//        header("Location: http://blog.log{$_GET['comments']}");
//    };
}
