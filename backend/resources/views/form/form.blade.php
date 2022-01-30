@csrf
<div class="flex items-center mb-5">
    <label class="inline-block w-20 mr-6 text-right font-bold text-gray-600">氏名</label>
    <input type="text" name="fullname" value={{ old('name') }} placeholder="入力してください"
        class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400 text-gray-600 placeholder-gray-400 outline-none">
</div>
<div class="flex items-center mb-5">
    <label class="inline-block w-20 mr-6 text-right 
                                 font-bold text-gray-600">性別</label>
    <input type="radio" name="gender" value="0" {{ old('gender') != '1' ? 'checked' : '' }} class=" flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400
        text-gray-600 placeholder-gray-400 outline-none">男性
    <input type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }} class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400 
                      text-gray-600 placeholder-gray-400 outline-none">女性
</div>

<div class="flex items-center mb-5">
    <label class="inline-block w-20 mr-6 text-right 
                              font-bold text-gray-600">年代</label>
    <select name="age_id" class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400 
                   text-gray-600 placeholder-gray-400
                   outline-none">
        <option>選択してください</option>
        @foreach($ages as $index => $age)
        <option value="{{ $index }}">{{ $age->age }}</option>
        @endforeach
    </select>
</div>

<div class="flex items-center mb-5">
    <label class="inline-block w-20 mr-6 text-right 
                                 font-bold text-gray-600">メールアドレス</label>
    <input type="email" name="email" value={{ old('email') }} placeholder=kk@kk.kk class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400 
                      text-gray-600 placeholder-gray-400
                      outline-none">
</div>

<div class="flex items-center mb-5">
    <label class="inline-block w-20 mr-6 text-right 
                                 font-bold text-gray-600">メール送信可否</label>
    <label>登録したメールアドレスにメールマガジンをお送りしてもよろしいですか？</label>
    <input type="checkbox" name="is_send_email" value="1" {{ old('is_send_email') == '1' ? 'checked' : '' }} class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400 
                      text-gray-600 placeholder-gray-400
                      outline-none">
</div>

<div class="flex mb-5">
    <label class="inline-block w-20 mr-6 text-right font-bold text-gray-600">ご意見</label>
    <textarea rows="10" cols="60" name="feedback" value={{ old('feedback') }} placeholder="入力して下さい"
        class="border-b-2 border-gray-400"></textarea>
</div>
