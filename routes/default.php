<?php
// Landing page route
$router->get('/', function() {
    Dabl\View\View::load('default',['test'=>$test]);
}); 

