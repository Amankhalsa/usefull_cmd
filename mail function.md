       
       
       Mail::send('email',
        array(
            'name' => $this->name,
            'email' => $this->email,
            'location' => $this->location,
            'phone' => $this->phone ,
            'current_industry' => $this->current_industry ,
            'current_function' => $this->current_function ,
            'resume' => 'file is pending ' ,

            ),
            function($message){
            $message->from($this->email);
            $message->to('amansin31@gmail.com', $this->name)->subject('Your Site Contect Form');
          
          
            }
        );
==================================== Mail Function with file attachment ===============================

// ======================= mail function  ================
              $data["name"] = $this->name;
              $data["email"] = $this->email;
              $data["location"] =$this->location;
              $data["phone"] =  $this->phone ;
              $data["current_industry"] =  $this->current_industry;
              $data["current_function"] = $this->current_function;
              $data["resume"] =$fileName;

              $files = [
                  storage_path("app/public/resume/".$data["resume"]),

              ];
       Mail::send('email', $data, function($message)use($data, $files) {
           $message->to($data["email"], $data["email"])
                   ->subject($data["name"]);
           foreach ($files as $file){
               $message->attach($file);
           }

       });

        // dd('Mail sent successfully');
// ======================= mail end ================
