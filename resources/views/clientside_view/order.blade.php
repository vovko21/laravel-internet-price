@extends('layouts.master')

@section('content')
    <div class="container">
        <form role="form" method="POST" action="{{ route('cart-confirm') }}">
            <div class="form-floating mb-3">
                <input class="form-control" id="inputName" type="text" name="name" />
                <label for="inputEmail">Name</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="inputPhone" type="text" name="phone" />
                <label for="inputEmail">Phone</label>
            </div>
            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
            @csrf
        </form>
    </div>
@endsection

@section('footer')
    @include('clientside_view.footer')
@endsection
