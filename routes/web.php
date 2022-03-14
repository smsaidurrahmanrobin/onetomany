<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//--------ONE TO MANY RELATION CREATE---

Route::get('/create', function () {

    $user = User::findorfail(1);

    $post = new Post(['title'=>'My second post with edwin', 'body'=>'i love laravel']);

    $user->posts()->save($post);
});

//--------ONE TO MANY RELATION READ---

Route::get('/read', function () {

    $user = User::findorfail(1);

   foreach ($user->posts as $post){

       echo $post->title ."<br>";

   }
});


//--------ONE TO MANY RELATION UPDATE--------

Route::get('/update', function () {

    $user = User::findorfail(1);

    $user->posts()->where('id',2)->update(['title'=>'Updated second post','body'=>'Updated the body of second post']);

    return "UPDATED";

});

//--------ONE TO MANY RELATION delete--------

Route::get('/delete', function () {

    $user = User::findorfail(1);

    $user->posts()->where('id',2)->delete();

    return "DELETED";

});
