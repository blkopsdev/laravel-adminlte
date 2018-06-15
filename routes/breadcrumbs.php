<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('welcome'));
});

// Home > Login
Breadcrumbs::register('login', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Login', route('login'));
});

if (config('adminlte.registration_open')) {
    // Home > Register
    Breadcrumbs::register('register', function ($breadcrumbs) {
        $breadcrumbs->parent('home');
        $breadcrumbs->push('Register', route('register'));
    });
}

// Home > Login > Forgot Password
Breadcrumbs::register('password-request', function ($breadcrumbs) {
    $breadcrumbs->parent('login');
    $breadcrumbs->push('Forgot Password', route('password.request'));
});

// Home > Login > Forgot Password > Reset Password
Breadcrumbs::register('password-reset', function ($breadcrumbs) {
    $breadcrumbs->parent('password-request');
    $breadcrumbs->push('Reset Password', route('password.reset'));
});

// Dashboard
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('dashboard::index'));
});

// Dashboard > Profile
Breadcrumbs::register('profile', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Profile', route('dashboard::profile'));
});
//Dashboard > Article

    // List
    Breadcrumbs::register('articles', function ($breadcrumbs) {
        $breadcrumbs->parent('dashboard');
        $breadcrumbs->push('Articles', route('dashboard::articles.index'));
    });
    // Create
    Breadcrumbs::register('articles_create', function ($breadcrumbs) {
        $breadcrumbs->parent('articles');
        $breadcrumbs->push('Create', route('dashboard::articles.create'));
    });
    // Edit
    Breadcrumbs::register('articles_edit', function ($breadcrumbs, $article) {
        $breadcrumbs->parent('articles');
        $breadcrumbs->push('Edit', route('dashboard::articles.edit', $article->id));
    });
    Breadcrumbs::register('articles_show', function ($breadcrumbs, $article) {
        $breadcrumbs->parent('articles');
        $breadcrumbs->push('Show', route('dashboard::articles.show', $article->id));
    });

// Admin
Breadcrumbs::register('admin', function ($breadcrumbs) {
    $breadcrumbs->push('Admin', route('admin::index'));
});

// Admin / {Resource} / {List|Edit|Create}
$resources = [
    'users' => 'Users',
];
foreach ($resources as $resource => $data) {
    $parent = 'admin';
    $title = $data;
    if (is_array($data)) {
        $title = $data['title'];
        $parent = $data['parent'];
    }
    $resource = 'admin::' . $resource;

    // List
    Breadcrumbs::register($resource, function ($breadcrumbs) use ($resource, $title, $parent) {
        $breadcrumbs->parent($parent);
        $breadcrumbs->push($title, route($resource.'.index'));
    });
    // Create
    Breadcrumbs::register($resource.'.create', function ($breadcrumbs) use ($resource) {
        $breadcrumbs->parent($resource);
        $breadcrumbs->push('Create', route($resource.'.create'));
    });
    // Edit
    Breadcrumbs::register($resource.'.edit', function ($breadcrumbs, $id) use ($resource) {
        $breadcrumbs->parent($resource);
        $breadcrumbs->push('Edit', route($resource.'.edit', $id));
    });
}
