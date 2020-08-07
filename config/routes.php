<?php
    return array(
        'registration'=>'user/registration',

        'drawings/delete/([0-9]+)'=>'drawings/delete/$1',
        'drawings/edit/([0-9]+)'=>'drawings/edit/$1',
        'drawings/([0-9]+)'=>'drawings/view/$1',
        'drawings/add'=>'drawings/add',
        'drawings/search'=>'drawings/search',
        'drawings/history'=>'drawings/history',
        'drawings'=>'drawings/index',

        'invoices/delete/([0-9]+)'=>'invoices/delete/$1',
        'invoices/([0-9]+)'=>'invoices/view/$1',
        'invoices/add'=>'invoices/add',
        'invoices/search'=>'invoices/search',
        'invoices/history'=>'invoices/history',
        'invoices'=>'invoices/index',

        'exit'=>'user/exit',
        ''=>'user/login',
    );


?>