<?php
    $host = '127.0.0.1';
    $db   = 'MPIC';
    $user = 'admin';
    $pass = 'admin';
    $charset = 'utf8';
    $key = 'mpicproject';
    Unsplash\HttpClient::init([
        'applicationId'	=> '9XFuoEpXqAkmsha8In-94JPBM9v5nueRYmKKF5uhjTM',
        'secret'	=> '0jjyDE7jUzS-KD6cK1p6qhv9aJNqgxEp0qvAdtPOekc',
        'callbackUrl'	=> 'http://172.30.80.1/MPIC/',
        'utmSource' => 'Social Media Box'
    ]);
?>