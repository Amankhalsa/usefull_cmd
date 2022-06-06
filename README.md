# laravel project 
	* m so lucky u hve in my lyf😘😘😘😘😘😘
		1st composer create-project --prefer-dist laravel/laravel my-blog
# if else 

	 @if($user_data->height ==  $values->name) selected="selected" @endif
* @if(Request::is('/') || Request::url('/eyeglasses.html') || Request::url('/sunglasses.html') || Request::url('/brands.html')    )


	* php artisan config:cache
	* php artisan cache:clear
	* php artisan view:clear
	
	   protected $guarded = [];
# slug 
	 $storecategory->category_slug_en = strtolower(str_replace(' ', '-',$request->category_name));
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
         			  @if($value->status == 1)

                                            <span class="badge badge-pill badge-success">Approved</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">Unapproved</span>
                    
                                        @endif
 # if file exists for image unlink 
				$old_slider_img = Slider::find($id);
				$del_slider =$old_slider_img->image;
--------------------------------------------------------------------------------------------------
      if(file_exists($del_slider)){
                    unlink($del_slider);
                }
--------------------------------------------------------------------------------------------------
		
							if (file_exists($img_del)) 
							{ 
							unlink($img_del); 
							}
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
 
