@extends('layouts.default_login')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="portlet portlet-green">
				<div class="portlet-heading">
					<div class="portlet-title text-center">
						<h4><strong>LOGIN</strong></h4>
					</div>
				</div>
				<div class="portlet-body">
					{{ Form::open(array('route' => 'auth.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST' )) }}
					<fieldset>
						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							{{ Form::text('username','', array('class' => 'form-control', 'placeholder' => 'Username','required' => '')) }}
						</div>
						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password', 'required' => '')) }}
						</div>
						
						{{ Form::submit('Login', array('class' => 'btn btn-lg btn-block btn-square btn-success')) }}
						<!-- <button type="button" class="btn btn-success" id="register">register</button> -->
						<!--{{ Form::button('Register', array('class' => 'btn btn-lg btn-block btn-square btn-primary','id'=>'register')) }}-->
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal-->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
		
</div>
<!-- End Modal -->
@stop


