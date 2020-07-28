<!-- Blog entries -->
<div class="w3-col s12">
    <h1 class="w3-padding-large">Nos articles</h1>
<!-- Blog entry -->
    <?php foreach ($articles as $article) : ?>
        <div class="w3-card-4 w3-margin w3-white ">
            <div class="w3-container ">
                <h3><b><?= $article['title'] ?></b></h3>
                <h5><span class="w3-opacity">Ecrit le <?= $article['created_at'] ?></span></h5>
            </div>

            <div class="w3-container">
                <p><?= $article['introduction'] ?></p>
                <div class="w3-row">
                    <div class="w3-col m8 s12">
                        <p><b><a class="w3-button w3-padding-large w3-white w3-border" href="index.php?controller=article&task=show&id=<?= $article['id'] ?>">Lire la suite &raquo;</a></b></p>
                    </div>
                    <div class="w3-col m4 w3-hide-small">
                        <p><span class="w3-padding-large w3-right"><a href="index.php?controller=article&task=delete&id=<?= $article['id'] ?>" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div>
        <?php endforeach ?>
        <!-- END BLOG ENTRIES -->