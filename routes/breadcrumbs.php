<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Conflicts', route('home'));
});


Breadcrumbs::for('conflict-series.index', function ($trail) {
    
    if (isTaskWorkflow()) {
        $trail->parent('task.index');
    } else {
    }

    $trail->push("Conflicts", route('conflict-series.index'));
});

Breadcrumbs::for('conflict-series.show', function ($trail, $conflictSeries) {
    
    if (isTaskWorkflow()) {
        $trail->parent('task.index');
    } else {
        $trail->parent('home');
    }

    $trail->push("UCDP " . $conflictSeries->id, route('conflict-series.show', $conflictSeries));
});

Breadcrumbs::for('conflict.index', function ($trail) {
    $trail->push('Conflict Years', route('conflict.index'));
});

Breadcrumbs::for('conflict.show', function ($trail, $conflict) {
    if  (isTaskWorkflow()) {
        //d($conflict, $conflict->series);
        $trail->parent('task.index');

        $trail->push("UCDP " . $conflict->series->id, route('conflict-series.show', $conflict->series));


        //$trail->push($conflict->name, route('conflict.show', ['conflict' => $conflict, 'task' => isTaskWorkflow()]));
    } else {
        $trail->parent('conflict-series.show', $conflict->series);

    }
        $trail->push($conflict->name, route('conflict.show', $conflict));
    
});

Breadcrumbs::for('justice.create', function ($trail, $conflict) {
    $trail->parent('conflict.show', $conflict);

    $trail->push('New DCJ', route('justice.create', $conflict));
});

Breadcrumbs::for('justice.edit', function ($trail, $conflict, $justice) {
    $trail->parent('conflict.show', $conflict);

    $trail->push("$justice->name", route('justice.edit', ['conflict' => $conflict, 'justice' => $justice]));
});


Breadcrumbs::for('justice.show', function ($trail, $conflict, $justice) {
    $trail->parent('conflict.show', $conflict);

    $trail->push("$justice->name", route('justice.show', ['conflict' => $conflict, 'justice' => $justice]));
});

Breadcrumbs::for('user.index', function ($trail) {
    $trail->push('The DCJ Team', route('user.index'));
});

Breadcrumbs::for('user.create', function ($trail) {
    $trail->parent('user.index');
    $trail->push('Add Team Member', route('user.create'));
});


Breadcrumbs::for('task.index', function ($trail) {
    if (Auth::check() && Auth::user()->can('create', 'App\Task')) {
        $title = 'Tasks';
        $route = route("task.index");

    } else {
        $title = 'My Tasks';
        $route = route("user.task.index", [
            'user' => Auth::id(),
            'task' => request()->query('task') ?? null
        ]);
    }

    $trail->push($title, $route);
});

Breadcrumbs::for('user.task.index', function ($trail, $user) {
    $title = $user->name . "'s Tasks";

    $trail->push($title, route("user.task.index", $user));
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