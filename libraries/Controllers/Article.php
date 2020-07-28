<?php

namespace Controllers;

class Article extends Controller
{
    protected $modelName = \Models\Article::class;
    public function index()
    {
        /**
         * Récupération des articles
         */
        $articles = $this->model->findAll('created_at DESC');

        /**
         * Affichage
         */
        $pageTitle = 'Accueil';
        $path = 'articles/index';

        \Renderer::render($path, compact('pageTitle', 'articles'));
    }

    public function show()
    {
        $commentModel = new \Models\Comment();
        /**
         * Récupération du param "id" et vérification de celui-ci
         */
        // On part du principe qu'on ne possède pas de param "id"
        $article_id = null;

        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $article_id = $_GET['id'];
        }

        if (!$article_id) {
            die("Vous devez préciser un paramètre `id` dans l'URL !");
        }

        /**
         * Récupération de l'article en question
         * On va ici utiliser une requête préparée
         */

        $article = $this->model->find($article_id);

        /**
         * Récupération des commentaires de l'article en question
         * Pareil, toujours une requête préparée
         */

        $commentaires = $commentModel->findAllWithArticle($article_id);

        /**
         * On affiche
         */
        $pageTitle = $article['title'];

        \Renderer::render('articles/show', compact('pageTitle', 'article', 'commentaires', 'article_id'));
    }

    public function delete()
    {
        /**
         *  On vérifie que le GET possède bien un paramètre "id" (delete.php?id=202) et que c'est bien un nombre
         */
        if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
            die('Tu n\'as pas précisé l\'id de l\'article !');
        }

        $id = $_GET['id'];

        /**
         *  Vérification que l'article existe bel et bien
         */
        $article = $this->model->find($id);
        if (!$article) {
            die('L\'article ' . $id . 'n\'existe pas, vous ne pouvez donc pas le supprimer !');
        }

        /**
         * Réelle suppression de l'article
         */
        $this->model->delete($id);
        /**
         *  Redirection vers la page d'accueil
         */

        \Http::redirect('index.php');
    }
}
