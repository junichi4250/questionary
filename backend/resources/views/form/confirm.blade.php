@extends('app')

@section('title', 'アンケート確認')

@section('content')

<div class="bg-gray-200 py-32 px-10 min-h-screen ">
    <div class="bg-white p-10 md:w-3/4 lg:w-1/2 mx-auto">
        <form method="POST" action="{{ route('form.send') }}">
            @include('form.confirm_form')
            <div class="text-center">
                <button name="back" class="py-3 px-8 bg-green-400 text-white font-bold">戻る</button>
                <button class="py-3 px-8 bg-green-400 text-white font-bold">送信</button>
            </div>
        </form>
    </div>
</div>
