<?php

namespace Tests\Feature;

use App\Models\Ue;
use App\Models\Ec;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UeTest extends TestCase
{
    use RefreshDatabase;

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

    public function test_verification_des_crédits_ects(): void{
       for($credits = 1 ; $credits <= 30 ; $credits++){
        $response = $this->post('/ue',[
            'code' => 'UE2' . $credits,
            'nom' => 'Programmation Web' . $credits ,
            'credits_ects' => $credits,
            'semestre' => 'S1'  
        ]);

        $response -> assertStatus(302);
       }
    }

    

}
