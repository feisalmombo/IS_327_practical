@if(Auth::guest())

@else
<div class="list-group">
  <a class="list-group-item {{ request()->fullUrl() == url('/home') ? 'active' : '' }}" href="/home"><i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp; Home</a>

  <a class="list-group-item {{ request()->fullUrl() == url('/comment') ? 'active' : '' }}" href="/comment"><i class="fa fa-comments" aria-hidden="true"></i>&nbsp; Comments <span class="badge">
  	
  </span></a>

<a class="list-group-item  {{ request()->fullUrl() == url('/users') ? 'active' : '' }}" href="/users"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp; Admins</a>

  <a class="list-group-item  {{ request()->fullUrl() == url('/users/create') ? 'active' : '' }}" href="/users/create"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Register</a>

  

  <a class="list-group-item  {{ request()->fullUrl() == url('/users/editAdmin') ? 'active' : '' }}" href="/users/{{ Auth::user()->id }}/edit"><i class="fa fa-user" aria-hidden="true"></i>&nbsp; Edit</a>
</div>
@endif