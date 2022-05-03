@extends('app')

@section('title', 'お店詳細')

@include('nav')

@section('content')

<div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="max-w-screen-xl px-4 md:px-8 mx-auto">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">

            @include('shop.card')

            @include('shop.review')

        </div>
    </div>
</div>
