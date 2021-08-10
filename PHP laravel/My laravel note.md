# History. Taylor Otwell created 
    laravel 1st beta version supported Auth,etc
    24 nov 2011 l 2 => mvc

5.5 2017 aug => php 7 auto dis.


Version	Released on
----------------------------------------------------------------------------

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
----------------------------------------------------------------------------
----------------------------------------------------------------------------

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
----------------------------------------------------------------------------
----------------------------------------------------------------------------
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

----------------------------------------------------------------------------
----------------------------------------------------------------------------
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

----------------------------------------------------------------------------


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
----------------------------------------------------------------------------

4.  New method to define middle ware in controller by  constructor if you use 

 
            public function __construct()
                {
                    $this->middleware('checkUser')->only(['addUser']);
                }                                                                    
 
* this will be apply for all below functions in you use ->only(['addUser']) this will be appply for selected.

----------------------------------------------------------------------------
----------------------------------------------------------------------------
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

----------------------------------------------------------------------------
----------------------------------------------------------------------------
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
# Student DB CRUD Operation:

# =============== Student Crud Start ===============
# Student CRUD Routes example code: 

// update page showing by this 

        Route::get('/mac', [dbpost::class,'mac_view'])->name('view_data');

        Route::post('/store',[dbpost::class,'db_add'])->middleware('empty_input')->name('store');
//showing data in option del 
    
    Route::get('/updatedata/{id}', [dbpost::class,'aman_view'])->name('Updata2');

    Route::post('/my_del', [dbpost::class,'my_del'])->name('my_del');

    Route::post('/data_updated', [dbpost::class,'edited'])->name('new_up');

    Route::post('/deleted', [dbpost::class,'sam_del'])->name('sammy_dell');
* ========================= Student Crud End =========================


# Student CRUD Controller example code;
* 1 view page controller code :

        public  function mac_view(){
        //ORM method 
        $get_data = Student::all();
        return view('/mac',compact('get_data'));
        }

* 2 Data store method by request

        public function db_add(Request $request){
        Student::insert([
        'Name' => $request->name,
        'Email' => $request->email,
        'Roll' => $request->number,
        'Phone' => $request->phone
        ]);
        // $result = 
      
        //Query builder method to insert data in DB
        //   DB::table('student')->insert([
        //        'Name' => $request->name,
        //     'Email' => $request->email,
        //     'Roll' => $request->number,
        //     'Phone' => $request->phone
        // ]);
        return redirect()->route('view_data')->with('sucess', 'Data inserted sucessfull');                                                                                              }

* 3 Edit code :

        public function edited(Request $request){
        Student::where('id', $request->id)->update([
        'Name' => $request->name,
        'Roll' => $request->number,
        'Phone' => $request->phone
        ]);
        return redirect()->route('view_data')->with('update', 'Data Updated sucessfull');
        }
* fill data in update page :

        public function aman_view($id){
            $get_show  = Student::findOrFail($id);
            return view('update',compact('get_show'));
        }
* 4 Delete method 

        public function sam_del(Request $request){
        Student::where('id', $request->id)->delete();
        return redirect()->back()->with('update', 'Data Deleted sucessfull');
        }


