<?php include __DIR__ . '/../blocks/header.php'; ?>
    <h1><?= $article->getName() ?></h1>
    <p><?= $article->getText() ?></p>
    <p>Автор: <?= $article->getAuthor()->getNickname() ?></p>
    <?php if($user->getRole() === 'admin'): ?>
        <a href="/articles/<?=$article->getId()?>/edit">Изменить</a>
    <?php endif; ?>
<?php include __DIR__ . '/../blocks/footer.php'; ?>