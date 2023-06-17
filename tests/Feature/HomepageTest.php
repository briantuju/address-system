<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_allows_only_authenticated_users(): void
    {
        $this->actingAs($this->user)->get(route('home'))->assertOk();
    }
}
