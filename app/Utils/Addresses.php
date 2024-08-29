<?php

namespace App\Utils;

class Addresses
{
    /**
     * Direcciones predefinidas
     * 
     * @var array
     */
    protected static $addresses = [
        'shipping_address' => 'Dirección de envío',
        'home_address' => 'Dirección de casa',
        'billing_address' => 'Dirección de facturación',
        'alternative_address' => 'Dirección alternativa',
    ];

    public static function getAddresses()
    {
        return self::$addresses;
    }

    public static function getAddress($address)
    {
        return self::$addresses[$address] ?? null;
    }
}