# Student CRUD View Page example code in blade.php format 
* 1st table data

        <center>
        <h1>View Data</h1></center>
        <b style="float: left;">Total Students:
        <span class="badge badge-danger">{{count($get_data)}} </span></b><br><br>
        @if(session('update'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>{{session('update')}}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endif
        
        <table class="table">
        <thead>
        <tr class="bg-dark text-white">
        <th scope="col">Sl no</th>
        <th scope="col">Roll no</th>
        <th scope="col">Student name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
        </tr>
        </thead>

        <tbody>
        @foreach( $get_data as $seen_data)
        <tr>
        <th>{{ $loop->index+1}}</th>
        <th scope="row">{{$seen_data->Roll}}</th>
        <td class="text-success font-weight-bold">{{ucwords($seen_data->Name)}}</td>
        <td class="text-primary font-weight-bold">{{$seen_data->Email}}</td>
        <td class="font-weight-bold">{{$seen_data->Phone}}</td>
        <td class="font-weight-bold">
        {{Carbon\Carbon::parse($seen_data->created_at)->diffForHumans()}}
        </td>
        <td class="font-weight-bold">
        {{Carbon\Carbon::parse($seen_data->updated_at)->diffForHumans()}}
        </td>
        <td class="font-weight-bold"> 
        <center>
        <a href="{{route('Updata2',$seen_data->id)}}" onclick="alert('Do You want to edit');"> <span class="btn btn-info">Edit</span></a>
        </center></td>
        <td class="font-weight-bold ">
        <form method="post" action="{{ route('sammy_dell')}}" onsubmit="confirm('Do You want to Delete');">
        @csrf
        <input type="hidden" value="{{ $seen_data->id}}" name="id">
        <input type="Submit" name="Delete" class=" btn btn-danger" value="Delete">
        </form>
        </td>
        <!-- ->diffForHumans() -->
        </tr>
        @endforeach
        </tbody>
        </table>


# 2nd update page example code:

        <div class="container">
        <div class="row">
        <div class="col ">
        <h3>Data update section:</h3>
        <form method="post" action="{{route('new_up')}}">
        @csrf
        <input type="hidden" value="{{ $get_show->id}}" name="id">
        <div class="row">
        <div class="col border border-dark ">
        <label for="name"> Student Name:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" value="{{ $get_show->Name}}">
        <label for="name"> Roll No:</label>
        <input type="text" class="form-control" id="id_number" name="number" placeholder="Enter your Roll no 0-99" maxlength="2" value="{{ $get_show->Roll}}">
        <label for="Email">Email Id:</label>
        <input type="Email" class="form-control bg-warning" id="" name="email" placeholder="Enter 10 digits  Phone Number " maxlength="10" value="{{ $get_show->Email}}" disabled="">   
        <label for="phone">Phone Number:</label>
        <input type="phone" class="form-control" id="phone" name="phone" placeholder="Enter 10 digits  Phone Number " maxlength="10" value="{{ $get_show->Phone}}">
        <!-- alert -->
        @if(session('error'))
        <div class="alert alert-danger  alert-dismissible fade show" id="alert-success" role="alert">
        <strong>{{session('error')}}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div> 
        @endif
        <!-- end alert -->
        <br>
        Submit:        <button class="btn btn-primary" type="submit">Submit</button>
        </div>
        </div>   
        </form><br>
        <!-- end 1st fom -->
        </div>
        </div>
        </div>

# 3rd view student crud  store DB

        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('sucess')}}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endif

        <h1 class="text-center">DB Store</h1>
        <form method="post" action="{{url('/store')}}"><
        @csrf

        <div class="row">
        <div class="col">
        <!-- <div class="form-group"> -->
        <label for="name"> Student Name:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name">
        <!-- </div> -->


        <!-- <div class="form-group"> -->
        <label for="email">Email address:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email">
        </div>
        <div class="col">
        <!-- </div> -->
        <!-- <div class="form-group"> -->
        <label for="name"> Roll No:</label>
        <input type="text" class="form-control" id="id_number" name="number" placeholder="Enter your Roll no 0-99" maxlength="2">


        <!-- </div> -->
        <!-- <div class="form-group"> -->
        <label for="phone">Phone Number:</label>
        <input type="phone" class="form-control" id="phone" name="phone" placeholder="Enter 10 digits  Phone Number " maxlength="10">
        <!-- </div> -->
        </div>
        <!-- <div class="col"> -->


        <!-- <div class="form-group"> -->
        <!--  <label for="desc">Tell me about what you want to contact me for...</label>
        <textarea class="form-control" id="desc" rows="3" name="desc"></textarea> -->
        <!-- </div> -->


        </div>     
        @if(session('error'))
        <div class="alert alert-danger  alert-dismissible fade show" id="alert-success" role="alert">
        <strong>{{session('error')}}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endif
        <br>
        <button class="btn btn-primary" type="submit">Submit</button>
        </form>
