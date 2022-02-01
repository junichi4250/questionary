@extends('app')

@section('title', 'アンケート')

@section('content')

<div class="bg-gray-100 py-32 px-10 min-h-screen ">
    <div class="p-10 md:w-3/4 lg:w-1/2 mx-auto">
        <p class="text-3xl text-center mb-8">システムへのご意見をお聞かせください</p>
        @if($errors)
        <p class="">{{ $errors->first('fullname') }}</p>
        <p class="">{{ $errors->first('email') }}</p>
        @endif
        <form method="POST" action="{{ route('form.post') }}">
            @include('form.form')
            <div class="text-center">
                <button class="mt-5 py-3 px-10 bg-blue-400 text-white font-bold">確認</button>
            </div>
        </form>
    </div>
</div>
