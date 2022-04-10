@csrf
<div class="mb-5">
    <div class="flex justify-start my-2">
        <label>氏名</label>
        <p class='bg-red-400 text-gray-50 py-1 px-2 rounded-full ml-2 text-xs'>
            必須
        </p>
    </div>
    <input type="text" name="name" value="{{ old('name') }}" placeholder=" 入力してください"
        class="p-2 border rounded-md w-full outline-none">
</div>
<div class="mb-5">
    <div class="flex justify-start my-2">
        <label>性別</label>
        <p class='bg-red-400 text-gray-50 py-1 px-2 rounded-full ml-2 text-xs'>
            必須
        </p>
    </div> <input type="radio" name="gender" value="0" {{ old('gender') != '1' ? 'checked' : '' }}
        class="mx-2 py-2 text-gray-600">男性
    <input type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }}
        class="mx-2 py-2 text-gray-600">女性
</div>

<div class="mb-5">
    <div class="flex justify-start my-2">
        <label>年代</label>
        <p class='bg-red-400 text-gray-50 py-1 px-2 rounded-full ml-2 text-xs'>
            必須
        </p>
    </div> <select name="age_id" class="p-2 border rounded-md w-full outline-none">
        <option value="">選択してください</option>
        @foreach($ages as $index => $age)
        <option value="{{ $index + 1 }}" @if(($index + 1)===(int)old('age_id')) selected @endif>{{ $age->age }}</option>
        @endforeach
    </select>
</div>

<div class="mb-5">
    <div class="flex justify-start my-2">
        <label>メールアドレス</label>
        <p class='bg-red-400 text-gray-50 py-1 px-2 rounded-full ml-2 text-xs'>
            必須
        </p>
    </div> <input type="email" name="email" value="{{ old('email') }}" placeholder=" 入力してください"
        class="p-2 border rounded-md w-full outline-none">
</div>

<div class="mb-5">
    <label class="flex justify-start my-2">メール送信可否</label>
    <label class="flex-1 py-2">登録したメールアドレスに<br>メールマガジンをお送りしてもよろしいですか？</label>
    <input type="checkbox" name="is_send_email" value="1" {{ old('is_send_email') == '1' ? 'checked' : '' }}
        class="flex-1 py-2">
</div>

<div class="mb-5">
    <div class="flex justify-start my-2">
        <label>評価</label>
        <p class='bg-red-400 text-gray-50 py-1 px-2 rounded-full ml-2 text-xs'>
            必須
        </p>
    </div> <select name="score" class="p-2 border rounded-md w-full outline-none">
        <option value="">選択してください</option>
        <option value="1" @if(1===(int)old('score')) selected @endif>1点</option>
        <option value="2" @if(2===(int)old('score')) selected @endif>2点</option>
        <option value="3" @if(3===(int)old('score')) selected @endif>3点</option>
        <option value="4" @if(4===(int)old('score')) selected @endif>4点</option>
        <option value="5" @if(5===(int)old('score')) selected @endif>5点</option>
    </select>
</div>

<div class="mb-5">
    <label class="flex justify-start my-2">ご意見</label>
    <textarea rows="10" cols="60" name="feedback" placeholder=" 入力して下さい"
        class="p-2 border rounded-md w-full outline-none">{{ old('feedback') }}</textarea>
</div>

<div class="mb-5">
    <label class="flex justify-start my-2">お店の画像</label>
    <input type="file" id="image" name="image">
</div>
