<?php

// Home page
$app->get('/', function () use ($app) {
    $books = $app['dao.book']->findAllbook();
    return $app['twig']->render('index.html.twig', array('books' => $books));
})->bind('home');

// book details with author
$app->get('/book/{book_id}', function ($book_id) use ($app) {
    $book = $app['dao.book']->findbookById($book_id);
    $auth_id = $app['dao.book']->findIdAByIdB($book_id);
    $author =$app['dao.author']->findAuthorById($auth_id); 
    return $app['twig']->render('book.html.twig', array('book' => $book, 'author' => $author));
})->bind('book');
