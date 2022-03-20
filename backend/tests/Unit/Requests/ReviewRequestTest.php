<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ReviewRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReviewRequestTest extends TestCase
{
    /**
     * @dataProvider dataReviewRegistration
     */
    public function testReviewRegistration(array $key, array $values, bool $expect)
    {
        $dataList = array_combine($key, $values);

        $request = new ReviewRequest();

        $rules = $request->rules();

        $validator = Validator::make($dataList, $rules);

        $result = $validator->passes();

        $this->assertEquals($expect, $result);
    }

    public function dataReviewRegistration()
    {
        return [
            'OK' => [
                ['name', 'gender', 'age_id', 'email', 'score'],
                ['testuser', 1, 1, 'test@example.com', 2],
                true
            ],
            '名前必須エラー' => [
                ['name', 'gender', 'age_id', 'email', 'score'],
                [null, 1, 1, 'test@example.com', 2],
                false
            ],
        ];
    }
}
