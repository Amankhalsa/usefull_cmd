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
-------------------------------------------------------------------------------------

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
* 3rd is  views 

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

