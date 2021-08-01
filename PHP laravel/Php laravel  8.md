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

# URL when we used for href :

		   		<a href="{{ url ('/')}}">Dashboard </a> |
                <a href="{{ URL::to('/about')}}">About  </a> |
                <a href="{{ route('con')}}">Contact  </a> |


# How work with URL in laravel 8:

	* URL section 1ST Method
		  
		   <a href="{{ url ('/')}}">Home </a> |
		   <a href="{{ url ('/about')}}">About  </a> |
		

URL section 2nd Method:
		 
		  * <a href="{{ URL::to('/about')}}">About  </a> |		  

 *URL section 3rd Method:
		
		<a href="{{ route('con')}}">Contact  </a> |
		
		in routes/web.php use this below syntax

		Route::get('/contact', 'ContactControlle@index');

* We can use this in routes/web.php:

		Route::get('/contact-this-is', [ContactController::class,'index'])->name('con');


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

* 4th  then Create a database then migrate it or add DB name in .env file 
		
		php artisan migrate

* for path :

		D:\xamp\php
		C:\Program Files\nodejs
-------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------
# 1st Eloquent ORM Read Users Data
# Database jobs;
# Eloquent ORM Read Users Data
* 1st create database using phpmy admin 
* Add database name in .env file 
* Then can use this below code 
* in web.php we use this below code @ dashboard

	 	Route::middleware(['auth:sanctum','verified'])->get('/dashboard',function(){

		//Add this 
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

-------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------
# 2nd  Query Builder method  Read Users Data:
* Routes folder we used:

		Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
	    // $users=User::all();
	    //Add this  below code  for access database values 
	    $users=DB::table('users')->get();
	    return view('dashboard',compact('users'));
		})->name('dashboard');

* AND THIS (import this):
		
		use Illuminate\Support\Facades\DB;		

* IN Dashboard.blade.php file i used this for remove error: show Humans dated 

		{{Carbon\Carbon::parse($user->created_at)->diffforHumans()}}


# by config.php then open jetstream.php file then can change profile API:

	 'features' => [
        // Features::termsAndPrivacyPolicy(),
        // Features::profilePhotos(),
        // Features::api(),
        // Features::teams(['invitations' => true]),
        Features::accountDeletion(), 
        ],


# For Show user name and total User: 
*  TO do this Add this code in dashboard.php

		Hi... <B > <span style="text-transform: uppercase; color: green;">{{ Auth::user()->name}}</span></B>
		<b style='float: right;'>Total users:
		<span class="badge badge-danger"> {{count($users)}}</span>
		</b>
-------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------
# 17: Create Model And Migration:

1. need new menu, add this below code, file name is navigation-menu.blade.php

			<x-jet-nav-link href="{{ route('all.Category') }}">
			All Category
			</x-jet-nav-link> 

2. THen create model by below cmds:

			php artisan make:model Category -m
3. open migration file then add fields can copy it path database/migrations

		public function up()
		{
		Schema::create('categories', function (Blueprint $table) {
		$table->id();
		$table->integer('user_id');
		$table->string('categories_name');
		$table->timestamps();
		$table->SoftDeletes();
		});
		}

4. open model file in category file add this 
	
		use SoftDeletes;
5. AND ADD this with imported 
	
		use Illuminate\Database\Eloquent\SoftDeletes;

6. open user.php model file and copy code protected and paste here 

		protected $fillable = [
		    'user_id',
		    'categories_name',
		];
        //no need password 
7. Run migrate cmd then automaticaly created in database 

			php artisan migrate
8. Then create controller by this cmd 

			php artisan make:controller Categorycontroller
9. Now open route folder add route
* include this:

		use App\Http\Controllers\Categorycontroller;

		Route::get('/category/all', [Categorycontroller::class,'Allcat'])->name('all.Category');
-------------------------------------------------------------------------------------

10. THen opne controller folder with categorycontroller file  then add this 
* Under class area add this code 
* Then create some filder in view 1st) admin 2nd) category 3rd) index file 

		//Allcat
		public function Allcat(){
		return view('admin.category.index');
		}																			// Add cat code :														Route::post('/category/add', [Categorycontroller::class,'Addcat'])->name('store.category');


* Save file and then for check click on all category link
-------------------------------------------------------------------------------------

11. Then add code on index file 
			
			<x-app-layout>
			<x-slot name="header">
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			<!-- {{ __('Dashboard') }} -->
			</h2>
			</x-slot>
			<div class="py-12">
			<div class="container">
			<div class="row">
			<div class="col-md-8">
			<div class="card">
			<div class="card-header">All Category</div>
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
			<tr>
			<th scope="row"></th>
			<td></td>
			<td></td>
			<td></td>
			</tr>
			</tbody>
			</table>
			</div>
			</div>
			<div class="col-md-4">
			<div class="card">
			<div class="card-header">Add Category</div>
			<div class="card-body">														<!--18. Form Validation & Show Custom Error Message-->
			<form action="{{ route('store.category')}}" method="post">
			@csrf
			<div class="form-group">
			<label for="exampleInputEmail1">Category Name</label>
			<input type="email" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">						<!--Validation -->
			@error('category_name') 												
			<span class="text-danger">{{ $message }} </span>
			@enderror 
			<span></span>
			</div>
			<button type="submit" class="btn btn-primary">Add Category</button>
			</form>
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>
			</x-app-layout> 
