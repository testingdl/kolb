<?php

use App\Models\LearningStyle;
use Illuminate\Database\Seeder;

class LearningStylesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $learningStyles = [
            [
                'test_id'     => '1', 
                'name'        => 'Convergente', 
                'description' => 'Combina las etapas del aprendizaje de la CONCEPTUALIZACIÓN ABSTRACTA y la EXPERIMENTACIÓN ACTIVA',
                'detail'     => 'Las personas que se inclinan por este tipo de aprendizaje se destacan cuando se trata de encontrar uso práctico de las ideas y teorías. Si este es su estilo de aprendizaje preferido, usted tiene la capacidad de tomar decisiones y resolver que se basa que se basa en encontrar soluciones a las preguntas o problemas. Usted prefiere manejar situaciones y problemas técnicos y no temas sociales e interpretaciones. Esta habilidad del aprendizaje es importante para ser eficaz en carreras técnicas y especialización',
            ],
            [
                'test_id'     => '1', 
                'name'        => 'Divergente', 
                'description' => 'Combina las etapas del aprendizaje de la EXPERIENCIA CONCRETA y la OBSERVACIÓN REFLEXIVA',
                'detail'     => 'Las personas que se inclinan por este tipo de aprendizaje son expertas cuando se trata de observar situaciones concretas desde diferentes puntos de vista. Su manera de enfrentar las situaciones consiste en observar en vez de actuar. Si éste es tu estilo, puede que prefieras las situaciones en las que se genere una amplia gama de ideas, como en una sesión de acopio de ideas brillantes. Probablemente usted tenga muchos intereses culturales y le interese recopilar información. Esta capacidad imaginativa y sensibilidad es necesaria para ser eficaz en las carreras de las artes, el espectaculo y los servicios',
            ],
            [
                'test_id'     => '1', 
                'name'        => 'Asimilador', 
                'description' => 'Combina las etapas del aprendizaje de la CONCEPTUALIZACIÓN ABSTRACTA y la OBSERVACIÓN REFLEXIVA',
                'detail'     => 'Las personas que se inclinan por este tipo de aprendizaje se destacan cuando deben entender una amplia gama de información y darle una aplicación concisa y lógica. Si éste es su estilo de aprendizaje, probablemente, a usted le interezan menos las personas y se intereze más en las ideas abstracta y conceptos. Por lo general, las personas con este estilo de aprendizaje sienten que es más importante que una idea tenga un sentido lógico que un sentido práctico. Este estilo de aprendizaje es importante para ser eficaz en las carreras científicas y de información',
            ],
            [
                'test_id'     => '1', 
                'name'        => 'Acomodador', 
                'description' => 'Combina las etapas del aprendizaje de la EXPERIENCIA CONCRETA y la EXPERIMENTACIÓN ACTIVA',
                'detail'     => 'Las personas que se incilinan por este tipo de aprendizaje tienen la capacidad de aprender principalmente de la experiencia práctica. Si este es su estilo, probablemente, disfruta llevar a cabo planes e involucrarse en experiencias nuevas y desafiantes. Su tendencia es la de actuar más guiado por su instinto que por el análisis lógico. Para resolver problemas, puede que se confie más en las personas para conseguir información que en su propio análisis técnico. Este estilo de aprendizaje tiene a ser importante para las carreras que requiren de acción, tales como el mercadeo y las ventas.',
            ],
        ];

        LearningStyle::insert($learningStyles);
    }
}
