<?php

namespace App\Utils;

use App\Models\User;

class CouponRules
{
    /**
     * Reglas de cupones
     * 
     * @var array
     */
    protected static $rules = [
        'first_purchase' => 'Primera compra', //Sin valor
        'cart_without_offers' => 'Carrito sin ofertas', //Sin valor 
        'gift_coupon' => 'Cupon de regalo', //Sin valor
        'recuring_users' => 'Usuarios recurrentes', //Sin valor
        'cart_with_offers' => 'Carrito con ofertas', //Sin valor
        'minimun_products' => 'Productos minimos', //Con valor 3
        'minimum_amount' => 'Monto minimo', //Con valor 100
        'special_date' => 'Fecha especial', //Con valor 2021-12-25 
        'time_of_the_day' => 'Hora del dia', //Con valor 12:00
        'specific_category' => 'Categoria especifica', //Con valor 1 Viene de un Modelo
        'specific_products' => 'Productos especificos', //Con valor [1] o [1,2,3] Viene de un Modelo
        'specific_brands' => 'Marcas especificas', //Con valor [1] o [1,2,3] Viene de un Modelo
        'specific_labels' => 'Etiquetas especificas', //Con valor [1] o [1,2,3] Viene de un Modelo
        'specific_categories' => 'Categorias especificas', //Con valor [1] o [1,2,3] Viene de un Modelo
        'combination_of_products' => 'Combinacion de productos', //Con valor [1] o [1,2,3] Viene de un Modelo
        'specific_payment_methods' => 'Metodos de pago especificos', //Con valor [1] o [1,2,3] Viene de un Modelo
        'specific_shipping_methods' => 'Metodos de envio especificos', //Con valor [1] o [1,2,3] Viene de un Modelo
    ];

    /**
     * Reglas predefinidas
     * 
     * @var array
     */
    protected $predefinedRules = [
        'first_purchase' => 'validateFirstPurchase',
        'specific_products' => 'validateSpecificProducts',
        'brands_specifics' => 'validateBrandsSpecifics',
        'special_date' => 'validateSpecialDate',
        'specific_labels' => 'validateSpecificLabels',
        'minimum_amount' => 'validateMinimumAmount',
        'specific_categories' => 'validateSpecificCategories',
        'minimun_products' => 'validateMinimumProducts',
        'recuring_users' => 'validateRecuringUsers',
        'cart_with_offers' => 'validateCartWithOffers',
        'combination_of_products' => 'validateCombinationOfProducts',
        'time_of_the_day' => 'validateTimeOfTheDay',
        'gift_coupon' => 'validateGiftCoupon',
        'specific_payment_methods' => 'validateSpecificPaymentMethods',
        'specific_shipping_methods' => 'validateSpecificShippingMethods',
        'cart_without_offers' => 'validateCartWithoutOffers',
        'specific_category' => 'validateSpecificCategory',
    ];

    public static function getRule($rule)
    {
        return self::$rules[$rule] ?? null;
    }

    public static function getPredefinedRules()
    {
        return self::$rules;
    }

    public function validateCoupon($rule, $conditions)
    {
        if (!isset($this->predefinedRules[$rule])) {
            throw new \Exception("Regla no válida");
        }

        $method = $this->predefinedRules[$rule];

        if (!method_exists($this, $method)) {
            throw new \Exception("El método de validación no existe.");
        }

        return $this->{$method}($conditions);
    }

    protected function validateMinimumProducts($conditions)
    {
        $cartTotal = $conditions["cart_count"] ?? 0;
        $minimumAmount = $conditions["parameter"];
        return $cartTotal >= $minimumAmount;
    }

    protected function validateFirstPurchase($conditions)
    {
        $user = $conditions['user'] ?? null;
        if ($user && $user->orders()->count() == 0) {
            return true;
        }
        return false;
    }

    protected function validateGiftCoupon($conditions)
    {
        return true;
    }
}
