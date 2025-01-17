<?php

namespace Controllers;


class Comment extends Controller
{
    protected $modelName = \Models\Comment::class;

    public function insert()
    {
        $articleModel = new \Models\Article();
        /**
         * On vérifie que les données ont bien été envoyées en POST
         * D'abord, on récupère les informations à partir du POST
         * Ensuite, on vérifie qu'elles ne sont pas nulles
         */
        $author = null;
        if (!empty($_POST['author'])) {
            $author = $_POST['author'];
        }

        // Ensuite le contenu
        $content = null;
        if (!empty($_POST['content'])) {
            // On fait quand même gaffe à ce que le gars n'essaye pas des balises cheloues dans son commentaire
            $content = htmlspecialchars($_POST['content']);
        }

        // Enfin l'id de l'article
        $article_id = null;
        if (!empty($_POST['article_id']) && ctype_digit($_POST['article_id'])) {
            $article_id = $_POST['article_id'];
        }

        // Vérification finale des infos envoyées dans le formulaire (donc dans le POST)
        // Si il n'y a pas d'auteur OU qu'il n'y a pas de contenu OU qu'il n'y a pas d'identifiant d'article
        if (!$author || !$article_id || !$content) {
            die('Votre formulaire a été mal rempli !');
        }

        /**
         * Vérification que l'id de l'article pointe bien vers un article qui existe
         * Ca nécessite une connexion à la base de données puis une requête qui va aller chercher l'article en question
         */
        $article = $articleModel->find($article_id);

        // Si rien n'est revenu, on fait une erreur
        if (!$article) {
            die('L\'article '. $article_id . ' n\'existe pas !');
        }

        // Insertion du commentaire
        $this->model->insert($author, $content, $article_id);

        // Redirection vers l'article en question :
        \Http::redirect('index.php?controller=article&task=show&id=' . $article_id);
    }

    public function delete()
    {
        /**
         * Récupération du paramètre "id" en GET
         */
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die('Fallait préciser le paramètre id en GET !');
        }

        $id = $_GET['id'];
        /**
         * Vérification de l'existence du commentaire
         */
        $commentaire = $this->model->find($id);
        if (!$commentaire) {
            die('Aucun commentaire n\'a l\'identifiant ' . $id );
        }

        /**
         * Suppression réelle du commentaire
         * On récupère l'identifiant de l'article avant de supprimer le commentaire
         */
        $article_id = $commentaire['article_id'];

        $this->model->delete($id);

        /**
         * Redirection vers l'article en question
         */

        \Http::redirect('index.php?controller=article&task=show&id=' . $article_id);
    }
}
