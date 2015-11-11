<div class="modal-dialog modal-default">
	<div class="modal-content">
		<div class="modal-header">
			 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;
			 	</span><span class="sr-only">Close</span></button>
			 	<h4 class="modal-title"> EDIT CLASSES</h4>
		</div>
		<form role="form" method="post" id="edit-classes-form">
			<!-- {{ Form::open(array('class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST' )) }} -->
			<div class="modal-body">
					<div style="margin-bottom: 20px;" class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
						{{ Form::text('name',$classes_name, array('class' => 'form-control', 'placeholder' => 'Classes','required' => '')) }}
					</div>
			</div>
			<div style="height: 60px; margin-top: 20px;" class="modal-footer">
				<div class="form">
					<button type="button" class="btn btn-square btn-success" id="classesEdit"><span class="glyphicon glyphicon-floppy-save"></span>Update</button>
					<!-- <button type="button" class="btn btn-square btn-warning hideModal"><span class="glyphicon glyphicon-remove"></span>Cancel</button> -->
				</div>
			</div>
			<!-- {{ Form::close() }} -->
		</form>
	</div>
</div>
