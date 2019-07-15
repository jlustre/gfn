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
	<div class="container">
		<form id="todoForm">
			<input type="hidden" id="id" name="id" value="">
			<div class="form-group">
				<label>Title</label>
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
		<hr>
		<ul id="todos" class="list-group">
			
		</ul>
	</div>
@endsection

@section('page_script')
	<script type="text/javascript">
		$(document).ready(function() {

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
					addTodo(title, description, comments);
				}
			});

			//Delete event
			$('body').on('click', '.deleteLink', function(e){
				let id = $(this).data('id');
				
				deleteTodo(id);
			});

			//update event
			$('body').on('click', '.editLink', function(e){
				let id = $(this).data('id');
				
				showTodo(id);
			});

			//Show Todo using API
			function showTodo(id) {
				$.ajax({
					url: 'http://gofree.test/api/todos/'+id 
				}).done(function(todo){
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
					//alert('Todo # '+id+' was updated.');
					$('#todos').html('');
					getTodos();
					clearForm();
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
					//alert('Todo # '+id+' was deleted.');
					//location.reload();
					$('#todos').html('');
					getTodos();
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
					
					//alert('Todo # '+todo.id+' was added.');
					let output = '';
					output += `
						<li class="list-group-item">
							<strong>TODO #${todo.id}: ${todo.title}: </strong>${todo.description} <a href="#" class="deleteLink" data-id="${todo.id}">Delete</a> <a href="#" class="editLink" data-id="${todo.id}">Edit</a>
						</li>
					`;

					$('#todos').append(output);
					clearForm();
				});
			}

			//Get Todos from API
			function getTodos() {
				$.ajax({
					url: 'http://gofree.test/api/todos'
				}).done(function(todos){
					let output = '';
					$.each(todos, function(key, todo){
						output += `
							<li class="list-group-item">
								<strong>TODO #${todo.id}: ${todo.title}: </strong>${todo.description} <a href="#" class="deleteLink" data-id="${todo.id}">Delete</a> <a href="#" class="editLink" data-id="${todo.id}">Edit</a>
							</li>
						`;
					});

					$('#todos').append(output);
				});
			}

		}) 

	</script>
    <?php //include(resource_path('views').'/templates/scripts/pages-user-profile.blade.php'); ?>
@endsection