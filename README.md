	* php artisan config:cache
	* php artisan cache:clear
	* php artisan view:clear
<a href="https://stackoverflow.com/questions/15124438/jquery-autoplay-video"> Auto Play Article </a>
 # laravel visitor tracker 
 
 	composer require awssat/laravel-visits
	
  	php artisan migrate:rollback --step=2
# short cut models 

		@php
		$slider = App\Models\Slider::get();

		@endphp
 # git Branches <a href="https://github.com/Kunena/Kunena-Forum/wiki/Create-a-new-branch-with-git-and-manage-branches">Make branch</a>
 # if file exists for image unlink 
 		if (file_exists($img_del)) 
						{ 
						unlink($img_del); 
						}
 # carbon date in human style
 #  HTML entity 
             {!!html_entity_decode($slider_img->description)!!}	
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
 
