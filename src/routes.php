<?php

return [
    // Main page
    ['GET', '/', ['Index' => 'main']],

    ['GET', '/signin', ['Auth' => 'signin']],
    ['POST', '/auth', ['Auth' => 'login']],
];