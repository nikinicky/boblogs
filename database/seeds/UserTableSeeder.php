<?php


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\User;

/**
 * Class UserTableSeeder
 * @author nickiesiva
 */
class UsersTableSeeder extends Seeder
{
  /**
   * To run and execute the seed.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->delete();

    User::create(array(
      'name'  => 'Bionila',
      'email' => 'bionila@gmail.com',
      'password' => Hash::make('mypass'),
    ));
  }
}
