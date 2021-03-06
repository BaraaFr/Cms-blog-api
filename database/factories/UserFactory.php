<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\User;
use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('123123'), // password
        'remember_token' => Str::random(10),
    ];
});
$factory->define(Post::class, function (Faker $faker) {
    $title=$faker->sentence;
    $isPublished=['1','0'];

    return [
        'user_id' => rand(1,10),
        'title'=>$title,
        'slug'=>str_slug($title),
        'details'=>$faker->paragraph,
        'post_type'=>'post',
        'is_published'=>$isPublished[rand(0,1)],
        'category_id'=>2,
        'created_at'=>now(),
        'updated_at'=>now(),
    ];
    // $factory->define(Category::class, function (Faker $faker) { 
    //     $isPublished=['1','0'];   
    //     return [
    //         'user_id' => rand(1,10),
    //         'name'=>$faker->word->unique(),
    //         'is_published'=>$isPublished[rand(0,1)],
    //         'created_at'=>now(),
    //         'updated_at'=>now(),
    //     ];
});
