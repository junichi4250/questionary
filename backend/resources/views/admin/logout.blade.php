<form action="{{ route('logout') }}" method="post" class="">
    @csrf
    <button type="submit" value="ログアウト" class="flex mr-3 ml-5 text-sm rounded-full md:mr-0">
        {{ __('ログアウト') }}
    </button>
</form>
