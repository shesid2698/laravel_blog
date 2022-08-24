<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Eloquent;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    Eloquent::unguard();  //關閉外件偵測
    DB::statement('SET FOREIGN_KEY_CHECKS=0'); //關閉MYSQL外件偵測
    $this->call([CategorySeeder::class, PostSeeder::class]);
    DB::statement('SET FOREIGN_KEY_CHECKS=1'); //開啟MYSQL外件偵測
    Eloquent::reguard(); //開啟外件偵測
  }
}