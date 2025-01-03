<?php

namespace Tests\Feature;

use App\Models\Ue;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UeTest extends TestCase
{
    //use RefreshDatabase;

    public function test_creation_ue(): void{
        $ue = Ue::factory()->create([
            'code' => 'UE1',
            'nom' => 'Programmation Web',
            'credits_ects' => 6,
            'semestre' => 'S1'
        ]);
        $this->assertDatabaseHas('ues', [
            'code' => 'UE1',
            'nom' => 'Programmation Web',
            'credits_ects' => 6,
            'semestre' => 'S1'
        ]);
    }

    

    


}
