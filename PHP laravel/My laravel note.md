# History. Taylor Otwell created 
    laravel 1st beta version supported Auth,etc
    24 nov 2011 l 2 => mvc

5.5 2017 aug => php 7 auto dis.


Version	Released on
-------------------------------------------------------------------------------------

    Laravel 1	June 9, 2011
    Laravel 2	November 24, 2011
    Laravel 3	February 22, 2012
    Laravel 4	May 28, 2013
    Laravel 5	February 2015
    Laravel 5.1	June 2015
    Laravel 5.2	December 2015
    Laravel 5.3	August 23, 2016
    Laravel 5.4	January 24, 2017
    Laravel 6	September 3, 2019
    Laravel 7	March 3, 2020
    Laravel 8	September 8, 2020

* link=> 
        https://www.w3schools.in/laravel-tutorial/history/
-------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------

# 23-7-2021
* HTTP Methods:
    1st=> Get
    2nd=> Post
    3rd=> Put	
    4th => Delete

# view : Always used get method 

# if you type in CMd :
      php artisan 
      
      for making Controler:
      php artisan make:controller name

* then you can see all cmds 
* in This session we have learn in App\Http\Controllers folder we declare two method 
   
            public function showForm()
             {
    	    return view('signup');
                 }
            public function addUser(Request $y){
    	    // dd($y->name);
    	    dd("Student Name is :".$y->name,"Student class is :".$y->class,"Student age is :".$y->age,"Student email is :". $y->email);
            }
* In View folder  we created form:
                
                <!DOCTYPE html>
                <html>
                <head>
                <title>Sign up</title>
                </head>
                <body>
                <h1><a href="{{url('/about')}}" style="text-decoration: none"> About us</a></h1>
                <table>
                <!-- <form action="{{ url('/create-user') }}" method="get"> -->
                <form action="{{ url('/user-detail') }}" method="post">
                @csrf
                <tr><td>	
                Student name:<br></td><td>
                <input type="text" name="name"><br>
                </td></tr>
                <tr><td>
                Class:<br></td><td>
                <input type="text" name="class"><br>
                </td></tr>
                <tr><td>
                Student age:<br></td><td>
                <input type="text" name="age" maxlength="2"><br>
                </td></tr>
                <tr><td>
                email:<br></td><td>
                <input type="text" name="email" /><br>
                </td></tr>
                <tr><td>
                Password:<br></td><td>
                <input type="password" name="password"><br>
                </td></tr>
                <tr><td>
                Submit:<br></td><td>
                <input type="submit" name="submit"><br>
                </td></tr>
                </form>
                </table>
                </body>
                </html>
* In Routes folder: we define 3 diff methods:
        
1.  import this : 
        
        use App\Http\Controllers\SignupController;
2.  
        Route::view('/about', 'about');  //static 
        Route::get('/sign-up', [SignupController::class,'showForm'] );


        Route::post('/user-detail', [SignupController::class, 'addUser'] );
        // Route::get('/create-user', [SignupController::class, 'addUser'] );
-------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------
# 26-7-2021
1. Required:

        Route::get('/test/{name}/{age}',[SignupController::class,'myfun']);

# Function will be same 

         public function myfun($name= 'Aman',$age=29){
        // dd($name , $age);
        return "Hello :". $name. " " .$age;
                                                    }

2. Optional URL:

        public function myfun($name= 'Aman',$age=29){
                // dd($name , $age);
                return "Hello :". $name. " " .$age;
            }

#  In Routes folder add this below:
    
        Route::get('/test/{name?}/{age?}',[SignupController::class,'myfun']);

* Make a controler by below CMD:
        
            php artisan make:controller verifier

* import: use App\Http\Controllers\SignupController;
* Then open controler file or  add this code:

        public function myfun($name= 'Aman',$age=29){
        // dd($name , $age);
        return "Hello :". $name. " " .$age;
                                                    }



# 27 Today i have learn these topics:
* How to create Groups
* Routes and middleware:
* how to create resource
* How to define middleware in controller ny constructor
* Practical cmds:

* 1. Recap:

* set parameter

        echo route('test',['name'=>'aman', 'age'=>29]);
in form site i used this below code :

        <a href="{{ route('test',['name'=>'aman', 'age'=>29]) }}">Link</a>
 
