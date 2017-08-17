<?php
namespace app\src\main;
use function app\core\renderView;

function index() {

    global $app;
    /** @var \PDO $DBH */
    $DBH = $app['db'];

    $art_limit = 2;
    $page = !empty($_GET['page']) ? $_GET['page'] : 1;
    $art = ($page - 1) * $art_limit ;
    if (!empty($_GET['title'])) {
        $STH = $DBH->prepare('SELECT SQL_CALC_FOUND_ROWS * FROM  articles a WHERE a.title LIKE :title');
        $STH->bindValue(':title', '%' . $_GET['title'] . '%');

    } else {
        $STH = $DBH->prepare('SELECT SQL_CALC_FOUND_ROWS * FROM  articles');
    };

    $STH->execute();
    $art_count = $STH->fetchAll();
    $allArt_count = count($art_count);
    $str_pag = ceil($allArt_count / $art_limit);



    if (isset($_GET['title'])) {
        $STH = $DBH->prepare("SELECT a.*, u.username FROM articles a LEFT JOIN users u ON u.id = a.user_id WHERE a.title LIKE :title GROUP BY a.id ORDER BY a.creation_date DESC LIMIT $art_limit OFFSET $art");
        $STH->bindValue(':title', '%' . $_GET['title'] . '%');

    } else {
        $STH = $DBH->prepare("SELECT a.*, u.username FROM articles a LEFT JOIN users u ON u.id = a.user_id GROUP BY a.id ORDER BY a.creation_date DESC LIMIT $art_limit OFFSET $art");
    };


    $STH->execute();
    $result = $STH->fetchAll(\PDO::FETCH_ASSOC);

    return renderView(['template.php', 'posts/posts.php'], ['articles' => $result, 'str_pag' => $str_pag, 'page' => $page]);
};