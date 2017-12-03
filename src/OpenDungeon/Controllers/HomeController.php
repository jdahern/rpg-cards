<?php
namespace OpenDungeon\Controllers;

use OpenDungeon\Model\Article\Repository as ArticleRepository;
use Twig_Environment;

class HomeController
{
    /**
     * @var ArticleRepository
     */
    private $repository;
    
    /**
     * @var Twig_Environment
     */
    private $twig;
    
    public function __construct(ArticleRepository $repository, Twig_Environment $twig)
    {
        $this->repository = $repository;
        $this->twig = $twig;
    }
    
    public function handle()
    {
        echo $this->twig->render('home.twig', [
            'articles' => $this->repository->getArticles(),
        ]);
    }
}