@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-6">
	    <div class="login-content border border-info">
	        <h3>{{ $user->name }}<span class="pull-right"><a href="/admin/users/{{$user->id}}"><button class="btn btn-info btn-sm">Go Back</button></a></span></h3>
	        <p class="text-muted">Edit this profile.</p>
	        <hr>
	        <div class="register-form">
	            {!! Form::open(['action'=> ['AdminUsersController@update', $user->id], 'method' => 'POST']) !!}	
	                @method('patch') 
	                <div class="form-group row">
	                    {!! Form::label('username', __('Username'), array('class'=>'col-md-5 col-form-label text-md-right')) !!}
	                    <div class="col-md-7">
	                       <input id="username" type="text" class="form-control" name="username" value="{{ $user->username }}" disabled>
	                    </div>
	                </div>

	                <div class="form-group row">
	                    {!! Form::label('sponsor', __('Sponsor'), array('class'=>'col-md-5 col-form-label text-md-right')) !!}
	                    <div class="col-md-7">
	                        <input id="sponsor" type="text" class="form-control" name="sponsor" value="{{ $user->sponsor }}" disabled>
	                    </div>
	                </div>

	                <div class="form-group row">
	                    {!! Form::label('email', __('E-Mail'), array('class'=>'col-md-5 col-form-label text-md-right')) !!}
	                    <div class="col-md-7">
	                        <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" disabled>
	                    </div>
	                </div>
	                <div class="form-group row">
	                    {!! Form::label('name', __('Name'), array('class'=>'col-md-5 col-form-label text-md-right')) !!}
	                    <div class="col-md-7">
	                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

	                        @error('name')
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $message }}</strong>
	                            </span>
	                        @enderror
	                    </div>
	                </div>

	                <div class="form-group row">
	                    {!! Form::label('password', __('Password'), array('class'=>'col-md-5 col-form-label text-md-right')) !!}
	                    <div class="col-md-7">
	                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

	                        @error('password')
	                            <span class="invalid-feedback" role="alert">
	                                <strong>{{ $message }}</strong>
	                            </span>
	                        @enderror
	                    </div>
	                </div>

	                <div class="form-group row">
	                    {!! Form::label('password_confirmation', __('Confirm Password'), array('class'=>'col-md-5 col-form-label text-md-right')) !!}
	                    <div class="col-md-7">
	                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
	                    </div>
	                </div>

	                <div class="form-group row">
	                    {!! Form::label('role_id', 'Select Role', array('class'=>'col-md-5 col-form-label text-md-right')) !!}
	                    <select name="role_id" class="form-control col-md-6" style="margin: 0 15px;">
	                    @foreach($roles as $role) 
		                    <option value="{{ $role->id }}" {{ $role->id==$user->role_id ? 'selected' : '' }}>{{ $role->name }}</option>
		                @endforeach
	                    </select>
	                </div>
	                <div class="form-group row">
	                    {!! Form::label('is_active', 'Select Status', array('class'=>'col-md-5 col-form-label text-md-right')) !!}
	                    <select name="is_active" class="form-control col-md-6" style="margin: 0 15px;">
		                    <option value="1" {{ $user->is_active == 1 ? 'selected' : '' }}>Active</option>
		                    <option value="0" {{ $user->is_active !=1 ? 'selected' : '' }}>Inactive</option>
	                    </select>
	                </div>

	                <div class="form-group row mb-2">
	                    <div class="col-md-7 offset-md-5">
	                        <button type="submit" class="btn btn-success">
	                            {{ __('Update') }}
	                        </button>
	                    </div>
	                </div>
	            </form>
	        </div>
	    </div>
	</div>
</div>

@endsection
