<?php

use App\Models\Answer;
use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answers = [
            [ 'learning_type_id' => 1, 'question_id' => 1,  'description' => 'Me gusta tratar con mis sentimientos'              ],
            [ 'learning_type_id' => 2, 'question_id' => 1,  'description' => 'Me gusta observar y escuchar'                      ],
            [ 'learning_type_id' => 3, 'question_id' => 1,  'description' => 'Me gusta pensar en las ideas'                      ],
            [ 'learning_type_id' => 4, 'question_id' => 1,  'description' => 'Me gusta estar haciendo cosas'                     ],
            [ 'learning_type_id' => 1, 'question_id' => 2,  'description' => 'Confío en mis corazonadas y sentimientos'          ],
            [ 'learning_type_id' => 2, 'question_id' => 2,  'description' => 'Escucho y observo cuidadosamente'                  ],
            [ 'learning_type_id' => 3, 'question_id' => 2,  'description' => 'Me apoyo en el razonamiento lógico'                ],
            [ 'learning_type_id' => 4, 'question_id' => 2,  'description' => 'Trabajo arduamente para hacer las cosas'           ],
            [ 'learning_type_id' => 1, 'question_id' => 3,  'description' => 'Tengo sentimientos y reacciones fuertes'           ],
            [ 'learning_type_id' => 2, 'question_id' => 3,  'description' => 'Soy callado y reservado'                           ],
            [ 'learning_type_id' => 3, 'question_id' => 3,  'description' => 'Tiendo a razonar las cosas'                        ],
            [ 'learning_type_id' => 4, 'question_id' => 3,  'description' => 'Soy responsable'                                   ],
            [ 'learning_type_id' => 1, 'question_id' => 4,  'description' => 'Los sentimientos'                                  ],
            [ 'learning_type_id' => 2, 'question_id' => 4,  'description' => 'La observación'                                    ],
            [ 'learning_type_id' => 3, 'question_id' => 4,  'description' => 'El razonamiento'                                   ],
            [ 'learning_type_id' => 4, 'question_id' => 4,  'description' => 'La acción'                                         ],
            [ 'learning_type_id' => 1, 'question_id' => 5,  'description' => 'Soy abierto a nuevas experiencias'                 ],
            [ 'learning_type_id' => 2, 'question_id' => 5,  'description' => 'Me fijo en todos los aspectos del asunto'          ],
            [ 'learning_type_id' => 3, 'question_id' => 5,  'description' => 'Me gusta analizar las cosas, dividirlas en partes' ],
            [ 'learning_type_id' => 4, 'question_id' => 5,  'description' => 'Me gusta experimentar con las cosas'               ],
            [ 'learning_type_id' => 1, 'question_id' => 6,  'description' => 'Soy intuitivo'                                     ],
            [ 'learning_type_id' => 2, 'question_id' => 6,  'description' => 'Soy observador'                                    ],
            [ 'learning_type_id' => 3, 'question_id' => 6,  'description' => 'Soy lógico'                                        ],
            [ 'learning_type_id' => 4, 'question_id' => 6,  'description' => 'Soy activo'                                        ],
            [ 'learning_type_id' => 1, 'question_id' => 7,  'description' => 'Las relaciones personales'                         ],
            [ 'learning_type_id' => 2, 'question_id' => 7,  'description' => 'La observación'                                    ],
            [ 'learning_type_id' => 3, 'question_id' => 7,  'description' => 'Teorías racionales'                                ],
            [ 'learning_type_id' => 4, 'question_id' => 7,  'description' => 'La oportunidad para intentar y practicar'          ],
            [ 'learning_type_id' => 1, 'question_id' => 8,  'description' => 'Me siento involucrado personalmente en las cosas'  ],
            [ 'learning_type_id' => 2, 'question_id' => 8,  'description' => 'Me tomo mi tiempo antes de actuar'                 ],
            [ 'learning_type_id' => 3, 'question_id' => 8,  'description' => 'Me gustan las ídeas y las teorías'                 ],
            [ 'learning_type_id' => 4, 'question_id' => 8,  'description' => 'Me gusta ver resultados en mi trabajo'             ],
            [ 'learning_type_id' => 1, 'question_id' => 9,  'description' => 'Confío en mis sentimientos'                        ],
            [ 'learning_type_id' => 2, 'question_id' => 9,  'description' => 'Me apoyo en mis observaciones'                     ],
            [ 'learning_type_id' => 3, 'question_id' => 9,  'description' => 'Confío en mis ideas'                               ],
            [ 'learning_type_id' => 4, 'question_id' => 9,  'description' => 'Puedo intentarlo por mí mismo'                     ],
            [ 'learning_type_id' => 1, 'question_id' => 10, 'description' => 'Soy receptivo'                                     ],
            [ 'learning_type_id' => 2, 'question_id' => 10, 'description' => 'Soy reservado'                                     ],
            [ 'learning_type_id' => 3, 'question_id' => 10, 'description' => 'Soy racional'                                      ],
            [ 'learning_type_id' => 4, 'question_id' => 10, 'description' => 'Soy responsable'                                   ],
            [ 'learning_type_id' => 1, 'question_id' => 11, 'description' => 'Me involucro'                                      ],
            [ 'learning_type_id' => 2, 'question_id' => 11, 'description' => 'Me gusta observar'                                 ],
            [ 'learning_type_id' => 3, 'question_id' => 11, 'description' => 'Evalúo las cosas'                                  ],
            [ 'learning_type_id' => 4, 'question_id' => 11, 'description' => 'Me gustar estar activo'                            ],
            [ 'learning_type_id' => 1, 'question_id' => 12, 'description' => 'Soy receptivo y amplio de criterio'                ],
            [ 'learning_type_id' => 2, 'question_id' => 12, 'description' => 'Soy cuidadoso'                                     ],
            [ 'learning_type_id' => 3, 'question_id' => 12, 'description' => 'Analizo las ideas'                                 ],
            [ 'learning_type_id' => 4, 'question_id' => 12, 'description' => 'Soy práctico'                                      ],
        ];

        Answer::insert($answers);
    }
}
