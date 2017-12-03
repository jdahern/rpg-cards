<?php

use DI\object;
use OpenDungeon\Model\Article\Repository as ArticleRepository;
use OpenDungeon\Persistence\InMemoryArticleRepository;
return [
    // Bind an interface to an implementation
    ArticleRepository::class => object(InMemoryArticleRepository::class),
    // Configure Twig
    Twig_Environment::class => function () {
        $loader = new Twig_Loader_Filesystem(__DIR__ . '/../src/OpenDungeon/Views');
        return new Twig_Environment($loader);
    },
];