# ==============Student DB CRUD End ==============
---------------------------------------------------------------------------------
---------------------------------------------------------------------------------
# Crud Opeation for post description in data base

//=====================post DB methods start here for DB con===================
* 1 featch Controller  method 

        public function post_fm(){    
        $Post_data = Post::all();
        return view('post_form',compact('Post_data'));
        }

*  2 insert Controller method

        public function db_post_store( Request $request){
        Post::insert([
        'title'=>$request->title,
        'description'=>$request->description
        ]);
        return redirect()->back()->with('postdata', 'Post data inserted sucessfull');
        }

* 3 Update Controller method 
  
        public function post_edit(Request $req){
        Post::where('id', $req->id)->update([
                'title'=> $req->title,
                'description' => $req->description
        ]);
        return redirect()->route('post_myfom')->with('update', 'Data Updated sucessfull');
        }
* 4 Fill data  Controller method 

        public function db_fill($id){
        $post_fill= Post::findOrFail($id);
        return view('post_update',compact('post_fill'));
        }



* 5 Delete Controller method 

        public function db_delet(Request $request){
        Post::where('id', $request->id)->delete();
        return redirect()->back()->with('update', 'Data Deleted sucessfull');
        }
//=====================post methods end =======================
# web Routes for Post description DB
// ===========================Start Post routes ===========================
    
    Route::get('/post_form', [dbpost::class,'post_fm'])->name('post_myfom');

//DB post for add in data base entry :
    
    Route::post('/dbpost', [dbpost::class,'db_post_store'])->name('db_post');

//Db update : 
    
    Route::get('/updating/{id}', [dbpost::class,'db_fill'])->name('db_up_data');

//Db edit :
    
    Route::post('/db_edit', [dbpost::class,'post_edit'])->name('dbedit');

//delete method :
    
    Route::post('/db_deleted', [dbpost::class,'db_delet'])->name('db_dell');
// ===========================end Post routes ===========================

# For View  required files and code :
1.  Featch And store  data code 
        
        @extends('layouts.master')
        @section('title', 'Post')
        @section('subtitle')

        <div class=container>
        <h1>Post Description Page:</h1>
        <b style="float: right;">
        Total:
        <span class="badge badge-danger">
        {{count($Post_data)}}
        </span>
        </b>
        <br>
        @if(session('update'))
        <div class="alert alert-primary  alert-dismissible fade show" id="alert-success" role="alert">
        <strong>{{session('update')}}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div> 
        @endif

        <form method="post" action="{{route('db_post')}}">
        @csrf
        
        <input type="hidden" value="" name="id">
        
        <div class="row">
        <div class="col ">
        <label for="name"> Title :</label>
        <input type="text" class="form-control" id="name" name="title" placeholder="Enter Title Name" value="">
        <label for="name">Desctiptions:</label>
        <input type="text" class="form-control" id="id_number" name="description" placeholder="Enter your Discriptions"  value="">

        <!-- alert -->
        @if(session('error'))
        <div class="alert alert-danger  alert-dismissible fade show" id="alert-success" role="alert">
        <strong>{{session('error')}}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div> 
        @endif
        <!-- end alert -->
        
        <br>
        Submit:        <button class="btn btn-primary" type="submit">Submit</button>
        </div>
        </div>   
        </form>
        <!-- table -->
        <table class="table table-striped">
        <thead>
        <tr class="bg-dark text-white">
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Desription</th>
        <th scope="col">Created at </th>
        <th scope="col">Updated  at </th>
        <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($Post_data as $get_data)
        <tr>
        <th scope="row">{{$get_data->id}}</th>
        <td class="text-danger font-weight-bold">{{ucwords($get_data->title)}}</td>
        <td class="font-weight-bold">{{ucwords($get_data->description)}}</td>
        <td class="font-weight-bold">{{Carbon\Carbon::parse($get_data->created_at)->diffForHumans()}}</td>
        <td class="font-weight-bold">{{Carbon\Carbon::parse($get_data->updated_at)->diffForHumans()}}</td>
        <td >
        <span class="btn btn-info">
        <a href="{{route('db_up_data',$get_data->id)}}" class="font-weight-bold">Edit</a>
        </span>
        <span class="btn">
        <form method="post" action="{{route('db_dell')}}" onsubmit="confirm('Do You want to Delete');">
        @csrf
        <input type="hidden" value="{{$get_data->id}}" name="id" >
        <input type="Submit" name="Delete" class=" btn btn-danger font-weight-bold" value="Delete">
        </form>
        </span>
        </td>
        </tr>
        @endforeach
        </tbody>
        </table>
        <!-- table end -->
        </div>
        @endsection

