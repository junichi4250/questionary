@extends('app')

@section('title', 'お店一覧')

@section('content')

<div class="bg-gray-100 py-32 px-10 min-h-screen">
    <div class="p-10 md:w-3/4 mx-auto">
        <p class="text-3xl text-center mb-8">お店一覧</p>
        @foreach ($shops as $shop)
        <div class="flex">
            <img src="image/shop_1.jpeg" class="w-2/5 mx-8 mb-12 flex">
            <div class="mx-auto">
                <p class="text-2xl mb-10">{{ $shop->shop_name }}</p>
                <p class="mb-10">評価：★★★☆☆（3.0点）</p>
                <a href="{{ route('review.index',  ['shop_id' => $shop->shop_id]) }}"
                    class="mt-8 pt-2 px-2 bg-blue-200 border-2">レビューする</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
