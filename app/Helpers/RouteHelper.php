<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;

class RouteHelper
{
    public static function getRoutes()
    {
        $routes = collect(Route::getRoutes())->map(function ($route) {
            if (in_array("GET", $route->methods()) && $route->uri() != "/" && strpos($route->uri(), "admin") === false) {
                return $route->uri();
            }
        })->filter()->values();
        return $routes;
    }

    public static function isActive($routes)
    {
        foreach ((array) $routes as $route) {
            if (Route::is($route . "*")) {
                return "active-link-admin";
            }
        }
        return "";
    }
}
