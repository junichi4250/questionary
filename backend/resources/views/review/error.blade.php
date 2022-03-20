@if($errors->any())
<div class="bg-white border-2 border-gray-200 text-red-600 p-4 mb-4">
    <p class="">{{ $errors->first('name') }}</p>
    <p class="">{{ $errors->first('age_id') }}</p>
    <p class="">{{ $errors->first('email') }}</p>
    <p class="">{{ $errors->first('score') }}</p>
</div>
@endif
