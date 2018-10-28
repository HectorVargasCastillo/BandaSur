<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Inicio', route('welcome'));
});

// Home > Login
Breadcrumbs::register('login', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Iniciar Sesion', route('login'));
});

if (config('adminlte.registration_open')) {
    // Home > Register
    Breadcrumbs::register('register', function ($breadcrumbs) {
        $breadcrumbs->parent('home');
        $breadcrumbs->push('Registrarse', route('register'));
    });
}

// Home > Login > Forgot Password
Breadcrumbs::register('password-request', function ($breadcrumbs) {
    $breadcrumbs->parent('login');
    //$breadcrumbs->push('Forgot Password', route('password.request'));
    $breadcrumbs->push('Olvido su Contraseña', route('password.request'));
});

// Home > Login > Forgot Password > Reset Password
Breadcrumbs::register('password-reset', function ($breadcrumbs) {
    $breadcrumbs->parent('password-request');
    //$breadcrumbs->push('Reset Password', route('password.request'));
    $breadcrumbs->push('Resetear Contraseña', route('password.request'));
});

// Dashboard
Breadcrumbs::register('dashboard', function ($breadcrumbs) {
    //$breadcrumbs->push('Dashboard', route('dashboard::index'));
    $breadcrumbs->push('Menu Principal', route('dashboard::index'));
});

// Dashboard > Profile
Breadcrumbs::register('profile', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard');
    //$breadcrumbs->push('Profile', route('dashboard::profile'));
    $breadcrumbs->push('Perfil', route('dashboard::profile'));
});

// Admin
Breadcrumbs::register('admin', function ($breadcrumbs) {
    $breadcrumbs->push('Administrador', route('admin::index'));
});

// Admin / {Resource} / {List|Edit|Create}
$resources = [
    'users' => 'Usuarios',
    
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
        //$breadcrumbs->push('Create', route($resource.'.create'));
        $breadcrumbs->push('Crear', route($resource.'.create'));
    });
    // Edit
    Breadcrumbs::register($resource.'.edit', function ($breadcrumbs, $id) use ($resource) {
        $breadcrumbs->parent($resource);
        $breadcrumbs->push('Editar', route($resource.'.edit', $id));
    });
}
