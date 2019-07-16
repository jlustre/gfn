@extends('layouts.app')

@section('page_data')
    <?php include(resource_path('views').'/templates/config.php'); ?>
@endsection

@section('specific_css')
	<!-- Specific Page Data -->
	<?php $title = 'Manage Todo List'; ?>
	<?php $page = 'todo';   // To set active on the same id of primary menu ?> 
	<!-- End of Data -->
@endsection

@include('includes.headers_sidebars')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
        @include('includes.messages') 
        	<div class="panel-heading vd_bg-grey">
                <a id="toggle_btn" href="#" class="btn btn-success btn-sm">Add New Todo</a>
            </div>
            <div class="panel-body">
				<div id="addtodo" style="display: none;" class="container">
					<div class="col-md-6">
						<form id="todoForm">
							<input type="hidden" id="id" name="id" value="">
							<div class="form-group">
								<label>Title</label><span class="pull-right">ID:<span id="my_id"></span> </span>
								<input id="title" type="text" name="title" class="form-control">
							</div>
							<div class="form-group">
								<label>Description</label>
								<input type="text" id="description" name="description" class="form-control"/>
							</div>
							<div class="form-group">
								<label>Comments</label>
								<textarea id="comments" name="comments" class="form-control">
								</textarea>
							</div>
							<div class="form-group">
								<input type="submit" value="Save" class="btn btn-primary">
							</div>
						</form>
					</div>
					<hr>
				</div>
				<div class="table-responsive">
					<table class="table table-striped" id="data-tables">
						<thead>
							<tr>
								<th>Id</th>
								<th>Title</th>
								<th>Description</th>
								<th>Status</th>
								<th>Priority</th>
								<th>Comments</th>
								<th>Created</th>
								<th>Updated</th>
							    <th>Action</th> 
							</tr>
						</thead>
					</table>
				</div> <!-- end table-responsive -->
			</div> <!-- end panel-body -->
		</div> <!-- end panel -->
	</div>
</div>
@endsection

@section('page_script')

	<script type="text/javascript">
		$(document).ready(function() {
			$('#toggle_btn').click(function(){
				$(this).text(function(i, text){
				  $('#addtodo').toggle();
		          return text === "Hide Add Todo Form" ? "Add New Todo" : "Hide Add Todo Form";
		        })
			    
			 });

			getTodos();
			
			//Submit event
			$('#todoForm').on('submit', function(e){
				e.preventDefault();
				
				let title = $('#title').val();
				let description = $('#description').val();
				let comments = $('#comments').val();
				let id =$('#id').val();
				if (id) {
					updateTodo(id, title, description, comments);
				} else {
					if(title=="") {
						//do nothing
					} else {
						addTodo(title, description, comments);
					}
				}
			});

			//Delete event
			$('body').on('click', '.viewLink', function(e){
				let id = $(this).data('id');
				$('#addtodo').show();
				$('#toggle_btn').text('Hide Add Todo Form');
				let mode = 'Viewing';
				showTodo(id, mode);
			});

			//Delete event
			$('body').on('click', '.deleteLink', function(e){
				let id = $(this).data('id');
				if (confirm('Are you sure you want to delete ID: '+ id)) {
					deleteTodo(id);
				}
				
			});

			//update event
			$('body').on('click', '.editLink', function(e){
				let id = $(this).data('id');
				$('#addtodo').show();
				$('#toggle_btn').text('Hide Add Todo Form');
				let mode = 'Editing';
				showTodo(id, mode);
			});

			//Show Todo using API
			function showTodo(id, mode) {
				$.ajax({
					url: 'http://gofree.test/api/todos/'+id 
				}).done(function(todo){
					$('#title_hdr').html(mode+' ID: '+id);
					$('#my_id').html(todo.id);
					$('#id').val(todo.id);
					$('#title').val(todo.title);
					$('#description').val(todo.description);
					$('#comments').val(todo.comments);
				});
			}

			//Update Todo using API
			function updateTodo(id, title, description, comments) {
				$.ajax({
					method: 'POST',
					url: 'http://gofree.test/api/todos/'+id,
					data: {
						_method: 'PATCH',
						title: title,
						description: description,
						comments: comments,
					}
				}).done(function(todo){
					alert('Todo # '+id+' was updated.');
					location.reload();
					//$('#todos').html('');
					//getTodos();
					//clearForm();
				});
			}
			//clear the form
			function clearForm(){
				$('#id').val('');
				$('#title').val('');
				$('#description').val('');
				$('#comments').val('');
			}
			//Delete Todo using API
			function deleteTodo(id) {
				$.ajax({
					method: 'POST',
					url: 'http://gofree.test/api/todos/'+id,
					data: {_method: 'DELETE'}
				}).done(function(todo){
					alert('Todo # '+id+' was deleted.');
					location.reload();
					//$('#todos').html('');
					//getTodos();
				});
			}

			//Insert Todos using API
			function addTodo(title, description, comments) {
				$.ajax({
					method: 'POST',
					url: 'http://gofree.test/api/todos',
					data: {
						title: title,
						description: description,
						comments: comments,
					}
				}).done(function(todo){
					location.reload();
				});
			}

			//Get Todos from API
			function getTodos() {
				$('#data-tables').DataTable( {
			        "ajax": "http://gofree.test/api/todos",
			        "columns": [
			            { "data": "id" },
			            { "data": "title" },
			            { "data": "description" },
			            { "data": "status_id" },
			            { "data": "priority" },
			            { "data": "comments" },
			            { "data": "created_at" },
			            { "data": "updated_at" },
			            { "data": "action" },

			        ]
			    } );
			}	
			
			/*function getTodos2() {
				$.ajax({
					url: 'http://gofree.test/api/todos'
				}).done(function(todos){
					let output = '';
					$.each(todos, function(key, todo){
						output += `
							<tr style="font-size: 12px;" class="py-0">
								<td>${todo.id}</td>
								<td>${todo.title}</td>
								<td>${todo.description}</td>
								<td>status</td>
								<td>priority</td>
								<td>target_date</td>
								<td>Resource</td>
								<td></td>
								<td></td>
								<td class="menu-action">
									<a href="/admin/users/${todo.id}" data-original-title="view" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-green vd_green"> <i class="fa fa-eye"></i> 
									</a> 
									<a href="/admin/users/${todo.id}/edit" data-original-title="edit" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"> <i class="fa fa-pencil"></i> 
									</a> 
									<a href="/admin/users/${todo.id}" onclick="event.preventDefault(); document.getElementById('delete-form[]').submit();" data-original-title="delete" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-red vd_red"> <i class="fa fa-times"></i> 
									</a>
								</td>
							</tr>
							
						`;
					});
					$.each(todos, function(key, todo){
						output += `
							<li class="list-group-item">
								<strong>TODO #${todo.id}: ${todo.title}: </strong>${todo.description} <a href="#" class="deleteLink btn btn-danger btn-sm" data-id="${todo.id}">Delete</a> <a href="#" class="editLink  btn btn-info btn-sm" data-id="${todo.id}">Edit</a>
							</li>
						`;
					});
				$('#todos').html('');
				$('#todos').append(output);
				$('#data-tables').dataTable().ajax.reload();


				});
			} *///getTodo2

		}) 

	</script>

	<?php include(resource_path('views').'/templates/scripts/listtables-data-tables.blade.php'); ?>
@endsection