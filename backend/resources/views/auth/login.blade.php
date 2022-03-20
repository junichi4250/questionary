@extends('app')

@section('title', 'ログイン')

@section('content')

<div class="bg-gray-100 py-32 px-10 min-h-screen">
    <div class="p-10 md:w-3/4 lg:w-1/2 mx-auto">
        <div class="text-2xl mb-8">{{ __('ログイン') }}</div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="flex">
                <label for="name" class="w-24 mr-8 mb-4">{{ __('ID') }}</label>

                <div class="">
                    <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="flex">
                <label for="password" class="w-24 mr-8 mb-8">{{ __(' PASSWORD') }}</label>

                <div class="">
                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"
                        required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>


            <div class="text-center">
                <button type="submit" class="p-2 border-2 border-gray-400 bg-blue-200">
                    {{ __('ログイン') }}
                </button>
            </div>

        </form>
    </div>
</div>
