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
                    'id' => 'integrations',
                    'title' => 'Gewenste integraties',
                    'subtitle' => 'meerdere opties mogelijk, laat leeg als antwoord er niet tussen staat',
                    'type' => 'multiselect',
                    'rule' => '',
                    'options' => [
                        'Mollie Payments' => 'Mollie Payments',
                        'Mailgun' => 'Mailgun',
                        'Stripe' => 'Stripe',
                        'PayPal' => 'PayPal',
                        'iDeal' => 'iDeal',
                        'Amazon S3' => 'Amazon S3',
                        'Digital Ocean Spaces' => 'Digital Ocean Spaces',
                        'Algolia' => 'Algolia',
                        'Twilio' => 'Twilio',
                        'Pusher' => 'Pusher',
                        'SendGrid' => 'SendGrid',
                        'AWS (Amazon Web Services)' => 'AWS (Amazon Web Services)',
                        'Google Maps API' => 'Google Maps API',
                        'OAuth Providers (e.g., Google, Facebook)' => 'OAuth Providers (e.g., Google, Facebook)',
                        'Firebase' => 'Firebase',
                        'Mailchimp' => 'Mailchimp',
                        'Nexmo' => 'Nexmo',
                        'Trello' => 'Trello',
                        'Salesforce' => 'Salesforce',
                        'ChatGPT' => 'ChatGPT'
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
