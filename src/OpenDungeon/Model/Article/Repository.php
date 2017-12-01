<?php

namespace OpenDungeon\Model\Article;

/**
 * This is an interface so that the model is coupled to a specific backend.
 *
 * This is also so that we can demonstrate how to bind an interface
 * to an implementation with PHP-DI.
 */
interface Repository
{
    /**
     * @return Article[]
     */
    public function getArticles();
    
    /**
     * @param string $id
     * @return Article
     */
    public function getArticle($id);
}