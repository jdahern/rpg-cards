<?php
namespace OpenDungeon\Controller;

use OpenDungeon\Model\ArticleRepository;
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
    public function __construct(ArticleRepository $repository = null, Twig_Environment $twig  = null)
    {
        $this->repository = $repository;
        $this->twig = $twig;
    }
    /**
     * Example of an invokable class, i.e. a class that has an __invoke() method.
     *
     * @see http://php.net/manual/en/language.oop5.magic.php#object.invoke
     */
    public function __invoke()
    {
        echo $this->twig->render('home.twig', [
            'articles' => $this->repository->getArticles(),
        ]);
    }
}