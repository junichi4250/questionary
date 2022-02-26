<form action="{{ route('logout') }}" method="post" class="text-right mr-32">
    @csrf
    <button type="submit" value="ログアウト" class="text-blue-500">
        {{ __('ログアウト') }}
    </button>
</form>
