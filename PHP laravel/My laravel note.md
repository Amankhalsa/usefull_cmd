# History. Taylor Otwell created 
    laravel 1st beta version supported Auth,etc
    24 nov 2011 l 2 => mvc

5.5 2017 aug => php 7 auto dis.


Version	Released on
============================
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
        
        1st import this : 
        use App\Http\Controllers\SignupController;
        2nd:
        Route::view('/about', 'about');  //static 
        Route::get('/sign-up', [SignupController::class,'showForm'] );


        Route::post('/user-detail', [SignupController::class, 'addUser'] );
        // Route::get('/create-user', [SignupController::class, 'addUser'] );


# 26-7-2021
        * Required:

        Route::get('/test/{name}/{age}',[SignupController::class,'myfun']);

# Function will be same 

         public function myfun($name= 'Aman',$age=29){
        // dd($name , $age);
        return "Hello :". $name. " " .$age;
                                                    }

    * Optional URL:

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