# For Delete we used in view page:

    <form method="post" action="{{route('db_dell')}}" onsubmit="confirm('Do You want to Delete');">
    @csrf
    <input type="hidden" value="{{$get_data->id}}" name="id" >
    <input type="Submit" name="Delete" class=" btn btn-danger font-weight-bold" value="Delete">
    </form>

# data update page for Post DB action 
    @extends('layouts.master')
    @section('title', 'Updating')
    @section('subtitle')

    <div class=container>
    <div><h2>Data Updating section</h2></div>
    @if(session('postdata'))
    <div class="alert alert-success  alert-dismissible fade show" id="alert-success" role="alert">
    <strong>{{session('postdata')}}</strong> 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div> 

    @endif
    <form method="post" action="{{ route('dbedit')}}">
    @csrf
    <input type="hidden" value="{{ $post_fill->id}}" name="id">
    <div class="row">
    <div class="col ">
    <label for="name"> Title :</label>
    <input type="text" class="form-control" name="title" placeholder="Enter Title Name" value="{{$post_fill->title}}">
    <label for="name">Desctiptions:</label>
    <input type="text" class="form-control" name="description" placeholder="Enter your Discriptions"  value="{{$post_fill->description}}">
    <br>
    Submit:<button class="btn btn-primary" type="submit">Submit</button>
    </div>
    </div>   
    </form>
    </div>
    @endsection
# ==== END Crud Opeation for post description in data base ==== 
---------------------------------------------------------------------------------
---------------------------------------------------------------------------------
# ====  Query builder relation method for join table ==== 
    //Controller code
    public function qbRelation()
    {
    # code...
    $data = DB::table('students')
    ->join('courses','students.id','=','courses.student_id')
    //  ->join('attendances', ' students.id', '=', 'attendances.student_id')
    ->where('students.id',6)
    ->get();
    return view('cources',compact('data'));
    }

# Route code:
        Route::get('/qb_relation', [dbpost::class,'qbRelation'])->name('qb_rel');
# View Code:

    @foreach($data as $get_data)
    <tr>
      <td scope="row"> {{ $loop->index+1 }}</td>
      <td class="text-danger font-weight-bold">
        {{ $get_data->course_name }}
       </td>
    </tr>                                                                         @endforeach
# Query builder join and register example code 

    public function qbRelation()
    {
    # code...
    $data = DB::table('students')
    ->join('courses','students.id','=','courses.student_id')
    //  ->join('attendances', ' students.id', '=', 'attendances.student_id')
    // ->where('students.id')
    ->select('courses.*','students.Name')
    ->get();
    return view('cources',compact('data'));
    }
    public function co_reg($id){
    $reg_fill= Student::findOrFail($id);
    return view('course_reg',compact('reg_fill'));
    }
    public function course_reg(Request $request){
    DB::table('courses')
    ->join('courses','students.id','=','courses.student_id')->insert([
    'student_id' => $request->id,
    'course_name' => $request->course
    ]);
    return redirect()->route('qb_rel')->with('update', 'Course inserted sucessfull');
    }

