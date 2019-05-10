<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('conflict.index', function ($trail) {
    $trail->push('Conflict Episodes', route('conflict.index'));
});

Breadcrumbs::for('conflict.show', function ($trail, $conflict) {
    $trail->parent('conflict.index');

    $trail->push("$conflict->name", route('conflict.show', $conflict));
});

Breadcrumbs::for('justice.create', function ($trail, $conflict) {
    $trail->parent('conflict.show', $conflict);

    $trail->push('Create DCJ', route('justice.create', $conflict));
});

Breadcrumbs::for('justice.edit', function ($trail, $conflict, $justice) {
    $trail->parent('conflict.show', $conflict);

    $trail->push("$justice->name", route('justice.edit', ['conflict' => $conflict, 'justice' => $justice]));
});

Breadcrumbs::for('user.index', function ($trail) {
    $trail->push('People', route('user.index'));
});


Breadcrumbs::for('task.index', function ($trail) {
    $trail->push('Assignments', route("task.index"));
});
Breadcrumbs::for('task.create', function ($trail) {
    $trail->push('Assign Tasks', route('task.create'));
});

/*
// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > About
Breadcrumbs::for('about', function ($trail) {
    $trail->parent('home');
    $trail->push('About', route('about'));
});

// Home > Blog
Breadcrumbs::for('blog', function ($trail) {
    $trail->parent('home');
    $trail->push('Blog', route('blog'));
});

// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});
*/