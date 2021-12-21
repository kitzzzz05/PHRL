<?php

require_once 'vendor/autoload.php';

if (!session_id())
{
    session_start();
}

// Call Facebook API

$facebook = new \Facebook\Facebook([
  'app_id'      => '577700370004212',
  'app_secret'     => 'db09fd72b130fbde1d8ac99ac603fe11',
  'default_graph_version'  => 'v2.7'
]);

?>