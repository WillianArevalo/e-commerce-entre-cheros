<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Admin
Breadcrumbs::for('admin.index', function (BreadcrumbTrail $trail) {
    $trail->push('Admin', route('admin.index'));
});

// Admin => Categories
Breadcrumbs::for('admin.categories.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Categorías', route('admin.categories.index'));
});

// Admin > Categories > Create
Breadcrumbs::for('admin.categories.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.categories.index');
    $trail->push('Crear nueva', route('admin.categories.create'));
});

// Admin > Categories > Edit > {category}
Breadcrumbs::for('admin.categories.edit', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('admin.categories.index');
    $trail->push('Editar', route('admin.categories.edit', $category));
});

// Admin > SubCategories > Edit > {subcategory}
Breadcrumbs::for('admin.subcategories.edit', function (BreadcrumbTrail $trail, $subcategory) {
    $trail->parent('admin.categories.index');
    $trail->push('Editar', route('admin.subcategories.edit', $subcategory));
});

// Admin > Brands
Breadcrumbs::for('admin.brands.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Marcas', route('admin.brands.index'));
});

// Admin > Products
Breadcrumbs::for('admin.products.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Productos', route('admin.products.index'));
});

// Admin > Products > Create
Breadcrumbs::for('admin.products.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.products.index');
    $trail->push('Crear nuevo', route('admin.products.create'));
});

//Admin > Products > Detalles > {product}
Breadcrumbs::for('admin.products.show', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('admin.products.index');
    $trail->push('Detalles', route('admin.products.show', $product));
});

// Admin > Products > Edit > {product}
Breadcrumbs::for('admin.products.edit', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('admin.products.index');
    $trail->push('Editar', route('admin.products.edit', $product));
});

//Admin > Flash Offers
Breadcrumbs::for('admin.flash-offers.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Ofertas Flash', route('admin.flash-offers.index'));
});

//Admin > Flash Offers > Create
Breadcrumbs::for('admin.flash-offers.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.flash-offers.index');
    $trail->push('Crear nueva', route('admin.flash-offers.create'));
});

//Admin > Flash Offers > Edit > {flashOffer}
Breadcrumbs::for('admin.flash-offers.edit', function (BreadcrumbTrail $trail, $flashOffer) {
    $trail->parent('admin.flash-offers.index');
    $trail->push('Editar', route('admin.flash-offers.edit', $flashOffer));
});

//Admin > Popups
Breadcrumbs::for('admin.popups.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Popups', route('admin.popups.index'));
});

//Admin > Popups > Create
Breadcrumbs::for('admin.popups.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.popups.index');
    $trail->push('Crear nuevo', route('admin.popups.create'));
});

//Admin > Users
Breadcrumbs::for('admin.users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Usuarios', route('admin.users.index'));
});

//Admin > Users > Create
Breadcrumbs::for('admin.users.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.users.index');
    $trail->push('Crear nuevo', route('admin.users.create'));
});

//Admin > Users > Edit > {user}
Breadcrumbs::for('admin.users.edit', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('admin.users.index');
    $trail->push('Editar', route('admin.users.edit', $user));
});

//Admin > Customers
Breadcrumbs::for('admin.customers.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Clientes', route('admin.customers.index'));
});

//Admin > Customers > Create
Breadcrumbs::for('admin.customers.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.customers.index');
    $trail->push('Crear nuevo', route('admin.customers.create'));
});

//Admin > Customers > Edit > {customer}
Breadcrumbs::for('admin.customers.edit', function (BreadcrumbTrail $trail, $customer) {
    $trail->parent('admin.customers.index');
    $trail->push('Editar', route('admin.customers.edit', $customer));
});

//Admin > General Settings
Breadcrumbs::for('admin.general-settings', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Ajustes generales', route('admin.general-settings'));
});


//Admin > Settings
Breadcrumbs::for('admin.settings', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Configuración', route('admin.settings'));
});

//Admin > Policies
Breadcrumbs::for('admin.policies.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Políticas', route('admin.policies.index'));
});

//Admin > FAQ 
Breadcrumbs::for('admin.faq.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Preguntas frecuentes', route('admin.faq.index'));
});

//Admin > Support Tickets
Breadcrumbs::for('admin.support-tickets.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Tickets de soporte', route('admin.support-tickets.index'));
});

//Admin > Support Tickets > Show
Breadcrumbs::for('admin.support-tickets.show', function (BreadcrumbTrail $trail, $supportTicket) {
    $trail->parent('admin.support-tickets.index');
    $trail->push('Detalles', route('admin.support-tickets.show', $supportTicket));
});

//Admin > Orders
Breadcrumbs::for('admin.orders.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Pedidos', route('admin.orders.index'));
});

//Admin > Sales Strategies
Breadcrumbs::for('admin.sales-strategies.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Estrategias de venta', route('admin.sales-strategies.index'));
});

//Admin > Sales Strategies > New Coupon
Breadcrumbs::for('admin.sales-strategies.coupon.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.sales-strategies.index');
    $trail->push("Cupón", route('admin.sales-strategies.index'));
    $trail->push('Nuevo', route('admin.sales-strategies.coupon.create'));
});

//Admin > Sales Strategies > Show Coupon > {coupon}
Breadcrumbs::for('admin.sales-strategies.coupon.show', function (BreadcrumbTrail $trail, $coupon) {
    $trail->parent('admin.sales-strategies.index');
    $trail->push("Cupón", route('admin.sales-strategies.index'));
    $trail->push('Detalles', route('admin.sales-strategies.coupon.show', $coupon));
});

//Admin > Sales Strategies > Edit Coupon > {coupon}
Breadcrumbs::for('admin.sales-strategies.coupon.edit', function (BreadcrumbTrail $trail, $coupon) {
    $trail->parent('admin.sales-strategies.index');
    $trail->push("Cupón", route('admin.sales-strategies.index'));
    $trail->push('Editar', route('admin.sales-strategies.coupon.edit', $coupon));
});

//Admin > Sales Strategies > Shipping Methods
Breadcrumbs::for('admin.sales-strategies.shipping-methods.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.sales-strategies.index');
    $trail->push('Métodos de envío', route('admin.sales-strategies.shipping-methods.index'));
});