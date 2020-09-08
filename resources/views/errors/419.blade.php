@extends('errors::minimal')

@section('title', __('Page Expired'))
@section('message')
<body>
	<style>
		body {
		  background-image: url('{{asset("assets/errors/419.png")}}');
		  background-size: 100%;
		  text-align: center;
		  background-repeat: no-repeat;
		}
	</style>
</body>
@endsection