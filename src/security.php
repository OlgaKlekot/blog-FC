<?php
namespace app\src\security;

use app\core;

    global $app;

    /** @var \PDO $DBH */

    $DBH = $app['db'];

    $STH = $DBH->prepare("SELECT * FROM  users u WHERE u.username = :name");
    $STH->bindValue(':name', $_POST['username']);

    $STH->execute();
    $result = $STH->fetchAll(\PDO::FETCH_ASSOC);


    $app['users'] = $result;



function login() {
    if (!isset($_POST['username']) || !isset($_POST['password'])) {
        core\addFlash('danger', 'Not enough parameters');
        core\redirect('main_page');
    }

    if (!($user = loadUserByUsername($_POST['username']))) {
        core\addFlash('danger', 'Username or password are incorrect');
        core\redirect('main_page');
    }

    if (!((string)$_POST['password'] == $user['password'])) {
        core\addFlash('danger', 'Username or password are incorrect');
        core\redirect('main_page');
    }

    core\persistUser($user);

    core\addFlash('success', sprintf('Hi, %s!', $user['username']));

    core\redirect('main_page');
}

function logout() {
    core\clearUser();
    core\redirect('main_page');
}

function loadUserByUsername($username) {
    global $app;

    return current(array_filter($app['users'], function($user) use($username) {
        return $user['username'] == $username;
    }));
}