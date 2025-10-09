<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bioma; // Importe o seu Model Bioma

class BiomaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bioma::create([
            'nome_bioma' => 'Pampa',
            'descricao_bioma' => 'Também conhecido como Campos Sulinos, o Pampa ocupa mais da metade do território do Rio Grande do Sul. Caracteriza-se pela vegetação campestre, com gramíneas, plantas rasteiras e poucas árvores.',
            'populacao_bioma' => 30000000,
        ]);

        Bioma::create([
            'nome_bioma' => 'Mata Atlântica',
            'descricao_bioma' => 'Uma das florestas mais ricas em biodiversidade do mundo. Originalmente, se estendia por quase toda a costa brasileira. Hoje, restam apenas fragmentos, sendo uma das florestas mais ameaçadas do planeta.',
            'populacao_bioma' => 145000000,
        ]);

        Bioma::create([
            'nome_bioma' => 'Amazônia',
            'descricao_bioma' => 'A maior floresta tropical do mundo, cobrindo a maior parte da Bacia Amazônica na América do Sul. É conhecida por sua vasta biodiversidade e papel crucial na regulação do clima global.',
            'populacao_bioma' => 30000000,
        ]);
    }
}
