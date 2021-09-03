<?php

return [
    'schedule'           => [
        'title'  => 'Agenda una cita personalizada.',
        'action' => 'Enviar',
        'fields' => [
            'name'     => [
                'placeholder'  => 'Nombre',
                'validate_msg' => [
                    'required' => 'El campo nombre es obligatorio.'
                ]
            ],
            'lastname' => [
                'placeholder'  => 'Apellidos',
                'validate_msg' => [
                    'required' => 'El campo apellidos es obligatorio.'
                ]
            ],
            'email'    => [
                'placeholder'  => 'Correo Electrónico',
                'validate_msg' => [
                    'required' => 'El campo correo electrónico es obligatorio.',
                    'type'     => 'Este valor debe ser un correo electrónico válido..'
                ]
            ],
            'whatsapp' => [
                'placeholder'  => 'WhatsApp',
                'validate_msg' => [
                    'required'  => 'El campo whatsapp es obligatorio.',
                    'minlength' => 'El número ingresado es incorrecto.'
                ]
            ]
        ]
    ],
    'contact_investment' => [
        'title'  => '¿Quieres ver lo que hubiera pasado con tu inversión en los últimos 6 meses con nosotros?',
        'action' => 'Conectar',
        'fields' => [
            'email'    => [
                'placeholder'  => 'Correo Electrónico',
                'validate_msg' => [
                    'required' => 'El campo correo electrónico es obligatorio.',
                    'type'     => 'Este valor debe ser un correo electrónico válido..'
                ]
            ],
            'whatsapp' => [
                'placeholder'  => 'WhatsApp',
                'validate_msg' => [
                    'required'  => 'El campo whatsapp es obligatorio.',
                    'minlength' => 'El número ingresado es incorrecto.'
                ]
            ]
        ]
    ],
    'register'           => [
        'title'  => '<span class="d-block">Forma parte de</span><strong>Azell Partner</strong>',
        'action' => 'Enviar solicitud',
        'copy'       => 'Llena la información de tu inversionista',
        'fields' => [
            'name'            => [
                'placeholder'  => 'Nombre',
                'validate_msg' => [
                    'required' => 'El campo nombre es obligatorio.'
                ]
            ],
            'lastname'        => [
                'placeholder'  => 'Apellidos',
                'validate_msg' => [
                    'required' => 'El campo apellidos es obligatorio.'
                ]
            ],
            'email'           => [
                'placeholder'  => 'Correo Electrónico',
                'validate_msg' => [
                    'required' => 'El campo correo electrónico es obligatorio.',
                    'type'     => 'Este valor debe ser un correo electrónico válido..'
                ]
            ],
            'whatsapp'        => [
                'placeholder'  => 'WhatsApp',
                'validate_msg' => [
                    'required'  => 'El campo whatsapp es obligatorio.',
                    'minlength' => 'El número ingresado es incorrecto.'
                ]
            ],
            'id_card'         => [
                'placeholder'  => 'Cargar Identificación',
                'validate_msg' => [
                    'required' => 'Este valor es requerido.',
                ]
            ],
            'proof_residence' => [
                'placeholder'  => 'Cargar Comprobante de domicilio',
                'validate_msg' => [
                    'required' => 'Este valor es requerido.',
                ]
            ],
            'terms' => [
                'placeholder'  => 'Acepto y conozco el aviso de privacidad.',
                'validate_msg' => [
                    'required' => 'Es necesario aceptar términos y condiciones.',
                ]
            ]
        ]
    ]
];
