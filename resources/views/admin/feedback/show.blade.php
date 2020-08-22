@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-12">
                <div class="card font-weight-bold card-info">
                    <div class="card-header text-center">
                        <p class="h1">Обратная связь №{{ $feedback->id }}</p>
                    </div>
                    <div>
                        <div class="controls">
                            <div class="">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item list-flex-item">
                                        <div>Название формы:</div>
                                        <div>{{ $feedback->name }}</div>
                                    </li>
                                    <li class="list-group-item list-flex-item">
                                        <div>Дата создания:</div>
                                        <div>{{ $feedback->created_at }}</div>
                                    </li>
                                    <li class="list-group-item list-flex-item">
                                        <div>Имя пользователя:</div>
                                        <div>{{ $feedback->client }}</div>
                                    </li>
                                    <li class="list-group-item list-flex-item">
                                        <div>Телефон:</div>
                                        <div>{{ $feedback->phone }}</div>
                                    </li>
                                    <li class="list-group-item list-flex-item">
                                        <div>Email:</div>
                                        <div>{{ $feedback->email }}</div>
                                    </li>
                                    @isset($feedback->name_product)
                                        <li class="list-group-item list-flex-item">
                                            <div>Название товара:</div>
                                            <div>{{ $feedback->name_product }}</div>
                                        </li>
                                        <li class="list-group-item list-flex-item">
                                            <div>Цена:</div>
                                            <div>{{ $feedback->price }}</div>
                                        </li>
                                        @isset($feedback->size)
                                            <li class="list-group-item list-flex-item">
                                                <div>Размер:</div>
                                                <div>{{ $feedback->size }}</div>
                                            </li>
                                        @endisset
                                    @endisset
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @isset($feedback->message)
                    <div class="mt-5 mb-5">
                        <div class="card-header text-center">
                            <p class="h1">Сообщение:</p>
                        </div>
                        <p class="text-justify font-weight-bold bg-white p-4">
                            {{ $feedback->message }}
                        </p>
                    </div>
                @endisset
                <a class="btn col-3 font-weight-bold" href="{{ route('admin.feedback') }}">&#8592;&nbsp;Назад</a>
            </div>
        </div>
    </div>
@endsection