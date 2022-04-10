<form action="{{ route('admin.search')}}" method="post">
    @csrf
    <div class="flex justify-center items-center p-2">
        <div class="grid grid-cols-1 gap-3">
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="flex justify-start my-2">店名</label>
                    @if ($user->role == 1)
                    <input type="text" class="p-4 border border-gray-200 rounded-md outline-none" placeholder="入力してください"
                        name="shop_name" value="{{ $request->shop_name ?? '' }}">
                    @else
                    <input type="text" class="p-4 border border-gray-200 rounded-md outline-none pointer-events-none"
                        name="shop_name" value="{{ $user->shop_name }}">
                    @endif
                </div>
                <div>
                    <label class="flex justify-start my-2">年代</label>
                    <select class="p-4 border border-gray-200 rounded-md outline-none" value="{{ $request->age ?? ''}}"
                        name="age">
                        <option value="99" @if(!isset($request->age)) selected
                            @elseif($request->age==99) selected
                            @endif>全て</option>
                        <option value="1" @if(!isset($request->age))
                            @elseif($request->age==1) selected
                            @endif>10代以下</option>
                        <option value="2" @if(!isset($request->age))
                            @elseif($request->age==2) selected
                            @endif>20代</option>
                        <option value="3" @if(!isset($request->age))
                            @elseif($request->age==3) selected
                            @endif>30代</option>
                        <option value="4" @if(!isset($request->age))
                            @elseif($request->age==4) selected
                            @endif>40代</option>
                        <option value="5" @if(!isset($request->age))
                            @elseif($request->age==5) selected
                            @endif>50代</option>
                        <option value="6" @if(!isset($request->age))
                            @elseif($request->gender==6) selected
                            @endif>60代以上</option>
                    </select>
                </div>
                <div>
                    <label class="flex justify-start my-2">性別</label>
                    <input type="radio" class="p-4" name="gender" value="99" @if(!isset($request->gender)) checked
                    @elseif($request->gender==99) checked @endif>全て
                    <input type="radio" class="p-4" name="gender" value="0" @if(!isset($request->gender))
                    @elseif($request->gender==0) checked @endif>男性
                    <input type="radio" class="p-4" name="gender" value="1" @if(!isset($request->gender))
                    @elseif($request->gender==1) checked @endif>女性
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="flex justify-start my-2">登録日</label>
                    <input type="date" class="p-4 border border-gray-200 rounded-md outline-none"
                        value="{{ $request->created_start_date ?? ''}}" name="created_start_date">
                    <span class="mr-0">~</span>
                </div>
                <div>
                    <label class="flex justify-start my-2"><br></label>
                    <input type="date" class="p-4 border border-gray-200 rounded-md outline-none"
                        value="{{ $request->created_end_date ?? ''}}" name="created_end_date">
                </div>
                <div>
                    <label class="flex justify-start my-2">メール送信許可(有りのみ)</label>
                    <input type="checkbox" class="p-4" name="is_send_email" @if(!isset($request->is_send_email))
                    @elseif($request->is_send_email) checked
                    @endif>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="flex justify-start my-2">キーワード</label>
                    <input type="text" class="p-4 border border-gray-200 rounded-md outline-none"
                        value="{{ $request->keyword ?? ''}}" placeholder="キーワードを入力" name="keyword">
                </div>
            </div>

            <div class="flex justify-center">
                <button name="reset" class="py-3 px-8 font-bold">リセット</button>
                <button class="py-3 px-8 bg-blue-400 text-white font-bold rounded-full">検索</button>
            </div>
        </div>
    </div>
</form>
