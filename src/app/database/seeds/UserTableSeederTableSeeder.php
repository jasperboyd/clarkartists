<?php

class UserTableSeederTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('user')->truncate();

		$user = array(
			'email' => 'jboyd@clarku.edu', 
			'first_name' => 'jasper',
			'last_name' => 'boyd',
			'full_name' => 'jasper boyd',
			'major' => 'computer science / music',
			'password' => Hash::make('paperflowers')
 		);

		// Uncomment the below to run the seeder
		 DB::table('users')->insert($user);
	}

}