# Routes 

    Route::get('/qb_relation', [dbpost::class,'qbRelation'])->name('qb_rel');
    //Register 
    Route::get('/Register/{id}', [dbpost::class,'co_reg'])->name('co_reg');
    Route::post('/reg_stration',[dbpost::class,'course_reg'])->name('rg_in');



# ORM Topics:
    table student -> table course //relationship - function
    //qb join query

* ========================== Start relations ==============================

# Types of relations   date 5-8-21

# 1. One to One 
            
            use Illuminate\Database\Eloquent\Model;
            use App\Models\Course;
* 1st Open parent Model class add this code 

        public function course()
        {
            return $this->hasOne(Course::class,); // one to one
        }
* 2nd Controller code is :

public function course_add($sid){

        $data = Student::find($sid)->course;
        return $data;
        }
* 3rd Route code 

        Route::get('/course_add/{id}', [dbpost::class,'course_add'])->name('Course_add');
* ========================================================

# 2. Inverse One to one
* Import this-> 
* This willbe used in child model class, used for  child to parent relation 
        use App\Models\Students;

            public function student()
            {
                return $this->belongsTo(Student::class);
                //for child to paresnt relationship  (inverse relation)
            }
 
* Controller code 

        public function chd_to_pr($id){
            $data = Course::find($id)->student;
            return $data;
        }
* 3rd Route code 

        Route::get('/child_to_p/{id}', [dbpost::class,'chd_to_pr'])->name('inverse_rel');
* ========================================================

#  3. One to Many
* 1st mode class method name 

        public function courses()
        {
            return $this->hasMany(Course::class); // one to many
        }
* 2nd Controller example code:

        public function course_many($sid){
        $data = Student::find($sid)->courses;
        return $data;
        }
* 3rd Route example code 

        Route::get('/course_add_many/{id}', [dbpost::class,'course_many'])->name('Course_add');
* =======================================================

# my View page practical code:

* if you want to access student name from student table in course table 
* in this way we will use child to parent method 
       
        public function student()
        {
            return $this->belongsTo(Student::class);
            //for child to paresnt relationship  (inverse relation)
        }

* then in the route area 
 * //ORM 2 
        
        // view page ORM 1
        Route::get('/orm_rel_view', [dbpost::class,'orm_view'])->name('orm_rel');

* Controller code :

        public function orm_view(){
        $orm_get_data= Course::all();
        // dd($orm_get_data->first()->student);    
        return view('orm_relation',compact('orm_get_data'));
        }

* view area code:

        @foreach( $orm_get_data as $get_orm)
        <tr>
        <td scope="row" class="font-weight-bold"> {{$loop->index+1}} </td>
        <td scope="row" class="font-weight-bold"> {{$get_orm->student_id}} </td>
        <td scope="row" class="font-weight-bold">
        {{$get_orm->student->Name}}
        </td>
        <td scope="row" class="text-danger font-weight-bold">
        {{$get_orm->course_name}}
        </td>
        <td class="text-danger font-weight-bold">
        <button class="btn btn-warning">Button</button>
        <!--  <form method="post" action="" onsubmit="confirm('Do You want to Delete');">
        @csrf
        <input type="hidden" value="" name="id">
        <input type="Submit" name="Delete" class=" btn btn-danger" value="Delete">
        </form> -->
        </td>
        @endforeach
        </tr>

# in view area if you 
* want to combine subject name in single ID 
* you need same route and controller method will we change with view area code 

* 1st controller code 

        public function orm_view2(){
        $orm_get_= Student::all();
        // dd($orm_get_data->first()->student);    
        return view('orm_relation2',compact('orm_get_'));
        }
* 2nd route code:

        //ORM 2 
        Route::get('/orm_rel_', [dbpost::class,'orm_view2'])->name('orm');

* 3rd model classs code :

        public function student()
        {
        return $this->belongsTo(Student::class);
        //for child to paresnt relationship  (inverse relation)
        }
