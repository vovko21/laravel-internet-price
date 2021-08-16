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
                <th data-sortable="true" data-field="status">Status</th>
                <th data-sortable="true" data-field="name">Name</th>
                <th data-field="phone">Phone</th>
                <th data-sortable="true" data-field="creates_at">Created At</th>
                <th data-sortable="true" data-field="updated_at">Updated At</th>
                <th data-field="actions">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->updated_at}}</td>
                    <td>
                        @if($order->status == 0)
                        @elseif($order->status == 1)
                        <!-- Button trigger modal -->
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#accept-modal{{$order->id}}">Accept
                            </button>
                            <!-- Button trigger modal -->
                            <button class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#accept-modal{{$order->id}}-decline">Decline
                            </button>
                            <!-- AC Modal -->
                            <div class="modal fade" id="accept-modal{{$order->id}}" tabindex="-1"
                                 aria-labelledby="acceptModal" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Підтвердження</h5>
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
                                            <form role="form" method="POST"
                                                  action="{{ route('orders.accept', $order) }}">
                                                <button type="submit" class="btn btn-primary">Підтвердити</button>
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- DC Modal -->
                            <div class="modal fade" id="accept-modal{{$order->id}}-decline" tabindex="-1"
                                 aria-labelledby="declineModal" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Відхилити</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Впевнені?
                                        </div>
                                        <div class="modal-footer">
                                            <form role="form" method="POST" action="{{ route('orders.decline', $order->id) }}">
                                                <button type="submit" class="btn btn-danger">Відхилити</button>
                                                @csrf
                                            </form>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Скасувати
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <a class="btn btn-primary" href="{{route('orders.show', $order)}}">Показати</a>
                            <a class="btn btn-warning" href="{{route('orders.edit', $order)}}">Змінити</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal{{$order->id}}">
                                    Видалити
                                </button>
                            <!-- DELETE Modal -->
                            <div class="modal fade" id="delete-modal{{$order->id}}" tabindex="-1" aria-labelledby="acceptModal" aria-hidden="true">
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
                                            <form method="POST" enctype="multipart/form-data" action="{{ route('orders.destroy', $order) }}">
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Видалити</button>
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
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
