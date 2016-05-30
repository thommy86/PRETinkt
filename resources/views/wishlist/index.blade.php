@extends('layouts.master')

@section('content')
	index
	@foreach ($products as $product)
		{{ $product }} <br>
	@endforeach
@endsection