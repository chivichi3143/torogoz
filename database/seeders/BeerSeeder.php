<?php

namespace Database\Seeders;

use App\Models\Beer;
use Illuminate\Database\Seeder;

class BeerSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            [
                'slug' => 'porter',
                'name' => 'PORTER',
                'style' => 'Cerveza Oscura',
                'color' => '#3f2b1c',
                'accent' => '#8b5a2b',
                'abv' => '6.0',
                'ibus' => '30',
                'amargor' => 3,
                'cuerpo' => 4,
                'aroma' => 4,
                'description' => 'Cerveza de color oscuro estilo Porter, elaborada con maltas tostadas que aportan un característico aroma a granos tostados de café, presenta notas complejas a chocolate, posee un cuerpo redondo con un final dulce y amargor moderado.',
                'pairing' => 'Todo tipo de postres, comidas especiadas y carne a la parrilla.',
                'image_bottle' => '/images/Cerveza-Botella-Porter-Eltorogo.png',
                'image_background' => '/images/Cerveza-porter-Eltorogoz.png',
                'sort_order' => 10,
            ],
            [
                'slug' => 'ginger',
                'name' => 'GINGER',
                'style' => 'Rubia con Jengibre',
                'color' => '#d4af37',
                'accent' => '#e5c158',
                'abv' => '4.5',
                'ibus' => '15',
                'amargor' => 2,
                'cuerpo' => 2,
                'aroma' => 3,
                'description' => 'Cerveza rubia que incorpora jengibre en su proceso de elaboración brindando un característico olor y un leve sabor a jengibre, de cuerpo ligero y amargor bajo, es una cerveza muy refrescante con un contenido alcohólico moderadamente bajo.',
                'pairing' => 'Comida liviana, ensaladas, pollo y salchichas.',
                'image_bottle' => '/images/Cerveza-Botella-Ginger-Eltorogoz.png',
                'image_background' => '/images/Cerveza-Ginger-Eltorogoz.png',
                'sort_order' => 20,
            ],
            [
                'slug' => 'apa',
                'name' => 'APA',
                'style' => 'American Pale Ale',
                'color' => '#c26b22',
                'accent' => '#d97b2f',
                'abv' => '5.5',
                'ibus' => '40',
                'amargor' => 4,
                'cuerpo' => 3,
                'aroma' => 4,
                'description' => 'Cerveza de color dorado estilo American Pale Ale altamente lupulada que otorga un amargor marcado, posee notas aromáticas a cítricos y frutos tropicales, presenta un cuerpo que va de medio a ligero, es una cerveza sociable, equilibrada y refrescante.',
                'pairing' => 'Quesos jovenes, comidas muy condimentadas, pizzas, hamburguesas, ceviches y carne a las brazas.',
                'image_bottle' => '/images/Cerveza-Botella-APA-Eltorogo.png',
                'image_background' => '/images/Cerveza-APA-Eltrorogoz.png',
                'sort_order' => 30,
            ],
            [
                'slug' => 'honey',
                'name' => 'HONEY',
                'style' => 'Blonde Ale con Miel',
                'color' => '#e5b73b',
                'accent' => '#f2c94c',
                'abv' => '6.5',
                'ibus' => '20',
                'amargor' => 2,
                'cuerpo' => 3,
                'aroma' => 3,
                'description' => 'Cerveza rubia estilo Blonde Ale que incorpora miel natural en su proceso de elaboración brindando un olor frutal y dulce y un leve sabor a miel, de cuerpo medio y amargor bajo, es una cerveza muy refrescante con un contenido alcohólico moderadamente alto.',
                'pairing' => 'Quesos frescos, mariscos, pastas poco especiadas y carnes blancas.',
                'image_bottle' => '/images/Cerveza-Botella-Honey-Eltorogoz.png',
                'image_background' => '/images/Cerveza-Honey-Eltorogoz.png',
                'sort_order' => 40,
            ],
            [
                'slug' => 'weissbier',
                'name' => 'WEISSBIER',
                'style' => 'Cerveza de Trigo',
                'color' => '#f2d974',
                'accent' => '#fce588',
                'abv' => '5.0',
                'ibus' => '12',
                'amargor' => 1,
                'cuerpo' => 2,
                'aroma' => 4,
                'description' => 'Cerveza turbia de color pajizo estilo aleman de trigo, posee notas aromáticas a banano y clavo de olor producto de las levaduras, es una cerveza ligera con un perfil de sabor suave y amargor imperceptible.',
                'pairing' => 'Comidas ligeras, ensaladas de vegetales, pescado, queso de cabra, sushi y salchichas blancas.',
                'image_bottle' => '/images/Cerveza-Botella-Weissbier-Eltorogo.png',
                'image_background' => '/images/Cerveza-Weissbier-Eltorogoz.png',
                'sort_order' => 50,
            ],
        ];

        foreach ($rows as $row) {
            Beer::updateOrCreate(
                ['slug' => $row['slug']],
                array_merge($row, ['is_active' => true])
            );
        }
    }
}
