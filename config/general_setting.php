<?php 

return [

    'general' => [
        'title' => 'General Information',

        'elements' => [
            [
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'site_title', // unique name for field
                'label' => 'Site Title', // you know what label it is
                'description' => 'Website Application Name', // you know what label it is
                'rules' => 'required|min:2|max:50', // validation rule of laravel
                'class' => 'form-control', // any class for input
                'value' => '' // default value if you want
            ],

        ]
    ],
    'site_email' => [
        'title' => 'Site Email',
        'elements' => [
            [
                'type' => 'email', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'site_email_address', // unique name for field
                'label' => 'Email Address', // you know what label it is
                'description' => 'Website Email', // you know what label it is
                'rules' => 'required|min:2|max:50|email', // validation rule of laravel
                'class' => 'form-control', // any class for input
                'value' => '' // default value if you want
            ],
         
        ]
    ],
    'contacts' => [
        'title' => 'Contact Information',
        'elements' => [
            [
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'phone', // unique name for field
                'label' => 'Phone Number', // you know what label it is
                'description' => 'Company phone number', // you know what label it is
                'rules' => 'required|min:2|max:50', // validation rule of laravel
                'class' => 'form-control', // any class for input
                'value' => '' // default value if you want
            ],
              [
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'phone_two', // unique name for field
                'label' => 'Phone Number 2', // you know what label it is
                'description' => 'Company phone number 2', // you know what label it is
                'rules' => 'required|min:2|max:50', // validation rule of laravel
                'class' => 'form-control', // any class for input
                'value' => '' // default value if you want
            ],
            [
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'address', // unique name for field
                'label' => 'Company Address', // you know what label it is
                'description' => 'Company Address', // you know what label it is
                'rules' => 'max:50', // validation rule of laravel
                'class' => 'form-control', // any class for input
                'value' => '' // default value if you want
            ],
        ],
    ],
    'class' => [
        'title' => 'Class',
        'elements' => [
            [
                'type' => 'number', // input fields type
                'data' => 'int', // data type, string, int, boolean
                'name' => 'postponed_limit_time', // unique name for field
                'label' => 'Postponed Allowed Minutes', // you know what label it is
                'description' => 'Allowed Minute Before Postponed Class', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => 'form-control', // any class for input
                'value' => '0', // default value if you want
                'min' => '0', // default min
                'max' => '' // default max
            ],
        ]
    ],
    'coloring' => [
        'title' => 'Calendar Colors',
        'elements' => [
            [
                'type' => 'color', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'waiting_color', // unique name for field
                'label' => 'Waiting Color', // you know what label it is
                'description' => 'Waiting Class Color In Calendar', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => 'form-control', // any class for input
                'value' => '' // default value if you want
            ],
            [
                'type' => 'color', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'present_color', // unique name for field
                'label' => 'Present Color', // you know what label it is
                'description' => 'Present Class Color In Calendar', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => 'form-control', // any class for input
                'value' => '' // default value if you want
            ],
              [
                'type' => 'color', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'postponed_color', // unique name for field
                'label' => 'Postponed Color', // you know what label it is
                'description' => 'Postponed Class Color In Calendar', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => 'form-control', // any class for input
                'value' => '' // default value if you want
            ],
            [
                'type' => 'color', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'absend_color', // unique name for field
                'label' => 'Absent Color', // you know what label it is
                'description' => 'Absent Class Color In Calendar', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => 'form-control', // any class for input
                'value' => '' // default value if you want
            ],
            [
                'type' => 'color', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'holiday_color', // unique name for field
                'label' => 'Holiday Color', // you know what label it is
                'description' => 'Holiday Class Color In Calendar', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => 'form-control', // any class for input
                'value' => '' // default value if you want
            ],
        ],
    ]
    
];