* Add bootstrap css and javascript code in views/ layout app.blade.php file 
-------------------------------------------------------------------------------------

# CSS
	
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
# js
	
		 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>						
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
-------------------------------------------------------------------------------------
12. 18 Form Validation & Show Custom Error Message
 1. update designe i already updated  in above pasted code under 11 
 2. Add route add category i allready added in 10 number 
 3. Then add this below code in  category controller after  this 
 4. add error code in index.blade.php  i already added above 11 number 

			return view('admin.category.index');
			// no need to  use this only below used  

		//Use this code in catergory controller file for validation 
		public function Addcat(Request $request){
		$validatedData = $request->validate([
		'category_name' => 'required|unique:categories|max:255',
		],
		[
		'category_name.required' => 'Please input category name',
		'category_name.max' => 'Category less then 255 chars',
		]);
		}
-------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------
# 19. Eloquent ORM Insert Data in database :
* For inserting data we need before validation code in Categorycontrolle.php 
* Import some files  in cat
			
			use App\Models\Category;
			use Auth;
			use Illuminate\Support\Carbon;

1.  one method add this 

			Category:: insert([
			'categories_name'=> $request ->categories_name,
			'user_id'=>Auth:: user()->id,
			'created_at'=>Carbon::now()
			]);

2. 2nd method : professional way 

		// another way  professional way 
		// $category = new  Category;
		// $category->categories_name = $request ->categories_name;
		// $category->user_id = Auth::user()->id;
		// $category->save();
3.  add this for message 

		return redirect()->back()->with('sucess', 'Category inserted sucessfull');
		}// remove this 
		}// remove this 

4. update index file for message displaying add this below bootstrap code and function 
	
		<div class="col-md-8"> <!-- after this --> 
		<div class="card">	<!-- after this -->
		<!-- message  block  -->
		@if(session('sucess'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>{{session('sucess')}}</strong> 
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>
		@endif
		<!-- end message block  -->
----------------------------------------------------------------------------------
<!-- end this 19. Eloquent ORM Insert Data -->
----------------------------------------------------------------------------------
# 3rd method to insert data by query builder way 
* Import this  first for this operation 
		
		use Illuminate\Support\Facades\DB;

            $data = array();
            $data['categories_name']= $request ->categories_name;
            $data['user_id']=Auth::user()->id;
            DB::table('categories')->insert($data);
    	return redirect()->back()->with('sucess', 'Category inserted sucessfull');
        }

----------------------------------------------------------------------------------
<!-- end this 20. Query builder way to  Insert Data -->
----------------------------------------------------------------------------------
# 21.  Eloquent ORM Read Data
* 1st need controller code :
	
			public function Allcat(){    
        $cate = Category::Latest()->get(); // for fast latest added entry above
        // $cate = Category::all();  we can use this 
        return view('admin.category.index',compact('cate'));
    		}
 * 2nd need index page code like this below:

		@php( $i =1)
		@foreach($cate as $category)
		<tr>
		<th scope="row">{{$i++}}</th>
		<td class="text-success font-weight-bold">{{ strtoupper($category->categories_name)}} </td>
		<td class="font-weight-bold">{{ $category->user_id}}</td>     
		<!-- if you use query builder use this method for human date  -->
		<td class="font-weight-bold"> @if($category->created_at == NULL)
		<span class="text-danger">No date set</span>
		@else
		{{Carbon\Carbon::parse($category->created_at)->diffforHumans()}}
		@endif
		</td>
		</tr>
		@endforeach
# extra feature 

		Hi... <B > 
		<span style="text-transform: uppercase; color: green;">
		{{ Auth::user()->name}}
		</span></B>
		<b style='float: right;'>Total items:
		<span class="badge badge-danger"> {{count($cate)}}</span>
		</b>
------------------------------------------------------------------------------
<!-- end this 21.  Eloquent ORM Read Data -->
------------------------------------------------------------------------------
# 22. Query Builder Read Data method:

	$cate = DB::table('categories')->Latest()->get();

# 23. Laravel Pagination
* Controller code 
1. with query builder 
   
        $cate = DB::table('categories')->Latest()->paginate(5);
2. 	El ORM

        $cate = Category::Latest()->paginate(5);
 3. Index file code after table:
		
		{{$cate ->Links()}}														

4. Serial nubmer order 1 to 16

		<th scope="row">{{ $cate->firstitem()+$loop->index}}</th>