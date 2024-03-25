@extends('frontend.layouts.master')

@push("css")
    
@endpush

@section('content') 

@include('frontend.section.banner')

@include('frontend.section.security')

@include('frontend.section.how-it-work')

@include('frontend.section.statistics')

@include('frontend.section.download-app')

@include('frontend.section.testimonial')
@endsection


@push("script")
    
@endpush