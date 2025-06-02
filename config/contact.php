<?php

return [
    
    'admin_email' => env('ADMIN_EMAIL', 'aries@visibleone.com'),

    'providers' => [
        Atk\Contact\ContactServiceProvider::class,
    ],
];