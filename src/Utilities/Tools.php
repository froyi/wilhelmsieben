<?php
declare(strict_types=1);

namespace Project\Utilities;

class Tools
{
    const STANDARD_URL = 'index.php';

    /**
     * @param string $name
     * @return bool|string|int
     */
    public static function getValue(string $name)
    {
        if (isset($_GET[$name]) && empty($_GET[$name]) === false) {
            return $_GET[$name];
        }

        if (isset($_POST[$name]) && empty($_POST[$name]) === false) {
            return $_POST[$name];
        }

        if (isset($_SESSION[$name]) && empty($_SESSION[$name]) === false) {
            return $_SESSION[$name];
        }

        return false;
    }

    /**
     * @param string $route
     * @return string
     */
    public static function getRouteUrl(string $route = '', array $parameter = []): string
    {
        if (empty($route)) {
            return self::STANDARD_URL;
        }

        $url = self::STANDARD_URL . '?route=' . $route;

        foreach ($parameter as $key => $value) {
            $url .= '&' . $key . '=' . $value;
        }

        return $url;
    }
}