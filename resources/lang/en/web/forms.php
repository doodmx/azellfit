<?php

return [
    'schedule'           => [
        'title'  => 'Schedule your appointment with us',
        'action' => 'Send',
        'fields' => [
            'name'     => [
                'placeholder'  => 'Name',
                'validate_msg' => [
                    'required' => 'This field is required.'
                ]
            ],
            'lastname' => [
                'placeholder'  => 'Last name',
                'validate_msg' => [
                    'required' => 'This field is required.'
                ]
            ],
            'email'    => [
                'placeholder'  => 'Email',
                'validate_msg' => [
                    'required' => 'This field is required.',
                    'type'     => 'This value should be a valid email.'
                ]
            ],
            'whatsapp' => [
                'placeholder'  => 'WhatsApp',
                'validate_msg' => [
                    'required'  => 'This field is required.',
                    'minlength' => 'This value not is valid.'
                ]
            ]
        ]
    ],
    'contact_investment' => [
        'title'  => 'Do you want to see what would have happened with your investment in the past 6 months with us?',
        'action' => 'Conect',
        'fields' => [
            'email'    => [
                'placeholder'  => 'Email',
                'validate_msg' => [
                    'required' => 'This field is required.',
                    'type'     => 'This value should be a valid email.'
                ]
            ],
            'whatsapp' => [
                'placeholder'  => 'WhatsApp',
                'validate_msg' => [
                    'required'  => 'This field is required.',
                    'minlength' => 'This value not is valid.'
                ]
            ]
        ]
    ],
    'register'           => [
        'title'  => '<span class="d-block">Join our</span><strong>Azell Partner Program!</strong>',
        'copy'   => 'Fill with the investor\'s information.',
        'action' => 'Submit Request',
        'fields' => [
            'name'            => [
                'placeholder'  => 'Name',
                'validate_msg' => [
                    'required' => 'This field is required.'
                ]
            ],
            'lastname'        => [
                'placeholder'  => 'Last name',
                'validate_msg' => [
                    'required' => 'This field is required.'
                ]
            ],
            'email'           => [
                'placeholder'  => 'Email',
                'validate_msg' => [
                    'required' => 'This field is required.',
                    'type'     => 'This value should be a valid email.'
                ]
            ],
            'whatsapp'        => [
                'placeholder'  => 'WhatsApp',
                'validate_msg' => [
                    'required'  => 'This field is required.',
                    'minlength' => 'This value not is valid.'
                ]
            ],
            'id_card'         => [
                'placeholder'  => 'Upload your ID',
                'validate_msg' => [
                    'required' => 'This field is required.',
                ]
            ],
            'proof_residence' => [
                'placeholder'  => 'Upload your proof of address.',
                'validate_msg' => [
                    'required' => 'This field is required.',
                ]
            ],
            'terms'           => [
                'placeholder'  => 'I agree to privacy policy .',
                'validate_msg' => [
                    'required' => 'Accept terms and conditions.',
                ]
            ]
        ]
    ]
];
