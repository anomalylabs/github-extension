<?php

return [
    'client_id'     => [
        'required' => true,
        'env'      => 'GITHUB_CLIENT_ID',
        'type'     => 'anomaly.field_type.encrypted',
        'bind'     => 'anomaly.extension.github::github.client_id',
    ],
    'client_secret' => [
        'required' => true,
        'env'      => 'GITHUB_CLIENT_SECRET',
        'type'     => 'anomaly.field_type.encrypted',
        'bind'     => 'anomaly.extension.github::github.client_secret',
    ],
];
