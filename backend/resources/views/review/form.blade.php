@csrf
<div class="flex items-center mb-5">
    <label class="inline-block w-32 mr-8 text-left font-bold text-gray-600">氏名 <span
            class="text-red-400">※</span></label>
    <input type="text" name="name" value="{{ old('name') }}" placeholder=" 入力してください"
        class="flex-1 py-2 border-2 border-gray-200 text-gray-600 placeholder-gray-400 outline-none">
</div>
<div class="flex items-center mb-5">
    <label class="inline-block w-32 mr-8 text-left 
                                 font-bold text-gray-600">性別 <span class="text-red-400">※</span></label>
    <input type="radio" name="gender" value="0" {{ old('gender') != '1' ? 'checked' : '' }}
        class="mx-2 py-2 text-gray-600">男性
    <input type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }}
        class="mx-2 py-2 text-gray-600">女性
</div>

<div class="flex items-center mb-5">
    <label class="inline-block w-32 mr-8 text-left 
                              font-bold text-gray-600">年代 <span class="text-red-400">※</span></label>
    <select name="age_id" class="flex-1 py-2 border-2 border-gray-200
                   text-gray-600 placeholder-gray-400">
        <option value="">選択してください</option>
        @foreach($ages as $index => $age)
        <option value="{{ $index }}">{{ $age->age }}</option>
        @endforeach
    </select>
</div>

<div class="flex items-center mb-5">
    <label class="inline-block w-32 mr-8 text-left 
                                 font-bold text-gray-600">メールアドレス <span class="text-red-400">※</span></label>
    <input type="email" name="email" value="{{ old('email') }}" placeholder=" 入力してください" class="flex-1 py-2 border-2 border-gray-200
                      text-gray-600 placeholder-gray-400">
</div>

<div class="flex items-center mb-5">
    <label class="inline-block w-32 mr-8 text-left 
                                 font-bold text-gray-600">メール送信可否</label>
    <label class="flex-1 py-2">登録したメールアドレスにメールマガジンをお送りしてもよろしいですか？</label>
    <input type="checkbox" name="is_send_email" value="1" {{ old('is_send_email') == '1' ? 'checked' : '' }}
        class="flex-1 py-2">
</div>

<div class="flex items-center mb-5">
    <label class="inline-block w-32 mr-8 text-left 
                              font-bold text-gray-600">評価 <span class="text-red-400">※</span></label>
    <select name="score" class="flex-1 py-2 border-2 border-gray-200
                   text-gray-600 placeholder-gray-400">
        <option value="">選択してください</option>
        <option value="1">1点</option>
        <option value="2">2点</option>
        <option value="3">3点</option>
        <option value="4">4点</option>
        <option value="5">5点</option>
    </select>
</div>

<div class="flex mb-5">
    <label class="inline-block w-32 mr-8 text-left font-bold text-gray-600">ご意見</label>
    <textarea rows="10" cols="60" name="feedback" value="{{ old('feedback') }}" placeholder=" 入力して下さい"
        class="flex-1 py-2 border-2 border-gray-200"></textarea>
</div>
