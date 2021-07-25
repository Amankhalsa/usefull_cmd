# composer-setup: 

	php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
---------------------------------------------------------------------------
	php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 		'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
---------------------------------------------------------------------------
	php composer-setup.php
---------------------------------------------------------------------------
	php -r "unlink('composer-setup.php');"

#  paste these above in project folder by  cmd 
---------------------------------------------------------------------------
#  First project 
---------------------------------------------------------------------------
* 1st 
	composer create-project --prefer-dist laravel/laravel my-blog

---------------------------------------------------------------------------
* if Error

	'composer' is not recognized as an internal or external command,
	operable program or batch file.
	link=.https://www.youtube.com/watch?v=vNmx1Za9AFM

---------------------------------------------------------------------------
* Then add path
* Change dir then 2nd
*  
	php artisan serve

# working with controler:
	https://laravel.com/docs/8.x/controllers

	Make contact controler with this cmd 


	php artisan make:controller ContactController
---------------------------------------------------------------------------
	Add this on  ContactController in from controller folder 
  	public function index(){
        // echo "<h1>This is a contact page </h1>";
        return view('contact');
    		}

---------------------------------------------------------------------------
Go to in Routes  dir:

	// Route::get('/contact', 'ContactControlle@index');  // laraver 6, 7  

	for laravel 8 

	above: 
	use App\Http\Controllers\ContactController; 

	bottom:
	Route::get('/contact', [ContactController::class,'index']);

---------------------------------------------------------------------------
# Defining Middleware:

* Run this:

		php artisan make:middleware CheckAge

* then add this below in CheckAge which you have created :
			
			public function handle(Request $request, Closure $next)
		    {
			if($request-> age <= 20)
			{ 
		    return redirect('home');
						}
			return $next($request);
		    }

* call by web.php by add this 

			Route::get('/about', function () {
				return view('about');
				})->middleware('age');
* add this in  kernel.php for registration 

        	age' => \App\Http\Middleware\CheckAge::class,

---------------------------------------------------------------------------
# Installation of jetstream:
---------------------------------------------------------------------------
* Official link:

		https://jetstream.laravel.com/2.x/installation.html

* 1st CMD:
	
		composer require laravel/jetstream

* 2nd CMD: 
	
		php artisan jetstream:install livewire

		npm install
		npm run dev

* Aman this is required if you wana to access default login & Register
* 3rd: 
		
		npm install && npm run dev

		php artisan migrate


		D:\xamp\php
		C:\Program Files\nodejs


# 1st Eloquent ORM Read Users Data
=======
#  Eloquent ORM Read Users Data
* 1st create database using phpmy admin 
* Add database name in .env file 
* Then can use this below code 
* in web.php we use this below code @ dashboard

	 	Route::middleware(['auth:sanctum','verified'])->get('/dashboard',function(){
	    $users=User::all();
	    return view('dashboard',compact('users'));
		})->name('dashboard');

#  In Dashboard.blade.php:
   	* in resources\views folder we use this code in dashboad template file  
		<div class="container">
		<div class="row">
		<table class="table">
		<thead>
		<tr>
		<th scope="col">SL no</th>
		<th scope="col">Name</th>
		<th scope="col">Email</th>
		<th scope="col">Created At</th>
		</tr>
		</thead>
		<tbody>
		@php($i=1)
		@foreach($users as $user)
		<tr>
		<th scope="row">{{$i++}}</th>
		<td>{{$user->name}}</td>
		<td>{{$user->email}}</td>
		<td>{{$user->created_at->diffforHumans()}}</td>
		</tr>
		@endforeach
		</tbody>
		</table>
		</div>
		</div>


# 2nd  Query Builder Read Users Data:
* Routes folder we used:

		Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
	    // $users=User::all();
	    $users=DB::table('users')->get();
	    return view('dashboard',compact('users'));
		})->name('dashboard');

* AND THIS (import this):
		
		use Illuminate\Support\Facades\DB;		

* IN Dashboard.blade.php file i used this for remove error:
	
		{{Carbon\Carbon::parse($user->created_at)->diffforHumans()}}



# For Show user name and total User: 
* Add this code in dashboard.php

		Hi... <B > <span style="text-transform: uppercase; color: green;">{{ Auth::user()->name}}</span></B>
		<b style='float: right;'>Total users:
		<span class="badge badge-danger"> {{count($users)}}</span>
		</b>

# 17: Create Model And Migration