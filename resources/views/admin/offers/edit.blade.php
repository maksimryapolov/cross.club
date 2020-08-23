@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-8">
                <form id="contact-form" method="POST" enctype="multipart/form-data" action="{{ route('admin.offers.update', $offer->id) }}">
                    @csrf
                    @method('PATCH')

                    <div class="controls">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="size">Размер</label>
                                    <select id="size" name="size" class="form-control">
                                        @foreach($sizes as $size)
                                            <option value="{{ $size }}"
                                                    @if($offer->size == $size)
                                                        selected
                                                    @endif
                                            >
                                                {{ $size }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('size'))
                                        <div class="alert alert-danger mt-1" role="alert">{{ $errors->first('size') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product">Товар</label>
                                    <select id="product" name="product_id" class="form-control">
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}"
                                                    @if($product->id == $offer->product_id)
                                                        selected
                                                    @endif
                                            >
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('product_id'))
                                        <div class="alert alert-danger mt-1" role="alert">{{ $errors->first('product_id') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_quantity">Количество</label>
                                    <input id="form_quantity" type="text" name="quantity" value="{{ $offer->quantity }}" class="form-control" data-error="Lastname is required.">
                                    @if($errors->has('quantity'))
                                        <div class="alert alert-danger mt-1" role="alert">{{ $errors->first('quantity') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <input type="submit" class="btn btn-success btn-send col-md-6" value="Изменить">
                        </div>
                    </div>
                </form>
                <form method="POST" class="text-center" action="{{ route('admin.offers.destroy', $offer->id) }}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-success btn-send col-md-6" value="Удалить">
                </form>
            </div>
        </div>
    </div>
@endsection