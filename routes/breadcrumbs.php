<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

//==================BLOG=================//
// Blog
Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
    $trail->push('Blog', route('blog.home'));
});

// Blog > Home
Breadcrumbs::for('blog_home', function (BreadcrumbTrail $trail) {
    $trail->parent('blog');
    $trail->push('Home', '#');
});
// Blog > Post > [title]
Breadcrumbs::for('blog_detail', function (BreadcrumbTrail $trail, $title) {
    $trail->parent('blog');
    $trail->push('Home', route('blog.home'));
    $trail->push($title, '#');
});
// Blog > Categories
Breadcrumbs::for('blog_categories', function (BreadcrumbTrail $trail) {
    $trail->parent('blog');
    $trail->push('Categories', route('blog.categories'));
});
// Blog > Categories > [Title]
Breadcrumbs::for('blog_posts_category', function (BreadcrumbTrail $trail, $title) {
    $trail->parent('blog');
    $trail->push('Categories', route('blog.categories'));
    $trail->push($title, '#');
});
// Blog > Tags
Breadcrumbs::for('blog_tags', function (BreadcrumbTrail $trail) {
    $trail->parent('blog');
    $trail->push('Tags', route('blog.tags'));
});
// Blog > Tags > [Title]
Breadcrumbs::for('blog_posts_tag', function (BreadcrumbTrail $trail, $title) {
    $trail->parent('blog');
    $trail->push('Tag', route('blog.tags'));
    $trail->push($title, '#');
});
// Blog > [Title]
Breadcrumbs::for('blog_search', function (BreadcrumbTrail $trail, $keyword) {
    $trail->parent('blog');
    $trail->push('Search', route('blog.search'));
    $trail->push($keyword, route('blog.search'));
});
//==================DASHBOARD=================//
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

// Dashboard > Posts
Breadcrumbs::for('posts', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Post', route('posts.index'));
});
// Dashboard > Posts > Add
Breadcrumbs::for('add_post', function (BreadcrumbTrail $trail) {
    $trail->parent('posts');
    $trail->push('Add', route('posts.create'));
});
// Dashboard > Posts > Add > Detail > [Title]
Breadcrumbs::for('detail_post', function (BreadcrumbTrail $trail, $post) {
    $trail->parent('posts');
    $trail->push('Detail', route('posts.show', ['post' => $post]));
    $trail->push($post->title, route('posts.show', ['post' => $post]));
});
// Dashboard > Posts > Edit > [Title]
Breadcrumbs::for('edit_post', function (BreadcrumbTrail $trail, $post) {
    $trail->parent('posts');
    $trail->push('Edit', route('posts.edit', ['post' => $post]));
    $trail->push($post->title, route('posts.edit', ['post' => $post]));
});
// Dashboard > FileManager
Breadcrumbs::for('file_manager', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('File Manager', route('filemanager.index'));
});
// Dashboard > Role
Breadcrumbs::for('roles', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Roles', route('roles.index'));
});
// Dashboard > Role > Add
Breadcrumbs::for('add_role', function (BreadcrumbTrail $trail) {
    $trail->parent('roles');
    $trail->push('Add', route('roles.create'));
});
// Dashboard > Role > Detail > [Title]
Breadcrumbs::for('edit_role', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('roles');
    $trail->push('Edit', route('roles.show', ['role' => $role]));
    $trail->push($role->name, route('roles.show', ['role' => $role]));
});
// Dashboard > Role > Detail > [Title]
Breadcrumbs::for('detail_role', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('roles');
    $trail->push('Detail', route('roles.edit', ['role' => $role]));
    $trail->push($role->name, route('roles.edit', ['role' => $role]));
});
// Dashboard > Users
Breadcrumbs::for('users', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('User', route('users.index'));
});
// Dashboard > Users > Add
Breadcrumbs::for('add_user', function (BreadcrumbTrail $trail) {
    $trail->parent('users');
    $trail->push('Add', route('users.create'));
});
// Dashboard > Users > Edit > [Name]
Breadcrumbs::for('edit_user', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('users');
    $trail->push('Edit', route('users.edit', ['user' => $user]));
    $trail->push($user->name, route('users.edit', ['user' => $user]));
});
