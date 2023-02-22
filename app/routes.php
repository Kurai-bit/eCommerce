<?php

use App\Core\Router;

$router = new Router();

$router->get('/test', function($request){
    echo 'test route'; die();
    var_dump($request);
});

$router->get('/test-controller', 'TestController@test');
$router->get("/", "LoginController@renderLogin");

$router->get('/login', 'LoginController@renderLogin');
$router->post('/login-validate', 'LoginController@login');

$router->get("/cart", "CartController@cartRender");
$router->post("/add", "CartController@addToCart");
$router->post("/control","CartController@cartControls");

$router->get("/admin","DashboardController@renderAdmin");
$router->get("/getdata", "DashboardController@getCategories");
$router->get('/categories', 'DashboardController@index');
$router->get('/newcategory',"DashboardController@create");
$router->post('/submitcategory',"DashboardController@store");

$router->get('/view/{id}',"DashboardController@renderDashboard");
$router->get('/products/{id}',"DashboardController@show");

$router->get('/edit/{id}',"DashboardController@edit");
$router->post('/update/{id}','DashboardController@update');
$router->post('/delete/{id}',"DashboardController@delete");

$router->get('/products','ProductsController@index'); // render product page
$router->get('/getproducts','ProductsController@getProducts');
$router->get('/addproducts','ProductsController@create');
$router->post('/deleteproducts/{id}','ProductsController@delete');
$router->get('/editproducts/{id}','ProductsController@edit');
$router->post('/updateproducts/{id}','ProductsController@update');
$router->post('/submitproducts','ProductsController@store');



return $router;