* 4th view page code with two loop

        @foreach( $orm_get_ as $get_orm)
        <tr>
        <td scope="row" class="font-weight-bold"> {{$loop->index+1}} </td>
        <td scope="row" class="font-weight-bold"> {{$get_orm->id}} </td>
        <td scope="row" class="font-weight-bold">
        {{$get_orm->Name}}
        </td>
       
        <td scope="row" class="text-danger font-weight-bold">
        @foreach($get_orm->courses as $course)
        {{ $course->course_name }}
        @endforeach
        </td>

        <td class="text-danger font-weight-bold">
        <button class="btn btn-warning">Button</button>
        <!--  <form method="post" action="" onsubmit="confirm('Do You want to Delete');">
        @csrf
        <input type="hidden" value="" name="id">
        <input type="Submit" name="Delete" class=" btn btn-danger" value="Delete">
        </form> -->
        </td>
        @endforeach
        </tr>


#  4. Many to Many
* model class code 

# 1st create Role model class then add below code:

        public function users()
        {
        return $this->belongsToMany(User::class, 'users_role');
        }

* use previous User model class with same table name 

        public function roles()
        {
        return $this->belongsToMany(Role::class, 'users_role');
        }                                                                      

# 2nd controller code:

        public function user_role(){
        //    $user = User::find(1);
        $role = Role::find(1);
        //return $user->roles; //->first()->name;
        return $role->users;
        }
 
# 3rd Route example code :

        // many to many route 
        Route::get('/roles', [dbpost::class,'user_role'])->name('userrole');  

# end many to many ORM method for assign role Principal teacher student 
# ======= end many to many ORM ==========


# Validation topic:
* 1st we need controller 
* 2nd view page form 

* in contoller side we need this below code:

        // ORM way to insert data by request 
        public function db_add(Request $request){
      
        $request->validate( [
        'name' => 'required|max:100',
        'email' => 'required|email',
        'phone' => 'required|digits:10',
        'number' => 'required|integer'],
      
        //for Custom message 
        [            'name.required' => 'name is neccessary']);
      
* 2nd Way  old method for check

        //$validator = Validator::make($request->all(), ['name' => 'required']);
        // if($validator->fails()) {
        //     return redirect()->back()->withErrors($validator);
        // }

# view page code :

        <div class="row">
           @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>

# for custom fields:

        @if($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span><br>
        @endif                                                                     
# 2nd way of validation with practical code:

        $validatedData = $request->validate([
        'brand_name' => 'required|unique:brands|min:4',
        'brand_image' => 'required|mimes:jpg,jpeg,png',
        ],
        [
        'brand_name.required' => 'Please input brand name',
        'brand_image.min' => 'Category longer then 4 characters',
        ]);

# with Message variable:

            @error('brand_name') 
    <span class="text-danger">{{ $message }} </span>
    @enderror 
---------------------------------------------------------------------------
---------------------------------------------------------------------------

# 10 -8-2021
* Import two class  Session & Cookie:

        use Session;
        use Cookie;
        class Storage extends Controller
        {
        public function setData()
        {
        // forever for 5 year
        // Cookie::queue(Cookie::forever('localFile', 'my name is aman'));
        // for One min 
        Cookie::queue('localFile', 'my name is aman',1);
        return 'done';
        }
        public function getData()
        {
        // cookie del
        Cookie::queue(Cookie::forget('localFile')); 
        // cookie get
        return Cookie::get('localFile', 'default value');
        }  

        //sesstion methods:
        public function set_Data(){
        $a = ['apple', 'banana', 'orange'];
        Session::put('my_data', $a);
        return 'done';
        }  
        public function get_Data(){
        Session::forget('my_data');
        dd(Session::has('my_data'));
        return Session::get('my_data', 'def v');
        // return 'my_data';
        } 

* 2nd Make diff diff reoutes to perform this actions 

        Route::get('/storage/cokies', [Storage::class,'setData']);

        Route::get('/get/cookies', [Storage::class,'getData']);

        Route::get('/session/set', [Storage::class,'set_Data']);

        Route::get('/session/get', [Storage::class,'get_Data']);