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

    public function test_association_des_ecs_a_une_ue(): void{
        $ue = Ue::factory()->create([
            'code' => 'UE3',
            'nom' => 'Programmation Web',
            'credits_ects' => 6,
            'semestre' => 1
        ]);
        $this->assertDatabaseHas('ues', [
            'code' => 'UE3',
            'nom' => 'Programmation Web',
            'credits_ects' => 6,
            'semestre' => 1
        ]);
        $ec = EC::factory()->create([
            'code' => 'EC01',
            'nom' => 'Frontend Development',
            'coefficient' => 2,
            'ue_id' => $ue->id,  
        ]);
        $this->assertDatabaseHas('ecs', [
            'code' => 'EC01',
            'nom' => 'Frontend Development',
            'coefficient' => 2,
            'ue_id' => $ue->id,  
        ]);

        $this->assertTrue($ue->ec->contains($ec));  
    
    }
    public function  test_validation_du_code_ue_format_UExx() :void{
        $valid_codes = ['UE04'];

        foreach ($valid_codes as $code) {
            $response = $this->post(route('ue.store'), [
                'code' => $code,
                'nom' => 'Programmation Web',
                'credits_ects' => 6,
                'semestre' => 'S5',
            ]);
            $response->assertStatus(302);
            $this->assertDatabaseHas('ues', [
                'code' => $code,
                'nom' => 'Programmation Web',
                'credits_ects' => 6,
                'semestre' => 'S5',
            ]);
        }

    }

}
