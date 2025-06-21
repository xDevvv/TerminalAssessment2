<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  Post Request

$routes->post('register_user', 'Form::register');
$routes->post('login_user', 'Form::login');

$routes->post('add_member', 'Form::addMembers');
$routes->post('members/update/(:num)', 'Form::updateMembers/$1');

$routes->post('add_book', 'Form::addBooks'); // Restful API (Create)
$routes->post('book/borrow', 'BooksController::borrowBook');
$routes->post('book/update/(:num)', 'Form::updateBook/$1');


// Get Request
$routes->get('/', 'PageController::login');
$routes->get('register', 'PageController::register');
$routes->get('about', 'PageController::about', ['filter' => ['loginRestrict', 'userRestrict']]);
$routes->get('home', 'PageController::home', ['filter' => ['loginRestrict', 'userRestrict']]);


$routes->get('members', 'PageController::showMembers', ['filter' => ['loginRestrict', 'userRestrict']]);
$routes->get('members/delete/(:num)', 'MembersController::deleteMembers/$1', ['filter' => ['loginRestrict', 'userRestrict']]);
$routes->get('members/edit/(:num)', 'MembersController::editMembers/$1', ['filter' => ['loginRestrict', 'userRestrict']]);


$routes->get('books', 'PageController::showBooks'); // Restful API (Read)
$routes->put('book/edit/(:num)', 'BooksController::editBook/$1', ['filter' => ['loginRestrict', 'userRestrict']]); // Restful API (Update)
$routes->delete('book/delete/(:num)', 'BooksController::deleteBook/$1', ['filter' => ['loginRestrict', 'userRestrict']]); // Restful API (Delete)
$routes->get('borrow/(:num)', 'BooksController::setBorrowBookInfomraton/$1', ['filter' => ['loginRestrict', 'userRestrict']]);
$routes->get('returned/(:num)', 'BooksController::returnBook/$1', ['filter' => ['loginRestrict', 'userRestrict']]);
$routes->get('borrowed', 'PageController::showBorrowedBooks', ['filter' => ['loginRestrict', 'userRestrict']]);
$routes->get('returned', 'PageController::showReturnedBooks', ['filter' => ['loginRestrict', 'userRestrict']]);
$routes->get('overdue', 'PageController::showOverdueBooks', ['filter' => ['loginRestrict', 'userRestrict']]);


// User Functionality

$routes->get('user', 'PageController::dashboard', ['filter' => ['loginRestrict', 'adminRestrict']]);
$routes->get('profile', 'PageController::profile', ['filter' => ['loginRestrict', 'adminRestrict']]);
$routes->get('user_borrowed_Books', 'PageController::userborrowedBooks', ['filter' => ['loginRestrict', 'adminRestrict']]);
$routes->get('available', 'PageController::availableBooks', ['filter' => ['loginRestrict', 'adminRestrict']]);

$routes->get('user/borrow/(:num)', 'BooksController::userBorrowedBooks/$1', ['filter' => ['loginRestrict', 'adminRestrict']]);
