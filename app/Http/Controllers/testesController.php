<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class testesController extends Controller
{
    public function teste()
    {
        $connection = DB::connection('mongodb');
        $msg = 'MongoDB is accessible!';
        try {
            $connection->command(['ping' => 1]);
        } catch (\Exception  $e) {
            $msg = 'MongoDB is not accessible. Error: ' . $e->getMessage();
        }
        return ['msg' => $msg];
    }
}
