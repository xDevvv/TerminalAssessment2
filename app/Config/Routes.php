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

$routes->post('add_book', 'Form::addBooks');
$routes->post('book/borrow', 'BooksController::borrowBook');
$routes->post('book/update/(:num)', 'Form::updateBook/$1');


// Get Request
$routes->get('/', 'PageController::login');
$routes->get('register', 'PageController::register');
$routes->get('about', 'PageController::about');
$routes->get('home', 'PageController::home');


$routes->get('members', 'PageController::showMembers');
$routes->get('members/delete/(:num)', 'MembersController::deleteMembers/$1');
$routes->get('members/edit/(:num)', 'MembersController::editMembers/$1');


$routes->get('books', 'PageController::showBooks');
$routes->get('book/edit/(:num)', 'BooksController::editBook/$1');
$routes->get('book/delete/(:num)', 'BooksController::deleteBook/$1');
$routes->get('borrow/(:num)', 'BooksController::setBorrowBookInfomraton/$1');
$routes->get('returned/(:num)', 'BooksController::returnBook/$1');
$routes->get('borrowed', 'PageController::showBorrowedBooks');
$routes->get('returned', 'PageController::showReturnedBooks');
$routes->get('overdue', 'PageController::showOverdueBooks');


// User Functionality

$routes->get('user', 'PageController::dashboard');
$routes->get('profile', 'PageController::profile');
$routes->get('user_borrowed_Books', 'PageController::userborrowedBooks');
$routes->get('available', 'PageController::availableBooks');

$routes->get('user/borrow/(:num)', 'BooksController::userBorrowedBooks/$1');
