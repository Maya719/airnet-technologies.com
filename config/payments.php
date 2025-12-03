<?php

return [
    "drivers" => [
        \App\Services\Drivers\Stripe::class,
        \App\Services\Drivers\Myfatoorah::class,
    ],
    "path" => "App\\Services\\Drivers"
];