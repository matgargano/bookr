<?php



$app->get('/books', 'BooksController@index');
$app->get('/books/{id:[\d]+}', [
    'as' => 'books.show',
    'uses' => 'BooksController@show'
]);
$app->post('/books', 'BooksController@store');

$app->put('/books/{id:[\d]+}', [
    'as' => 'books.update',
    'uses' => 'BooksController@update'
]);

$app->delete('/books/{id:[\d]+}', [
    'as' => 'books.delete',
    'uses' => 'BooksController@destroy'
]);


