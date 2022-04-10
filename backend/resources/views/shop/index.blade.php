@extends('app')

@section('title', 'お店一覧')

@include('nav')

@section('content')

<div class="w-2/3 mx-auto">
    <div class="mx-auto mt-12">
        {{-- <p class="text-3xl text-center mb-8">お店一覧</p> --}}
        @foreach ($shops as $shop)
        <div class="flex mx-auto mb-12 border-2 px-12 py-16 rounded-2xl shadow-lg">
            <img src="image/shop_{{ $shop->shop_id }}.jpeg" class="w-2/5 mx-8 flex">
            <div class="">
                <p class="text-2xl mb-10">{{ $shop->shop_name }}</p>
                <p class="mb-10">評価：★★★☆☆（3.0点）</p>
                <p class="mb-10">テキストテキストテキストテキストテキストテキストテキスト</p>
                <a href="{{ route('review.index',  ['shop_id' => $shop->shop_id]) }}"
                    class="py-3 px-8 mr-8 bg-green-400 text-white font-bold rounded-full">詳細</a>
                <a href="{{ route('review.index',  ['shop_id' => $shop->shop_id]) }}"
                    class="py-3 px-8 bg-blue-400 text-white font-bold rounded-full">レビューする</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
