<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//======= PUBLIC PAGES ROUTES =====

// homepage route
$routes->get('/', 'Home::index');
// login page route
$routes->get('/bids', 'Home::bids');
$routes->get('/about', 'Home::about');
$routes->post('/sent_message', 'Home::sent_message');
$routes->get('/job/(:any)', 'Home::job_location/$1');

// login page route
$routes->get('/login', 'LoginController::index');
$routes->post('/login', 'LoginController::index');
// log out route
$routes->get('/logout', 'LoginController::logout');


// ======= ADMIN PAGES ROUTES =======

$routes->group('',['filter'=>'protector'], function($routes){
  
  // dashboard - home
  $routes->get('/dashboard', 'Dashboard::index');
  
  // routes that deal with bid only 
  $routes->get('dashboard/create_bid', 'Bidcontroller::index');
  $routes->post('dashboard/create_bid', 'Bidcontroller::index');
  $routes->get('dashboard/edit_bid/(:any)', 'Bidcontroller::edit_bid/$1');
    $routes->post('dashboard/edit_bid/(:any)', 'Bidcontroller::edit_bid/$1');
    $routes->get('dashboard/delete_bid/(:any)', 'Bidcontroller::delete_bid/$1');
    
    // controllers that deal with job only 
    $routes->get('dashboard/create_job', 'Jobcontroller::index');
    $routes->post('dashboard/create_job', 'Jobcontroller::index');
    $routes->get('dashboard/edit_job/(:any)', 'Jobcontroller::edit_job/$1');
    $routes->post('dashboard/edit_job/(:any)', 'Jobcontroller::edit_job/$1');
    $routes->get(' dashboard/delete_job/(:any)', 'Jobcontroller::delete_job/$1');
   
    //user profile
    $routes->get('dashboard/profile', 'LoginController::profile');
    $routes->post('dashboard/create_user', 'LoginController::create_user');
    $routes->post('dashboard/update_password', 'LoginController::update_password');
    
    $routes->get('/dashboard/delete_user/(:any)', 'LoginController::delete_user/$1');
    
    
  });





