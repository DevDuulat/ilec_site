@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
@php
$locale = app()->getLocale();
@endphp
<x-page-hero title="{{ __('hero.home.title') }}" description="{{ __('hero.home.description') }}"
  image="images/hero-image.jpg" imageAlt="{{ __('hero.home.image_alt') }}" :stats="[
      ['icon' => 'heroicon-s-check', 'text' => __('messages.90_percent_success')],
      ['icon' => 'heroicon-s-clock', 'text' => __('messages.5_years_experience')],
    ]" />

@include('partials.services')
@include('partials.leadership')
@include('partials.about')
@include('partials.why-choose-us')
@include('partials.universities')
@include('partials.application-form')
@include('partials.partners')
@include('partials.faq')
@endsection