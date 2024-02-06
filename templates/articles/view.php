<?php include __DIR__ . '/../header.php'; ?>
    <h1><?= $article['name'] ?></h1>
    <h2><?= $author[0]['nickname'] ?></h2>
    <p><?= $article['text'] ?></p>
<?php include __DIR__ . '/../footer.php'; ?>