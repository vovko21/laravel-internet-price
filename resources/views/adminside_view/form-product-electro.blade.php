@extends('layouts.master-admin')

@section('includes')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css">
@endsection

@section('content')
    <div class="container mt-3">
        @if(isset($electro))
            <form role="form" method="POST" enctype="multipart/form-data"
                  action="{{ route('electro.update', $electro) }}">
                <div class="mb-3">
                    <label for="id" class="form-label">Id</label>
                    <input name="id" type="text" class="form-control" id="id" value="{{$electro->id}}" readonly>
                </div>
                <div class="mb-3">
                    <label for="article" class="form-label">Article</label>
                    <input name="article" type="text" class="form-control" id="article" value="{{$electro->article}}" readonly>
                </div>
                <div class="mb-3">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="name" class="form-label">Name</label>
                    <input name="name" type="text" class="form-control" id="name" value="{{$electro->name}}">
                </div>
                <div class="mb-3">
                    @error('price_dollar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="price_dollar" class="form-label">Price Dollar</label>
                    <input name="price_dollar" type="text" class="form-control" id="price_dollar"
                           value="{{$electro->price_dollar}}">
                </div>
                <div class="mb-3">
                    @error('price_uah')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="price_uah" class="form-label">Price UAH</label>
                    <input name="price_uah" type="text" class="form-control" id="price_uah"
                           value="{{$electro->price_uah}}">
                </div>
                <div class="mb-3">
                    @error('price_discount')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="price_discount" class="form-label">Price Discount</label>
                    <input name="price_discount" type="text" class="form-control" id="price_discount"
                           value="{{$electro->price_discount}}">
                </div>
                <div class="mb-3">
                    <label for="code_UKTZED" class="form-label">Code UKTZED</label>
                    <input name="code_UKTZED" type="text" class="form-control" id="code_UKTZED"
                           value="{{$electro->code_UKTZED}}" readonly>
                </div>
                @method('PUT')
                @csrf
                <a class="btn btn-white" href="{{route('electro.index')}}"><i class="fa fa-arrow-left"></i> Назад</a>
            </form>
        @else
            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('electro.store') }}">
                <div class="mb-3">
                    <label for="id" class="form-label">Id</label>
                    <input name="id" type="text" class="form-control" id="id" readonly>
                </div>
                <div class="mb-3">
                    @error('article')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="article" class="form-label">Article</label>
                    <input name="article" type="text" class="form-control" id="article">
                </div>
                <div class="mb-3">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="name" class="form-label">Name</label>
                    <input name="name" type="text" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    @error('price_dollar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="price_dollar" class="form-label">Price Dollar</label>
                    <input name="price_dollar" type="text" class="form-control" id="price_dollar">
                </div>
                <div class="mb-3">
                    @error('price_uah')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="price_uah" class="form-label">Price UAH</label>
                    <input name="price_uah" type="text" class="form-control" id="price_uah">
                </div>
                <div class="mb-3">
                    @error('price_discount')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="price_discount" class="form-label">Price Discount</label>
                    <input name="price_discount" type="text" class="form-control" id="price_discount">
                </div>
                <div class="mb-3">
                    @error('code_UKTZED')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <label for="code_UKTZED" class="form-label">Code UKTZED</label>
                    <input name="code_UKTZED" type="text" class="form-control" id="code_UKTZED">
                </div>
                @method('POST')
                @csrf
                <a class="btn btn-white" href="{{route('electro.index')}}"><i class="fa fa-arrow-left"></i>Назад</a>
                <button type="submit" class="btn btn-success">Створити</button>
            </form>
            @endif
    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>
    <script src="{{asset('js/adminside/order.js')}}"></script>
@endsection
