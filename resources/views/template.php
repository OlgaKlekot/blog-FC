<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style/style.css">
    <title>Document</title>
</head>
<body>
<header class="over">
    <div class="in_out">
        <?php if (!$app['user']): ?>
            <form class="log_in" method="post" action="<?= \app\core\createUrl('security_login') ?>">
                <input placeholder="Login" name="username" required class="field topfield">
                <input type="password" name="password" required placeholder="Password" class="field topfield">
                <button class="button">Log in</button>
            </form>
        <?php else: ?>
            <form class="log_out" method="post" action="<?= \app\core\createUrl('security_logout') ?>">
                <button class="button">Log out</button>
            </form>

        <?php endif; ?>
    </div>

    <div class="massage">
        <?php foreach (['success', 'info', 'warning', 'danger'] as $flashType): ?>
            <?php foreach (\app\core\getFlashes($flashType) as $message): ?>
                <div class="alert alert-<?= $flashType ?>" role="alert">
                    <?= $message ?>
                </div>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
</header>

<header>
    <nav>
        <a href="<?= \app\core\createUrl('main_page') ?>"><input type="button" class="button" value="Main Page"></a>
        <?php if ($app['user']): ?>
        <a href="<?= \app\core\createUrl('addArticles') ?>"><input type="button" class="button" value="Add new Article"></a>
        <?php else: ?>
        <a href="<?= \app\core\createUrl('registration') ?>"><input type="button" class="button" value="Registration"></a>
        <?php endif; ?>
    </nav>

    <form class="search" method="get" action="<?= \app\core\createUrl('searchPosts') ?>">
        <input class="field topfield" placeholder="Enter an article title"  required name="title" />
        <input class="button" type="submit" value="Search">
    </form>
</header>

<div class="page">
    <?= $content ?>
</div>

</body>
</html>