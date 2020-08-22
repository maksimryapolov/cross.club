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
                        <p class="text-justify font-weight-bold bg-white p-4">Ambitioni dedisse scripsisse iudicaretur. Cras mattis iudicium purus sit amet fermentum. Donec sed odio operae, eu vulputate felis rhoncus. Praeterea iter est quasdam res quas ex communi. At nos hinc posthac, sitientis piros Afros. Petierunt uti sibi concilium totius Galliae in diem certam indicere. Cras mattis iudicium purus sit amet fermentum.</p>
                    </div>
                @endisset
            </div>
        </div>
    </div>
@endsection