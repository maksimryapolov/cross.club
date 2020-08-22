@extends('admin.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            @if($feedback->isEmpty())
                <div class="empty-block h1">
                    <p class="empty-block__description">Отзывов нет... :(</p>
                </div>
            @else
                <table>
                    <caption>
                        Список товаров
                    </caption>
                    <tr>
                        <th>Идентификатор</th>
                        <th>Наименование формы</th>
                        <th>Имя пользователя</th>
                        <th>Телефон</th>
                        <th>Дата</th>
                        <th>Просмотр</th>
                        <th>Удалить</th>
                    </tr>
                    @foreach($feedback as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->client }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="{{ route('admin.feedback.show', $item->id) }}">
                                    <img class="icon-edit" src="{{ asset('images/svg/edit.svg') }}" alt="edit_icon">
                                </a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.cabinet.destroy', $item->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button-close">&times;</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="mt-5 mb-5 font-weight-bold b-paginate">
                    {{ $feedback->links() }}
                </div>
            @endisset
        </div>
    </div>
</div>
@endsection
