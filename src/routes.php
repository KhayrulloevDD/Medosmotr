<?php

return [
    // Main page
    ['GET', '/', ['Index' => 'main']],
    //method option page
    ['GET', '/signin', ['Auth' => 'signin']],
    ['POST', '/auth', ['Auth' => 'login']],
    ['POST', '/user/save', ['Users' => 'save']],
    ['GET', '/adminPage', ['Users' => 'showAdminPage']],
    ['GET', '/user/{login}/delete', ['Users' => 'delete']],
];