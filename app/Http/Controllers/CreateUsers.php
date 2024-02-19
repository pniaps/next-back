<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class CreateUsers
{
    public function __invoke(?int $number = 30)
    {
        $exitCode = Artisan::call('users:create', [ '--number' => $number ]);

        return response()->json(['exitCode' => $exitCode]);
    }
}
