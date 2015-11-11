<div class="modal-dialog modal-primary">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true">&times; </span><span class="sr-only">Close</span>
			</button>
			<h4 class="modal-title">EDIT STUDENT</h4>
		</div>
		<form role="form" method="post" id="edit-student-form">
			<div class="modal-body">
				<div style="margin-bottom: 20px;" class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
					{{ Form::text('name',$student->name, array('class' => 'form-control', 'placeholder' => 'Student Name','required' => '')) }}
				</div>
				<div style="margin-bottom: 20px;" class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
					{{ Form::text('birthday',$student->birthday, array('class' => 'form-control input-birthday-picker', 'placeholder' => 'BirthDay (yyyy/mm/dd)','required' => '')) }}
				</div>
				<div style="margin-bottom: 20px;" class="row">
					<div class="col-md-6 col-xs-12">
							{{ Form::label('sex', 'SEX') }}
							{{ Form::select('sex', array(
								'-1' => '-Choose-',
								'1' => 'Male',
								'0' => 'Female',
							), '-1', array('class' => 'form-control', 'id' => 'sex-select')) }}	
					</div>
					<div class="col-md-6 col-xs-12">
						  {{ Form::label('classes', 'Classes') }}
						  {{ Form::select('classes_id',$classes, '0', array('class' => 'form-control col-sm-6 col-xs-12', 'id' => 'classes-select')) }}				
					</div>
				</div>
			</div>
			<div style="height: 60px; margin-top: 20px;" class="modal-footer">
				<div style="margin-bottom: 25px;"class="form">
					<button type="button" class="btn btn-square btn-success" id="studentEdit">
						<span class="glyphicon glyphicon-floppy-save"></span>Update
					</button>
					<!-- <button type="button" class="btn btn-square btn-warning"><span class="glyphicon glyphicon-remove"></span>Cancel</button> -->
				</div>
			</div>
		</form>
	</div>
</div>