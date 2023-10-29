<?php include __DIR__ . '/../blocks/header.php'; ?>
    <h1><?= $article->getName() ?></h1>
    <p><?= $article->getText() ?></p>
    <p>Автор: <?= $article->getAuthor()->getNickname() ?></p>

    <?php if($user != null && $user->getRole() === 'admin'): ?>
        <a href="/articles/<?=$article->getId()?>/edit">Изменить</a>
    <?php endif; ?>

    <h1>Комментарии</h1>

    <?php if($user !== null): ?>
        <form action="/articles/<?=$article->getId()?>/comments/add" method="post">
            <label for="text">Текст</label><br>
            <textarea name="text" id="text" rows="10" cols="80"><?= $_POST['text'] ?? '' ?></textarea><br>
            <input type="hidden" name="articleId" value="<?= $article->getId() ?>">
            <br>
            <input type="submit" value="Отправить">
        </form>
    <?php else: ?>
        <p><a href="/users/login">Войдите</a> или <a href="/users/register">Зарегистрируйтесь</a> чтобы оставить комментарий</p>
    <?php endif; ?>

    <?php foreach ($comments as $comment): ?>
    <div style="justify-content: space-between;">
        <h2 style="text-align:left;float:left;"><?= $comment->getText() ?></h2>
        <h4 style="text-align:right;float:right;display:inline;position: relative;bottom:-5px;"><?= $comment->getTime() ?></h4>
        <hr style="clear:both;"/>
    </div>
    <?php endforeach; ?>

<?php include __DIR__ . '/../blocks/footer.php'; ?>