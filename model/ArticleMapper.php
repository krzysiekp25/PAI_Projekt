<?php

require_once 'Article.php';
require_once 'Topic.php';
require_once __DIR__.'/../Database.php';

class ArticleMapper
{

    private $database;

    public function __construct()
    {
        $this->database = new Database();
    }

    public function getAllArticles() :array{
        try {
            $stmt = $this->database->connect()->prepare(
                'SELECT * FROM article a inner join topic t on a.id_topic = t.id_topic inner join user u on a.owner = u.id_user');
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $article = [];
            foreach ($result as $rawArticle) {
                $user = new User($rawArticle['id_user'], null, null, $rawArticle['email'], $rawArticle['login'], null, null);
                $topic = new Topic($rawArticle['id_topic'], $rawArticle['topic']);
                array_push($article, new Article($rawArticle['id_article'], $rawArticle['title'], $rawArticle['content'], $user, $topic));
            }
            /*ob_start();
            var_dump($article);
            error_log(ob_get_clean());*/
            return $article;
        }
        catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}