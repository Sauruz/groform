<?php

return [
    'buttons' => [
        'submit' => 'Submit'
    ],
    'show_section_labels' => true,
    'sections' => [
        [
            'label' => 'Basic information',
            'fields' => [
                [
                    'id' => 'full_name',
                    'class' => 'w-50',
                    'title' => 'Name',
                    'placeholder' => 'Please fill in your name',
                    'type' => 'text',
                    'rule' => 'required|max:100'
                ],
                [
                    'id' => 'email',
                    'title' => 'Email',
                    'placeholder' => 'Please fill in a valid email address',
                    'type' => 'email',
                    'rule' => 'required|email|max:100',
                    'style' => 'background-color: blue;'
                ]
            ]
        ],
        [
            'label' => 'Message',
            'fields' => [
                [
                    'id' => 'subject',
                    'title' => 'Type',
                    'type' => 'select',
                    'rule' => 'required|max:100',
                    'options' => [
                        'complaint' => 'Complaint',
                        'compliment' => 'Compliment'
                    ]
                ],
                [
                    'id' => 'subject',
                    'title' => 'Subject',
                    'type' => 'text',
                    'rule' => 'required|max:100'
                ],
                [
                    'id' => 'message',
                    'title' => 'Message',
                    'type' => 'textarea',
                    'rule' => 'required|max:1000'
                ]
            ]

        ]
    ]
];
