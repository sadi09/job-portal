@extends('layouts.landing-layout')

@section('front-end-components')
    @include('components.site-ui.carousel')
    @include('components.site-ui.search-home')
    @include('components.site-ui.explore-by-category')
    @include('components.site-ui.about-section-home')
    @include('components.site-ui.job-listing')
    @include('components.site-ui.testimonial')
@endsection

