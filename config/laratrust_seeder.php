<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'admin' => [
            'manager' => 'c,r,u,d',
            'branch'=>'c,r,u,d',
            'employee' => 'c,r,u,d',
            'student' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'manager' => [
            'branch'=>'c,r,u,d',
            'employee' => 'c,r,u,d',
            'student' => 'c,r,u,d',
            'profile' => 'r'
        ],
        'employee' => [
            'student' => 'c,r,u,d',
            'profile' => 'r',
        ],
        'student' => [
            'profile' => 'r',
        ]
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
