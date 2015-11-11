var table_point= undefined;
$(document).ready(function() {
	// Init database table.
	table_point = $('#point-list-table').dataTable({
		'bProcessing' : true,
		'bServerSide' : true,
		'sAjaxSource' : '/point/point_load_datatable',
		'fnServerData' : function(sSource, aoData, fnCallback, oSettings) {
			aoData.push({
				"name" : "iStudent",
				"value" : $('#student-select').val()
			});
			aoData.push({
				"name" : "iSubject",
				"value" : $('#subject-select').val()
			});
			oSettings.jqXHR = $.ajax({
				'dataType' : 'json',
				'type' : 'POST',
				'url' : sSource,
				'data' : aoData,
				'success' : fnCallback
			});
		},
		// {
			// //'sClass' : 'text-center',
			// 'mData' : 'id_students',
			// 'bSortable' : true
		// },
		'aoColumns' : [{
			//'sClass' : 'text-center',
			'mData' : 'name',
			'bSortable' : true
		}, {
			'sClass' : 'text-center',
			'mData' : 'subject_name',
			'bSortable' : true
		}, {
			'mData' : 'point',
			'bSortable' : true
			
		}, {
			'mData' : function() {
				return '';
			},
			'mRender' : function(data, type, full) {
				var html = "";
				//create edit button
				html += '<div class="row">';
				html += '<div class="col-md-6">';
				html += '<button type="button" class="btn btn-primary btn-group btn-square btn-block" role="button"';
				html += 'onclick="edit_point(' + full.id + ')"';
				html += '>';
				html += '<span class="glyphicon glyphicon-edit">';
				html += '</span>';
				html += 'Edit';
				html += '</button>';
				html += '</div>';
				//create delete button
				html += '<div class="col-md-6">';
				html += '<a type="button" class="btn btn-danger btn-square btn-group btn-block" role="button"';
				html += 'onclick="delete_point(' + full.id + ')"';
				html += '>';
				html += '<span class="glyphicon glyphicon-trash">';
				html += '</span>';
				html += 'Delete';
				html += '</a>';
				html += '</div>';
				html += '</div>';
				return html;
			}
		}]
	});

	//load form add new point
	$('#add-point').click(function() {
		$('#pointAddModal').load('point/create', function() {
			//show modal
			$('#pointAddModal').modal('show');
			
		});
	});

	//add new point modal processing
	$('#pointSave').click(function() {

		//call ajax to add new point
		var classes = $('#add-point-form').serialize();
		$.ajax({
			type : 'post',
			url : '/point/store',
			sucess : function(data) {
				$('#pointAddModal').modal('hide');
			}
		});
	});

	//student select
	$('#student-select').on('change', function(event) {
		//prevent default processing
		event.preventDefault();
		//reload data
		point_table_reload();
	});
	
	//subject select
	$('#subject-select').on('change', function(event) {
		//prevent default processing
		event.preventDefault();
		//reload data
		point_table_reload();
	});
	
	
});

/**
 *Edit point
 */
function edit_point(id) {

	//load modal edit point
	var url = '/point/' + id + '/edit';

	$('#pointEditModal').load(url, function() {
		$('#pointEditModal').modal('show');

		//Edit point modal processing
		$('#pointEdit').click(function() {

			//call ajax to update point
			var points = $('#edit-point-form').serialize();
			$.ajax({
				type : 'PUT',
				data : points,
				url : '/point/' + id,
				sucess : function(data) {
				
				}
			});
			//location.reload();
			$('#pointEditModal').modal('hide');
			point_table_reload();
		});
	});
}

/**
 * Delete point
 */
function delete_point(id) {

	//call ajax to delete point
	$.ajax({
		type : 'DELETE',
		url : '/point/' + id,
		dataType : 'json',
	});
	//location.reload();
	point_table_reload();
}

//reload datatble
function point_table_reload() {
	if (table_point != undefined) {
		table_point.fnReloadAjax();
	}
}
