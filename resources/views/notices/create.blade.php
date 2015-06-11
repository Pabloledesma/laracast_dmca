@extends('app')

@section('content')
	<h1 class="page-heading">Prepare a DMCA notice</h1>

	{!! Form::open(['method' => 'GET', 'action' => 'NoticesController@confirm']) !!}

		<div class="form-group">
			{!! Form::label('provider_id', 'Who are we send this to?: ') !!}
			{!! Form::select('provider_id', $providers, null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('infringin_title', 'What is the title of the content that is being infringed upon: ') !!}
			{!! Form::text('infringin_title', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('infringin_link', 'What is the link to where this content is located: ') !!}
			{!! Form::text('infringin_link', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('original_link', 'To verify that to you own the content, we now need the link to the original content on your server: ') !!}
			{!! Form::text('original_link', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('original_description', 'And, finally, it might help to provide some extra information related to this DMCA notice: ') !!}
			{!! Form::textarea('original_description', null, ['class' => 'form-control']) !!}
		</div>

		<!-- Submit field -->
		<div class="form-group">
			{!! Form::submit('Create Notice', ['class' => 'btn btn-primary form-control']) !!}
		</div>

	{!! Form::close() !!}

	@include('error.list')

@stop