# Active inactive status 
                           // active bid
                           Route::get('/active/{id}',[BidController::class, 'active_front_bid'])->name('active.front.bidpost');
                           // inactive bid
                           Route::get('/inactive/{id}',[BidController::class, 'inactive_front_bid'])->name('inactive.front.bidpost');

                           // ============================ Active bid poseted by Admin ==========================
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
<!-- =================================== -->
        
        PDF function 
             if($request->file('brochure')) 
            {
                $file = $request->file('brochure');
                $filename = time() . '.' . $request->file('brochure')->extension();
                $filePath = public_path() . '/upload/brochure/';
                $brochur_url= $file->move($filePath, $filename);
            }
         
         
         
         HTML entity 
                 {!!html_entity_decode($slider_img->description)!!}
          -----------------------------------------------------------
          For modal in frontend page 
          @php 
          $address = App\Models\Contact::first();
          @endphp
          ====================
        
        
        DB method 
        --------------
        @php 
        $get_inq = DB::table('inquiries')->get();
        $com_inq = DB::table('inquiries')->where('status','=' ,'1')->get();
        $rej_inq = DB::table('inquiries')->where('status','=' ,'2')->get();

        @endphp
          -----------------------------------------------------------

        @php 
        $completed = DB::table('inquiries')->where('status','=' ,'1')->count();
        $total =DB::table('inquiries')->get()->count();
        $percent = $completed / $total * 100;
        @endphp

          -----------------------------------------------------------
        @if($values->status == 1)

        <span class="badge badge-pill badge-success">Completed</span>
        @else
        <span class="badge badge-pill badge-danger">Pending</span>

        @endif

        eye 
               -----------------------------------------------------------

        @if($values->status ==1 )
        <button class="btn btn-light" style="margin-left: 5px;" type="submit" title="for Completed/Approved">
        <a href="{{route('pending.inquries',$values->id)}}">
        <i class=" fa fa-eye" style='font-size:20px;color:rgb(3, 99, 24)'> </i>
        </a>
        </button>
        @else
        <button class="btn btn-light" style="margin-left: 5px;" type="submit"  title="for Pending/Unapproved">
        <a href="{{route('complete.inquries',$values->id)}}">
        <i class=" fa fa-eye-slash" style='font-size:20px;color:red'> </i>
        </a>
        </button>
