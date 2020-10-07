<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Jobs\InsertToDatabase;
use App\Models\User;

class HomeController extends Controller
{
    public function insert(){
        $user = User::create(array(
            'name' => 'abc',
            'email' => Str::random(5),
            'password' => bcrypt('abcszdf')
        ));
        $job = new InsertToDatabase($user);
        dispatch($job);
        return '0k';
    }
}
