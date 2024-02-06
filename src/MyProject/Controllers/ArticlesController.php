<?php

namespace MyProject\Controllers;

use MyProject\Services\Db;
use MyProject\View\View;

class ArticlesController
{
    /** @var View */
    private $view;

    /** @var Db */
    private $db;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../templates');
        $this->db = new Db();
    }

    public function view(int $articleId)
    {
        $result = $this->db->query(
            'SELECT * FROM `articles` WHERE id = :id;',
            [':id' => $articleId]
        );
        //var_dump($result);
        echo '<BR>';
        //var_dump($result[0]['author_id']);
        $nameAuthor = $this->db->query(
            'SELECT nickname FROM `users` WHERE id = :id;',
            [':id' => $result[0]['author_id']]
        ); 
        echo '<BR>';
        var_dump($nameAuthor);
        echo '<BR>'; 
        if ($result === []) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
                
        $this->view->renderHtml('articles/view.php', ['article' => $result[0], 'author'=>$nameAuthor]);
    }
}