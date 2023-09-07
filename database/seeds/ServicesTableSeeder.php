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
            ['name' => 'Corte de cabello', 'image' => 'public/img/home/6.jpg'],
            ['name' => 'Manicura', 'image' => 'public/img/home/1.jpg'],
            ['name' => 'Pedicura', 'image' => 'public/img/home/2.jpeg'],
            ['name' => 'Tinte de cabello', 'image' => 'public/img/home/3.jpg'],
            ['name' => 'Masaje facial', 'image' => 'public/img/home/4.jpg'],
            ['name' => 'Depilación con cera', 'image' => 'public/img/home/5.jpg'],
            ['name' => 'Tratamiento capilar', 'image' => 'public/img/home/2.jpeg'],
            ['name' => 'Maquillaje profesional', 'image' => 'public/img/home/3.jpg'],
            ['name' => 'Exfoliación corporal', 'image' => 'public/img/home/4.jpg'],
            ['name' => 'Tratamiento de uñas', 'image' => 'public/img/home/5.jpg'],
        ];

        foreach ($services as $service) {
            \App\Service::create([
                'name' => $service['name'],
                'image' => $service['image'],
                'price' => rand(100, 1000), // Esto es solo un ejemplo, puedes ajustarlo según tus necesidades
            ]);
        }
    }
}
