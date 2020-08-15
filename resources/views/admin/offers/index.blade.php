@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if($offers->isEmpty())
                    <div class="empty-block h1">
                        <p class="empty-block__description">Каталог пока что пустой... :(</p>
                        <p><a class="empty-block__link" href="{{ route('admin.offers.create') }}">Добавить товар</a></p>
                    </div>
                @else
                    <table>
                        <caption>
                            Список товаров
                        </caption>
                        <tr>
                            <th>Идентификатор</th>
                            <th>Наименование товара</th>
                            <th>Цена, руб.</th>
                            <th>Редактировать</th>
                            <th>Удалить</th>
                        </tr>
                        @foreach($offers as $offer)
                            <tr>
                                <td>{{ $offer->id }}</td>
                                <td>{{ $offer->product_id()->name }}</td>
                                <td>{{ $offer->price }}</td>
                                <td>
                                    <a href="{{ route('admin.offers.edit', $offer->id) }}">
                                        <img class="icon-edit" src="{{ asset('images/svg/edit.svg') }}" alt="edit_icon">
                                    </a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('admin.offers.destroy', $offer->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button-close">&times;</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endisset
            </div>
        </div>
    </div>
@endsection
