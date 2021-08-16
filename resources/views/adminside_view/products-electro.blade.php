@extends('layouts.master-admin')

@section('includes')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css">
@endsection

@section('content')
    <div class="container mt-5">
        <table class="table table-hover order-table"
               data-toggle="table"
               data-pagination="true"
               data-search="true">
            <thead>
            <tr>
                <th data-sortable="true" data-field="id">#</th>
                <th data-sortable="true" data-field="article">Article</th>
                <th data-sortable="true" data-field="name">Name</th>
                <th data-sortable="true" data-field="price_dollar">Price Dollar</th>
                <th data-sortable="true" data-field="price_uah">Price UAH</th>
                <th data-sortable="true" data-field="price_discount">Price Discount</th>
                <th data-field="actions">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($productsElectro as $electro)
                <tr>
                    <td>{{$electro->id}}</td>
                    <td>{{$electro->article}}</td>
                    <td>{{$electro->name}}</td>
                    <td>{{$electro->price_dollar}}</td>
                    <td>{{$electro->price_uah}}</td>
                    <td>{{$electro->price_discount}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route('electro.show', $electro)}}">Показати</a>
                        <a class="btn btn-warning" href="{{route('electro.edit', $electro)}}">Змінити</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal{{$electro->id}}">
                            Видалити
                        </button>

                        <!-- DELETE Modal -->
                        <div class="modal fade" id="delete-modal{{$electro->id}}" tabindex="-1" aria-labelledby="delete-modal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Видалення</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Впевнені?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Скасувати
                                        </button>
                                        <form method="POST" action="{{ route('electro.destroy', $electro) }}">
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Видалити</button>
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn btn-success" href="{{route('electro.create')}}">Створити</a>
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

