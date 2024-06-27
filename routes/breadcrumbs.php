<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Admin
Breadcrumbs::for('admin.index', function (BreadcrumbTrail $trail) {
    $trail->push('Admin', route('admin.index'));
});

// Home > Categories
Breadcrumbs::for('admin.categories.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Categorías', route('admin.categories.index'));
});


// Home > Categories > Create
Breadcrumbs::for('admin.categories.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.categories.index');
    $trail->push('Crear nueva', route('admin.categories.create'));
});

// Home > Categories > Edit > {category}
Breadcrumbs::for('admin.categories.edit', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('admin.categories.index');
    $trail->push('Editar', route('admin.categories.edit', $category));
});


// Home > SubCategories > Edit > {subcategory}
Breadcrumbs::for('admin.subcategories.edit', function (BreadcrumbTrail $trail, $subcategory) {
    $trail->parent('admin.categories.index');
    $trail->push('Editar', route('admin.subcategories.edit', $subcategory));
});