* in controller site  i used this :

        public function showForm()
        {
        echo route('test',['name'=>'aman', 'age'=>29]);
            }

        To view list:
            php artisan route:list
        Make resource Controller:
            php artisan make:controller PostController --resource
 name shoul be define in routes:   like this ->name('test');
 * for practical i created mylink.php file check it 

------------------------------------------------------------------------------------
------------------------------------------------------------------------------------
2. Routes and middleware:
* How to create Groups:
1. 

        Route::middleware('checkUser')->group( function(){
            //
        });
2. 

        Route::group(['middleware'=>'checkUser', 'prefix'=>'abc'],function(){
        Route::get('/sign-up', [SignupController::class,'showForm']);
            });


* Open web. php add this below example method 

3.           
            Route::name('users.')->group( function() {
                Route::get('/sign-up', [SignupController::class,'showForm']);
                Route::view('about', 'about')->name('about');  
            });

----------------------------------------------------------------------------------


3. How to Make resource Controller use this cmd:

                php artisan make:controller PostController --resource
* when in created this resource controller then 

* 1. Created  new file in  view by name create_post.balde.php then define in $this under create like this 
* bellow is resource  controller code:

                public function create()
                {
            //  i redirected to this file  
                    return view('create_post');
                    }

* 2. In web.php i typed this line:

        Route::resource('posts', PostController::class); 

* 3. i created a page in view  this file 

        create_post.blade 
----------------------------------------------------------------------------------

4.  New method to define middle ware in controller by  constructor if you use 

 
            public function __construct()
                {
                    $this->middleware('checkUser')->only(['addUser']);
                }                                                                    
 
* this will be apply for all below functions in you use ->only(['addUser']) this will be appply for selected.

----------------------------------------------------------------------------------
----------------------------------------------------------------------------------
# 28 7 21 
* 1st topic used in database controller to view

1. 
        //in controller 
        $data = ['name' => 'aman', 'age' => 39];
        // 1st method 
            // return view('signup',$data);
        //2nd method we can use array
        // return view('signup')->with('name','deep'); //deep is value
        //3rd method
        $name = 'abc';
        $age = 29;
        in compact we can use multiple variable
        return view('signup', compact('data','name','age'));
2. 
        
            in  view 
            {{ $name='Aman'}}  
            {{ $data['name'] }} <br>
            {{ $data['age'] }} <br>
            {{ $age }}                                                   

* 2nd topic 
        
        <!DOCTYPE html>
        <html>
        <head>
        <title></title>
        </head>
        <body>
        <h1>Header </h1> 
        
        @include('layouts.header')
        <h3>Contact us </h3>
        <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        @include('layouts.fotter')

        <h1>Fotter</h1>
        </body>
        </html>
* 3rd is  views syntax

        {{ $name='Aman'}}<br>
        <ul>
        @for( $i=1;$i<5; $i++)
        <li>{{"$i My Name is ".$name }}</li>
        @endfor

        </ul>
        @if($name=="aman") 
        {{ 'true'}}
        @else 
        {{ "false"}}
        @endif
        <br>
        @env('APP_NAME')
        @endenv
        @for($i=0; $i<=5; $i++)
        {{"value ".$i }}<br>
        @endfor

        <script>
        var name = '{{ $name }}';
        alert(name);
        </script>

