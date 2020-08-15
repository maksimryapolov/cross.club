@extends('admin.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            @if($products->isEmpty())
                <div class="empty-block h1">
                    <p class="empty-block__description">Каталог пока что пустой... :(</p>
                    <p><a class="empty-block__link" href="{{ route('admin.cabinet.create') }}">Добавить товар</a></p>
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
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <a href="{{ route('admin.cabinet.edit', $product->id) }}">
                                    <img class="icon-edit" src="{{ asset('images/svg/edit.svg') }}" alt="edit_icon">
                                </a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.cabinet.destroy', $product->id) }}">
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
