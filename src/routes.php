<?php

return [
    // Main page
    ['GET', '/{user}/me', ['Index' => 'main']],

    // Other routes
    ['GET', '/?me=1', ['Index' => 'main']],

    ['GET', '/login', ['Auth' => 'login']]
];