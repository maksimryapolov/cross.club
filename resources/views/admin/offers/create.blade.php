@extends('admin.layout')

@section('content')
    <div class="container">

        <div class="row justify-content-md-center">

            <div class="col-lg-8">
                <form id="contact-form" method="POST" enctype="multipart/form-data" action="{{ route('admin.offers.store') }}">
                    @csrf
                    @method('POST')

                    <div class="messages"></div>

                    <div class="controls">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="size">Размер</label>
                                    <select id="size" name="size" class="form-control">
                                        @foreach($sizes as $size)
                                            <option value="{{ $size }}">{{ $size }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product">Товар</label>
                                    <select id="product" name="product_id" class="form-control">
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}"
                                                    @if($product->id == $productID)
                                                        selected
                                                    @endif
                                            >
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_price">Цена</label>
                                    <input id="form_price" type="text" name="price" value="{{ old('price') }}" class="form-control" data-error="Lastname is required.">
                                    @if($errors->has('price'))
                                        <div class="alert alert-danger mt-1" role="alert">{{ $errors->first('price') }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <input type="submit" class="btn btn-success btn-send col-md-6" value="Создать">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection