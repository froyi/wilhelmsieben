<?php

namespace Project\Controller;


use Project\Module\Database\Database;
use Project\Module\GenericValueObject\Date;
use Project\Module\News\NewsService;
use Project\Module\SoupCalendar\SoupCalendarService;

class IndexController extends DefaultController
{
    public function indexAction(): void
    {
        $database = Database::getInstance();

        /**
         * News Data
         */
        $newsService = new NewsService($database);
        $allNews = $newsService->getAllNewsOrderByDate();

        /**
         * Slider images
         */
        $slider = $this->configuration->getEntryByName('slider');
        shuffle($slider);

        /**
         * Soup Data
         */
        $soupCalendarService = new SoupCalendarService($database);
        $dailySoups = $soupCalendarService->getDailySoup();

        $pageTemplate = 'index.twig';
        $config = [
            'page' => 'home',
            'news' => $allNews,
            'slider' => $slider,
            'dailySoup' => [
                'soups' => $dailySoups,
                'date' => Date::fromValue('now')
            ]
        ];

        $this->viewRenderer->renderTemplate($pageTemplate, $config);
    }
}