<div class="modal-dialog modal-primary">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">
				<span aria-hidden="true">&times; </span><span class="sr-only">Close</span>
			</button>
			<h4 class="modal-title"> EDIT POINT STUDENT</h4>
		</div>
		<form role="form" method="post" id="edit-point-form">
			<div class="modal-body">
				<div style="margin-bottom: 20px;" class="row">
					<div class="col-md-6 col-xs-12">
						{{ Form::label('student', 'Student') }}
					    {{ Form::select('student',$student, '0', array('class' => 'form-control col-sm-6 col-xs-12', 'id' => 'student-select')) }}
					</div>
					<div class="col-md-6 col-xs-12">
						{{ Form::label('subject', 'Subject') }}
					    {{ Form::select('subject',$subject, '0', array('class' => 'form-control col-sm-6 col-xs-12', 'id' => 'subject-select')) }}				
					</div>
				</div>
				<div style="margin-bottom: 20px;" class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-font"></i></span>
					{{ Form::text('point',$point->point, array('class' => 'form-control', 'placeholder' => 'Point Student','required' => '')) }}
				</div>
			</div>
			<div style="height: 60px; margin-top: 20px;" class="modal-footer">
				<div style="margin-bottom: 25px;"class="form">
					<button type="button" class="btn btn-square btn-success" id="pointEdit">
						<span class="glyphicon glyphicon-floppy-save"></span>Update
					</button>
					<!-- <button type="button" class="btn btn-square btn-warning"><span class="glyphicon glyphicon-remove"></span>Cancel</button> -->
				</div>
			</div>
		</form>
	</div>
</div>