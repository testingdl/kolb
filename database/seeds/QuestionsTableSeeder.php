<?php

use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions =  [
            [ 'test_id' => '1', 'description' => 'Cuando aprendo'           ],
            [ 'test_id' => '1', 'description' => 'Aprendo mejor cuando'     ],
            [ 'test_id' => '1', 'description' => 'Cuando estoy aprendiendo' ],
            [ 'test_id' => '1', 'description' => 'Aprendo por medio de'     ],
            [ 'test_id' => '1', 'description' => 'Cuando aprendo'           ],
            [ 'test_id' => '1', 'description' => 'Cuando estoy aprendiendo' ],
            [ 'test_id' => '1', 'description' => 'Aprendo mejor de'         ],
            [ 'test_id' => '1', 'description' => 'Cuando aprendo'           ],
            [ 'test_id' => '1', 'description' => 'Aprendo mejor cuando'     ],
            [ 'test_id' => '1', 'description' => 'Cuando estoy aprendiendo' ],
            [ 'test_id' => '1', 'description' => 'Cuando aprendo'           ],
            [ 'test_id' => '1', 'description' => 'Aprendo mejor cuando'     ],
        ];

        Question::insert($questions);
    }
}
