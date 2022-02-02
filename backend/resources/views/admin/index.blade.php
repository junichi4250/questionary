@extends('app')

@section('title', '管理者画面')

@section('content')

<div class="bg-gray-100 py-32 px-10 min-h-screen">
    <div class="p-10">
        <p class="text-3xl text-center mb-8">アンケート管理システム</p>
        <span class="">全25件中　11~20件</span>
        <span class="float-right">|1|2|3</span>
        <table class="table-auto text-left">
            <thead>
                <tr class="border-b-2">
                    <th class="px-8 py-2">ID</th>
                    <th class="px-24 py-2">氏名</th>
                    <th class="px-16 py-2">性別</th>
                    <th class="px-16 py-2">年代</th>
                    <th class="pr-48 pl-36 py-2">内容</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($answers as $answer)
                <tr>
                    <td class="px-8 py-2">{{ $answer->id }}</td>
                    <td class="px-24 py-2">{{ $answer->fullname }}</td>
                    <td class="px-16 py-2">{{ $answer->gender }}</td>
                    <td class="px-16 py-2">{{ $answer->age }}</td>
                    <td class="pr-48 pl-36 py-2">{{ $answer->feedback }}</td>
                    <td class="px-16 py-2">
                        <button class="py-2 px-5 bg-red-100 border border-black"
                        onclick="location.href='{{ route('admin.show', ['id' => $answer->id]) }}'">詳細</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
