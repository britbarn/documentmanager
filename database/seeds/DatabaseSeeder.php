<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //create a test document with a random name
        DB::table('document')->insert([
           'name' => 'test document',
           'exported' => '2014-06-26 04:07:31',
           'created_at' => '2014-06-26 04:07:31',
           'updated_at' => '2014-06-26 04:07:31'
       ]);

       //create two test key value pairs
       DB::table('key_values')->insert([
          'doc_id' => 1,
          'key' => 'testkey',
          'value' => 'testvalue'
      ]);
    }
}
