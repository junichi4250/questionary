    @csrf
    <div class="mb-5">
        <label for="name" class="flex justify-start my-2">{{ __('ID') }}</label>
        <div class="">
            <input id="name" type="text"
                class="@error('name') is-invalid @enderror p-2 border rounded-md w-full outline-none" name="name"
                value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="mb-5">
        <label for="password" class="flex justify-start my-2">{{ __(' PASSWORD') }}</label>
        <div class="">
            <input id="password" type="password"
                class="@error('password') is-invalid @enderror p-2 border rounded-md w-full outline-none"
                name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