----------------------------------------------------------------------------------
----------------------------------------------------------------------------------
# My Practical code 
* 1. Form  code


        <!DOCTYPE HTML>  
        <html>
        <head>
        <style>
        .error {color: #FF0000;}
        .green{color: green;}
        </style>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        </head>
        <body> 
        <div class="container">
        <div class="col-md-8">
        <h2>PHP Form Validation Example</h2>
        <p><span class="error">* required field</span></p>
        <form method="post" action="{{ url('/output')}}">  
        @csrf
        Name: <input type="text" name="name">
        <br><br>
        E-mail: <input type="text" name="email">
        <br><br>
        Website: <input type="URL" name="website">
        <br><br>
        Comment:<span class="green">*</span><br>
        <textarea name="comment" rows="5" 
        cols="40"></textarea>
        <br><br>
        Gender:
        <input type="radio" name="gender" value="female">Female
        <input type="radio" name="gender" value="male">Male
        <br><br>
        @if(session('sucess'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{session('sucess')}}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endif
        <input type="reset" name="reset" value="Reset"><br><br>
        <input type="submit" name="submit" value="Submit">  
        </form>
        </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        </body>
        </html> 

* 2.  Make route "{{ url('/output')}}" with controller 

* 3.  route code   
            
            qRoute::post('/output', [SignupController::class,'get_input']);

* 4. controller code :

        public function get_input(Request $request){
        // $data =[$request->name, $request->email];
        // return $data;
        print_r("<h2> Name : ".$request->name. "</h2><br>").
        print_r("<h2> Email : ".$request->email. "</h2><br>").
        print_r("<h2> Website : ".$request->website. "</h2><br>").
        print_r("<h2> Comment : ".$request->comment. "</h2><br>").
        print_r("<h2> Gender : ".$request->gender. "</h2><br>");
        die;
        }
 
5. IMG:



# 29-7-21
* In this session i have learn about laravel template inheritance concept 
* 1. Create master file with below code 


        <!DOCTYPE html>
        <html>
        <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title') - Website</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <style type="text/css">
        .mystyle{
        background-color: black;
        font-size: 20px;
        color: white;
        font-weight: bolder;
        }
        li{
        display: inline;
        margin-left: 10px;
        margin-right: 65px;
        box-sizing: border-box;
        }
        a{
        text-decoration: none;
        color: white;
        }
        a:hover{
        color: lightgray;
        text-decoration: none;
        }
        body{
        background-color: lightgray;
        }
        </style>
        </head>
        <body>
        @yield('navbar')  
        <!-- @section('navbar') -->
        <div class="container">
        <!-- Navbar start  -->
        <nav class=" navbar-expand-lg  navbar navbar-dark mystyle sticky-top">
        <a class="navbar-brand" href="{{url ('/gallery')}}"><i class="fa fa-apple col-5" style="font-size:30px;color:white;"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item" >
        <a href="{{ route('mac')}}">Mac</a>
        </li>
        <li class="nav-item">
        <a href="">ipad</a>
        </li>
        <li class="nav-item">
        <a href="https://localhost/phpmyadmin/" target="_blank">PHP Admin</a>
        <!--    </li>
        <li class="nav-item">
        <a href="">TV</a>
        </li> -->
        <li class="nav-item">
        <a href="{{route('dbstore')}}">Data base</a>
        </li>
        <li class="nav-item">
        <a href="{{route('contact_us')}}">Contact us</a>
        </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        </form>
        </div>
        </nav>
        @section('subtitle')
        <center><h4>Welcome </h4></center>
        @show
        @yield('para')

        @if(Request::is('gallery'))
        <center><h1>laravel</h1></center>
        <div class="row">
        <div class="col ">
        <h2>Laravel 8</h2>
        <p>
        Laravel 8 continues the improvements made in Laravel 7.x by introducing Laravel Jetstream, model factory classes, migration squashing, job batching, improved rate limiting, queue improvements, dynamic Blade components, Tailwind pagination views, time testing helpers, improvements to artisan serve, event listener improvements, and a variety of other bug fixes and usability improvements..</p>
        </div>
        <div class="col ">
        <h2>Laravel Jetstream</h2>
        <p> 
        Laravel Jetstream was written by Taylor Otwell. 
        Laravel Jetstream is a beautifully designed application scaffolding for Laravel. Jetstream provides the perfect starting point for your next project and includes login, registration, email verification, two-factor authentication, session management, API support via Laravel Sanctum, and optional team management. Laravel Jetstream replaces and improves upon the legacy authentication UI scaffolding available for previous versions of Laravel.</p>
        </div>
        </div>
        @endif
        @if(!Request::is('database'))

        <div class="jumbotron jumbotron-fluid bg-gray">
        <div class="container">
        <center>
        <a class="navbar-brand" href="{{url ('/gallery')}}"><i class="fa fa-apple col-5" style="font-size:30px;color:black;"></i></a></center>
        <center> <h1 class="display-4">
        Footer section </h1></center>
        <p class="lead">
        <div class="row">
        <div class="col" ><h2><a href="{{ route('mac')}}" style="color: blue;"> Mac</a></h2></div>
        <div class="col"><h2><a href="" style="color: blue;"> ipad</a></h2></div>
        <div class="col"><h2><a href="" style="color: blue;"> iphone</a></h2></div>
        <div class="col"><h2><a href="{{route('contact_us')}}" style="color: blue;"> Contact us</a></h2></div>
        </div>
        </p>
        </div>
        <center>
        <p>Copyright &copy; 2021 The Golden Roast.</p></center>
        </div>
        @endif
        @yield('newtext')
        <!-- containter end -->
        @show
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        <script type="text/javascript">
        </script>
        </body>
        </html>

2. Child code 

        @extends('layouts.master')
        @section('title', 'Mac')
        @section('navbar')
        @section('subtitle')

        @parent
        <center>
        <h1>Mac</h1></center>
        <table class="table">
        <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        </tr>
        <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        </tr>
        <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
        </tr>
        </tbody>
        </table>

        <!-- media -->
        <ul class="list-unstyled">
        <li class="media">
        <img src="https://source.unsplash.com/100x100/?Laravel,laravel" class="mr-3" alt="...">
        <div class="media-body">
        <h5 class="mt-0 mb-1">Why Laravel?</h5>
        <p>There are a variety of tools and frameworks available to you when building a web application. However, we believe Laravel is the best choice for building modern, full-stack web applications.</p>
        </div>
        </li>
        <li class="media my-4">
        <img src="https://source.unsplash.com/100x100/?Environment,engineer" class="mr-3" alt="...">
        <div class="media-body">
        <h5 class="mt-0 mb-1">Environment Configuration</h5>
        <p>
        It is often helpful to have different configuration values based on the environment where the application is running. For example, you may wish to use a different cache driver locally than you do on your production server.</p>
        </div>
        </li>
        <li class="media">
        <img src="https://source.unsplash.com/100x100/?read,write" class="mr-3" alt="...">
        <div class="media-body">
        <h5 class="mt-0 mb-1">Read & Write Connections</h5>
        <p>
        Sometimes you may wish to use one database connection for SELECT statements, and another for INSERT, UPDATE, and DELETE statements. Laravel makes this a breeze, and the proper connections will always be used whether you are using raw queries, the query builder, or the Eloquent ORM.</p>
        </div>
        </li>
        </ul>
        <!-- end media  -->

        @section('para')
        @endsection
        @endsection
        @section('newtext')
        @stop

--------------------------------------------------------------------------------------------------------------------------------------------------------------------

# 30-7-21 

* Darabase concept :

* 1. Query builder 

* 2. Eloquent ORM

* 3. Make database with table student 

* 4. Add db name in env file 

# Practical code :

* Make model with 
        
        php artisan make:model Post
* Roule Model file name shoulb be capital
* if you have other new table  example use below code


        protected $table = 'student';
        // protected $primarKey = 'id';
        protected $fillable = [
        'Name',
        'Email',
        'Roll', 
        'Phone', 
        ];
* can copy from user model file

2. Make controller 
* Add this imoprt path 

            use App\Models\Post;
            use DB; // used for query builder 
3.  controller DB code :
* Query builder 

        public function db_add(Request $request){
        // Post::insert([
        //          'Name' => $request->name,
        //          'Email' => $request->email,
        //          'Roll' => $request->number,
        //          'Phone' => $request->phone
        //      ]);
        // $result =

* Eloquent ORM

        DB::table('student')->insert([
        'Name' => $request->name,
        'Email' => $request->email,
        'Roll' => $request->number,
        'Phone' => $request->phone
        ]);
        return redirect()->back()->with('sucess', 'Data inserted sucessfull');
        }
 4. Make two routes :
* import this two files 1st :

        use App\Http\Controllers\PostController;
        use App\Http\Controllers\dbpost;

        Route::get('/database', function () {
            return view('db_store');
        })->name('dbstore');

        Route::post('/store',[dbpost::class,'db_add'])->middleware('empty_input')->name('store');

* Can use middleware: 
 
            if($request->get('name')=="")
            // echo "<h1>Condition is true</h1>";
            return redirect('/database')->with('error', 'Please enter full detail');
        else
            return $next($request);
# ------------------  end this session  ------------------------------- 
--------------------------------------------------------------------------------------------------------------------------------------------------------------------

