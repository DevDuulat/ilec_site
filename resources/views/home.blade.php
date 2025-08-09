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
<script>
   document.addEventListener("DOMContentLoaded", function () {
        const headers = document.querySelectorAll(".accordion-header");
        const images = document.querySelectorAll(".accordion-image");

        const defaultActiveIndex = 2;
        if (headers[defaultActiveIndex]) {
          const defaultItem =
            headers[defaultActiveIndex].closest(".accordion-item");
          defaultItem.classList.add("active");
          const defaultContent =
            defaultItem.querySelector(".accordion-content");
          defaultContent.classList.remove("hidden");
          images[defaultActiveIndex].classList.remove("hidden");
        }

        headers.forEach((header, index) => {
          header.addEventListener("click", function () {
            document.querySelectorAll(".accordion-item").forEach((item) => {
              item.classList.remove("active");
              const content = item.querySelector(".accordion-content");
              if (content) content.classList.add("hidden");

              const h = item.querySelector(".accordion-header");
              h.classList.remove("font-semibold", "text-gray-900");
              h.classList.add("font-medium", "text-gray-600");
            });

            // Скрываем все изображения
            images.forEach((img) => img.classList.add("hidden"));

            // Активируем текущий элемент
            const item = this.closest(".accordion-item");
            item.classList.add("active");
            this.classList.remove("font-medium", "text-gray-600");
            this.classList.add("font-semibold", "text-gray-900");

            // Показываем контент и изображение
            const content = item.querySelector(".accordion-content");
            if (content) content.classList.remove("hidden");

            if (images[index]) {
              images[index].classList.remove("hidden");
            }
          });
        });
      });
</script>


@endsection