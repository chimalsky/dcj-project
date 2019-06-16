<?php

use App\Form;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitForms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $processDictionary = [
            'trial' => [
                'name' => 'Trial',

                'excel' => [
                    'prefix' => 'trial'
                ],

                'meta' => [
                    [
                        'name' => 'domestic',
                        'label' => 'Location Domestic?',
                        'options' => ['Non-domestic', 'Domestic']
                    ],
                    [
                        'name' => 'international',
                        'label' => 'International Involvement?',
                        'options' => ['Non-international', 'International']
                    ],
                    [
                        'name' => 'venue',
                        'type' => 'dropdown',
                        'label' => 'Select a Trial Venue',
                        'options' => [
                            'Domestic law court' => 'Domestic law court',
                            'Military court' => 'Military court',
                            'International court' => 'International court',
                            'Ad hoc conflict-specific court' => 'Ad hoc conflict-specific court'
                        ]
                    ],
                    [
                        'name' => 'absentia',
                        'label' => 'Absentia?',
                        'options' => ['Non-absentia', 'Is absentia']
                    ],
                    [
                        'name' => 'executed',
                        'label' => 'Executed?',
                        'options' => ['No execution', 'Execution']
                    ],
                    [
                        'name' => 'breach',
                        'label' => 'Breach of Justice?',
                        'options' => ['Non-breach', 'Breach']
                    ]
                ]
            ],
            'truth' => [
                'name' => 'Truth Commission',
    
                'excel' => [
                    'prefix' => 'truth'
                ],

                'meta' => [
                    [
                        'name' => 'report',
                        'label' => 'Report Released?',
                        'options' => ['No release', 'Release']
                    ],
                    [
                        'name' => 'international',
                        'label' => 'International Involvement?',
                        'options' => ['Non-international', 'International']
                    ],
                    [
                        'name' => 'breach',
                        'label' => 'Breach of Justice?',
                        'options' => ['Non-breach', 'Breach']
                    ]
                ]  
            ],
            'reparation' => [
                'name' => 'Reparation',
    
                'excel' => [
                    'prefix' => 'rep'
                ],

                'meta' => [
                    [
                        'name' => 'property',
                        'label' => 'Property?',
                        'options' => ['Non-property', 'Property']
                    ],
                    [
                        'name' => 'money',
                        'label' => 'Money?',
                        'options' => ['Non-monetary', 'Monetary']
                    ],
                    [
                        'name' => 'training_education',
                        'label' => 'Training/Education',
                        'options' => ['No skills/education', 'Skills/education']
                    ],
                    [
                        'name' => 'community',
                        'label' => 'Community',
                        'options' => ['Non-community', 'Community']
                    ],
                    [
                        'name' => 'funder',
                        'type' => 'dropdown',
                        'label' => 'Funder of the Reparation',
                        'options' => [
                            'Side A' => 'Side A',
                            'Side B' => 'Side B',
                            'Both' => 'Both',
                            'Other' => 'Other',
                            'International' => 'International'
                        ]
                    ]
                ]  
            ],
            'amnesty' => [
                'name' => 'amnesty',
    
                'excel' => [
                    'prefix' => 'amnesty'
                ],

                'meta' => [
                    [
                        'name' => 'limited',
                        'label' => 'Limited?',
                        'options' => ['Not limited', 'Limited']
                    ],
                    [
                        'name' => 'unconditional',
                        'label' => 'Amnesty conditions were:',
                        'options' => ['Non unconditional', 'Unconditional']
                    ]
                ]
            ],
            'purge' => [
                'name' => 'purge',
    
                'excel' => [
                    'prefix' => 'purge'
                ],

                'meta' => [
                    [
                        'name' => 'permanent',
                        'label' => 'Permanent?',
                        'options' => ['Non-permanent', 'Permanent']
                    ],
                    [
                        'name' => 'military',
                        'label' => 'Military?',
                        'options' => ['Non-military', 'Military']
                    ],
                    [
                        'name' => 'judiciary',
                        'label' => 'Judiciary?',
                        'options' => ['Non-judiciary', 'Judiciary']
                    ],
                    [
                        'name' => 'civil_service',
                        'label' => 'Civil Service?',
                        'options' => ['Not civil service', 'Civil service']
                    ]
                ]
            ],
            'exile' => [
                'name' => 'exile',
    
                'excel' => [
                    'prefix' => 'exile'
                ],

                'meta' => [
                    [
                        'name' => 'permanent',
                        'label' => 'Permanent?',
                        'options' => ['Non-permanent', 'Permanent']
                    ]
                ]
            ]
        ];

        collect($processDictionary)->each(function($schema, $name) {
            Form::create([
                'name' => $name,
                'schema' => $schema
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
