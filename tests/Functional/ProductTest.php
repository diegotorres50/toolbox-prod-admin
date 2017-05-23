<?php

namespace Tests\Functional;

class ProductTest extends BaseTestCase
{
    /**
     * Test that the index route with optional name argument returns a rendered greeting
     */
    public function testGetProductsList()
    {
        $response = $this->runApp('GET', '/product/list');
        $this->assertEquals(200, $response->getStatusCode());
    }
}
