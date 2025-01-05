<?php
    namespace Tests\Feature;
    use Tests\TestCase;
    use App\Models\Etudiant;
    use App\Models\Ue;

    class welcomeTest extends TestCase
    {
        public function test_de_la_page_dacceuil()
        {
            $response = $this->get('/');

            $response->assertStatus(200);

            $response->assertSee("Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order."); 
        }

        public function testaffichageetudiant()
        {
            $etudiant = Etudiant::create([
                'numero_etudiant' => '01',
                'nom' => 'FAGBEGNON',
                'prenom' => 'Bruno',
                'niveau' => 'L3'
            ]);
            $response = $this->get('etudiant');
            $response->assertStatus(200);
            $response->assertSee($etudiant->nom);
            $response->assertSee($etudiant->prenom);
        }

        public function testcreationetudiant()
        {
            $response = $this->get(route('etudiant.create'));
            $response->assertStatus(200);
            $response->assertSee('Nom');
            $response->assertSee('prenom');
            $response->assertSee('Niveau');
        }

        public function testaffichageue()
        {
            $ue = \App\Models\Ue::create([
                'code' => 'MAT101',
                'nom' => 'Mathématiques',
                'credits_ects' => '06',
                'semestre' => 'S1',
                
            ]);
            $response = $this->get('/ue');
            $response->assertStatus(200);
            $response->assertSee($ue->nom);
            $response->assertSee($ue->code);
        }

    }