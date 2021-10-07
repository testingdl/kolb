<?php

use App\Models\LearningType;
use Illuminate\Database\Seeder;

class LearningTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $learning_types = [
            [
                'test_id'      => '1',
                'description'  => 'Experiencia Concreta ("Sentimientos")', 
                'abbreviation' => 'EC',
                'details'      => '<div class="h-100 p-4" style="background: linear-gradient(0deg, #fcdabe ${result}%, #fde3ce ${result}%);">
<div class="text-center"><img class="w-100" src="img/${abbreviation}.png" alt="${description}" /></div>
<h1 class="h4 font-weight-bold" style="color: #fff !important;font-size: 1.3em;margin: 1em 0;background: #fc8368;padding: 5px 10px;border-radius: 10px;">${description} (${abbreviation}): ${result}%</h1>
<div class="text-justify">Esta etapa del ciclo de aprendizaje enfatiza su relación personal con la gente en situaciones diarías. En esta etapa, usted tiende a confiar más en sus sentimientos que en un enfoque sistemático de los problemas y las situaciones. En una situación de aprendizaje, usted confía más en su criterio amplio y en su adaptabilidad a los cambios.</div>
</div>'
            ],
            [
                'test_id'      => '1',
                'description'  => 'Observación Reflexiva ("Observación")', 
                'abbreviation' => 'OR',
                'details'      => '<div class="h-100 p-4" style="background: linear-gradient(0deg, #fdfdbf ${result}%, #fdfdce ${result}%);">
<div class="text-center"><img class="w-100" src="img/${abbreviation}.png" alt="${description}" /></div>
<h1 class="h4 font-weight-bold" style="color: #fff !important;font-size: 1.3em;margin: 1em 0;background: #f6b541;padding: 5px 10px;border-radius: 10px;">${description} (${abbreviation}): ${result}%</h1>
<div class="text-justify">En esta etapa del ciclo de aprendizaje, la gente comprende las ideas y situaciones provenientes de distintos puntos de vista. En una situación de aprendizaje usted confía en la paciencia, la objetividad y un juicio cuidadoso pero no toma necesariamente ninguna acción. Confía en sus propios pensamientos y sentimientos para formular opiniones.</div>
<div>'
            ],
            [
                'test_id'      => '1',
                'description'  => 'Conceptualización Abstracta ("Razonamiento")', 
                'abbreviation' => 'CA',
                'details'      => '<div class="h-100 p-4" style="background: linear-gradient(0deg, #befcbe ${result}%, #cefdce ${result}%);">
<div class="text-center"><img class="w-100" src="img/${abbreviation}.png" alt="${description}" /></div>
<h1 class="h4 font-weight-bold" style="color: #fff !important;font-size: 1.3em;margin: 1em 0;background: #079407;padding: 5px 10px;border-radius: 10px;">${description} (${abbreviation}): ${result}%</h1>
<div class="text-justify">En esta etapa, el aprendizaje comprende el uso de la lógica y de las ideas, más que los sentimientos, para comprender los problemas o las situaciones. Por lo general, usted confía en la planificación sistemática y desarrolla teorías e ideas para resolver problemas.</div>
</div>'
            ],
            [
                'test_id'      => '1',
                'description'  => 'Experimentación Activa ("Acción")', 
                'abbreviation' => 'EA',
                'details'      => '<div class="h-100 p-4" style="background: linear-gradient(0deg, #c1dffd ${result}%, #cee6fd ${result}%);">
<div class="text-center"><img class="w-100" src="img/${abbreviation}.png" alt="${description}" /></div>
<h1 class="h4 font-weight-bold" style="color: #fff !important;font-size: 1.3em;margin: 1em 0;background: #70c9e9;padding: 5px 10px;border-radius: 10px;">${description} (${abbreviation}): ${result}%</h1>
<div>El aprendizaje en esta etapa toma una forma activa; se experimenta con el hecho de influir o cambiar situaciones. Usted tiene un enfoque práctico y un interés por lo que realmente funciona, en oposición a la mera observación de una situación. Usted aprecia el cumplimiento de las cosas y le gusta ver los resultados de su influencia e ingenuidad.</div>
</div>'
            ],
        ];

        LearningType::insert($learning_types);
    }
}
