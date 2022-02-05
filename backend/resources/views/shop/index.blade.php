@extends('app')

@section('title', 'お店一覧')

@section('content')

<div class="bg-gray-100 py-32 px-10 min-h-screen">
    <div class="p-10 md:w-3/4 mx-auto">
        <p class="text-3xl text-center mb-8">お店一覧</p>
        <div class="flex">
            @foreach ($shops as $shop)
            <img src="image/shop_1.jpeg" class="w-2/5 mx-8">
            <div class="mx-auto">
                <p class="">{{ $shop->name }}</p>
                <a href={{ route('form.index',  ['shop_id' => $shop->id]) }} class="mt-8 pt-2 px-2 bg-blue-200 border-2">レビューする</a>
            </div>
            @endforeach
        </div>
    </div>
</div>
