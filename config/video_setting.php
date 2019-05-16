<?php
return [
    'Time and Date Formats' => [
        'title' => 'Defaults',
        'elements' => [
            [
                'type' => 'select', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'default_video_vitual_room', // unique name for field
                'label' => 'Default  Video Virtual Room', // you know what label it is
                'description' => 'Application Default Video Virtual Room', // you know what label it is
                'rules' => 'required|min:2|max:50', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '', // default value if you want
                'options' => [
                    "videoware" => 'Videoware',
                    "braincert" => 'Braincert',
                ]
            ]
        ]
    ],
    'Videoware' => [
        'title' => 'Videoware',
        'elements' => [
            [
                'type' => 'videoware', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'videoware_url', // unique name for field
                'label' => 'Videoware Url', // you know what label it is
                'description' => 'The url or server to connect', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '', // default value if you want

            ],
            [
                'type' => 'hidden', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'videoware_student_code', // unique name for field
                'label' => 'Student Code', // you know what label it is
                'description' => 'Code Type for Student', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '', // default value if you want

            ],
             [
                'type' => 'hidden', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'videoware_teacher_code', // unique name for field
                'label' => 'Teacher Code', // you know what label it is
                'description' => 'Code Type for Teacher', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '', // default value if you want

            ],

        ]
    ],
    'braincert' => [
        'title' => 'Braincert',
        'elements' => [
            [
                'type' => 'hidden', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'braincert_base_url', // unique name for field
                'label' => 'Base URL', // you know what label it is
                'description' => 'The url or server to connect', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '', // default value if you want

            ],
            [
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'braincert_api_endpoint', // unique name for field
                'label' => 'API Endpoint', // you know what label it is
                'description' => 'Braincert API Endpoint', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '', // default value if you want

            ],
            [
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'braincert_api_key', // unique name for field
                'label' => 'API Key', // you know what label it is
                'description' => 'Application Programming Interface Key', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '', // default value if you want

            ],
            [
                'type' => 'select', // input fields type
                'data' => 'int', // data type, int, int, boolean
                'name' => 'braincert_leveltest_minutes', // unique name for field
                'label' => 'Level Test Duration', // you know what label it is
                'description' => 'Minutes of Level Test Class', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '', // default value if you want
                'options' => [
                    '10' => '10 minutes',
                    '15' => '15 minutes',
                    '20' => '20 minutes',
                    '25' => '25 minutes',
                    '30' => '30 minutes',
                    '35' => '35 minutes',
                    '40' => '40 minutes',
                    '45' => '45 minutes',
                    '50' => '50 minutes',
                    '55' => '55 minutes',
                    '60' => '60 minutes',
                ]
            ],
             [
                'type' => 'select', // input fields type
                'data' => 'int', // data type, int, int, boolean
                'name' => 'braincert_minutes_before', // unique name for field
                'label' => 'Minutes Before Class', // you know what label it is
                'description' => 'Minutes allowed to open class room', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '', // default value if you want
                'options' => [
                    '10' => '10 minutes',
                    '15' => '15 minutes',
                    '20' => '20 minutes',
                    '25' => '25 minutes',
                    '30' => '30 minutes',
                    '35' => '35 minutes',
                    '40' => '40 minutes',
                    '45' => '45 minutes',
                    '50' => '50 minutes',
                    '55' => '55 minutes',
                    '60' => '60 minutes',
                ]
            ],
             [
                'type' => 'select', // input fields type
                'data' => 'int', // data type, int, int, boolean
                'name' => 'braincert_minutes_after', // unique name for field
                'label' => 'Minutes After Class', // you know what label it is
                'description' => 'Minutes allowed even class hours has been ended', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '', // default value if you want
                'options' => [
                    '10' => '10 minutes',
                    '15' => '15 minutes',
                    '20' => '20 minutes',
                    '25' => '25 minutes',
                    '30' => '30 minutes',
                    '35' => '35 minutes',
                    '40' => '40 minutes',
                    '45' => '45 minutes',
                    '50' => '50 minutes',
                    '55' => '55 minutes',
                    '60' => '60 minutes',
                ]
            ],
            [
                'type' => 'select', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'braincert_timezone', // unique name for field
                'label' => 'Classroom TimeZone', // you know what label it is
                'description' => 'Application Default Classroom TimeZone', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '', // default value if you want
                'options' => [
                                '28' => '(GMT) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London',
                                '30' => '(GMT) Monrovia, Reykjavik',
                                '72' => '(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna',
                                '53' => '(GMT+01:00) Brussels, Copenhagen, Madrid, Paris',
                                '14' => '(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb',
                                '71' => '(GMT+01:00) West Central Africa',
                                '83' => '(GMT+02:00) Amman',
                                '84' => '(GMT+02:00) Beirut',
                                '24' => '(GMT+02:00) Cairo',
                                '61' => '(GMT+02:00) Harare, Pretoria',
                                '27' => '(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius',
                                '35' => '(GMT+02:00) Jerusalem',
                                '21' => '(GMT+02:00) Minsk',
                                '86' => '(GMT+02:00) Windhoek',
                                '31' => '(GMT+03:00) Athens, Istanbul, Minsk',
                                '2' => '(GMT+03:00) Baghdad',
                                '49' => '(GMT+03:00) Kuwait, Riyadh',
                                '54' => '(GMT+03:00) Moscow, St. Petersburg, Volgograd',
                                '19' => '(GMT+03:00) Nairobi',
                                '87' => '(GMT+03:00) Tbilisi',
                                '34' => '(GMT+03:30) Tehran',
                                '1' => '(GMT+04:00) Abu Dhabi, Muscat',
                                '88' => '(GMT+04:00) Baku',
                                '9' => '(GMT+04:00) Baku, Tbilisi, Yerevan',
                                '89' => '(GMT+04:00) Port Louis',
                                '47' => '(GMT+04:30) Kabul',
                                '25' => '(GMT+05:00) Ekaterinburg',
                                '90' => '(GMT+05:00) Islamabad, Karachi',
                                '73' => '(GMT+05:00) Islamabad, Karachi, Tashkent',
                                '33' => '(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi',
                                '62' => '(GMT+05:30) Sri Jayawardenepura',
                                '91' => '(GMT+05:45) Kathmandu',
                                '42' => '(GMT+06:00) Almaty, Novosibirsk',
                                '12' => '(GMT+06:00) Astana, Dhaka',
                                '41' => '(GMT+06:30) Rangoon',
                                '59' => '(GMT+07:00) Bangkok, Hanoi, Jakarta',
                                '50' => '(GMT+07:00) Krasnoyarsk',
                                '17' => '(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi',
                                '46' => '(GMT+08:00) Irkutsk, Ulaan Bataar',
                                '60' => '(GMT+08:00) Kuala Lumpur, Singapore',
                                '70' => '(GMT+08:00) Perth',
                                '63' => '(GMT+08:00) Taipei',
                                '65' => '(GMT+09:00) Osaka, Sapporo, Tokyo',
                                '77' => '(GMT+09:00) Seoul',
                                '75' => '(GMT+09:00) Yakutsk',
                                '10' => '(GMT+09:30) Adelaide',
                                '4' => '(GMT+09:30) Darwin',
                                '20' => '(GMT+10:00) Brisbane',
                                '5' => '(GMT+10:00) Canberra, Melbourne, Sydney',
                                '74' => '(GMT+10:00) Guam, Port Moresby',
                                '64' => '(GMT+10:00) Hobart',
                                '69' => '(GMT+10:00) Vladivostok',
                                '15' => '(GMT+11:00) Magadan, Solomon Is., New Caledonia',
                                '44' => '(GMT+12:00) Auckland, Wellington',
                                '26' => '(GMT+12:00) Fiji, Kamchatka, Marshall Is.',
                                '6' => '(GMT-01:00) Azores',
                                '8' => '(GMT-01:00) Cape Verde Is.',
                                '39' => '(GMT-02:00) Mid-Atlantic',
                                '22' => '(GMT-03:00) Brasilia',
                                '94' => '(GMT-03:00) Buenos Aires',
                                '55' => '(GMT-03:00) Buenos Aires, Georgetown',
                                '29' => '(GMT-03:00) Greenland',
                                '95' => '(GMT-03:00) Montevideo',
                                '45' => '(GMT-03:30) Newfoundland',
                                '3' => '(GMT-04:00) Atlantic Time (Canada)',
                                '57' => '(GMT-04:00) Georgetown, La Paz, San Juan',
                                '96' => '(GMT-04:00) Manaus',
                                '51' => '(GMT-04:00) Santiago',
                                '76' => '(GMT-04:30) Caracas',
                                '56' => '(GMT-05:00) Bogota, Lima, Quito',
                                '23' => '(GMT-05:00) Eastern Time (US & Canada)',
                                '67' => '(GMT-05:00) Indiana (East)',
                                '11' => '(GMT-06:00) Central America',
                                '16' => '(GMT-06:00) Central Time (US & Canada)',
                                '37' => '(GMT-06:00) Guadalajara, Mexico City, Monterrey',
                                '7' => '(GMT-06:00) Saskatchewan',
                                '68' => '(GMT-07:00) Arizona',
                                '38' => '(GMT-07:00) Chihuahua, La Paz, Mazatlan',
                                '40' => '(GMT-07:00) Mountain Time (US & Canada)',
                                '52' => '(GMT-08:00) Pacific Time (US & Canada)',
                                '104' => '(GMT-08:00) Tijuana, Baja California',
                                '48' => '(GMT-09:00) Alaska',
                                '32' => '(GMT-10:00) Hawaii',
                                '58' => '(GMT-11:00) Midway Island, Samoa',
                                '18' => '(GMT-12:00) International Date Line West',
                                '105' => '(GMT-4:00) Eastern Daylight Time (US & Canada)',
                                '13' => '(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague',
                ]
            ],
            [
                'type' => 'select', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'braincert_datacenter_region', // unique name for field
                'label' => 'Datacenter Region', // you know what label it is
                'description' => 'Application Default Datacenter Region', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '', // default value if you want
                'options' => [
                                '0' => 'Intelligent routing to nearest location (Experimental)',
                                '1' => 'US East (Dallas, TX)',  
                                '2' => 'US West (Los Angeles, CA)',  
                                '3' => 'US East (New York)',  
                                '4' => 'Europe (Frankfurt, Germany)',  
                                '5' => 'Europe (London)',  
                                '6' => 'Asia Pacific (Bangalore, India)',  
                                '7' => 'Asia Pacific (Singapore)',  
                                '8' => 'US East (Miami, FL)',  
                                '9' => 'Europe (Milan, Italy)',  
                                '10' => 'Asia Pacific (Tokyo, Japan)',  
                                '11' => 'Middle East (Dubai, UAE)',  
                                '12' => 'Australia (Sydney)',  
                                '13' => 'Europe (Paris, France)',  
                                '14' => 'Asia Pacific (Beijing, China)',
                            ]
            ]

        ]
    ],

];
