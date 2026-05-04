<?php

namespace Database\Seeders;

use App\Models\GalleryItem;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['category' => GalleryItem::CATEGORY_CERVEZAS, 'title' => 'Nuestra Chopera', 'description' => 'Degustación de cervezas en el bar.', 'image_path' => '/images/renamed/Cervezas sobre la mesa y chopera.jpg', 'sort_order' => 1],
            ['category' => GalleryItem::CATEGORY_CULTURA, 'title' => 'Elaboración', 'description' => 'Tostado meticuloso de granos.', 'image_path' => '/images/renamed/Maestro cervecero tostando grano.jpg', 'sort_order' => 2],
            ['category' => GalleryItem::CATEGORY_CERVEZAS, 'title' => 'Cerveza APA', 'description' => 'American Pale Ale.', 'image_path' => '/images/Cerveza con fondo/Cerveza-APA-Eltorogoz.png', 'sort_order' => 3],
            ['category' => GalleryItem::CATEGORY_CULTURA, 'title' => 'Pedidos B2B', 'description' => 'Cajas listas para distribución.', 'image_path' => '/images/renamed/Preparando pedidos- botellas en caja.jpg', 'sort_order' => 4],
            ['category' => GalleryItem::CATEGORY_CERVEZAS, 'title' => 'Honey Blonde', 'description' => 'Suave con notas de miel local.', 'image_path' => '/images/Cerveza con fondo/Cerveza-Honey-Eltorogoz.png', 'sort_order' => 5],
            ['category' => GalleryItem::CATEGORY_CERVEZAS, 'title' => 'Stock Fresco', 'description' => 'Lotes recién salidos de producción.', 'image_path' => '/images/renamed/Lote de cervezas sobre helador.jpg', 'sort_order' => 6],
            ['category' => GalleryItem::CATEGORY_CERVEZAS, 'title' => 'Porter', 'description' => 'Oscura, con notas a cacao y café.', 'image_path' => '/images/Cerveza con fondo/Cerveza-Porter-Eltorogoz.png', 'sort_order' => 7],
            ['category' => GalleryItem::CATEGORY_CULTURA, 'title' => 'Nuestro Equipo', 'description' => 'Ing. Joaquín Rodríguez en acción.', 'image_path' => '/images/renamed/Sobre nosotros maestro cervecero.jpg', 'sort_order' => 8],
            ['category' => GalleryItem::CATEGORY_CULTURA, 'title' => 'Orgullo Nacional', 'description' => 'Weissbier con raíces salvadoreñas.', 'image_path' => '/images/renamed/Weisbier bandera salvadoreña.jpg', 'sort_order' => 9],
        ];

        foreach ($items as $data) {
            GalleryItem::updateOrCreate(
                ['title' => $data['title'], 'image_path' => $data['image_path']],
                array_merge($data, ['is_active' => true])
            );
        }
    }
}
