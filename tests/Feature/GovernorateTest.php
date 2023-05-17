<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class GovernorateTest extends TestCase
{
    
    /**
     * A basic feature test example.
     */
    public function test_governorate(): void
    {
       $this->json('get', 'api/governorates/')
         ->assertStatus(Response::HTTP_OK);
 
        
            
    }



}
