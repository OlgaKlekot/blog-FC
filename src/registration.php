<?php

namespace app\src\registration;
use function app\core\renderView;

function index() {
    return renderView(['template.php', 'pages/registration.php']);
};

function addUser() {

    global $app;
    /** @var \PDO $DBH */
    $DBH = $app['db'];

    if ($_POST['passWord'] === $_POST['confirmPassWord']) {
        $DBH->beginTransaction();

            $STH = $DBH->prepare('INSERT INTO blog.users (username, password) VALUES (:name, :password)');
            $newUser = [
                ':name' => $_POST['userName'],
                ':password' => $_POST['passWord'],
            ];
            $STH->execute($newUser);
            $DBH->commit();
    };

    if (isset($_POST['register'])) {
        header("Location: http://blog.log/");
    };
}