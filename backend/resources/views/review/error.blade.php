@if($errors->any())
<div class="bg-white border border-gray-200 text-red-600 p-4 mb-4 rounded-md w-1/2 mx-auto">
    <p class="">{{ $errors->first('name') }}</p>
    <p class="">{{ $errors->first('age_id') }}</p>
    <p class="">{{ $errors->first('email') }}</p>
    <p class="">{{ $errors->first('score') }}</p>
</div>
@endif
