<?php
/**
 * route_name => [path, file, function, methods]
 */

return [
    'main_page' => [
        'path' => '/',
        'file' => 'main.php',
        'function' => 'app\\src\\main\\index',
        'methods' => ['GET']
    ],
    'registration' => [
        'path' => '/registration',
        'file' => 'registration.php',
        'function' => 'app\\src\\registration\\index',
        'methods' => ['GET']
    ],
    'add_user' => [
        'path' => '/add_user',
        'file' => 'registration.php',
        'function' => 'app\\src\\registration\\addUser',
        'methods' => ['POST']
    ],
    'add_articles' => [
        'path' => '/new_article',
        'file' => 'addArticleToDB.php',
        'function' => 'app\\src\\addArticleToDB\\index',
        'methods' => ['GET']
    ],
    'new_article' => [
        'path' => '/new',
        'file' => 'addArticleToDB.php',
        'function' => 'app\\src\\addArticleToDB\\addArticle',
        'methods' => ['POST']
    ],
    'search_posts' => [
        'path' => '/result',
        'file' => 'main.php',
        'function' => 'app\\src\\main\\index',
        'methods' => ['GET']
    ],
    'comments' => [
        'path' => '/{article}/{comment}',
        'file' => 'definite_post.php',
        'function' => 'app\\src\\definite_post\\definite',
        'methods' => ['GET']
    ],
    'article' => [
        'path' => '/{article}/',
        'file' => 'definite_post.php',
        'function' => 'app\\src\\definite_post\\definite',
        'methods' => ['GET']
    ],
    'security_login' => [
        'path' => '/login',
        'file' => 'security.php',
        'function' => 'app\\src\\security\\login',
        'methods' => ['POST']
    ],
    'security_logout' => [
        'path' => '/logout',
        'file' => 'security.php',
        'function' => 'app\\src\\security\\logout',
        'methods' => ['POST']
    ],
];