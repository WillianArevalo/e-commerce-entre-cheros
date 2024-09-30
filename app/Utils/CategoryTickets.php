<?php

namespace App\Utils;

class CategoryTickets
{
    /**
     * Categorías predefinidas
     * 
     * @var array
     */
    protected static $categories = [
        'technical' => 'Soporte técnico',
        'billing' => 'Facturación',
        'sales' => 'Ventas',
        'general' => 'General',
        'other' => 'Otro',
    ];

    public static function getCategories()
    {
        return self::$categories;
    }

    public static function getCategory($category)
    {
        return self::$categories[$category] ?? null;
    }
}
