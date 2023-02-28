<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

function isPrime(int $num): bool
{
    if ($num < 1) return false;

    for ($i = 2; $i < $num - 1; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}

Route::get('/', function () {

    $input = request()->count;

    $requestDateTime = \Carbon\Carbon::now();
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

    $elapsedTime = \Carbon\Carbon::now()->diffInMilliseconds();

    return response()->json([
        'input' => $input,
        'elapsedTime' => $elapsedTime,
        'primes' => $primes
    ]);
});
