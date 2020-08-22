@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-8">
                <form id="contact-form" method="POST" enctype="multipart/form-data" action="{{ route('admin.cabinet.update', $product->id) }}">
                    @csrf
                    @method('PATCH')

                    <div class="controls">

                        <div class="row">
                            <div class="text-center col-12 image-product-block">
                                <p class="h1">Редактирование товара</p>
                                @empty($product->image)
                                    <label class="h3 link-label" for="form_image">
                                        Нет фото
                                    </label>
                                @else
                                    <img src="{{ $product->image }}" class="image-product" alt="{{ $product->name }}">
                                @endempty
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_name">Название</label>
                                    <input id="form_name" type="text" name="name" value="{{ $product->name }}" class="form-control" required="required" data-error="Firstname is required.">
                                    @if($errors->has('name'))
                                        <div class="alert alert-danger mt-1" role="alert">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_price">Цена</label>
                                    <input id="form_price" type="text" name="price" value="{{ $product->price }}" class="form-control" required="required" data-error="Lastname is required.">
                                    @if($errors->has('price'))
                                        <div class="alert alert-danger mt-1" role="alert">{{ $errors->first('price') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_image">Заменить фото</label>
                                    <input id="form_image" type="file" name="image">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_popular">Популярный товар</label>
                                    <input id="form_popular"
                                           type="checkbox"
                                           name="popular"
                                           @if($product->popular)
                                                checked=""
                                           @endif
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group link-item h4">
                                    <a class="offer_link" href="{{ route('admin.offers.create', ['product_id' => $product->id]) }}">Добавить предложение</a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @if($errors->has('product_id'))
                                <div class="alert alert-danger col-md-12" role="alert">
                                    {{ $errors->first('product_id') }}
                                </div>
                            @endif

                            <div class="h4 col-md-12 text-center">Торговые предложения</div>
                            @forelse($offer as $oItem)
                                <div class="col-md-6 mb-4">
                                    <a title="Редактировать" class="mb-1 number-offer" href="{{ route('admin.offers.edit', ['offer' => $oItem->id]) }}">№&nbsp;{{ $oItem->id }}</a>
                                    <ul class="list-group">
                                        <li class="list-group-item">Размер:&nbsp;{{ $oItem->size }}</li>
                                        @if($oItem->price)
                                            <li class="list-group-item">Цена:&nbsp;{{ $oItem->price }}&nbsp;₽</li>
                                        @endif
                                    </ul>
                                </div>
                            @empty
                                <div class="h4 text-monospace text-center m-4">Нет торговых предложений</div>
                            @endforelse
                        </div>

                        <div class="text-center">
                            <input type="submit" class="btn btn-success btn-send col-md-6" value="Изменить">
                        </div>

                    </div>
                </form>
                <form method="POST" class="text-center" action="{{ route('admin.cabinet.destroy', $product->id) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-success btn-send col-md-6" value="Удалить">
                </form>
            </div>
        </div>
    </div>
@endsection