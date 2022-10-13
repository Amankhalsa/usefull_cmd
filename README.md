# Admin Author role doc:
* Make a relation betweem user and role table 
* User Model class:

		public function role(){
		return $this->belongsTo(Role::class);
		}
* Role Model class:

		public function users(){
		return $this->hasMany(User::class);
		}
* Check relation By this :

	php artisan tinker 
	
		* App\Models\user::find(1);
		* App\Models\user::Role(1);
		* App\Models\user::find(1)->role;
		* App\Models\Role::find(1)->users;
# laravel shot cmds 
	# Generate a model and a FlightFactory class...
	php artisan make:model Flight --factory
	php artisan make:model Flight -f

	# Generate a model and a FlightSeeder class...
	php artisan make:model Flight --seed
	php artisan make:model Flight -s

	# Generate a model and a FlightController class...
	php artisan make:model Flight --controller
	php artisan make:model Flight -c

	# Generate a model, FlightController resource class, and form request classes...
	php artisan make:model Flight --controller --resource --requests
	php artisan make:model Flight -crR

	# Generate a model and a FlightPolicy class...
	php artisan make:model Flight --policy

	# Generate a model and a migration, factory, seeder, and controller...
	php artisan make:model Flight -mfsc

	# Shortcut to generate a model, migration, factory, seeder, policy, controller, and form requests...
	php artisan make:model Flight --all

	# Generate a pivot model...
	php artisan make:model Member --pivot
# SQL where in 
	        
		    @php
                     $getpacks =  DB::table('user_offers')->where('user_id',authUserId())->whereIn('offer_service' ,[2, 3])->exists()
                     @endphp
# IF URL is then active class
class="@if(Request::is('user-inquery')  ) active @else '' @endif"
# Banned user 
* <a href="https://dev.to/techtoolindia/how-to-disable-users-from-login-in-laravel-bm9">Banned user </a>

        if(Auth::check() && (Auth::user()->status == 0)){
            // Auth::logout();
            auth()->guard('web')->logout();
            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('login')->with('error', 'Your Account is suspended, please contact Admin.');

    }
#  if Problem 1 how to solve this 
   * Root composer.json requires php ^7.3 but your php version (8.1.6) does not satisfy that requirement.
   * <a href='https://stackoverflow.com/questions/65454412/error-root-composer-json-requires-php-7-3-but-your-php-version-8-0-0-does-no'>Ref Link</a>
   * It's because in your project in composer.json file you have:
   
		"require": {
		"php": ">=7.3",
		.....
		},
		
	Try to update this requirement to:
		"require": {
		"php": "^7.3|^8.0",
		.....
		},
		
# upgrade laravel 8 to 9 

	laravel/framework to ^9.0
	nunomaduro/collision to ^6.1
	In addition, please replace facade/ignition with "spatie/laravel-ignition": "^1.0" and pusher/pusher-php-server (if applicable) with "pusher/pusher-php-	server": "^5.0" in your application's composer.json file.
# Encrpt
	use Illuminate\Support\Facades\Crypt;
	
	Crypt::encrypt($getActive->id)
	
 	$id =  Crypt::decrypt($id);
# Cutom reset password 
	
<a href="https://codingdriver.com/custom-forgot-reset-password-functionality-in-laravel.html">Reset password </a>
# email confing by job 
	* php artisan make:mail CommentNotification  

	* php artisan make:job TagedInCommentJob 

	* php artisan queue:listen
	
	# Job function 
		* In Controller area 
		      dispatch(new UserCommentJob($notifyToUser,$decisionData));
		* 1st   protected $user, $password;
		* 2nd define constructor 
		* 3rd define handle function 
		$email = new Welcome($this->data );
		Mail::to($this->data->email )->send($email);
	# mail function build as same or build mail below example
				return $this->subject('Commented  by ' . getUserName($this->data->user_id))
				->from('noreply@example.com')
				->view('email.commentNotify')->with([
				'comment' => $this->data->comment,
				'name' =>getUserName($this->data->user_id) ,
				'email' =>getUserEmail($this->data->user_id) ,
				]);
		# forloop for mail function 
			foreach($emails as $getemail){
			Mail::to($getemail->email)->send($email);
			}
