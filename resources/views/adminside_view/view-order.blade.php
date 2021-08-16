@extends('layouts.master-admin')

@section('includes')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css">
@endsection

@section('content')
    <div class="container mt-3">
            <div class="mb-3">
                <label for="id" class="form-label">Id</label>
                <input type="text" class="form-control" id="id" value="{{$order->id}}" readonly>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" class="form-control" id="status" aria-describedby="emailHelp" value="{{$order->status}}" readonly>
                <div id="emailHelp" class="form-text">1 - created, 2 - accepted</div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input name="name" type="text" class="form-control" id="name" value="{{$order->name}}" readonly>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input name="phone" type="text" class="form-control" id="phone" value="{{$order->phone}}" readonly>
            </div>
            <div class="mb-3">
                <label for="creates_at" class="form-label">Created At</label>
                <input type="text" class="form-control" id="creates_at" value="{{$order->created_at}}" readonly>
            </div>
            <div class="mb-3">
                <label for="updated_at" class="form-label">Updated At</label>
                <input type="text" class="form-control" id="updated_at" value="{{$order->updated_at}}" readonly>
            </div>

            <a class="btn btn-white" href="{{route('orders.index')}}"><i class="fa fa-arrow-left"></i> Назад</a>
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>
    <script src="{{asset('js/adminside/order.js')}}"></script>
@endsection

