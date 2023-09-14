<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            ['name' => 'Corte de cabello', 'image' => '/img/home/6.jpg'],
            ['name' => 'Manicura', 'image' => '/img/home/1.jpg'],
            ['name' => 'Pedicura', 'image' => '/img/home/2.jpeg'],
            ['name' => 'Tinte de cabello', 'image' => '/img/home/3.jpg'],
            ['name' => 'Masaje facial', 'image' => '/img/home/4.jpg'],
            ['name' => 'Depilación con cera', 'image' => '/img/home/5.jpg'],
            ['name' => 'Tratamiento capilar', 'image' => '/img/home/2.jpeg'],
            ['name' => 'Maquillaje profesional', 'image' => '/img/home/3.jpg'],
            ['name' => 'Exfoliación corporal', 'image' => '/img/home/4.jpg'],
            ['name' => 'Tratamiento de uñas', 'image' => '/img/home/5.jpg'],
        ];

        foreach ($services as $service) {
            \App\Service::create([
                'name' => $service['name'],
                'image' => $service['image'],
                'price' => rand(10, 50), // Esto es solo un ejemplo, puedes ajustarlo según tus necesidades
            ]);
        }
    }
}
