 @extends('layouts.app')
 @section('title','Register')
 @section('content')

 <div class="panel panel-primary">
 	<div class="panel-heading">Register
<a href="/users" class="pull-right" style="color: white;">Admins</a>
 	</div>

 	<div class="panel-body">
 		<div class="container-fluid">
 			<section class="container col-sm-offset-3">
 				<div class="container-page">				
 					<div class="col-md-6">
 						<h3 class="dark-grey">Registration</h3>
					<form method="POST" action="/users" class="form-horizontal">
					{{ csrf_field() }}
 						<div class="form-group col-lg-12">
 						<label>User name</label>
 							<input type="" name="name" class="form-control" id="" value="">
 						</div>

 						<div class="form-group col-lg-12">
 							<label>Email Address</label>
 							<input type="" name="email" class="form-control" id="" value="">
 						</div>

 						<div class="form-group col-lg-12">
 							<label>Password</label>
 							<input type="password" name="password" class="form-control" id="password" value="">
 						</div>		
                        
 						<button type="submit" class="btn btn-primary">Register</button>	
 								

 					</div>
 					</form>
 			</section>
 		</div>
 	</div>
 </div>
 </div>

 @endsection