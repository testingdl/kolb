<?php

use Illuminate\Database\Seeder;
use App\Models\Test;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Test::create([
            'name'        => 'Kolb',
            'description' => 'El inventario de los estilos de aprendizaje describe la manera en que usted maneja las ideas y las situaciones diarios en su vida. Totos pensamos que la gente aprende de distintas maneras, pero este inventario te ayudará a entender lo que el estilo de aprendizaje puede significar para usted.'
        ]);
    }
}
