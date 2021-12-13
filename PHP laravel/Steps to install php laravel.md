========== Copy all file and paste in cmd ==========
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

========== 2nd step is install laravel ==========

2nd Run this 
composer create-project laravel/laravel example-app
========== 3rd step is install jetstream ==========

go to link becoz laravel seprate this from docx
https://jetstream.laravel.com/2.x/installation.html
thenrun this cmd:

			1st 
			composer require laravel/jetstream
			2nd 
			php artisan jetstream:install livewire
			3rd 
			php artisan jetstream:install livewire --teams
			4th 
			npm install && npm run dev"
========== end ==========
# if NPM not instaaled on your sysytem then run this command 
			npm cache clean -f
Re installing node and reinstalling npm. Nothing worked.
Create database name and migrate it 

========== For show profile photo  ==========
1st click on photo and inspect and copy add and paste in browser 
then you can see address of our pic now need to update env file by

	 http://127.0.0.1:8000/
then run this 

php artisan storage:link

========== 3rd step is Admin login and user login ===========
make a new controller 
 and then make a new model class  then in migration file from user to admin copy all fields  and paste in admin  fields

Copy everything from  user model and paste in admin model class
then migrate table 

		php artisan make:factory PostFactory  //1st run this 
		php artisan make:seeder UserSeeder  // no need to run 
		

then update Admin factory and databse with below code 
Admin Factory 

		return [
		'name' => 'Admin',
		'email' => 'admin@gmail.com',
		'email_verified_at' => now(),
		'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
		'remember_token' => Str::random(10),
		];
Seeder folder database file update it with 

	\App\Models\Admin::factory()->create();
After that  run this 

php artisan migrate --seed
THen check in data base admin data inserted successfully

============
#  how to save profile image  and detail in DB
* Required Route Controller and User Model Class to save 

		public function store_profile(Request $request){

		$data =User::find(Auth::user()->id);
		$data->name =$request->name;
		$data->email =$request->email;

		if($request->file('photo')){
		$file =$request->file('photo');
		@unlink(public_path('upload/user_image/'.$data->profile_photo_path));
		$filename = date('ymdHi').$file->getClientOriginalName();
		$file->move(public_path('upload/user_image'),$filename);
		$data['profile_photo_path'] =$filename;
		}

		$data->save();
		$notification = array(
		'message' => 'Image Updated successfully',
		'alert-type' => 'success'
		);
		return redirect()->route('user.Profile')->with($notification);
		}


# Profile Photo View code :

	<button type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition mt-2 mr-2" x-on:click.prevent="$refs.photo.click()">
	Select A New Photo
	</button>

	<img src="{{Auth::user()->profile_photo_url}}"  style="width:50px; height:50px; border-radius: 100%;" /> 

	on change 
	<img id="output" src="" width="100" height="100">

	<input name="photo" type="file" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">


	/storage/profile-photos/


# Shortcut php 

		@php
		$img =DB::table('admins')->get();


		@endphp
		I used this for profile image show in all pages 
		@foreach($img as $pic)
		<img src="{{$pic->profile_photo_path}}" class="wd-32 rounded-circle" alt="" >
		@endforeach
