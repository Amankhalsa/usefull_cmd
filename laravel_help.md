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


        @php 
        $completed = DB::table('inquiries')->where('status','=' ,'1')->count();
        $total =DB::table('inquiries')->get()->count();
        $percent = $completed / $total * 100;
        @endphp


        @if($values->status == 1)

        <span class="badge badge-pill badge-success">Completed</span>
        @else
        <span class="badge badge-pill badge-danger">Pending</span>

        @endif

        eye 
        ----------

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
