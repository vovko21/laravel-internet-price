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
        <div class="mb-3">
            <label for="id" class="form-label">Id</label>
            <input name="id" type="text" class="form-control" id="id" value="{{$electro->id}}" readonly>
        </div>
        <div class="mb-3">
            <label for="article" class="form-label">Article</label>
            <input name="article" type="text" class="form-control" id="article" value="{{$electro->article}}" readonly>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control" id="name" value="{{$electro->name}}" readonly>
        </div>
        <div class="mb-3">
            <label for="price_dollar" class="form-label">Price Dollar</label>
            <input name="price_dollar" type="text" class="form-control" id="price_dollar"
                   value="{{$electro->price_dollar}}" readonly>
        </div>
        <div class="mb-3">
            <label for="price_uah" class="form-label">Price UAH</label>
            <input name="price_uah" type="text" class="form-control" id="price_uah" value="{{$electro->price_uah}}" readonly>
        </div>
        <div class="mb-3">
            <label for="price_discount" class="form-label">Price Discount</label>
            <input name="price_discount" type="text" class="form-control" id="price_discount"
                   value="{{$electro->price_discount}}" readonly>
        </div>
        <div class="mb-3">
            <label for="code_UKTZED" class="form-label">Code UKTZED</label>
            <input name="code_UKTZED" type="text" class="form-control" id="code_UKTZED"
                   value="{{$electro->code_UKTZED}}" readonly>
        </div>
        <div class="mb-3">
            <label for="site_url" class="form-label">Site URL</label>
            <input name="site_url" type="text" class="form-control" id="site_url"
                   value="{{$electro->site_url}}" readonly>
        </div>
        <div class="mb-3">
            <label for="min" class="form-label">Min</label>
            <input name="min" type="text" class="form-control" id="min"
                   value="{{$electro->min}}" readonly>
        </div>
        <div class="mb-3">
            <label for="packaging" class="form-label">Packaging</label>
            <input name="min" type="packaging" class="form-control" id="packaging"
                   value="{{$electro->packaging}}" readonly>
        </div>
        <div class="mb-3">
            <label for="box" class="form-label">Box</label>
            <input name="min" type="box" class="form-control" id="box"
                   value="{{$electro->box}}" readonly>
        </div>
        <div class="mb-3">
            <label for="updated_at" class="form-label">Updated At</label>
            <input name="min" type="packaging" class="form-control" id="updated_at"
                   value="{{$electro->updated_at}}" readonly>
        </div>

        <a class="btn btn-white" href="{{route('electro.index')}}"><i class="fa fa-arrow-left"></i> Назад</a>
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

