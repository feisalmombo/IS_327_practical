@extends('layouts.app')
@section('title','Comments')
@section('content')

<style type="text/css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</style>

<div class="panel panel-primary">
    <div class="panel-heading">Comments <span class="badge">{{ $total }}</span></div>
    @if(count($comments))
    <div class="panel-body">

        <table class="table table-bordered table-hover">
           <thead>
               <tr>
                   <th>SN</th>
                   <th>Email</th>
                   <th>Body</th>
                   <th>Delivered</th>
                   <th colspan="2"><center>Action</center></th>
               </tr>
           </thead>
           <tbody>

               <tr>
                   @foreach($comments as $comment)
                   <td>{{ $counts ++ }}</td>
                   <td>{{ $comment->email }}</td>
                   <td>{{ str_limit($comment->body,50) }}</td>
                   <td>{{ $comment->created_at->diffForHumans() }}
                   </td>
                   <td>
                       <a href="/comment/{{ $comment->id }}"><button type="button" class="btn btn-primary">Show</button></a>
                   </td>
                   <td>
                   {{--  <form action="/comment/{{ $comment->id}}" method="POST" role="form">

                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form> --}}

                    <a class="btn btn-danger" data-toggle="modal" href='#{{ $comment->id }}'>Delete</a>
                    <div class="modal fade" id="{{ $comment->id }}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Confirmation</h4>
                          </div>
                          <div class="modal-body">
                            Are you sure you want to delete comment from <p style="color: blue;">{{ $comment->email }}</p>
                          </div>
                          <form action="/comment/{{ $comment->id}}" method="POST" role="form">

                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary">Yes</button>
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>

                 </td>

             </tr>
             @endforeach
         </tbody>
     </table>
     @else
     <div class="alert alert-info">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>No Comments</strong>
   </div>
   <br>
   @endif

   {{ $comments->links() }}
</div>


@endsection
