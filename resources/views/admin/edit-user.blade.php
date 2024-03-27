@extends('admin.layouts.master')
@section('content')
<div class="page-wrapper">
   <div class="content container-fluid">
      <div class="col-md-18 text-right">
         <a href="{{ url('admin/all-users') }}" class="btn btn-primary">All User List</a>
      </div>
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header">
                  @if (Session::has('success')) 
                  <div class="notifaction-green">
                     <p>{{ Session::get('success') }}</p>
                  </div>
                  @endif 
                  @if (Session::has('unsuccess')) 
                  <div class="notifaction-red">
                     <p> {{ Session::get('unsuccess') }}</p>
                  </div>
                  @endif
                  <h4 class="card-title mb-0">Edit Customer User</h4>
               </div>
               <div class="card-body">
                  <form action="{{ route('admin.update.user', $users->id) }}" Method="POST">
                     @csrf
                     <div class="input-block mb-3 row">
                        <label class="col-form-label col-md-2">Name</label>
                        <div class="col-md-10">
                           <input type="text" name="name" value="{{$users->name}}" class="form-control">
                        </div>
                     </div>
                     <div class="input-block mb-3 row">
                        <label class="col-form-label col-md-2">Email</label>
                        <div class="col-md-10">
                           <input type="email" name="email" value="{{$users->email}}" disabled="disabled" class="form-control">
                        </div>
                     </div>
                     <div class="input-block mb-3 row">
                        <label class="col-form-label col-md-2">Phone</label>
                        <div class="col-md-10">
                           <input type="text" name="dot_number" id="dot_number" value="{{$users->dot_number}}" class="form-control">
                        </div>
                     </div>
                     <div class="input-block mb-3 row">
                        <label class="col-form-label col-md-2">Company</label>
                        <div class="col-md-10">
                           <input type="text" name="company" class="form-control" value="{{$users->company}}">
                        </div>
                     </div>
                     <div class="input-block mb-3 mb-0 row">
                        <div class="col-md-10">
                           <div class="input-group">
                              <button type="submit" class="btn btn-primary" type="button">Update</button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection