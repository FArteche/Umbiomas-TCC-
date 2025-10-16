<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Bioma;
use App\Models\Fauna;
use App\Models\Flora;
use App\Models\Relevo;
use App\Models\Clima;
use App\Models\Tipo_CSE;
use App\Models\Caracteristica_SE;
use App\Models\Tipo_Area_Preservacao;
use App\Models\Area_Preservacao;
use App\Models\Hidrografia;
use App\Models\Info_Postador;
use App\Models\Post;
use App\Models\Sugestoes;

class DatabaseContentSeeder extends Seeder
{
    /**
     * Seed the application's content tables.
     */
    public function run(): void
    {
        // Usamos uma transação para garantir que tudo seja executado com sucesso ou nada seja salvo.
        DB::transaction(function () {
            /*
            // Desativa a verificação de chaves estrangeiras para poder limpar as tabelas
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            // Limpa as tabelas para evitar duplicatas ao rodar o seeder várias vezes
            Bioma::truncate();
            Fauna::truncate();
            Flora::truncate();
            Relevo::truncate();
            Clima::truncate();
            Tipo_CSE::truncate();
            Caracteristica_SE::truncate();
            Hidrografia::truncate();
            Info_Postador::truncate();
            Post::truncate();
            Sugestoes::truncate();
            Tipo_Area_Preservacao::truncate();
            Area_Preservacao::truncate();
            // Limpa as tabelas pivô
            DB::table('bioma_fauna')->truncate();
            DB::table('bioma_flora')->truncate();
            DB::table('bioma_clima')->truncate();
            // Adicione outras tabelas pivô aqui se necessário

            // Reativa a verificação de chaves estrangeiras
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            */
            // --- 1. CRIAR DADOS MESTRES (Fauna, Flora, Tipos, etc.) ---

            $fauna1 = Fauna::create([
                'nome_fauna' => 'Capivara',
                'nome_cientifico_fauna' => 'Hydrochoerus hydrochaeris',
                'familia_fauna' => 'roedores',
                'descricao_fauna' => 'Roedor grande e gordo',
                'imagem_fauna' => 'seed_images/fauna/capivara.jpg'
            ]);
            $fauna2 = Fauna::create([
                'nome_fauna' => 'Tatu',
                'nome_cientifico_fauna' => 'Dasypus novemcinctus',
                'familia_fauna' => 'dasipodídeos',
                'descricao_fauna' => 'Pequeno mamífero com carapaça dura',
                'imagem_fauna' => 'seed_images/fauna/tatu.jpg'
            ]);
            $fauna3 = Fauna::create([
                'nome_fauna' => 'Onça-pintada',
                'nome_cientifico_fauna' => 'Panthera onca',
                'familia_fauna' => 'felídeos',
                'descricao_fauna' => 'Grande felino com pelagem manchada',
                'imagem_fauna' => 'seed_images/fauna/onca_pintada.jpg'
            ]);
            $fauna4 = Fauna::create([
                'nome_fauna' => 'Lobo-guará',
                'nome_cientifico_fauna' => 'Chrysocyon brachyurus',
                'familia_fauna' => 'canídeos',
                'descricao_fauna' => 'Mamífero de pernas longas e pelagem avermelhada',
                'imagem_fauna' => 'seed_images/fauna/lobo_guara.jpg'
            ]);
            $fauna5 = Fauna::create([
                'nome_fauna' => 'Arara-azul',
                'nome_cientifico_fauna' => 'Anodorhynchus hyacinthinus',
                'familia_fauna' => 'psitacídeos',
                'descricao_fauna' => 'Grande ave de plumagem azul vibrante',
                'imagem_fauna' => 'seed_images/fauna/arara_azul.jpg'
            ]);
            $fauna6 = Fauna::create([
                'nome_fauna' => 'Bicho-preguiça',
                'nome_cientifico_fauna' => 'Bradypus variegatus',
                'familia_fauna' => 'bradipodídeos',
                'descricao_fauna' => 'Mamífero arborícola conhecido por sua lentidão',
                'imagem_fauna' => 'seed_images/fauna/bicho_preguica.jpg'
            ]);
            $fauna7 = Fauna::create([
                'nome_fauna' => 'Tamanduá-bandeira',
                'nome_cientifico_fauna' => 'Myrmecophaga tridactyla',
                'familia_fauna' => 'mirmecofagídeos',
                'descricao_fauna' => 'Mamífero com focinho alongado e língua pegajosa',
                'imagem_fauna' => 'seed_images/fauna/tamandua_bandeira.jpg'
            ]);
            $fauna8 = Fauna::create([
                'nome_fauna' => 'Jacaré-do-pantanal',
                'nome_cientifico_fauna' => 'Caiman yacare',
                'familia_fauna' => 'alligatorídeos',
                'descricao_fauna' => 'Réptil semi-aquático encontrado no Pantanal',
                'imagem_fauna' => 'seed_images/fauna/jacare_pantanal.jpg'
            ]);

            $flora1 = Flora::create([
                'nome_flora' => 'Araucária',
                'nome_cientifico_flora' => 'Araucaria angustifolia',
                'familia_flora' => 'araucariáceas',
                'descricao_flora' => 'Árvore conífera típica do sul do Brasil',
                'imagem_flora' => 'seed_images/flora/araucaria.jpg'
            ]);
            $flora2 = Flora::create([
                'nome_flora' => 'Ipê-amarelo',
                'nome_cientifico_flora' => 'Handroanthus albus',
                'familia_flora' => 'bignoniáceas',
                'descricao_flora' => 'Árvore conhecida por suas flores amarelas vibrantes',
                'imagem_flora' => 'seed_images/flora/ipe_amarelo.jpg'
            ]);
            $flora3 = Flora::create([
                'nome_flora' => 'Vitória-régia',
                'nome_cientifico_flora' => 'Victoria amazonica',
                'familia_flora' => 'nymphaeaceae',
                'descricao_flora' => 'Planta aquática com grandes folhas flutuantes',
                'imagem_flora' => 'seed_images/flora/vitoria_regia.jpg'
            ]);
            $flora4 = Flora::create([
                'nome_flora' => 'Jequitibá-rosa',
                'nome_cientifico_flora' => 'Cariniana legalis',
                'familia_flora' => 'lécitidáceas',
                'descricao_flora' => 'Uma das maiores árvores da Mata Atlântica',
                'imagem_flora' => 'seed_images/flora/jequitiba_rosa.jpg'
            ]);
            $flora5 = Flora::create([
                'nome_flora' => 'Cacto Mandacaru',
                'nome_cientifico_flora' => 'Cereus jamacaru',
                'familia_flora' => 'cactáceas',
                'descricao_flora' => 'Cacto típico da caatinga, com flores grandes e vistosas',
                'imagem_flora' => 'seed_images/flora/mandacaru.jpg'
            ]);
            $flora6 = Flora::create([
                'nome_flora' => 'Pau-brasil',
                'nome_cientifico_flora' => 'Paubrasilia echinata',
                'familia_flora' => 'fabáceas',
                'descricao_flora' => 'Árvore símbolo do Brasil, conhecida pela madeira vermelha',
                'imagem_flora' => 'seed_images/flora/pau_brasil.jpg'
            ]);
            $flora7 = Flora::create([
                'nome_flora' => 'Copaíba',
                'nome_cientifico_flora' => 'Copaifera langsdorffii',
                'familia_flora' => 'fabáceas',
                'descricao_flora' => 'Árvore conhecida pelo óleo-resina com propriedades medicinais',
                'imagem_flora' => 'seed_images/flora/copaiba.jpg'
            ]);
            $flora8 = Flora::create([
                'nome_flora' => 'Buriti',
                'nome_cientifico_flora' => 'Mauritia flexuosa',
                'familia_flora' => 'arecáceas',
                'descricao_flora' => 'Palmeira típica de áreas alagadas, com frutos ricos em vitamina A',
                'imagem_flora' => 'seed_images/flora/buriti.jpg'
            ]);

            $clima1 = Clima::create([
                'nome_clima' => 'Subtropical',
                'imagem_clima' => 'seed_images/clima/Subtropical.png',
                'descricao_clima' => 'Verões quentes e invernos frios, com chuvas bem distribuídas.'
            ]);
            $clima2 = Clima::create([
                'nome_clima' => 'Tropical',
                'imagem_clima' => 'seed_images/clima/tropical.png',
                'descricao_clima' => 'Estações bem definidas, com verões chuvosos e invernos secos.'
            ]);
            $clima3 = Clima::create([
                'nome_clima' => 'Equatorial',
                'imagem_clima' => 'seed_images/clima/equatorial.png',
                'descricao_clima' => 'Altas temperaturas e chuvas abundantes durante todo o ano.'
            ]);

            // --- 2. CRIAR OS BIOMAS ---

            $pampa = Bioma::create([
                'nome_bioma' => 'Pampa',
                'descricao_bioma' => 'Caracterizado pela vegetação campestre...',
                'imagem_bioma' => 'seed_images/biomas/pampa.jpg',
                'populacao_bioma' => 4000000
            ]);
            $cerrado = Bioma::create([
                'nome_bioma' => 'Cerrado',
                'descricao_bioma' => 'Conhecido como a savana brasileira...',
                'imagem_bioma' => 'seed_images/biomas/cerrado.jpg',
                'populacao_bioma' => 24000000
            ]);
            $amazonia = Bioma::create([
                'nome_bioma' => 'Amazônia',
                'descricao_bioma' => 'A maior floresta tropical do mundo...',
                'imagem_bioma' => 'seed_images/biomas/amazonia.jpg',
                'populacao_bioma' => 30000000
            ]);
            $mataAtlantica = Bioma::create([
                'nome_bioma' => 'Mata Atlântica',
                'descricao_bioma' => 'Bioma rico em biodiversidade, localizado ao longo da costa atlântica...',
                'imagem_bioma' => 'seed_images/biomas/mata_atlantica.jpg',
                'populacao_bioma' => 70000000
            ]);

            // --- 3. CRIAR DADOS QUE PERTENCEM A UM BIOMA (One-to-Many) ---

            Relevo::create([
                'nome_relevo' => 'Planície',
                'descricao_relevo' => 'Áreas planas e de baixa altitude.',
                'tipo_relevo' => 'Planície',
                'imagem_relevo' => 'seed_images/relevo/planicie.jpg',
                'bioma_id' => $pampa->id_bioma
            ]);
            Relevo::create([
                'nome_relevo' => 'Chapada',
                'descricao_relevo' => 'Áreas elevadas com topo plano e bordas íngremes.',
                'tipo_relevo' => 'Chapada',
                'imagem_relevo' => 'seed_images/relevo/chapada.jpg',
                'bioma_id' => $cerrado->id_bioma
            ]);
            Relevo::create([
                'nome_relevo' => 'Depressão',
                'descricao_relevo' => 'Áreas rebaixadas em relação ao terreno ao redor.',
                'tipo_relevo' => 'Depressão',
                'imagem_relevo' => 'seed_images/relevo/depressao.jpg',
                'bioma_id' => $amazonia->id_bioma
            ]);
            Relevo::create([
                'nome_relevo' => 'Serra',
                'descricao_relevo' => 'Conjunto de montanhas ou elevações acentuadas.',
                'tipo_relevo' => 'Serra',
                'imagem_relevo' => 'seed_images/relevo/serra.jpg',
                'bioma_id' => $mataAtlantica->id_bioma
            ]);

            Hidrografia::create([
                'nome_hidrografia' => 'Rio Uruguai',
                'descricao_hidrografia' => 'Um dos principais rios da região sul do Brasil.',
                'tipo_hidrografia' => 'Rio',
                'imagem_hidrografia' => 'seed_images/hidrografia/rio_uruguai.jpg',
                'bioma_id' => 1
            ]);
            Hidrografia::create([
                'nome_hidrografia' => 'Rio Tocantins',
                'descricao_hidrografia' => 'Importante rio que atravessa o bioma do Cerrado.',
                'tipo_hidrografia' => 'Rio',
                'imagem_hidrografia' => 'seed_images/hidrografia/rio_tocantins.jpg',
                'bioma_id' => 2
            ]);
            Hidrografia::create([
                'nome_hidrografia' => 'Rio Amazonas',
                'descricao_hidrografia' => 'O maior rio em volume de água do mundo, localizado na Amazônia.',
                'tipo_hidrografia' => 'Rio',
                'imagem_hidrografia' => 'seed_images/hidrografia/rio_amazonas.jpg',
                'bioma_id' => 3
            ]);
            Hidrografia::create([
                'nome_hidrografia' => 'Rio São Francisco',
                'descricao_hidrografia' => 'Conhecido como o "Velho Chico", é um dos rios mais importantes do Brasil.',
                'tipo_hidrografia' => 'Rio',
                'imagem_hidrografia' => 'seed_images/hidrografia/rio_sao_francisco.jpg',
                'bioma_id' => 4
            ]);

            $tipoCse1 = Tipo_CSE::create(['nome_tipocse' => 'Econômica']);
            $tipoCse2 = Tipo_CSE::create(['nome_tipocse' => 'Cultural']);

            Caracteristica_SE::create([
                'nome_cse' => 'Pecuária Extensiva',
                'descricao_cse' => 'Atividade econômica predominante no Pampa, com criação de gado em grandes áreas.',
                'bioma_id' => $pampa->id_bioma,
                'imagem_cse' => 'seed_images/caracteristica_se/pecuaria_extensiva.jpg',
                'tipocse_id' => $tipoCse1->id_tipocse
            ]);
            Caracteristica_SE::create([
                'nome_cse' => 'Festas Tradicionais',
                'descricao_cse' => 'Eventos culturais que celebram as tradições gaúchas, como o Rodeio e a Semana Farroupilha.',
                'bioma_id' => $pampa->id_bioma,
                'imagem_cse' => 'seed_images/caracteristica_se/festas_tradicionais.jpg',
                'tipocse_id' => $tipoCse2->id_tipocse
            ]);
            Caracteristica_SE::create([
                'nome_cse' => 'Agricultura Diversificada',
                'descricao_cse' => 'O Cerrado é um importante polo agrícola, com produção de soja, milho e algodão.',
                'bioma_id' => $cerrado->id_bioma,
                'imagem_cse' => 'seed_images/caracteristica_se/agricultura_diversificada.jpg',
                'tipocse_id' => $tipoCse1->id_tipocse
            ]);
            Caracteristica_SE::create([
                'nome_cse' => 'Culinária Típica',
                'descricao_cse' => 'Pratos tradicionais como o arroz com pequi e a pamonha são comuns no Cerrado.',
                'bioma_id' => $cerrado->id_bioma,
                'imagem_cse' => 'seed_images/caracteristica_se/culinaria_tipica.jpg',
                'tipocse_id' => $tipoCse2->id_tipocse
            ]);
            Caracteristica_SE::create([
                'nome_cse' => 'Extrativismo Sustentável',
                'descricao_cse' => 'Na Amazônia, comunidades locais praticam o extrativismo de forma sustentável, coletando frutos, castanhas e outros produtos sem destruir a floresta.',
                'bioma_id' => $amazonia->id_bioma,
                'imagem_cse' => 'seed_images/caracteristica_se/extrativismo_sustentavel.jpg',
                'tipocse_id' => $tipoCse1->id_tipocse
            ]);
            Caracteristica_SE::create([
                'nome_cse' => 'Cultura Indígena',
                'descricao_cse' => 'A Amazônia é lar de diversas comunidades indígenas, cada uma com suas próprias tradições, línguas e formas de vida.',
                'bioma_id' => $amazonia->id_bioma,
                'imagem_cse' => 'seed_images/caracteristica_se/cultura_indigena.jpg',
                'tipocse_id' => $tipoCse2->id_tipocse
            ]);
            Caracteristica_SE::create([
                'nome_cse' => 'Turismo Ecológico',
                'descricao_cse' => 'A Mata Atlântica atrai turistas interessados em suas belezas naturais, trilhas e observação de fauna e flora.',
                'bioma_id' => $mataAtlantica->id_bioma,
                'imagem_cse' => 'seed_images/caracteristica_se/turismo_ecologico.jpg',
                'tipocse_id' => $tipoCse1->id_tipocse
            ]);
            Caracteristica_SE::create([
                'nome_cse' => 'Patrimônio Histórico',
                'descricao_cse' => 'Cidades históricas como Ouro Preto e Paraty preservam a arquitetura colonial e são importantes centros culturais.',
                'bioma_id' => $mataAtlantica->id_bioma,
                'imagem_cse' => 'seed_images/caracteristica_se/patrimonio_historico.jpg',
                'tipocse_id' => $tipoCse2->id_tipocse
            ]);

            $tipoAp1 = Tipo_Area_Preservacao::create(['nome_tipoap' => 'Parque Nacional']);
            $tipoAp2 = Tipo_Area_Preservacao::create(['nome_tipoap' => 'Reserva Biológica']);

            Area_Preservacao::create([
                'nome_ap' => 'Parque Nacional da Lagoa do Peixe',
                'descricao_ap' => 'Localizado no Rio Grande do Sul, é uma importante área de preservação para aves migratórias.',
                'bioma_id' => $pampa->id_bioma,
                'tipoap_id' => $tipoAp1->id_tipoap,
                'imagem_ap' => 'seed_images/area_preservacao/lagoa_do_peixe.jpg'
            ]);
            Area_Preservacao::create([
                'nome_ap' => 'Parque Nacional da Chapada dos Veadeiros',
                'descricao_ap' => 'Localizado em Goiás, é conhecido por suas cachoeiras e formações rochosas únicas.',
                'bioma_id' => $cerrado->id_bioma,
                'tipoap_id' => $tipoAp1->id_tipoap,
                'imagem_ap' => 'seed_images/area_preservacao/chapada_dos_veadeiros.jpg'
            ]);
            Area_Preservacao::create([
                'nome_ap' => 'Reserva Biológica do Cobre e Associados',
                'descricao_ap' => 'Localizada no Amazonas, é uma área de proteção integral para a fauna e flora locais.',
                'bioma_id' => $amazonia->id_bioma,
                'tipoap_id' => $tipoAp2->id_tipoap,
                'imagem_ap' => 'seed_images/area_preservacao/reserva_cobre.jpg'
            ]);
            Area_Preservacao::create([
                'nome_ap' => 'Parque Nacional da Serra dos Órgãos',
                'descricao_ap' => 'Localizado no Rio de Janeiro, é famoso por suas trilhas e formações rochosas impressionantes.',
                'bioma_id' => $mataAtlantica->id_bioma,
                'tipoap_id' => $tipoAp1->id_tipoap,
                'imagem_ap' => 'seed_images/area_preservacao/serra_dos_orgaos.jpg'
            ]);


            // --- 4. ASSOCIAR DADOS (Many-to-Many) ---

            // Associações para o Pampa
            $pampa->fauna()->attach([$fauna1->id_fauna, $fauna2->id_fauna]);
            $pampa->clima()->attach($clima1->id_clima);
            $pampa->flora()->attach([$flora1->id_flora, $flora6->id_flora]);

            // Associações para o Cerrado
            $cerrado->fauna()->attach([$fauna4->id_fauna, $fauna7->id_fauna]);
            $cerrado->flora()->attach([$flora5->id_flora, $flora7->id_flora]);
            $cerrado->clima()->attach($clima2->id_clima);

            // Associações para a Amazônia
            $amazonia->fauna()->attach([$fauna3->id_fauna, $fauna5->id_fauna, $fauna6->id_fauna, $fauna8->id_fauna]);
            $amazonia->flora()->attach([$flora3->id_flora, $flora4->id_flora, $flora8->id_flora]);
            $amazonia->clima()->attach($clima3->id_clima);

            // Associações para a Mata Atlântica
            $mataAtlantica->fauna()->attach([$fauna1->id_fauna, $fauna3->id_fauna]);
            $mataAtlantica->flora()->attach([$flora1->id_flora, $flora2->id_flora]);
            $mataAtlantica->clima()->attach([$clima1->id_clima, $clima2->id_clima]);

        });
    }
}
