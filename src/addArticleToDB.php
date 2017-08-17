<?php
namespace app\src\addArticleToDB;
use function app\core\renderView;


function index() {
    return renderView(['template.php', 'pages/addArticles.php']);
};


function addArticle() {

    global $app;
    /** @var \PDO $DBH */
    $DBH = $app['db'];

    if (!empty($_POST['adding'])) {
        $DBH->beginTransaction();

            $STH = $DBH->prepare('INSERT INTO blog.articles (title, article_text, user_id) VALUES (:title, :text, :user_id)');
            $newArticle = [
                ':title' => $_POST['title'],
                ':text' => $_POST['text'],
                ':user_id' => $app['user']['id']
            ];

            $STH->execute($newArticle);
            $DBH->commit();
    };
    if (isset($_POST['adding'])) {
        header("Location: http://blog.log/");
    };
}



