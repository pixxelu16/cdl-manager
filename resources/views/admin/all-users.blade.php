@extends('admin.layouts.master')
@section('content')
<div class="page-wrapper">
   <div class="content container-fluid">
      <div class="page-header">
         <div class="row align-items-center">
            <div class="col">
               <h3 class="page-title">All Customer Users List</h3>
            </div>
         </div>
      </div>
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
      <div class="row">
         <div class="col-md-12">
            <div class="table-responsive">
               <table id="DataTables_Table_0" class="table table-striped custom-table datatable">
                  <thead>
                     <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th class="text-nowrap">Company</th>
                        <th class="text-end no-sort">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach($get_user_lists as $list)
                     <tr>
                        <td>
                           <h2 class="table-avatar">
                              <a href="profile.html" class="avatar"><img src="{{ asset('public/admin/img/profiles/avatar-02.jpg') }}" alt="User Image"></a>
                              <a href="profile.html">{{$list->name}}</span></a>
                           </h2>
                        </td>
                        <td><a href="https://smarthr.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c1abaea9afa5aea481a4b9a0acb1ada4efa2aeac">{{$list->email}}</a></td>
                        <td>{{$list->dot_number}}</td>
                        <td>{{$list->company}}</td>
                        <td class="text-end">
                           <div class="dropdown dropdown-action">
                              <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                 <a class="dropdown-item" href="{{ url('admin-edit-user/' . $list->id) }}"><i class="fa-solid fa-pencil m-r-5"></i>Edit</a>
                                 <a class="dropdown-item" href="{{ url('admin-delete-user/' . $list->id) }}"><i class="fa-regular fa-trash-can m-r-5"></i>Delete</a>
                              </div>
                           </div>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection