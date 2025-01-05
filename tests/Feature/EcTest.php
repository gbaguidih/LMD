<?php

namespace Tests\Feature;

use App\Models\Ue;
use App\Models\Ec;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;



class EcTest extends TestCase
{
    use RefreshDatabase;
    public function test_creation_ec_avec_coefficient(): void{
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
        $ec = Ec::factory()->create([
            'code' => 'EC01',
            'nom' => 'POO',
            'coefficient' => 2,
            'ue_id' => $ue->id
        ]);
        $this->assertDatabaseHas('ecs', [
            'code' => 'EC01',
            'nom' => 'POO',
            'coefficient' => 2,
            'ue_id' => $ue->id
        ]);
    }

    public function test_verification_du_rattachement_a_une_ue(): void{
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
        $ec = Ec::factory()->create([
            'ue_id' => $ue->id
        ]);
        $this->assertEquals($ue->id, $ec->ue_id);
        $this->assertTrue($ec->Ue->is($ue));
    }

    public function test_modification_d_un_ec(): void{
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
        $ec = Ec::factory()->create([
            'code' => 'EC01',
            'nom' => 'XML',
            'coefficient' => 3,
            'ue_id' => $ue->id
        ]);
        $response = $this->put(route('ec.update',$ec->id),[
            'code' => 'EC01',
            'nom' => "Systhème d'exploitation linux",
            'coefficient' => 5,
            'ue_id' => $ue->id
        ]);
        $response->assertStatus(302);
        
    }

    public function test_validation_du_coefficient(): void{
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
        $ec = Ec::factory()->create([
            'ue_id' => $ue->id
        ]);
        $this->assertEquals($ue->id, $ec->ue_id);
        $this->assertTrue($ec->Ue->is($ue));
    }

    public function test_de_suppression_d_un_ec(){
        $ue = Ue::factory()->create([
            'code' => 'UE01',
            'nom' => 'Structure de données, BDD distribuées et sécurité',
            'credits_ects' => 9,
            'semestre' => 'S1'
        ]);
        $ec = Ec::factory()->create([
            'code' => 'EC02',
            'nom' => 'Mathématique',
            'coefficient' => 3,
            'ue_id' => $ue->id
        ]);
        $response = $this->delete(route('ec.destroy', $ec->id));
        $response->assertStatus(302);
        $this->assertDatabaseMissing('ecs',[
            'id' => $ec->id,
        ]);
    }
}
