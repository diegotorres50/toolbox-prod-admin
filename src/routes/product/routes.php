<?php
// Routes

// Product group
$app->group('/product', function () use ($app) {
    // Handles multiple HTTP request methods
    $this->map(['GET', 'POST', 'DELETE', 'PATCH', 'PUT', 'OPTIONS'], '', function ($request, $response, $args) {
        // Find, delete, patch or replace user identified by $args['id']
    })->setName('product');

    // Add a new product
    $this->post('/add', '\ProductController:add')->setName('product-add');

    // Remove a product
    $this->delete('/remove', '\ProductController:remove')->setName('product-remove');

    // Update a product
    $this->put('/update', '\ProductController:update')->setName('product-update');

    // Update a product
    $this->get('/list', '\ProductController:listall')->setName('product-list');
});

// Test group
$app->group('/test', function () use ($app) {
    // Handles multiple HTTP request methods
    $this->map(['GET', 'POST'], '')->setName('test');

    // Validate divisible number
    $this->post('/divisible', '\DivisibleController:validate')->setName('divisible');
});
