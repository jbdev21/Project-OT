<?php 


return [
	'Notification' => [
        'title' => 'Notification',

        'elements' => [
            [
                'type' => 'select', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'admin_to_notify', // unique name for field
                'label' => 'Admin to Notify', // you know what label it is
                'description' => 'Admin who recieves notification', // you know what label it is
                'rules' => 'required|min:2|max:50', // validation rule of laravel
                'class' => 'form-control', // any class for input
                'value' => '', // default value if you want
            ],

        ]
    ],
    
];