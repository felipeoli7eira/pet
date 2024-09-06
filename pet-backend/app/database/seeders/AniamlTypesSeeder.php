<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AniamlTypesSeeder extends Seeder
{
    private array $animalTypes = [
        ['name' => 'Cachorro', 'details' => 'Mamífero domesticado, conhecido como o melhor amigo do homem.'],
        ['name' => 'Gato', 'details' => 'Mamífero domesticado, conhecido por sua independência e agilidade.'],
        ['name' => 'Coelho', 'details' => 'Pequeno mamífero herbívoro, conhecido por suas longas orelhas.'],
        ['name' => 'Hamster', 'details' => 'Roedor de pequeno porte, geralmente criado como animal de estimação.'],
        ['name' => 'Cavalo', 'details' => 'Mamífero grande e herbívoro, usado frequentemente em atividades de montaria.'],
        ['name' => 'Porquinho-da-índia', 'details' => 'Roedor pequeno, domesticado, originário da América do Sul.'],
        ['name' => 'Gerbil', 'details' => 'Roedor pequeno e ágil, frequentemente criado como pet.'],
        ['name' => 'Rato', 'details' => 'Roedor pequeno, ativo, frequentemente criado como animal de estimação.'],
        ['name' => 'Ouriço', 'details' => 'Pequeno mamífero com espinhos nas costas, comum como animal de estimação.'],
        ['name' => 'Chinchila', 'details' => 'Roedor de pele macia, originário da América do Sul.'],
        ['name' => 'Ferret', 'details' => 'Mamífero pequeno e ágil, domesticado para caça e criação como pet.'],
        ['name' => 'Vaca', 'details' => 'Grande mamífero herbívoro criado principalmente para a produção de leite e carne.'],
        ['name' => 'Cabra', 'details' => 'Mamífero domesticado, comum em fazendas e pastos, conhecido por sua agilidade.'],
        ['name' => 'Ovelha', 'details' => 'Mamífero domesticado, criado principalmente para lã, carne e leite.'],

        // Aves
        ['name' => 'Pássaro', 'details' => 'Animal vertebrado de sangue quente, caracterizado por asas e penas.'],
        ['name' => 'Papagaio', 'details' => 'Ave conhecida por sua habilidade de imitar sons e palavras.'],
        ['name' => 'Cacatua', 'details' => 'Ave tropical, conhecida por sua crista e por ser sociável.'],
        ['name' => 'Arara', 'details' => 'Ave colorida e grande, comum em áreas tropicais.'],
        ['name' => 'Periquito', 'details' => 'Pequena ave colorida, muito popular como animal de estimação.'],
        ['name' => 'Canário', 'details' => 'Ave pequena, famosa pelo seu canto melodioso.'],
        ['name' => 'Pombo', 'details' => 'Ave conhecida por sua capacidade de retornar ao lar, comum em áreas urbanas.'],

        // Peixes
        ['name' => 'Peixe Betta', 'details' => 'Peixe ornamental, conhecido por suas cores vibrantes e caudas longas.'],
        ['name' => 'Peixe Dourado', 'details' => 'Peixe ornamental comum, conhecido por sua cor dourada brilhante.'],
        ['name' => 'Tetra Neon', 'details' => 'Peixe pequeno, popular em aquários por suas cores brilhantes.'],
        ['name' => 'Guppy', 'details' => 'Peixe de água doce, pequeno e colorido, comum em aquários domésticos.'],
        ['name' => 'Carpa', 'details' => 'Peixe de água doce, popular em lagos e aquários ao ar livre.'],

        // Répteis e Anfíbios
        ['name' => 'Tartaruga', 'details' => 'Réptil com uma carapaça protetora, encontrado tanto em água doce quanto no mar.'],
        ['name' => 'Iguana', 'details' => 'Réptil herbívoro que vive em áreas tropicais.'],
        ['name' => 'Camaleão', 'details' => 'Réptil conhecido por sua capacidade de mudar de cor para camuflagem.'],
        ['name' => 'Cobra', 'details' => 'Réptil sem membros, encontrado em muitos habitats ao redor do mundo.'],
        ['name' => 'Lagarto', 'details' => 'Réptil de corpo alongado, comum em climas quentes.'],
        ['name' => 'Gecko', 'details' => 'Pequeno lagarto noturno, conhecido por sua habilidade de escalar superfícies verticais.'],
        ['name' => 'Salamandra', 'details' => 'Anfíbio com corpo alongado, pele lisa e cauda.'],

        // Animais exóticos e outros
        ['name' => 'Canguru', 'details' => 'Grande marsupial nativo da Austrália, conhecido por saltar em longas distâncias.'],
        ['name' => 'Lhama', 'details' => 'Mamífero nativo dos Andes, utilizado para transporte e lã.'],
        ['name' => 'Tigre', 'details' => 'Grande felino selvagem, conhecido por suas listras características.'],
        ['name' => 'Urso', 'details' => 'Grande mamífero com pelagem espessa, encontrado em florestas e regiões árticas.'],
    ];

    private string $table = 'animal_types';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $insertData = $this->animalTypes = array_map(function($type) {
            $type['id'] = \Illuminate\Support\Str::ulid()->toBase32();

            return $type;
        }, $this->animalTypes);

        DB::table($this->table)->insert($insertData);
    }
}
