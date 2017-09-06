<?php

namespace Project\Controller;


use Project\Module\Database\Database;
use Project\Module\News\NewsService;

class IndexController extends DefaultController
{
    public function indexAction(): void
    {
        $database = Database::getInstance();

        $newsService = new NewsService($database);
        $allNews = $newsService->getAllNewsOrderByDate();

        $slider = $this->configuration->getEntryByName('slider');
        shuffle($slider);

        $pageTemplate = 'index.twig';
        $config = [
            'page' => 'home',
            'news' => $allNews,
            'slider' => $slider,
            'dailySoup' => [
                'day' => 'Mo|31.07.2017',
                'soup' => ['Erbsensuppe', 'Linsensuppe']
            ]
        ];

        $this->viewRenderer->renderTemplate($pageTemplate, $config);
    }
}