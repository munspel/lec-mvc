<?php

return [
    'components' => [
        'obj' => [
            'class' => \lisnyak\mvc\core\TestComponent::className(),
            'message' => "Hello world",
        ],
        'db' => [
            'class' => \lisnyak\mvc\core\components\db\Connection::className(),
            'boot' => true,
            'database' => 'mvc_lec',
            'username' => 'mysql',
            'password' => 'mysql'
        ]
    ],
];
