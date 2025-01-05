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
            'code' => 'UE01',
            'nom' => 'Structure de données, BDD distribuées et sécurité',
            'credits_ects' => 9,
            'semestre' => 'S1'
        ]);
        $this->assertDatabaseHas('ues', [
            'code' => 'UE01',
            'nom' => 'Structure de données, BDD distribuées et sécurité',
            'credits_ects' => 9,
            'semestre' => 'S1'
        ]);
    }

    public function test_verification_des_crédits_ects(): void{
       for($credits = 1 ; $credits <= 30 ; $credits++){
        $response = $this->post('/ue',[
            'code' => 'UE02' . $credits,
            'nom' => 'Développement Mobile Natif et Hybride' . $credits ,
            'credits_ects' => $credits,
            'semestre' => 'S5'  
        ]);

        $response -> assertStatus(302);
       }
    }

    public function test_association_des_ecs_a_une_ue(): void{
        $ue = Ue::factory()->create([
            'code' => 'UE03',
            'nom' => 'Modélisation de données et POO',
            'credits_ects' => 6,
            'semestre' => 'S5'
        ]);
        $this->assertDatabaseHas('ues', [
            'code' => 'UE03',
            'nom' => 'Modélisation de données et POO',
            'credits_ects' => 6,
            'semestre' => 'S5'
        ]);
        $ec = EC::factory()->create([
            'code' => 'EC01',
            'nom' => 'XML',
            'coefficient' => 2,
            'ue_id' => $ue->id,  
        ]);
        $this->assertDatabaseHas('ecs', [
            'code' => 'EC01',
            'nom' => 'XML',
            'coefficient' => 2,
            'ue_id' => $ue->id,  
        ]);

        $this->assertTrue($ue->ec->contains($ec));  
    
    }
    public function  test_validation_du_code_ue_format_UExx() :void{
        $codes = ['UE04'];

        foreach ($codes as $code) {
            $response = $this->post(route('ue.store'), [
                'code' => $code,
                'nom' => 'Linux et langage de script',
                'credits_ects' => 4,
                'semestre' => 'S5',
            ]);
            $response->assertStatus(302);
            $this->assertDatabaseHas('ues', [
                'code' => $code,
                'nom' => 'Linux et langage de script',
                'credits_ects' => 4,
                'semestre' => 'S5',
            ]);
        }

    }
    // public function test_verification_du_semestre(): void{
    //     for($semestre = 1 ; $semestre <= 6 ; $semestre++){
    //         $response = $this->post('/ue',[
    //             'code' => 'UE6' . $semestre,
    //             'nom' => 'Analyse numérique et Réseau' ,
    //             'credits_ects' => 8,
    //             'semestre' =>'S' . $semestre  
    //         ]);
   
    //         $response -> assertStatus(302);
    //         $this->assertDatabaseHas('ues', [
    //             'code' => 'UE6' . $semestre,
    //             'nom' => 'Analyse numérique et Réseau',
    //             'credits_ects' => 8,
    //             'semestre' => 'S' .$semestre,
    //         ]);
    //     }
    // }

}
