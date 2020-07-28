<a href="index.php">Accueil</a>
<h1><?= $article['title'] ?></h1>
<small>Écrit le <?= $article['created_at'] ?></small>
<p><?= $article['introduction'] ?></p>
<hr>
<?= $article['content'] ?>

<?php if (count($commentaires) === 0) : ?>
    <h2>Il n'y a pas encore de commentaires pour cet article</h2>
<?php else : ?>
    <h2>Il y a  <?= count($commentaires) ?> commentaires : </h2>
    <?php foreach ($commentaires as $commentaire) : ?>
        <h3>Commentaire de <?= $commentaire['author'] ?></h3>
        <small>Le <?= $commentaire['created_at'] ?></small>
        <blockquote>
            <em><?= $commentaire['content'] ?></em>
        </blockquote>
        <a href="index.php?controller=comment&task=delete&id=<?= $commentaire['id'] ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?!`)">Supprimer</a>
    <?php endforeach ?>
<?php endif ?>
<div class="w3-container w3-margin-bottom">
<form action="index.php?controller=comment&task=insert" method="POST">
    <h3>Voulez-vous dire un mot ?</h3>
    <input class="w3-input w3-padding-16 w3-border"  type="text" name="author" placeholder="Votre pseudo !">
    <textarea class="w3-input w3-padding-16 w3-border w3-margin-top" name="content" id="" cols="30" rows="10" placeholder="Votre commentaire ..."></textarea>
    <input type="hidden" name="article_id" value="<?= $article_id ?>">
    <button  class="w3-button w3-black w3-padding-large w3-margin-top" >Commenter !</button>
</form>

</div>