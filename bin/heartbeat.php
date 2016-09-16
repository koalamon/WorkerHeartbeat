<?php

include_once __DIR__ . '/../vendor/autoload.php';

$config = \Symfony\Component\Yaml\Yaml::parse($argv[1]);

$general = $config['general'];

$target = $general['master'] . '/heartbeat.php/?system_name=' . urlencode($general['system_name']) . '&instances=' . $general['instances'];

$client = new \GuzzleHttp\Client();
$response = $client->get($target);

echo "\n  HeartBeat was send to " . $target. "\n\n";