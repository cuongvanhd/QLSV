<div class="modal-dialog modal-primary modal-sm">
	<div class="modal-content">
		<div class="modal-header">
			 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;
			 	</span><span class="sr-only">Close</span></button>
			 	<h4 class="modal-title text-center">REGISTER</h4>
		</div>
		<form role="form" method="post" id="add-user-form">
			<div class="modal-body">
					<div style="margin-bottom: 20px;" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
						{{ Form::text('username','', array('class' => 'form-control', 'placeholder' => 'Username','required' => '')) }}
					</div>
					<div style="margin-bottom: 20px;" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
						{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password', 'required' => '')) }}
					</div>
			</div>
			<div style="height: 60px; margin-top: 20px;" class="modal-footer">
				<div style="margin-bottom: 25px;"class="form">
					<button type="submit" class="btn btn-square btn-success" id="userSave"><span class="glyphicon glyphicon-floppy-save"></span>Submit</button>
					<button type="button" class="btn btn-square btn-warning" id="cancel"><span class="glyphicon glyphicon-remove"></span>Cancel</button>
				</div>
			</div>
		</form>
		
	</div>
</div>

