<?php

require 'vendor/autoload.php';

use \Carbon\Carbon;

function isPrime(int $num): bool
{
    if ($num <= 1) return false;

    for ($i = 2; $i < $num - 1; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}

$input = (int) $_GET['count'];

$requestDateTime = Carbon::now();
$startTimestamp = $requestDateTime->timestamp;

$elapsedTime = null;

$primes = [];
$n = 0;

while (count($primes) < $input) {
    if (isPrime($n)) {
        $primes[] = $n;
    }

    $n++;
}

$elapsedTime = $requestDateTime->diffInMilliseconds();

$responseBody = [
    'input' => $input,
    'elapsedTime' => $elapsedTime
];

header('Content-Type: application/json');
echo json_encode($responseBody);
