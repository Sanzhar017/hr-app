@php
$customizerHidden = 'customizer-hide';
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Error - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-misc.css')}}">
@endsection


@section('content')
<!-- Error -->
<div class="container-xxl container-p-y">
  <div class="misc-wrapper">
    <h2 class="mb-1 mt-4">Page Not Found :(</h2>
    <p class="mb-4 mx-2">Oops! 😖 The requested URL was not found on this server.</p>
    <a href="{{url('/')}}" class="btn btn-primary mb-4">Back to home</a>
    <div class="mt-4">
      <img src="{{ asset('assets/img/illustrations/page-misc-error.png') }}" alt="page-misc-error" width="225" class="img-fluid">
    </div>
  </div>
</div>
<div class="container-fluid misc-bg-wrapper">
  <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Ffreefrontend.com%2Fhtml-css-404-page-templates%2F&psig=AOvVaw2ZciVRhI7d35CNMSxAmQLa&ust=1705991857685000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCIDIhoux8IMDFQAAAAAdAAAAABAI" alt="">
</div>
<!-- /Error -->
@endsection
