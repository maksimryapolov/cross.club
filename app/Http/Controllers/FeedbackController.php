<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $params = $request->all();
        $emailTo = $params['email'];

        Feedback::create($params);

        Mail::to($emailTo)
            ->bcc('crossshop31@gmail.com')
            ->send(new WelcomeMail($params));

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
