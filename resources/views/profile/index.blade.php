@extends('layouts.main')

@section('content')
    
        <div class="row">
          <div class="col-12 col-sm-6 col-md-6">
             <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="{{route('profile.update',['id'=>$user->id])}}">
                <div class="card-body">
                  @csrf
                  <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="text" class="form-control" id="email" value="{{$user->email}}" placeholder="Enter your email" name="email">
                  </div>
                  
                  <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" class="form-control" id="name" value="{{$user->name}}" placeholder="Enter your name" name="name">
                  </div>
                  
                   <div class="form-group">
                    <label for="old_password">Old Password *</label>
                    <input type="password" class="form-control" id="old_password" placeholder="Enter Old Password" name="old_password">
                  </div>
                  
                   <div class="form-group">
                    <label for="new_password">New Password *</label>
                    <input type="password" class="form-control" id="new_password" placeholder="Enter New Password" name="new_password">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
         
        </div>
        <!-- /.row -->

    <!-- /.content -->
	
	@endsection