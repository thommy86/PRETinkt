@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
	Hello, <?php echo $product; ?>
	<?php echo trans('home.hello'); ?>
@endsection
