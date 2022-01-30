<?php

namespace App\Http\Controllers;

use App\Models\Age;
use App\Models\Answer;
use Illuminate\Http\Request;

class FormController extends Controller
{
    private $formItems = ["fullname", "gender", "age_id", "email", "is_send_email", "feedback"];

    public function index() {
        $ages = Age::all();
        return view('form.index', [
            'ages' => $ages,
        ]);
    }

    public function post(Request $request) {
        $request->merge([
            'is_send_email' => $request->boolean('is_send_email') ? 1 : 0,
        ]);

        $input = $request->only($this->formItems);

        $request->session()->put("form_input", $input);

        return redirect()->action([FormController::class, 'confirm']);
    }

    public function confirm(Request $request) {
        $input = $request->session()->get("form_input");

        // sessionが空ならフォームを表示
        if (!$input) {
            return redirect()->action([FormController::class, 'index']);
        }

        return view("form.confirm", ["input" => $input]);
    }

    public function send(Request $request, Answer $answer) {
        $input = $request->session()->get("form_input");

        // 戻るボタンが押されたとき
        if ($request->has("back")) {
            return redirect()->action([FormController::class, 'index'])
                ->withInput($input);
        }

        // sessionが空ならフォームを表示
        if (!$input) {
            return redirect()->action([FormController::class, 'index']);
        }

        $answer->fill($input);
        $answer->save();

        $request->session()->forget("form_input");

        return redirect()->action([FormController::class, 'complete']);
    }

    public function complete() {
        return view("form.complete");
    }
}
