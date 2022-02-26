@extends('app')

@section('title', 'アンケート送信')

@section('content')

<div class="bg-gray-200 py-32 px-10 min-h-screen">
    <div class="p-10 md:w-3/4 lg:w-1/2 mx-auto">
        <p class="text-3xl text-center mb-8">ご意見をお送りいただきありがとうございました</p>
        <div class="text-center">
            <button onclick="location.href='{{ route('shop.index') }}'"
                class=" py-3 px-8 bg-blue-400 text-white font-bold">お店一覧へ戻る</button>
        </div>
    </div>
</div>
