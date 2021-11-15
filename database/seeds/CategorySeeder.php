<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
            'user_id'=>'1',
            'name'=>'laravel',
            'is_published'=>'1',
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
            ],
            [
                'user_id'=>'1',
                'name'=>'Word',
                'is_published'=>'1',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            [
                'user_id'=>'1',
                'name'=>'Dummy',
                'is_published'=>'1',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ],
            ]);
    }
}
