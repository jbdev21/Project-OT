<?php
return [
    'Time and Date Formats' => [
        'title' => 'Defaults',
        'elements' => [
            [
                'type' => 'select', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'default_payment_gateway', // unique name for field
                'label' => 'Default Gateway', // you know what label it is
                'description' => 'Application Default Payment Gateway', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '', // default value if you want
                'options' => [
                    "allthegate" => 'AllTheGate',
                    "nicepay" => 'NicePay',
                ]
            ]
        ]
    ],
    
    'nicepay' => [
         'title' => 'NicePay',

         'elements' => [
             [
                 'type' => 'text', // input fields type
                 'data' => 'string', // data type, string, int, boolean
                 'name' => 'nicepay_merchant_key', // unique name for field
                 'label' => 'Merchant KEY', // you know what label it is
                 'description' => 'NicePay Merchant key for validation', // you know what label it is
                 'rules' => '', // validation rule of laravel
                 'class' => '', // any class for input
                 'value' => '', // default value if you want

             ],
              [
                 'type' => 'text', // input fields type
                 'data' => 'string', // data type, string, int, boolean
                 'name' => 'nicepay_merchant_id', // unique name for field
                 'label' => 'Merchant ID', // you know what label it is
                 'description' => 'NicePay Merchant Id', // you know what label it is
                 'rules' => '', // validation rule of laravel
                 'class' => '', // any class for input
                 'value' => '', // default value if you want

             ],

         ]
     ],
     'AllTheGate' => [
        'title' => 'All The Gate',
        'elements' => [
            [
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'ags_store_id', // unique name for field
                'label' => 'Store ID', // you know what label it is
                'description' => '', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '', // default value if you want
            ],
        ]
    ],
    'bank' => [
        'title' => 'My Bank Information',
        'elements' => [
            [
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'bank_name', // unique name for field
                'label' => 'Bank Name', // you know what label it is
                'description' => 'This will show for Bank method', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '', // default value if you want
            ],
            [
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'bank_account_number', // unique name for field
                'label' => 'Bank Account Number', // you know what label it is
                'description' => 'Account Number where the enrollee pay', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '', // default value if you want
            ],
            [
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'bank_account_holder_name', // unique name for field
                'label' => 'Bank Account Holder Name', // you know what label it is
                'description' => 'Bank Account Owner Name', // you know what label it is
                'rules' => '', // validation rule of laravel
                'class' => '', // any class for input
                'value' => '', // default value if you want
            ]
        ],
    ],
    // 'Paypal' => [
    //     'title' => 'Paypal',

    //     'elements' => [
    //         [
    //             'type' => 'text', // input fields type
    //             'data' => 'string', // data type, string, int, boolean
    //             'name' => 'paypal_url', // unique name for field
    //             'label' => 'API url', // you know what label it is
    //             'description' => '', // you know what label it is
    //             'rules' => '', // validation rule of laravel
    //             'class' => '', // any class for input
    //             'value' => '', // default value if you want

    //         ],
    //          [
    //             'type' => 'text', // input fields type
    //             'data' => 'string', // data type, string, int, boolean
    //             'name' => 'paypal_api_key', // unique name for field
    //             'label' => 'API Key', // you know what label it is
    //             'description' => '', // you know what label it is
    //             'rules' => '', // validation rule of laravel
    //             'class' => '', // any class for input
    //             'value' => '', // default value if you want

    //         ],
    //          [
    //             'type' => 'text', // input fields type
    //             'data' => 'string', // data type, string, int, boolean
    //             'name' => 'paypal_api_password', // unique name for field
    //             'label' => 'API Password', // you know what label it is
    //             'description' => '', // you know what label it is
    //             'rules' => '', // validation rule of laravel
    //             'class' => '', // any class for input
    //             'value' => '', // default value if you want

    //         ],

    //     ]
    // ],


];
