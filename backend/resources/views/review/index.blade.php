@extends('app')

@section('title', 'アンケート')

@include('nav')

@section('content')

<div class="w-2/3 mx-auto">
    <div class="mx-auto mt-12 mb-12 border-2 px-12 py-16 rounded-2xl shadow-lg">
        <p class="mb-10 text-2xl text-center">{{ $shop->shop_name }}へのご意見をお聞かせください</p>
        @include('review.error')
        <form method="POST" enctype="multipart/form-data" class="w-1/2 mx-auto"
            action={{ route('review.post', ['shop_id' => $shop->shop_id]) }}>
            @include('review.form')
            <div class="text-center">
                <button class="mt-5 py-3 px-10 bg-blue-400 text-white font-bold rounded-full">確認</button>
            </div>
        </form>
    </div>
</div>
