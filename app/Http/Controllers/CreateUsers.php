<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class CreateUsers
{
    public function __invoke(?int $number = 30)
    {
        $number = min(2000, max(10, $number));
        $exitCode = Artisan::call('users:create', [ '--number' => $number ]);

        return response()->json(['exitCode' => $exitCode]);
    }
}
