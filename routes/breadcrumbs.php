<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});

// Dashboard > Home
Breadcrumbs::for('dashboard_home', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Home', '#');
});

// Dashboard > Categories
Breadcrumbs::for('categories', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Categories', route('categories.index'));
});
// Dashboard > Categories > add
Breadcrumbs::for('add_categories', function (BreadcrumbTrail $trail) {
    $trail->parent('categories');
    $trail->push('Add', route('categories.create'));
});
// Dashboard > Categories > edit
Breadcrumbs::for('edit_categories', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('categories');
    $trail->push('Edit', route('categories.edit', ['category' => $category]));
});
// Dashboard > Categories > edit > [Title]
Breadcrumbs::for('edit_categories_title', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('edit_categories', $category);
    $trail->push($category->title, route('categories.edit', ['category' => $category]));
});
// Dashboard > Categories > Detail
Breadcrumbs::for('detail_categories', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('categories');
    $trail->push('Detail', route('categories.show', ['category' => $category]));
});
// Dashboard > Categories > Detail > [Title]
Breadcrumbs::for('detail_categories_title', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('detail_categories', $category);
    $trail->push($category->title, route('categories.show', ['category' => $category]));
});

// Dashboard > Tags
Breadcrumbs::for('tags', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Tags', route('tags.index'));
});
// Dashboard > Tags > Add
Breadcrumbs::for('add_tags', function (BreadcrumbTrail $trail) {
    $trail->parent('tags');
    $trail->push('Add', route('tags.create'));
});
// Dashboard > Tags > Edit
Breadcrumbs::for('edit_tags', function (BreadcrumbTrail $trail, $tag) {
    $trail->parent('tags');
    $trail->push('Edit', route('tags.edit', ['tag' => $tag]));
    $trail->push($tag->title, route('tags.edit', ['tag' => $tag]));
});
// // Home > Blog
// Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
//     $trail->parent('home');
//     $trail->push('Blog', route('blog'));
// });

// // Home > Blog > [Category]
// Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category));
// });
