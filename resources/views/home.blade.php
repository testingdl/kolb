@extends('layouts.app')

@section('content')    
	@if(isset($results))
		<div class="container main-container">
		<form-component :test-results="{{ $results }}"/>
		</div>
	@else	
		<div class="container main-container v-flex-center h-100">
		<form-component />
		</div>
	@endif 	
@endsection

@if(isset($results))
	<style>
		body {
			background-image: url({{ config('app.url') }}img/bkg-2.jpg);
		}
	</style>
@else
	<style>
		body {
			overflow-y: hidden;
			overflow-x: hidden;			
			background-image: url(img/bkg-2.jpg);
		}
	</style>
@endif   