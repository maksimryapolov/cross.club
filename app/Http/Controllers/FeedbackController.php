<?php

namespace App\Http\Controllers;

use App\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $this->check($request);
        Feedback::create($request->all());
        return response()->json(['response' => true]);
    }

    /**
     * @param $request
     * @return mixed
     */
    private function check($request)
    {
        return $request->validate(
            [
                'email' => ['required', 'email'],
                'client' => ['required'],
                'name' => ['required']
            ],
            [
                'email.required' => 'Email обязательное для заполнения',
                'email.email' => 'Укажите корректный адрес электронной почты.',
                'client.required' => 'Поле «Имя» обязательно для заполнения',
                'name.required' => 'Ощибка добавления'
            ]
        );
    }
}
