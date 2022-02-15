@extends('app')

@section('title', 'アンケート確認')

@section('content')

<div class="bg-gray-200 py-32 px-10 min-h-screen ">
    <div class="p-10 md:w-3/4 lg:w-1/2 mx-auto">
        <p class="text-3xl text-center mb-8">内容確認</p>
        <form method="POST" action="{{ route('review.send') }}">
            @include('review.confirm_form')
            <div class="text-center">
                <button name="back" class="py-3 px-8 bg-blue-400 text-white font-bold">戻る</button>
                <button class="py-3 px-8 bg-blue-400 text-white font-bold">送信</button>
            </div>
        </form>
    </div>
</div>
