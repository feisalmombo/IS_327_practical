@extends('layouts.app')
@section('title','Admins')
@section('content')


<div class="panel panel-primary">
    <div class="panel-heading">Admins <span class="badge">{{ $users->count() }}</span>
    <a href="/users/create" style="color: white;" class="pull-right"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Admin</a>
    </div>
 @if(count($users))
    <div class="panel-body">
       
        <table class="table table-bordered table-hover">
         <thead>
             <tr>
                 <th>SN</th>
                 <th>Name</th>
                 <th>Email</th>
                 <th>Created at</th>
                 <th >Updated at</th>
             </tr>
         </thead>
         <tbody>
             
             <tr>
             @foreach($users as $user)
                 <td>{{ $counts ++ }}</td>
                 <td>{{ $user->name }}</td>
                 <td>{{ $user->email }}</td>
                 <td>{{ $user->created_at->diffForHumans() }}

                 </td>
                 <td>{{ $user->updated_at->diffForHumans() }}

                 </td>
                  
             </tr>
            @endforeach
         </tbody>
     </table>
     @else
     <div class="alert alert-info">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         <strong>No Admin</strong>
     </div>
     @endif

     {{ $users->links() }}
 </div>


 @endsection