# laravel UI with bootstrap 
		composer require laravel/ui
		php artisan ui bootstrap
		OR
		php artisan ui bootstrap --auth
		npm install && npm run dev
# wwhatsapp 
		https://api.whatsapp.com/send?text={{urlencode(url()->current()) }}
# laravel helper function 
	* Make a folder in App folder with name of Helper or file nanme helper
	* set path in conposer.json using below  at 
		"autoload-dev": {
		"psr-4": {
		"Tests\\": "tests/"
		},
		"files": [
		"app/Helpers/helpers.php"
		]
		},
	* After that Update composer
	
# query 
		where(function ($query) {
		$query->where('user_id', authUserId())->orWhere('user_id', authCompanyId()) ;              $query->whereIn('user_id', getProfiles());
		})->get();
# Db seeder cmds
		php artisan make:seeder CreateUserSeeder
		php artisan db:seed --class=CreateUserSeeder
		php artisan migrate:fresh --seed
		
		for seed
		php artisan db:seed --class=AdminUserSeeder
# Git Cmd
		git pull origin main

		git pull origin master
# image mine 
		'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
# password hash 
		$2y$10$nLzPHFNh2XS9sOMqVX3j2.SHEpVY6gbus1rENTSvn4K8fC/nFjvGC
# livewire 
		php artisan make:livewire dashboard.EditClients

		return redirect(request()->header('Referer'));
# storage link error 

		cd public
		rm storage
		cd ..
		php artisan storage:link
		php artisan storage:link --force
# password function 
		$passcode = 'user@'.rand(000000,999999);
		// encryptString
		$encrypted = Crypt::encryptString($passcode );
		// // decryptString
		$decrypted = Crypt::decryptString($encrypted);
		// dd($decrypted);
		$storeuser->passcode  = $decrypted ;
# Array seeder
		
		$users = [
		[
		'name'=>'Admin User',
		'email'=>'admin@laratutorials.com',
		'type'=>1,
		'password'=> bcrypt('123456'),
		],
		[
		'name'=>'Manager User',
		'email'=>'manager@laratutorials.com',
		'type'=> 2,
		'password'=> bcrypt('123456'),
		],
		[
		'name'=>'User',
		'email'=>'user@laratutorials.com',
		'type'=>0,
		'password'=> bcrypt('123456'),
		],
		];
		foreach ($users as $key => $user) {
		User::create($user);
		}
 * Valucation rules <a href="https://www.codegrepper.com/code-examples/php/laravel+validation+rules+list">For laravel </a> 
* Regex witout space 

* regex:/^[a-zA-Z0-9_]*$/u

* laravel validation 
* **    protected $rules = [
        'name' => 'required | max:25',
        'username' => 'required |alpha_dash | regex:/^[a-zA-Z0-9_]*$/u | max:20 |unique:users,username',
        'email' => 'required|email|unique:users',
        'designation' => 'required',
    ];**
 # livewire function validation 

			$this->validate([
			'outcome' => 'required',
			'lesson' => 'required',
			'finalFeel' => 'required',
			'result' => 'required',
			]);
# DB Relation 
* 1 Belong to 
	public function categoryname(){
	return $this->belongsTo(Category::class,'category_id' ,'id');
	}

# laravel project 
# store file at storage path 

	if($request->file('resumeFile')){

		$file = $request->file('resumeFile');

		$filename = 'Resume' . time() . '.' . $file->getClientOriginalExtension();

		$path = $file->storeAs('resume', $filename);
		// dd($path);
		}

# unlink 
   unlink(storage_path("app/public/resume/".$cv->resume));
# js 

* https://devdojo.com/bobbyiliev/how-to-create-contact-form-with-laravel-livewire
# if else for route 

* class=" @if(Route::is('dashboard') ) active @else ''  @endif" 
* <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
# vite plugin
# Redmi K50i 5G
* npm run dev
 
* npm install --save-dev vite laravel-vite-plugin
* <a href="https://exerror.com/unable-to-locate-file-in-vite-manifest-resources-css-app-css/" >Link</a>
# laravel Bootstrap UI 
	* composer require laravel/ui 
	* php artisan ui bootstrap --auth 
	* npm install
	* npm run dev
* composer create-project --prefer-dist laravel/laravel LaraMulti
	* m so lucky u hve in my lyf😘😘😘😘😘😘
		1st composer create-project --prefer-dist laravel/laravel my-blog
* 1st update php version
 * "php": "^8.0",
 
* 2nd laravel/framework
 * "laravel/framework": "^9.0",
* 3rd step
*  "nunomaduro/collision": "^6.0",
4th change 
  *  "facade/ignition": "^1.11", to  with "spatie/laravel-ignition": "^1.0"
5th run composer update
# if else for selected 
* php artisan migrate:reset =>for reset datatable
* @if(Request::is('gallery'))
	 @if($user_data->height ==  $values->name) selected="selected" @endif
* @if(Request::is('/') || Request::url('/eyeglasses.html') || Request::url('/sunglasses.html') || Request::url('/brands.html')    )


	* php artisan config:cache
	* php artisan cache:clear
	* php artisan view:clear
	
	   protected $guarded = [];
# email configuration 
		*  Env config 
		*  MAIL_DRIVER=smtp
		*  MAIL_HOST=shubhvivah.us
		*  MAIL_PORT=465
		*  MAIL_USERNAME=info@shubhvivah.us
		*  MAIL_PASSWORD=MX08CJ1)J%36
		*  MAIL_ENCRYPTION=SSl
		*  MAIL_FROM_ADDRESS=info@shubhvivah.us
		*  MAIL_FROM_NAME="${APP_NAME}"
# loop for serial number 
 <th scope="row">{{ $cate->firstitem()+$loop->index}}</th>
# slug 
	 $storecategory->category_slug_en = strtolower(str_replace(' ', '-',$request->category_name));
# INSERT SINGLE VALUE 
    
    INSERT INTO `brands` (`id`, `title`, `slug`, `brand_image`, `url`, `status`, `created_at`, `updated_at`) 
    VALUES (NULL, 'Versace', '', NULL, NULL, 'active', NULL, NULL),
# rename table 

    ALTER TABLE contacts
      RENAME TO people;
      
# image store function 
        if($request->file('brand_image')) 
        {
            $file = $request->file('brand_image');
            $filename = time() . '.' . $request->file('brand_image')->extension();
            Image::make($file)->save(public_path('/frontend/img/brand/').$filename);
            //   ->resize(1000,720)  //can use this  for resize 
     
            $last_img='/frontend/img/brand/'. $filename;
        }
            $data['brand_image'] =  $last_img;
----------------------------------------------------
# 2nd 3rd  
	        if($request->file('image')){
          $slider_img =  $request->file('image');
          $name_gen = hexdec(uniqid()).'.'.$slider_img->getClientOriginalExtension();
          Image::make($slider_img)->fit(558,631)->save(public_path('upload/about/'.$name_gen));
          $save_url = 'upload/about/'.$name_gen;

        }

            if($request->file('brochure')) 
            {
                $file = $request->file('brochure');
                $filename = time() . '.' . $request->file('brochure')->extension();
                $filePath = public_path() . '/upload/brochure/';
                $brochur_url= $file->move($filePath, $filename);
            }
# if session has an error 
	 @if(session('sucess'))
 <div class="alert alert-success alert-dismissible fade show" role="alert">
 <strong>{{session('sucess')}}</strong> 
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
 <span aria-hidden="true">&times;</span>
 </button>
 </div>
 @endif
# meta tags <a href="https://stackoverflow.com/questions/34676729/add-meta-tags-to-laravel-page"> Ref</a>

 		<html>
	    <head>
		<title>App Name - @yield('title')</title>
		<meta name="description" content="@yield('description')">
		<meta name="keywords" content="@yield('keywords')">
		<!-- etc -->
	    </head>
	    <body>
		...
	    </body>
	</html>
	And then your template should extend the other template.

	@extends('layouts.master')
	@section('title')
	{{trans('strings.About')}}
	@stop
	@section('description', 'Share text and photos with your friends and have fun')
	@section('keywords', 'sharing, sharing text, text, sharing photo, photo,')
	@section('robots', 'index, follow')
	@section('revisit-after', 'content="3 days')
	
# Validation 
	 $request->validate([
            'name'   =>'required',
            'email' =>'required | unique:users',
            'dob' =>'required',
            'gender' =>'required',
            'country' =>'required',
            'state' =>'required',
            'city' =>'required',
            'phone' =>'required |  numeric |unique:users',
            'postcode' =>'required',
            'about_yourself' =>'required',
            'address' =>'required',
            'height' =>'required',
            'Diet' =>'required',
            'marital_status' =>'required',
            'profile_created' =>'required',
            'religion' =>'required',
            'community' =>'required',
            'profile_photo_path' =>'required|image|mimes:jpg,png,jpeg,svg,webp|max:4096',
            'multi_img' =>'max:5',

            

            // 'Working_as' =>'required',
            // 'mother_tongue' =>'required',
            // 'education' =>'required',
            ]
        ,[
            'multi_img.max' => 'Maximum 5 photos Acceptable',  
        ]);
# error message :
		//@error('category_id')
		<span class="text-danger"> {{$message}}</span>
		@enderror
		<a href="https://stackoverflow.com/questions/15124438/jquery-autoplay-video"> Auto Play Article </a>
# If profile set 
 	{{(!empty($get_admin_users->profile_photo_path)) 
                ? asset($get_admin_users->profile_photo_path):url('upload/no_image.jpg')}}
		--------------
		{{(!empty($user->profile_photo_path)) ? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg')}}
# data in template  Age calulate
	 {{ \Carbon\Carbon::parse($values->dob)->diff(\Carbon\Carbon::now())->format('%y years') }}
# DB make seeder
	after making model class 
		php artisan make:seeder CountrySeeder
	and run this below 
		php artisan db:seed --class=CountrySeeder
	Use full functions 
			State::truncate();
			foreach ($states as $key => $value) {
			State::create($value);
			}
	
 # laravel visitor tracker 
 
 	composer require awssat/laravel-visits
	
  	php artisan migrate:rollback --step=2
# age calulate 
		use Carbon\Carbon; // Include Class in COntroller

		$request->date_of_birth = "2000-10-25";
		$age = Carbon::parse($request->date_of_birth)->diff(Carbon::now())->y;

		dd($age. " Years");
# short cut models 


		@php
		$slider = App\Models\Slider::get();

		@endphp
 # git Branches <a href="https://github.com/Kunena/Kunena-Forum/wiki/Create-a-new-branch-with-git-and-manage-branches">Make branch</a>
 # aactive inactive 
           @if($value->status ==1 )
                                    <button class="btn btn-light" style="margin-left: 5px;" type="submit" title="Active/Approved">
                                        <a href="{{route('inactive.front.bidpost',$value->id)}}">
                                        <i class=" fa fa-eye" style='font-size:20px;color:rgb(3, 99, 24)'> </i>
                                        </a>
                                    </button>
                                    @endif
                                    @if($value->status == 0 )
                                    <button class="btn btn-light" style="margin-left: 5px;" type="submit"  title="Inactive/Unapproved">
                                        <a href="{{route('active.front.bidpost',$value->id)}}">
                                           <i class=" fa fa-eye-slash" style='font-size:20px;color:red'> </i>
                                        </a>
                                        </button>
                                        @endif
---------------------------------------------------------------------------------------------------------------------------------
         			  @if($value->status == 1)

                                            <span class="badge badge-pill badge-success">Approved</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">Unapproved</span>
                    
                                        @endif
# function for active 
			public function active_front_bid($id){
			$activeedata = AddPost::find($id);
			$activeedata->status = 1;  
			$activeedata->save();
			$notification = array(
			'message' => 'Post  status  is Active',
			'alert-type' => 'success'
			);
			return redirect()->route('front.bid.view')->with($notification);

			}
			// ============================ Inactive bid poseted by user ==========================
			public function inactive_front_bid($id){
			$activeedata = AddPost::find($id);
			$activeedata->status = 0;  
			$activeedata->save();
			$notification = array(
			'message' => 'Post  status  is inactive',
			'alert-type' => 'error'
			);
			return redirect()->route('front.bid.view')->with($notification);

			}
 # if file exists for image unlink 
				$old_slider_img = Slider::find($id);
				$del_slider =$old_slider_img->image;
--------------------------------------------------------------------------------------------------
      if(file_exists($del_slider)){
                    unlink($del_slider);
                }
-------------------------------------------- some time ------------------------------------------------------
		
							if (file_exists($img_del)) 
							{ 
							unlink($img_del); 
							}
--------------------- some time -----------------------
     $old_img = Brand::find($id);
        $del_image = $old_img->brand_image;
        $rem = public_path($del_image);

            if(file_exists( $rem )){
                unlink($rem);
            }
        $brand=Bra
 # carbon date in human style
 # long string 
	 {!!html_entity_decode($slider_img->description)!!}	

 #  HTML entity 
            
	    	{{Carbon\Carbon::parse($value->created_at)->diffForHumans()}}
# Laravel Breez package installation steps
--------------------------------------
	1st =>composer require laravel/breeze --dev
	2nd => php artisan breeze:install
	3rd =>npm install && npm run dev
<a href="https://www.tutsmake.com/laravel-7-6-google-login-tutorial-with-socialite-demo-example/">Google login </a>
<a href="https://www.tutsmake.com/laravel-8-socialite-google-login-example-tutorial/">Google login </a>
# set string limit in laravel
	  {{Str::limit(	$values->post_detail,300,$end='....')}}
# php my admin table if not editable or id is 0 
# redirect in laravel by script 
	<script> setTimeout(function () { window.location.replace('{{ url('home') }}'); }, 5000); </script>
* ALTER TABLE `crud` ADD INDEX(`id`);
* ALTER TABLE `crud` ADD PRIMARY KEY( `id`);
# onchange image
			src=" " onmouseover="this.src=''" onmouseout="this.src=''" 
			
			<img title="Hello" src="https://static.independent.co.uk/s3fs-public/thumbnails/image/2017/09/12/11/naturo-monkey-selfie.jpg?w968h681" onmouseover="this.src='https://www.ctvnews.ca/polopoly_fs/1.4037876!/httpImage/image.jpg_gen/derivatives/landscape_1020/image.jpg'" onmouseout="this.src='https://static.independent.co.uk/s3fs-public/thumbnails/image/2017/09/12/11/naturo-monkey-selfie.jpg?w968h681'" />
			-----------------------
			<img id="output" src="" width="100" height="100">

			<input name="photo" type="file" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
# single page app
* npm install --save turbolinks
* npm audit fix
* npm install
* npm run dev
* npm run watch

* resources/js/app.js
* add this  below code :
* var Turbolinks = require("turbolinks");
* Turbolinks.start();
# Get Secure url using middleware
#if else for image condition 

	{{(!empty($edit_site_user->profile_photo_path)) ? asset($edit_site_user->profile_photo_path):url('upload/no_image.jpg')}}

				============ Name ===========
				       HttpsProtocol
				---------------------------------
			if (!$request->secure()) {
			return redirect()->secure($request->getRequestUri());
			}
			-----------------------------------
			===========Kernal class ============
			\App\Http\Middleware\HttpsProtocol::class,
# some  usefull tricks and commands for me 

				MAIL_MAILER=smtp
				MAIL_HOST=smtp.mailtrap.io
				MAIL_PORT=587
				MAIL_USERNAME=user
				MAIL_PASSWORD=password
				MAIL_ENCRYPTION=null
				MAIL_FROM_ADDRESS=email
				MAIL_FROM_NAME="${APP_NAME}"


			@auth
			@if(auth()->user()->id ==  1)
			<li><a class="nav-link scrollto" href="{{route('view_blog')}}">View Blog</a></li>


			<li><a class="nav-link scrollto" href="{{route('user.logout')}}">logout</a></li>
			@endif
			@endauth

# if route is ...
	
		@if(Request::is('/'))
		@include('home_page.body.slider')
		@endif
# File upload exception handle 

* public_html/vendor/symfony/http-foundation/File/UploadedFile.php
 
* <a href="https://prnt.sc/26xg76u" target="_blank">File Link</a> 

# Laravel Model and controller in single command:
	
	php artisan make:model Admin -mc
	 composer require laravel/ui
	 php artisan ui vue --auth
Email 
* <a href="https://www.youtube.com/watch?v=sKDz7zcMVMg">Email config</a>
# for npm error delete node modules and package-lock.json
* if you using mac then use

* rm package-lock.json

* and for window user use

* del package-lock.json
* node-module 
#Before publish project run this cmd

		* php artisan config:cache
		* php artisan cache:clear
		* php artisan view:clear
# laravel full project installation steps 

* laravel project installation steps 
		
			1st go to https://getcomposer.org/download/ site 

------------------------------------------------
* copy all code and paste in cmd 
------------------------------------------------
* 2nd go to laravel official site  click on Installation Via Composer
Run this below command 
------------------------------------------------

			composer create-project laravel/laravel example-app
------------------------------------------------
* if you want to make login system then install jetsteam 
for installation go to by below link 
------------------------------------------------

			https://jetstream.laravel.com/2.x/installation.html
------------------------------------------------
* run these cmd's
* 1st 
		
		composer require laravel/jetstream
* 2nd 
	
		php artisan jetstream:install livewire

* 3rd 
		
		npm install && npm run dev
# storage image link cmd
* php artisan storage:link

# usefull Django _cmd
# <a href="https://dev.to/vumanhtrung/setup-an-htaccess-file-for-redirecting-to-laravel-s-public-folder-1e1j"> htaccess link</a>
* <a href="https://github.com/Amankhalsa/usefull_cmd/blob/main/Clean_Django%20CMDs.txt">ORDER TO INSTALL DJANGO WIN7</a>

* <a href="https://www.c-sharpcorner.com/article/how-to-install-pip-django-virtualenv-in-ubuntu/">for ubuntu</a>

* <a href="https://copyassignment.com/python/"> PYTHON copyassignment.comt</a>

# java script for add - after 5 like product key 

			<form method="post" action="process.php">
			<p>Key: <input name="key" size="40"
			id="tbNum" onkeyup="addHyphen(this)"
			placeholder="Type some values here"
			></p>
			<p><input type="submit"></p>
			</form>

			<script>
			function addHyphen (element) {
			let ele = document.getElementById(element.id);
			ele = ele.value.split('-').join('');    // Remove dash (-) if mistakenly entered.

			let finalVal = ele.match(/.{1,5}/g).join('-');
			document.getElementById(element.id).value = finalVal;
			}
			</script>
# Wifi pasword finder 
  *  It’s pretty but u can do this in CMD.
  *  There are steps:
  *  1) Open CMD as administrator
  *  2) Type “netsh wlan show profiles” that’ll show all wifi that u were connected
  *  3) Type “netsh wlan show profile [name of wifi] key=clear”
  *  4) It’ll show u password in Key content
  *  That’s all
# Using python code 
* <a href="https://github.com/Amankhalsa/usefull_cmd/blob/main/Wifi_Password_finder.ipynb"> Wifi password </a>

# node js link
# https://nodejs.org/dist/v13.9.0/
* select this 
* node-v13.9.0-x64.msi                               18-Feb-2020 18:54            29888512
------------------------
* php artisan config:cache
* php artisan cache:clear
* php artisan view:clear
* php artisan route:cache
* php artisan optimize --force

-----------------------
* php artisan cache:clear
* php artisan view:clear
* php artisan route:clear
* php artisan clear-compiled
* php artisan config:cache
-----------------------
* php artisan optimize

* php artisan view:clear
* php artisan config:clear
* php artisan route:clear
* php artisan cache:clear
* php artisan clear-compiled

* php artisan optimize:clear

# Laravel project->bootstarp->cache->delete all files


----------------------------------------
* Reoptimized class loader:

* php artisan optimize
* Clear Cache facade value:

* php artisan cache:clear
* Clear Route cache:

* php artisan route:cache
* Clear View cache:

* php artisan view:clear
* Clear Config cache:
 
