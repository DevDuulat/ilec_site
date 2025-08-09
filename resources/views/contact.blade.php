@extends('layouts.app')

@section('title', 'Контакты')

@section('content')
@php
$locale = app()->getLocale();
@endphp

<x-section-banner :title="__('messages.banner.contacts.title')" :subtitle="__('messages.banner.contacts.subtitle')"
  image="images/banner.avif" :imageAlt="__('messages.banner.contacts.image_alt')" ctaHref="#contact-form"
  :ctaText="__('messages.banner.contacts.cta_text')" />
@include('partials.contact-form')
@include('partials.map')

@endsection