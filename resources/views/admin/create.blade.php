@extends('admin.layout')

@section('content')
<div class="container">

    <div class="row justify-content-md-center">

        <div class="col-lg-8">
            <form id="contact-form" method="POST" enctype="multipart/form-data" action="{{ route('admin.cabinet.store') }}">
                @csrf
                @method('POST')

                <div class="messages"></div>

                <div class="controls">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_name">Название</label>
                                <input id="form_name" type="text" name="name" value="{{ old('name') }}" class="form-control" required="required" data-error="Firstname is required.">
                                @if($errors->has('name'))
                                    <div class="alert alert-danger mt-1" role="alert">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_price">Цена</label>
                                <input id="form_price" type="text" name="price" value="{{ old('price') }}" class="form-control" required="required" data-error="Lastname is required.">
                                @if($errors->has('price'))
                                    <div class="alert alert-danger mt-1" role="alert">{{ $errors->first('price') }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form_image">Фото</label>
                            <input type="file" id="form_image" name="image">
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