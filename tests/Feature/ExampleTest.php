<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_the_homepage_redirects_or_loads_successfully(): void
    {
        $response = $this->get('/');

        $this->assertContains(
            $response->getStatusCode(),
            [200, 301, 302]
        );
    }
}

