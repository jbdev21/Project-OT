<?php return array (
  'notification_setting' => 
  array (
    'Notification' => 
    array (
      'title' => 'Notification',
      'elements' => 
      array (
        0 => 
        array (
          'type' => 'select',
          'data' => 'string',
          'name' => 'admin_to_notify',
          'label' => 'Admin to Notify',
          'description' => 'Admin who recieves notification',
          'rules' => 'required|min:2|max:50',
          'class' => 'form-control',
          'value' => '',
        ),
      ),
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
    ),
    'ses' => 
    array (
      'key' => NULL,
      'secret' => NULL,
      'region' => 'us-east-1',
    ),
    'sparkpost' => 
    array (
      'secret' => NULL,
    ),
    'stripe' => 
    array (
      'model' => 'App\\User',
      'key' => NULL,
      'secret' => NULL,
    ),
  ),
  'cache' => 
  array (
    'default' => 'file',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => '/skymoontiger/lms/storage/framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
    ),
    'prefix' => 'laravel',
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'database' => 'skymoontiger',
        'prefix' => '',
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'skymoontiger',
        'username' => 'skymoontiger',
        'password' => 'wewant2015db',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'strict' => false,
        'engine' => NULL,
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'skymoontiger',
        'username' => 'skymoontiger',
        'password' => 'wewant2015db',
        'charset' => 'utf8',
        'prefix' => '',
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'predis',
      'default' => 
      array (
        'host' => '127.0.0.1',
        'password' => NULL,
        'port' => '6379',
        'database' => 0,
      ),
    ),
  ),
  'video_setting' => 
  array (
    'Time and Date Formats' => 
    array (
      'title' => 'Defaults',
      'elements' => 
      array (
        0 => 
        array (
          'type' => 'select',
          'data' => 'string',
          'name' => 'default_video_vitual_room',
          'label' => 'Default  Video Virtual Room',
          'description' => 'Application Default Video Virtual Room',
          'rules' => 'required|min:2|max:50',
          'class' => '',
          'value' => '',
          'options' => 
          array (
            'videoware' => 'Videoware',
            'braincert' => 'Braincert',
          ),
        ),
      ),
    ),
    'Videoware' => 
    array (
      'title' => 'Videoware',
      'elements' => 
      array (
        0 => 
        array (
          'type' => 'videoware',
          'data' => 'string',
          'name' => 'videoware_url',
          'label' => 'Videoware Url',
          'description' => 'The url or server to connect',
          'rules' => '',
          'class' => '',
          'value' => '',
        ),
        1 => 
        array (
          'type' => 'hidden',
          'data' => 'string',
          'name' => 'videoware_student_code',
          'label' => 'Student Code',
          'description' => 'Code Type for Student',
          'rules' => '',
          'class' => '',
          'value' => '',
        ),
        2 => 
        array (
          'type' => 'hidden',
          'data' => 'string',
          'name' => 'videoware_teacher_code',
          'label' => 'Teacher Code',
          'description' => 'Code Type for Teacher',
          'rules' => '',
          'class' => '',
          'value' => '',
        ),
      ),
    ),
    'braincert' => 
    array (
      'title' => 'Braincert',
      'elements' => 
      array (
        0 => 
        array (
          'type' => 'hidden',
          'data' => 'string',
          'name' => 'braincert_base_url',
          'label' => 'Base URL',
          'description' => 'The url or server to connect',
          'rules' => '',
          'class' => '',
          'value' => '',
        ),
        1 => 
        array (
          'type' => 'text',
          'data' => 'string',
          'name' => 'braincert_api_endpoint',
          'label' => 'API Endpoint',
          'description' => 'Braincert API Endpoint',
          'rules' => '',
          'class' => '',
          'value' => '',
        ),
        2 => 
        array (
          'type' => 'text',
          'data' => 'string',
          'name' => 'braincert_api_key',
          'label' => 'API Key',
          'description' => 'Application Programming Interface Key',
          'rules' => '',
          'class' => '',
          'value' => '',
        ),
        3 => 
        array (
          'type' => 'select',
          'data' => 'int',
          'name' => 'braincert_leveltest_minutes',
          'label' => 'Level Test Duration',
          'description' => 'Minutes of Level Test Class',
          'rules' => '',
          'class' => '',
          'value' => '',
          'options' => 
          array (
            10 => '10 minutes',
            15 => '15 minutes',
            20 => '20 minutes',
            25 => '25 minutes',
            30 => '30 minutes',
            35 => '35 minutes',
            40 => '40 minutes',
            45 => '45 minutes',
            50 => '50 minutes',
            55 => '55 minutes',
            60 => '60 minutes',
          ),
        ),
        4 => 
        array (
          'type' => 'select',
          'data' => 'int',
          'name' => 'braincert_minutes_before',
          'label' => 'Minutes Before Class',
          'description' => 'Minutes allowed to open class room',
          'rules' => '',
          'class' => '',
          'value' => '',
          'options' => 
          array (
            10 => '10 minutes',
            15 => '15 minutes',
            20 => '20 minutes',
            25 => '25 minutes',
            30 => '30 minutes',
            35 => '35 minutes',
            40 => '40 minutes',
            45 => '45 minutes',
            50 => '50 minutes',
            55 => '55 minutes',
            60 => '60 minutes',
          ),
        ),
        5 => 
        array (
          'type' => 'select',
          'data' => 'int',
          'name' => 'braincert_minutes_after',
          'label' => 'Minutes After Class',
          'description' => 'Minutes allowed even class hours has been ended',
          'rules' => '',
          'class' => '',
          'value' => '',
          'options' => 
          array (
            10 => '10 minutes',
            15 => '15 minutes',
            20 => '20 minutes',
            25 => '25 minutes',
            30 => '30 minutes',
            35 => '35 minutes',
            40 => '40 minutes',
            45 => '45 minutes',
            50 => '50 minutes',
            55 => '55 minutes',
            60 => '60 minutes',
          ),
        ),
        6 => 
        array (
          'type' => 'select',
          'data' => 'string',
          'name' => 'braincert_timezone',
          'label' => 'Classroom TimeZone',
          'description' => 'Application Default Classroom TimeZone',
          'rules' => '',
          'class' => '',
          'value' => '',
          'options' => 
          array (
            28 => '(GMT) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London',
            30 => '(GMT) Monrovia, Reykjavik',
            72 => '(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna',
            53 => '(GMT+01:00) Brussels, Copenhagen, Madrid, Paris',
            14 => '(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb',
            71 => '(GMT+01:00) West Central Africa',
            83 => '(GMT+02:00) Amman',
            84 => '(GMT+02:00) Beirut',
            24 => '(GMT+02:00) Cairo',
            61 => '(GMT+02:00) Harare, Pretoria',
            27 => '(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius',
            35 => '(GMT+02:00) Jerusalem',
            21 => '(GMT+02:00) Minsk',
            86 => '(GMT+02:00) Windhoek',
            31 => '(GMT+03:00) Athens, Istanbul, Minsk',
            2 => '(GMT+03:00) Baghdad',
            49 => '(GMT+03:00) Kuwait, Riyadh',
            54 => '(GMT+03:00) Moscow, St. Petersburg, Volgograd',
            19 => '(GMT+03:00) Nairobi',
            87 => '(GMT+03:00) Tbilisi',
            34 => '(GMT+03:30) Tehran',
            1 => '(GMT+04:00) Abu Dhabi, Muscat',
            88 => '(GMT+04:00) Baku',
            9 => '(GMT+04:00) Baku, Tbilisi, Yerevan',
            89 => '(GMT+04:00) Port Louis',
            47 => '(GMT+04:30) Kabul',
            25 => '(GMT+05:00) Ekaterinburg',
            90 => '(GMT+05:00) Islamabad, Karachi',
            73 => '(GMT+05:00) Islamabad, Karachi, Tashkent',
            33 => '(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi',
            62 => '(GMT+05:30) Sri Jayawardenepura',
            91 => '(GMT+05:45) Kathmandu',
            42 => '(GMT+06:00) Almaty, Novosibirsk',
            12 => '(GMT+06:00) Astana, Dhaka',
            41 => '(GMT+06:30) Rangoon',
            59 => '(GMT+07:00) Bangkok, Hanoi, Jakarta',
            50 => '(GMT+07:00) Krasnoyarsk',
            17 => '(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi',
            46 => '(GMT+08:00) Irkutsk, Ulaan Bataar',
            60 => '(GMT+08:00) Kuala Lumpur, Singapore',
            70 => '(GMT+08:00) Perth',
            63 => '(GMT+08:00) Taipei',
            65 => '(GMT+09:00) Osaka, Sapporo, Tokyo',
            77 => '(GMT+09:00) Seoul',
            75 => '(GMT+09:00) Yakutsk',
            10 => '(GMT+09:30) Adelaide',
            4 => '(GMT+09:30) Darwin',
            20 => '(GMT+10:00) Brisbane',
            5 => '(GMT+10:00) Canberra, Melbourne, Sydney',
            74 => '(GMT+10:00) Guam, Port Moresby',
            64 => '(GMT+10:00) Hobart',
            69 => '(GMT+10:00) Vladivostok',
            15 => '(GMT+11:00) Magadan, Solomon Is., New Caledonia',
            44 => '(GMT+12:00) Auckland, Wellington',
            26 => '(GMT+12:00) Fiji, Kamchatka, Marshall Is.',
            6 => '(GMT-01:00) Azores',
            8 => '(GMT-01:00) Cape Verde Is.',
            39 => '(GMT-02:00) Mid-Atlantic',
            22 => '(GMT-03:00) Brasilia',
            94 => '(GMT-03:00) Buenos Aires',
            55 => '(GMT-03:00) Buenos Aires, Georgetown',
            29 => '(GMT-03:00) Greenland',
            95 => '(GMT-03:00) Montevideo',
            45 => '(GMT-03:30) Newfoundland',
            3 => '(GMT-04:00) Atlantic Time (Canada)',
            57 => '(GMT-04:00) Georgetown, La Paz, San Juan',
            96 => '(GMT-04:00) Manaus',
            51 => '(GMT-04:00) Santiago',
            76 => '(GMT-04:30) Caracas',
            56 => '(GMT-05:00) Bogota, Lima, Quito',
            23 => '(GMT-05:00) Eastern Time (US & Canada)',
            67 => '(GMT-05:00) Indiana (East)',
            11 => '(GMT-06:00) Central America',
            16 => '(GMT-06:00) Central Time (US & Canada)',
            37 => '(GMT-06:00) Guadalajara, Mexico City, Monterrey',
            7 => '(GMT-06:00) Saskatchewan',
            68 => '(GMT-07:00) Arizona',
            38 => '(GMT-07:00) Chihuahua, La Paz, Mazatlan',
            40 => '(GMT-07:00) Mountain Time (US & Canada)',
            52 => '(GMT-08:00) Pacific Time (US & Canada)',
            104 => '(GMT-08:00) Tijuana, Baja California',
            48 => '(GMT-09:00) Alaska',
            32 => '(GMT-10:00) Hawaii',
            58 => '(GMT-11:00) Midway Island, Samoa',
            18 => '(GMT-12:00) International Date Line West',
            105 => '(GMT-4:00) Eastern Daylight Time (US & Canada)',
            13 => '(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague',
          ),
        ),
        7 => 
        array (
          'type' => 'select',
          'data' => 'string',
          'name' => 'braincert_datacenter_region',
          'label' => 'Datacenter Region',
          'description' => 'Application Default Datacenter Region',
          'rules' => '',
          'class' => '',
          'value' => '',
          'options' => 
          array (
            0 => 'Intelligent routing to nearest location (Experimental)',
            1 => 'US East (Dallas, TX)',
            2 => 'US West (Los Angeles, CA)',
            3 => 'US East (New York)',
            4 => 'Europe (Frankfurt, Germany)',
            5 => 'Europe (London)',
            6 => 'Asia Pacific (Bangalore, India)',
            7 => 'Asia Pacific (Singapore)',
            8 => 'US East (Miami, FL)',
            9 => 'Europe (Milan, Italy)',
            10 => 'Asia Pacific (Tokyo, Japan)',
            11 => 'Middle East (Dubai, UAE)',
            12 => 'Australia (Sydney)',
            13 => 'Europe (Paris, France)',
            14 => 'Asia Pacific (Beijing, China)',
          ),
        ),
      ),
    ),
  ),
  'session' => 
  array (
    'driver' => 'file',
    'lifetime' => 120,
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => '/skymoontiger/lms/storage/framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'laravel_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => false,
    'http_only' => true,
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'cloud' => 's3',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => '/skymoontiger/lms/storage/app',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => '/skymoontiger/lms/storage/app/public',
        'url' => 'http://localhost/storage',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => NULL,
        'secret' => NULL,
        'region' => NULL,
        'bucket' => NULL,
        'url' => NULL,
      ),
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'admin' => 
      array (
        'driver' => 'session',
        'provider' => 'admins',
      ),
      'api' => 
      array (
        'driver' => 'token',
        'provider' => 'users',
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\User',
      ),
      'admins' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Admin',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'admins',
        'table' => 'adminpassword_resets',
        'expire' => 60,
      ),
    ),
  ),
  'datatables' => 
  array (
    'search' => 
    array (
      'smart' => true,
      'multi_term' => false,
      'case_insensitive' => true,
      'use_wildcards' => true,
    ),
    'index_column' => 'DT_Row_Index',
    'engines' => 
    array (
      'eloquent' => 'Yajra\\DataTables\\EloquentDataTable',
      'query' => 'Yajra\\DataTables\\QueryDataTable',
      'collection' => 'Yajra\\DataTables\\CollectionDataTable',
    ),
    'builders' => 
    array (
      'Illuminate\\Database\\Eloquent\\Relations\\Relation' => 'eloquent',
      'Illuminate\\Database\\Eloquent\\Builder' => 'eloquent',
      'Illuminate\\Database\\Query\\Builder' => 'query',
      'Illuminate\\Support\\Collection' => 'collection',
    ),
    'nulls_last_sql' => '%s %s NULLS LAST',
    'error' => NULL,
    'columns' => 
    array (
      'excess' => 
      array (
        0 => 'rn',
        1 => 'row_num',
      ),
      'escape' => '*',
      'raw' => 
      array (
        0 => 'action',
      ),
      'blacklist' => 
      array (
        0 => 'password',
        1 => 'remember_token',
      ),
      'whitelist' => '*',
    ),
    'json' => 
    array (
      'header' => 
      array (
      ),
      'options' => 0,
    ),
  ),
  'general_setting' => 
  array (
    'general' => 
    array (
      'title' => 'General Information',
      'elements' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'data' => 'string',
          'name' => 'site_title',
          'label' => 'Site Title',
          'description' => 'Website Application Name',
          'rules' => 'required|min:2|max:50',
          'class' => 'form-control',
          'value' => '',
        ),
      ),
    ),
    'site_email' => 
    array (
      'title' => 'Site Email',
      'elements' => 
      array (
        0 => 
        array (
          'type' => 'email',
          'data' => 'string',
          'name' => 'site_email_address',
          'label' => 'Email Address',
          'description' => 'Website Email',
          'rules' => 'required|min:2|max:50|email',
          'class' => 'form-control',
          'value' => '',
        ),
      ),
    ),
    'contacts' => 
    array (
      'title' => 'Contact Information',
      'elements' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'data' => 'string',
          'name' => 'phone',
          'label' => 'Phone Number',
          'description' => 'Company phone number',
          'rules' => 'required|min:2|max:50',
          'class' => 'form-control',
          'value' => '',
        ),
        1 => 
        array (
          'type' => 'text',
          'data' => 'string',
          'name' => 'phone_two',
          'label' => 'Phone Number 2',
          'description' => 'Company phone number 2',
          'rules' => 'required|min:2|max:50',
          'class' => 'form-control',
          'value' => '',
        ),
        2 => 
        array (
          'type' => 'text',
          'data' => 'string',
          'name' => 'address',
          'label' => 'Company Address',
          'description' => 'Company Address',
          'rules' => 'max:50',
          'class' => 'form-control',
          'value' => '',
        ),
      ),
    ),
    'class' => 
    array (
      'title' => 'Class',
      'elements' => 
      array (
        0 => 
        array (
          'type' => 'number',
          'data' => 'int',
          'name' => 'postponed_limit_time',
          'label' => 'Postponed Allowed Minutes',
          'description' => 'Allowed Minute Before Postponed Class',
          'rules' => '',
          'class' => 'form-control',
          'value' => '0',
          'min' => '0',
          'max' => '',
        ),
      ),
    ),
    'coloring' => 
    array (
      'title' => 'Calendar Colors',
      'elements' => 
      array (
        0 => 
        array (
          'type' => 'color',
          'data' => 'string',
          'name' => 'waiting_color',
          'label' => 'Waiting Color',
          'description' => 'Waiting Class Color In Calendar',
          'rules' => '',
          'class' => 'form-control',
          'value' => '',
        ),
        1 => 
        array (
          'type' => 'color',
          'data' => 'string',
          'name' => 'present_color',
          'label' => 'Present Color',
          'description' => 'Present Class Color In Calendar',
          'rules' => '',
          'class' => 'form-control',
          'value' => '',
        ),
        2 => 
        array (
          'type' => 'color',
          'data' => 'string',
          'name' => 'postponed_color',
          'label' => 'Postponed Color',
          'description' => 'Postponed Class Color In Calendar',
          'rules' => '',
          'class' => 'form-control',
          'value' => '',
        ),
        3 => 
        array (
          'type' => 'color',
          'data' => 'string',
          'name' => 'absend_color',
          'label' => 'Absent Color',
          'description' => 'Absent Class Color In Calendar',
          'rules' => '',
          'class' => 'form-control',
          'value' => '',
        ),
        4 => 
        array (
          'type' => 'color',
          'data' => 'string',
          'name' => 'holiday_color',
          'label' => 'Holiday Color',
          'description' => 'Holiday Class Color In Calendar',
          'rules' => '',
          'class' => 'form-control',
          'value' => '',
        ),
      ),
    ),
  ),
  'theme' => 
  array (
    'name' => 'bernas',
  ),
  'mail' => 
  array (
    'driver' => 'smtp',
    'host' => 'smtp.mailtrap.io',
    'port' => '2525',
    'from' => 
    array (
      'address' => 'hello@example.com',
      'name' => 'Example',
    ),
    'encryption' => NULL,
    'username' => NULL,
    'password' => NULL,
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => '/skymoontiger/lms/resources/views/vendor/mail',
      ),
    ),
  ),
  'system_setting' => 
  array (
    'Time and Date Formats' => 
    array (
      'title' => 'Time and Date Formats',
      'elements' => 
      array (
        0 => 
        array (
          'type' => 'select',
          'data' => 'string',
          'name' => 'date_time_format',
          'label' => 'DateTime Format',
          'description' => 'Overall Date time Format',
          'rules' => 'required|min:2|max:50',
          'class' => '',
          'value' => '',
          'options' => 
          array (
            'Y-m-d h:iA' => '1994-01-31 03:25PM',
            'Y/m/d h:iA' => '1994/01/31 03:25PM',
            'm-d-Y h:iA' => '01-31-1994 03:25PM',
            'm/d/Y h:iA' => '01/31/1994 03:25PM',
          ),
        ),
        1 => 
        array (
          'type' => 'select',
          'data' => 'string',
          'name' => 'date_format',
          'label' => 'Date Format',
          'description' => 'Overall Date Format',
          'rules' => 'required|min:2|max:50',
          'class' => 'form-control',
          'value' => '',
          'options' => 
          array (
            'Y-m-d' => '1994-01-31',
            'Y/m/d' => '1994/01/31',
            'd-m-Y' => '01-31-1994',
            'm/d/Y' => '01/31/1994',
            'M d, Y' => 'Jan 31, 1994',
            'F d, Y' => 'January 31, 1994',
          ),
        ),
        2 => 
        array (
          'type' => 'select',
          'data' => 'string',
          'name' => 'time_format',
          'label' => 'Time Format',
          'description' => 'Overall Date Format',
          'rules' => 'required|min:2|max:50',
          'class' => 'form-control',
          'value' => '',
          'options' => 
          array (
            'H:iA' => '23:05AM',
            'h:iA' => '12:05AM',
            'h:ia' => '12:05am',
            'H:ia' => '23:05am',
            'H:i:sa' => '23:05:01am',
            'h:i:sa' => '02:05:01am',
            'h:i:sA' => '02:05:01AM',
          ),
        ),
      ),
    ),
    'timezones' => 
    array (
      'title' => 'Timezones',
      'elements' => 
      array (
        0 => 
        array (
          'type' => 'select',
          'data' => 'string',
          'name' => 'admin_timezone',
          'label' => 'Admin Timezone',
          'description' => 'Administrator Timezone',
          'rules' => 'required|min:2|max:50',
          'class' => '',
          'value' => '',
          'options' => 
          array (
            'Pacific/Midway' => '(GMT-11:00) Midway Island',
            'US/Samoa' => '(GMT-11:00) Samoa',
            'US/Hawaii' => '(GMT-10:00) Hawaii',
            'US/Alaska' => '(GMT-09:00) Alaska',
            'US/Pacific' => '(GMT-08:00) Pacific Time (US &amp; Canada)',
            'America/Tijuana' => '(GMT-08:00) Tijuana',
            'US/Arizona' => '(GMT-07:00) Arizona',
            'US/Mountain' => '(GMT-07:00) Mountain Time (US &amp; Canada)',
            'America/Chihuahua' => '(GMT-07:00) Chihuahua',
            'America/Mazatlan' => '(GMT-07:00) Mazatlan',
            'America/Mexico_City' => '(GMT-06:00) Mexico City',
            'America/Monterrey' => '(GMT-06:00) Monterrey',
            'Canada/Saskatchewan' => '(GMT-06:00) Saskatchewan',
            'US/Central' => '(GMT-06:00) Central Time (US &amp; Canada)',
            'US/Eastern' => '(GMT-05:00) Eastern Time (US &amp; Canada)',
            'US/East-Indiana' => '(GMT-05:00) Indiana (East)',
            'America/Bogota' => '(GMT-05:00) Bogota',
            'America/Lima' => '(GMT-05:00) Lima',
            'America/Caracas' => '(GMT-04:30) Caracas',
            'Canada/Atlantic' => '(GMT-04:00) Atlantic Time (Canada)',
            'America/La_Paz' => '(GMT-04:00) La Paz',
            'America/Santiago' => '(GMT-04:00) Santiago',
            'Canada/Newfoundland' => '(GMT-03:30) Newfoundland',
            'America/Buenos_Aires' => '(GMT-03:00) Buenos Aires',
            'Greenland' => '(GMT-03:00) Greenland',
            'Atlantic/Stanley' => '(GMT-02:00) Stanley',
            'Atlantic/Azores' => '(GMT-01:00) Azores',
            'Atlantic/Cape_Verde' => '(GMT-01:00) Cape Verde Is.',
            'Africa/Casablanca' => '(GMT) Casablanca',
            'Europe/Dublin' => '(GMT) Dublin',
            'Europe/Lisbon' => '(GMT) Lisbon',
            'Europe/London' => '(GMT) London',
            'Africa/Monrovia' => '(GMT) Monrovia',
            'Europe/Amsterdam' => '(GMT+01:00) Amsterdam',
            'Europe/Belgrade' => '(GMT+01:00) Belgrade',
            'Europe/Berlin' => '(GMT+01:00) Berlin',
            'Europe/Bratislava' => '(GMT+01:00) Bratislava',
            'Europe/Brussels' => '(GMT+01:00) Brussels',
            'Europe/Budapest' => '(GMT+01:00) Budapest',
            'Europe/Copenhagen' => '(GMT+01:00) Copenhagen',
            'Europe/Ljubljana' => '(GMT+01:00) Ljubljana',
            'Europe/Madrid' => '(GMT+01:00) Madrid',
            'Europe/Paris' => '(GMT+01:00) Paris',
            'Europe/Prague' => '(GMT+01:00) Prague',
            'Europe/Rome' => '(GMT+01:00) Rome',
            'Europe/Sarajevo' => '(GMT+01:00) Sarajevo',
            'Europe/Skopje' => '(GMT+01:00) Skopje',
            'Europe/Stockholm' => '(GMT+01:00) Stockholm',
            'Europe/Vienna' => '(GMT+01:00) Vienna',
            'Europe/Warsaw' => '(GMT+01:00) Warsaw',
            'Europe/Zagreb' => '(GMT+01:00) Zagreb',
            'Europe/Athens' => '(GMT+02:00) Athens',
            'Europe/Bucharest' => '(GMT+02:00) Bucharest',
            'Africa/Cairo' => '(GMT+02:00) Cairo',
            'Africa/Harare' => '(GMT+02:00) Harare',
            'Europe/Helsinki' => '(GMT+02:00) Helsinki',
            'Europe/Istanbul' => '(GMT+02:00) Istanbul',
            'Asia/Jerusalem' => '(GMT+02:00) Jerusalem',
            'Europe/Kiev' => '(GMT+02:00) Kyiv',
            'Europe/Minsk' => '(GMT+02:00) Minsk',
            'Europe/Riga' => '(GMT+02:00) Riga',
            'Europe/Sofia' => '(GMT+02:00) Sofia',
            'Europe/Tallinn' => '(GMT+02:00) Tallinn',
            'Europe/Vilnius' => '(GMT+02:00) Vilnius',
            'Asia/Baghdad' => '(GMT+03:00) Baghdad',
            'Asia/Kuwait' => '(GMT+03:00) Kuwait',
            'Africa/Nairobi' => '(GMT+03:00) Nairobi',
            'Asia/Riyadh' => '(GMT+03:00) Riyadh',
            'Europe/Moscow' => '(GMT+03:00) Moscow',
            'Asia/Tehran' => '(GMT+03:30) Tehran',
            'Asia/Baku' => '(GMT+04:00) Baku',
            'Europe/Volgograd' => '(GMT+04:00) Volgograd',
            'Asia/Muscat' => '(GMT+04:00) Muscat',
            'Asia/Tbilisi' => '(GMT+04:00) Tbilisi',
            'Asia/Yerevan' => '(GMT+04:00) Yerevan',
            'Asia/Kabul' => '(GMT+04:30) Kabul',
            'Asia/Karachi' => '(GMT+05:00) Karachi',
            'Asia/Tashkent' => '(GMT+05:00) Tashkent',
            'Asia/Kolkata' => '(GMT+05:30) Kolkata',
            'Asia/Kathmandu' => '(GMT+05:45) Kathmandu',
            'Asia/Yekaterinburg' => '(GMT+06:00) Ekaterinburg',
            'Asia/Almaty' => '(GMT+06:00) Almaty',
            'Asia/Dhaka' => '(GMT+06:00) Dhaka',
            'Asia/Novosibirsk' => '(GMT+07:00) Novosibirsk',
            'Asia/Bangkok' => '(GMT+07:00) Bangkok',
            'Asia/Jakarta' => '(GMT+07:00) Jakarta',
            'Asia/Krasnoyarsk' => '(GMT+08:00) Krasnoyarsk',
            'Asia/Chongqing' => '(GMT+08:00) Chongqing',
            'Asia/Hong_Kong' => '(GMT+08:00) Hong Kong',
            'Asia/Kuala_Lumpur' => '(GMT+08:00) Kuala Lumpur',
            'Australia/Perth' => '(GMT+08:00) Perth',
            'Asia/Singapore' => '(GMT+08:00) Singapore',
            'Asia/Taipei' => '(GMT+08:00) Taipei',
            'Asia/Ulaanbaatar' => '(GMT+08:00) Ulaan Bataar',
            'Asia/Urumqi' => '(GMT+08:00) Urumqi',
            'Asia/Irkutsk' => '(GMT+09:00) Irkutsk',
            'Asia/Seoul' => '(GMT+09:00) Seoul',
            'Asia/Tokyo' => '(GMT+09:00) Tokyo',
            'Australia/Adelaide' => '(GMT+09:30) Adelaide',
            'Australia/Darwin' => '(GMT+09:30) Darwin',
            'Asia/Yakutsk' => '(GMT+10:00) Yakutsk',
            'Australia/Brisbane' => '(GMT+10:00) Brisbane',
            'Australia/Canberra' => '(GMT+10:00) Canberra',
            'Pacific/Guam' => '(GMT+10:00) Guam',
            'Australia/Hobart' => '(GMT+10:00) Hobart',
            'Australia/Melbourne' => '(GMT+10:00) Melbourne',
            'Pacific/Port_Moresby' => '(GMT+10:00) Port Moresby',
            'Australia/Sydney' => '(GMT+10:00) Sydney',
            'Asia/Vladivostok' => '(GMT+11:00) Vladivostok',
            'Asia/Magadan' => '(GMT+12:00) Magadan',
            'Pacific/Auckland' => '(GMT+12:00) Auckland',
            'Pacific/Fiji' => '(GMT+12:00) Fiji',
          ),
        ),
        1 => 
        array (
          'type' => 'select',
          'data' => 'string',
          'name' => 'teacher_timezone',
          'label' => 'Teacher Timezone',
          'description' => 'Teacher Timezone',
          'rules' => 'required|min:2|max:50',
          'class' => '',
          'value' => '',
          'options' => 
          array (
            'Pacific/Midway' => '(GMT-11:00) Midway Island',
            'US/Samoa' => '(GMT-11:00) Samoa',
            'US/Hawaii' => '(GMT-10:00) Hawaii',
            'US/Alaska' => '(GMT-09:00) Alaska',
            'US/Pacific' => '(GMT-08:00) Pacific Time (US &amp; Canada)',
            'America/Tijuana' => '(GMT-08:00) Tijuana',
            'US/Arizona' => '(GMT-07:00) Arizona',
            'US/Mountain' => '(GMT-07:00) Mountain Time (US &amp; Canada)',
            'America/Chihuahua' => '(GMT-07:00) Chihuahua',
            'America/Mazatlan' => '(GMT-07:00) Mazatlan',
            'America/Mexico_City' => '(GMT-06:00) Mexico City',
            'America/Monterrey' => '(GMT-06:00) Monterrey',
            'Canada/Saskatchewan' => '(GMT-06:00) Saskatchewan',
            'US/Central' => '(GMT-06:00) Central Time (US &amp; Canada)',
            'US/Eastern' => '(GMT-05:00) Eastern Time (US &amp; Canada)',
            'US/East-Indiana' => '(GMT-05:00) Indiana (East)',
            'America/Bogota' => '(GMT-05:00) Bogota',
            'America/Lima' => '(GMT-05:00) Lima',
            'America/Caracas' => '(GMT-04:30) Caracas',
            'Canada/Atlantic' => '(GMT-04:00) Atlantic Time (Canada)',
            'America/La_Paz' => '(GMT-04:00) La Paz',
            'America/Santiago' => '(GMT-04:00) Santiago',
            'Canada/Newfoundland' => '(GMT-03:30) Newfoundland',
            'America/Buenos_Aires' => '(GMT-03:00) Buenos Aires',
            'Greenland' => '(GMT-03:00) Greenland',
            'Atlantic/Stanley' => '(GMT-02:00) Stanley',
            'Atlantic/Azores' => '(GMT-01:00) Azores',
            'Atlantic/Cape_Verde' => '(GMT-01:00) Cape Verde Is.',
            'Africa/Casablanca' => '(GMT) Casablanca',
            'Europe/Dublin' => '(GMT) Dublin',
            'Europe/Lisbon' => '(GMT) Lisbon',
            'Europe/London' => '(GMT) London',
            'Africa/Monrovia' => '(GMT) Monrovia',
            'Europe/Amsterdam' => '(GMT+01:00) Amsterdam',
            'Europe/Belgrade' => '(GMT+01:00) Belgrade',
            'Europe/Berlin' => '(GMT+01:00) Berlin',
            'Europe/Bratislava' => '(GMT+01:00) Bratislava',
            'Europe/Brussels' => '(GMT+01:00) Brussels',
            'Europe/Budapest' => '(GMT+01:00) Budapest',
            'Europe/Copenhagen' => '(GMT+01:00) Copenhagen',
            'Europe/Ljubljana' => '(GMT+01:00) Ljubljana',
            'Europe/Madrid' => '(GMT+01:00) Madrid',
            'Europe/Paris' => '(GMT+01:00) Paris',
            'Europe/Prague' => '(GMT+01:00) Prague',
            'Europe/Rome' => '(GMT+01:00) Rome',
            'Europe/Sarajevo' => '(GMT+01:00) Sarajevo',
            'Europe/Skopje' => '(GMT+01:00) Skopje',
            'Europe/Stockholm' => '(GMT+01:00) Stockholm',
            'Europe/Vienna' => '(GMT+01:00) Vienna',
            'Europe/Warsaw' => '(GMT+01:00) Warsaw',
            'Europe/Zagreb' => '(GMT+01:00) Zagreb',
            'Europe/Athens' => '(GMT+02:00) Athens',
            'Europe/Bucharest' => '(GMT+02:00) Bucharest',
            'Africa/Cairo' => '(GMT+02:00) Cairo',
            'Africa/Harare' => '(GMT+02:00) Harare',
            'Europe/Helsinki' => '(GMT+02:00) Helsinki',
            'Europe/Istanbul' => '(GMT+02:00) Istanbul',
            'Asia/Jerusalem' => '(GMT+02:00) Jerusalem',
            'Europe/Kiev' => '(GMT+02:00) Kyiv',
            'Europe/Minsk' => '(GMT+02:00) Minsk',
            'Europe/Riga' => '(GMT+02:00) Riga',
            'Europe/Sofia' => '(GMT+02:00) Sofia',
            'Europe/Tallinn' => '(GMT+02:00) Tallinn',
            'Europe/Vilnius' => '(GMT+02:00) Vilnius',
            'Asia/Baghdad' => '(GMT+03:00) Baghdad',
            'Asia/Kuwait' => '(GMT+03:00) Kuwait',
            'Africa/Nairobi' => '(GMT+03:00) Nairobi',
            'Asia/Riyadh' => '(GMT+03:00) Riyadh',
            'Europe/Moscow' => '(GMT+03:00) Moscow',
            'Asia/Tehran' => '(GMT+03:30) Tehran',
            'Asia/Baku' => '(GMT+04:00) Baku',
            'Europe/Volgograd' => '(GMT+04:00) Volgograd',
            'Asia/Muscat' => '(GMT+04:00) Muscat',
            'Asia/Tbilisi' => '(GMT+04:00) Tbilisi',
            'Asia/Yerevan' => '(GMT+04:00) Yerevan',
            'Asia/Kabul' => '(GMT+04:30) Kabul',
            'Asia/Karachi' => '(GMT+05:00) Karachi',
            'Asia/Tashkent' => '(GMT+05:00) Tashkent',
            'Asia/Kolkata' => '(GMT+05:30) Kolkata',
            'Asia/Kathmandu' => '(GMT+05:45) Kathmandu',
            'Asia/Yekaterinburg' => '(GMT+06:00) Ekaterinburg',
            'Asia/Almaty' => '(GMT+06:00) Almaty',
            'Asia/Dhaka' => '(GMT+06:00) Dhaka',
            'Asia/Novosibirsk' => '(GMT+07:00) Novosibirsk',
            'Asia/Bangkok' => '(GMT+07:00) Bangkok',
            'Asia/Jakarta' => '(GMT+07:00) Jakarta',
            'Asia/Krasnoyarsk' => '(GMT+08:00) Krasnoyarsk',
            'Asia/Chongqing' => '(GMT+08:00) Chongqing',
            'Asia/Hong_Kong' => '(GMT+08:00) Hong Kong',
            'Asia/Kuala_Lumpur' => '(GMT+08:00) Kuala Lumpur',
            'Australia/Perth' => '(GMT+08:00) Perth',
            'Asia/Singapore' => '(GMT+08:00) Singapore',
            'Asia/Taipei' => '(GMT+08:00) Taipei',
            'Asia/Ulaanbaatar' => '(GMT+08:00) Ulaan Bataar',
            'Asia/Urumqi' => '(GMT+08:00) Urumqi',
            'Asia/Irkutsk' => '(GMT+09:00) Irkutsk',
            'Asia/Seoul' => '(GMT+09:00) Seoul',
            'Asia/Tokyo' => '(GMT+09:00) Tokyo',
            'Australia/Adelaide' => '(GMT+09:30) Adelaide',
            'Australia/Darwin' => '(GMT+09:30) Darwin',
            'Asia/Yakutsk' => '(GMT+10:00) Yakutsk',
            'Australia/Brisbane' => '(GMT+10:00) Brisbane',
            'Australia/Canberra' => '(GMT+10:00) Canberra',
            'Pacific/Guam' => '(GMT+10:00) Guam',
            'Australia/Hobart' => '(GMT+10:00) Hobart',
            'Australia/Melbourne' => '(GMT+10:00) Melbourne',
            'Pacific/Port_Moresby' => '(GMT+10:00) Port Moresby',
            'Australia/Sydney' => '(GMT+10:00) Sydney',
            'Asia/Vladivostok' => '(GMT+11:00) Vladivostok',
            'Asia/Magadan' => '(GMT+12:00) Magadan',
            'Pacific/Auckland' => '(GMT+12:00) Auckland',
            'Pacific/Fiji' => '(GMT+12:00) Fiji',
          ),
        ),
        2 => 
        array (
          'type' => 'select',
          'data' => 'string',
          'name' => 'student_timezone',
          'label' => 'Student Timezone',
          'description' => 'Student Timezone',
          'rules' => 'required|min:2|max:50',
          'class' => '',
          'value' => '',
          'options' => 
          array (
            'Pacific/Midway' => '(GMT-11:00) Midway Island',
            'US/Samoa' => '(GMT-11:00) Samoa',
            'US/Hawaii' => '(GMT-10:00) Hawaii',
            'US/Alaska' => '(GMT-09:00) Alaska',
            'US/Pacific' => '(GMT-08:00) Pacific Time (US &amp; Canada)',
            'America/Tijuana' => '(GMT-08:00) Tijuana',
            'US/Arizona' => '(GMT-07:00) Arizona',
            'US/Mountain' => '(GMT-07:00) Mountain Time (US &amp; Canada)',
            'America/Chihuahua' => '(GMT-07:00) Chihuahua',
            'America/Mazatlan' => '(GMT-07:00) Mazatlan',
            'America/Mexico_City' => '(GMT-06:00) Mexico City',
            'America/Monterrey' => '(GMT-06:00) Monterrey',
            'Canada/Saskatchewan' => '(GMT-06:00) Saskatchewan',
            'US/Central' => '(GMT-06:00) Central Time (US &amp; Canada)',
            'US/Eastern' => '(GMT-05:00) Eastern Time (US &amp; Canada)',
            'US/East-Indiana' => '(GMT-05:00) Indiana (East)',
            'America/Bogota' => '(GMT-05:00) Bogota',
            'America/Lima' => '(GMT-05:00) Lima',
            'America/Caracas' => '(GMT-04:30) Caracas',
            'Canada/Atlantic' => '(GMT-04:00) Atlantic Time (Canada)',
            'America/La_Paz' => '(GMT-04:00) La Paz',
            'America/Santiago' => '(GMT-04:00) Santiago',
            'Canada/Newfoundland' => '(GMT-03:30) Newfoundland',
            'America/Buenos_Aires' => '(GMT-03:00) Buenos Aires',
            'Greenland' => '(GMT-03:00) Greenland',
            'Atlantic/Stanley' => '(GMT-02:00) Stanley',
            'Atlantic/Azores' => '(GMT-01:00) Azores',
            'Atlantic/Cape_Verde' => '(GMT-01:00) Cape Verde Is.',
            'Africa/Casablanca' => '(GMT) Casablanca',
            'Europe/Dublin' => '(GMT) Dublin',
            'Europe/Lisbon' => '(GMT) Lisbon',
            'Europe/London' => '(GMT) London',
            'Africa/Monrovia' => '(GMT) Monrovia',
            'Europe/Amsterdam' => '(GMT+01:00) Amsterdam',
            'Europe/Belgrade' => '(GMT+01:00) Belgrade',
            'Europe/Berlin' => '(GMT+01:00) Berlin',
            'Europe/Bratislava' => '(GMT+01:00) Bratislava',
            'Europe/Brussels' => '(GMT+01:00) Brussels',
            'Europe/Budapest' => '(GMT+01:00) Budapest',
            'Europe/Copenhagen' => '(GMT+01:00) Copenhagen',
            'Europe/Ljubljana' => '(GMT+01:00) Ljubljana',
            'Europe/Madrid' => '(GMT+01:00) Madrid',
            'Europe/Paris' => '(GMT+01:00) Paris',
            'Europe/Prague' => '(GMT+01:00) Prague',
            'Europe/Rome' => '(GMT+01:00) Rome',
            'Europe/Sarajevo' => '(GMT+01:00) Sarajevo',
            'Europe/Skopje' => '(GMT+01:00) Skopje',
            'Europe/Stockholm' => '(GMT+01:00) Stockholm',
            'Europe/Vienna' => '(GMT+01:00) Vienna',
            'Europe/Warsaw' => '(GMT+01:00) Warsaw',
            'Europe/Zagreb' => '(GMT+01:00) Zagreb',
            'Europe/Athens' => '(GMT+02:00) Athens',
            'Europe/Bucharest' => '(GMT+02:00) Bucharest',
            'Africa/Cairo' => '(GMT+02:00) Cairo',
            'Africa/Harare' => '(GMT+02:00) Harare',
            'Europe/Helsinki' => '(GMT+02:00) Helsinki',
            'Europe/Istanbul' => '(GMT+02:00) Istanbul',
            'Asia/Jerusalem' => '(GMT+02:00) Jerusalem',
            'Europe/Kiev' => '(GMT+02:00) Kyiv',
            'Europe/Minsk' => '(GMT+02:00) Minsk',
            'Europe/Riga' => '(GMT+02:00) Riga',
            'Europe/Sofia' => '(GMT+02:00) Sofia',
            'Europe/Tallinn' => '(GMT+02:00) Tallinn',
            'Europe/Vilnius' => '(GMT+02:00) Vilnius',
            'Asia/Baghdad' => '(GMT+03:00) Baghdad',
            'Asia/Kuwait' => '(GMT+03:00) Kuwait',
            'Africa/Nairobi' => '(GMT+03:00) Nairobi',
            'Asia/Riyadh' => '(GMT+03:00) Riyadh',
            'Europe/Moscow' => '(GMT+03:00) Moscow',
            'Asia/Tehran' => '(GMT+03:30) Tehran',
            'Asia/Baku' => '(GMT+04:00) Baku',
            'Europe/Volgograd' => '(GMT+04:00) Volgograd',
            'Asia/Muscat' => '(GMT+04:00) Muscat',
            'Asia/Tbilisi' => '(GMT+04:00) Tbilisi',
            'Asia/Yerevan' => '(GMT+04:00) Yerevan',
            'Asia/Kabul' => '(GMT+04:30) Kabul',
            'Asia/Karachi' => '(GMT+05:00) Karachi',
            'Asia/Tashkent' => '(GMT+05:00) Tashkent',
            'Asia/Kolkata' => '(GMT+05:30) Kolkata',
            'Asia/Kathmandu' => '(GMT+05:45) Kathmandu',
            'Asia/Yekaterinburg' => '(GMT+06:00) Ekaterinburg',
            'Asia/Almaty' => '(GMT+06:00) Almaty',
            'Asia/Dhaka' => '(GMT+06:00) Dhaka',
            'Asia/Novosibirsk' => '(GMT+07:00) Novosibirsk',
            'Asia/Bangkok' => '(GMT+07:00) Bangkok',
            'Asia/Jakarta' => '(GMT+07:00) Jakarta',
            'Asia/Krasnoyarsk' => '(GMT+08:00) Krasnoyarsk',
            'Asia/Chongqing' => '(GMT+08:00) Chongqing',
            'Asia/Hong_Kong' => '(GMT+08:00) Hong Kong',
            'Asia/Kuala_Lumpur' => '(GMT+08:00) Kuala Lumpur',
            'Australia/Perth' => '(GMT+08:00) Perth',
            'Asia/Singapore' => '(GMT+08:00) Singapore',
            'Asia/Taipei' => '(GMT+08:00) Taipei',
            'Asia/Ulaanbaatar' => '(GMT+08:00) Ulaan Bataar',
            'Asia/Urumqi' => '(GMT+08:00) Urumqi',
            'Asia/Irkutsk' => '(GMT+09:00) Irkutsk',
            'Asia/Seoul' => '(GMT+09:00) Seoul',
            'Asia/Tokyo' => '(GMT+09:00) Tokyo',
            'Australia/Adelaide' => '(GMT+09:30) Adelaide',
            'Australia/Darwin' => '(GMT+09:30) Darwin',
            'Asia/Yakutsk' => '(GMT+10:00) Yakutsk',
            'Australia/Brisbane' => '(GMT+10:00) Brisbane',
            'Australia/Canberra' => '(GMT+10:00) Canberra',
            'Pacific/Guam' => '(GMT+10:00) Guam',
            'Australia/Hobart' => '(GMT+10:00) Hobart',
            'Australia/Melbourne' => '(GMT+10:00) Melbourne',
            'Pacific/Port_Moresby' => '(GMT+10:00) Port Moresby',
            'Australia/Sydney' => '(GMT+10:00) Sydney',
            'Asia/Vladivostok' => '(GMT+11:00) Vladivostok',
            'Asia/Magadan' => '(GMT+12:00) Magadan',
            'Pacific/Auckland' => '(GMT+12:00) Auckland',
            'Pacific/Fiji' => '(GMT+12:00) Fiji',
          ),
        ),
      ),
    ),
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => 'your-public-key',
        'secret' => 'your-secret-key',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'your-queue-name',
        'region' => 'us-east-1',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
      ),
    ),
    'failed' => 
    array (
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'broadcasting' => 
  array (
    'default' => 'pusher',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '3f96153fbeb4975d15d5',
        'secret' => '105a42080d57f5dea8fb',
        'app_id' => '555352',
        'options' => 
        array (
          'cluster' => 'ap1',
          'encrypted' => false,
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => '/skymoontiger/lms/resources/views',
    ),
    'compiled' => '/skymoontiger/lms/storage/framework/views',
  ),
  'lfm' => 
  array (
    'use_package_routes' => true,
    'middlewares' => 
    array (
      0 => 'web',
    ),
    'url_prefix' => 'media',
    'allow_multi_user' => false,
    'allow_share_folder' => false,
    'user_field' => 'Unisharp\\Laravelfilemanager\\Handlers\\ConfigHandler',
    'base_directory' => '/../www',
    'images_folder_name' => 'photos',
    'files_folder_name' => 'files',
    'shared_folder_name' => 'shares',
    'thumb_folder_name' => 'thumbs',
    'images_startup_view' => 'grid',
    'files_startup_view' => 'list',
    'rename_file' => false,
    'alphanumeric_filename' => false,
    'alphanumeric_directory' => false,
    'should_validate_size' => false,
    'max_image_size' => 50000,
    'max_file_size' => 50000,
    'should_validate_mime' => false,
    'valid_image_mimetypes' => 
    array (
      0 => 'image/jpeg',
      1 => 'image/pjpeg',
      2 => 'image/png',
      3 => 'image/gif',
      4 => 'image/svg+xml',
    ),
    'should_create_thumbnails' => true,
    'raster_mimetypes' => 
    array (
      0 => 'image/jpeg',
      1 => 'image/pjpeg',
      2 => 'image/png',
    ),
    'create_folder_mode' => 493,
    'create_file_mode' => 420,
    'valid_file_mimetypes' => 
    array (
      0 => 'image/jpeg',
      1 => 'image/pjpeg',
      2 => 'image/png',
      3 => 'image/gif',
      4 => 'image/svg+xml',
      5 => 'application/pdf',
      6 => 'text/plain',
    ),
    'thumb_img_width' => 200,
    'thumb_img_height' => 200,
    'file_type_array' => 
    array (
      'pdf' => 'Adobe Acrobat',
      'doc' => 'Microsoft Word',
      'docx' => 'Microsoft Word',
      'xls' => 'Microsoft Excel',
      'xlsx' => 'Microsoft Excel',
      'zip' => 'Archive',
      'gif' => 'GIF Image',
      'jpg' => 'JPEG Image',
      'jpeg' => 'JPEG Image',
      'png' => 'PNG Image',
      'ppt' => 'Microsoft PowerPoint',
      'pptx' => 'Microsoft PowerPoint',
    ),
    'file_icon_array' => 
    array (
      'pdf' => 'fa-file-pdf-o',
      'doc' => 'fa-file-word-o',
      'docx' => 'fa-file-word-o',
      'xls' => 'fa-file-excel-o',
      'xlsx' => 'fa-file-excel-o',
      'zip' => 'fa-file-archive-o',
      'gif' => 'fa-file-image-o',
      'jpg' => 'fa-file-image-o',
      'jpeg' => 'fa-file-image-o',
      'png' => 'fa-file-image-o',
      'ppt' => 'fa-file-powerpoint-o',
      'pptx' => 'fa-file-powerpoint-o',
    ),
    'php_ini_overrides' => 
    array (
      'memory_limit' => '256M',
    ),
  ),
  'datatables-html' => 
  array (
    'table' => 
    array (
      'class' => 'table dt-responsive nowrap',
      'id' => 'dataTableBuilder',
    ),
    'callback' => 
    array (
      0 => '$',
      1 => '$.',
      2 => 'function',
    ),
  ),
  'app' => 
  array (
    'name' => 'S2 LMS',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://localhost',
    'timezone' => 'UTC',
    'locale' => 'ko',
    'fallback_locale' => 'en',
    'key' => 'base64:3wbEAM76hc8jNN8sk/Vn3Z3o0xM+dchfgWMZipX87oA=',
    'cipher' => 'AES-256-CBC',
    'log' => 'single',
    'log_level' => 'debug',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'Laravel\\Tinker\\TinkerServiceProvider',
      23 => 'UniSharp\\LaravelFilemanager\\LaravelFilemanagerServiceProvider',
      24 => 'Intervention\\Image\\ImageServiceProvider',
      25 => 'Yajra\\DataTables\\DataTablesServiceProvider',
      26 => 'Yajra\\DataTables\\HtmlServiceProvider',
      27 => 'Jenssegers\\Agent\\AgentServiceProvider',
      28 => 'App\\Providers\\AppServiceProvider',
      29 => 'App\\Providers\\AuthServiceProvider',
      30 => 'App\\Providers\\BroadcastServiceProvider',
      31 => 'App\\Providers\\EventServiceProvider',
      32 => 'App\\Providers\\RouteServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Redis' => 'Illuminate\\Support\\Facades\\Redis',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'DataTables' => 'Yajra\\DataTables\\Facades\\DataTables',
      'Image' => 'Intervention\\Image\\Facades\\Image',
      'Agent' => 'Jenssegers\\Agent\\Facades\\Agent',
    ),
  ),
  'payment_setting' => 
  array (
    'Time and Date Formats' => 
    array (
      'title' => 'Defaults',
      'elements' => 
      array (
        0 => 
        array (
          'type' => 'select',
          'data' => 'string',
          'name' => 'default_payment_gateway',
          'label' => 'Default Gateway',
          'description' => 'Application Default Payment Gateway',
          'rules' => '',
          'class' => '',
          'value' => '',
          'options' => 
          array (
            'allthegate' => 'AllTheGate',
            'nicepay' => 'NicePay',
          ),
        ),
      ),
    ),
    'nicepay' => 
    array (
      'title' => 'NicePay',
      'elements' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'data' => 'string',
          'name' => 'nicepay_merchant_key',
          'label' => 'Merchant KEY',
          'description' => 'NicePay Merchant key for validation',
          'rules' => '',
          'class' => '',
          'value' => '',
        ),
        1 => 
        array (
          'type' => 'text',
          'data' => 'string',
          'name' => 'nicepay_merchant_id',
          'label' => 'Merchant ID',
          'description' => 'NicePay Merchant key for ',
          'rules' => '',
          'class' => '',
          'value' => '',
        ),
      ),
    ),
    'AllTheGate' => 
    array (
      'title' => 'All The Gate',
      'elements' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'data' => 'string',
          'name' => 'ags_store_id',
          'label' => 'Store ID',
          'description' => '',
          'rules' => '',
          'class' => '',
          'value' => '',
        ),
      ),
    ),
    'bank' => 
    array (
      'title' => 'My Bank Information',
      'elements' => 
      array (
        0 => 
        array (
          'type' => 'text',
          'data' => 'string',
          'name' => 'bank_name',
          'label' => 'Bank Name',
          'description' => 'This will show for Bank method',
          'rules' => '',
          'class' => '',
          'value' => '',
        ),
        1 => 
        array (
          'type' => 'text',
          'data' => 'string',
          'name' => 'bank_account_number',
          'label' => 'Bank Account Number',
          'description' => 'Account Number where the enrollee pay',
          'rules' => '',
          'class' => '',
          'value' => '',
        ),
        2 => 
        array (
          'type' => 'text',
          'data' => 'string',
          'name' => 'bank_account_holder_name',
          'label' => 'Bank Account Holder Name',
          'description' => 'Bank Account Owner Name',
          'rules' => '',
          'class' => '',
          'value' => '',
        ),
      ),
    ),
  ),
  'image' => 
  array (
    'driver' => 'gd',
  ),
  'tinker' => 
  array (
    'dont_alias' => 
    array (
    ),
  ),
);
