@extends('layouts.master')

@include('clientside_view.header')

@section('content')
    <div class="container mt-5">
        <div class="accordion" id="accordionExample">
            @foreach($orders as $order)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="order-header-{{$order->id}}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#order-{{$order->id}}" aria-expanded="false"
                                aria-controls="order-{{$order->id}}">
                            <div class="me-2">Замовлення - №{{$order->id}} </div>
                            <div><small> від {{$order->created_at}}</small></div>
                        </button>
                    </h2>
                    <div id="order-{{$order->id}}" class="accordion-collapse collapse"
                         aria-labelledby="order-header-{{$order->id}}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-4">
                                    <div class="list-group" id="list-tab" role="tablist">
                                        <a class="list-group-item list-group-item-action" id="list-home-list" data-bs-toggle="list" href="#list-home-{{$order->id}}" role="tab" aria-controls="list-home">Сума</a>
                                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-bs-toggle="list" href="#list-profile-{{$order->id}}" role="tab" aria-controls="list-profile">Статус</a>
                                        <a class="list-group-item list-group-item-action" id="list-messages-list" data-bs-toggle="list" href="#list-messages-{{$order->id}}" role="tab" aria-controls="list-messages">Messages</a>
                                        <!-- Button trigger modal -->
                                        <a class="list-group-item list-group-item-action" id="list-settings-list" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                           data-bs-target="#modal-order-{{$order->id}}">Усі товари</a>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="list-home-{{$order->id}}" role="tabpanel" aria-labelledby="list-home-list">
                                            <span>{{$order->getFullPrice()}}</span>
                                        </div>
                                        <div class="tab-pane fade" id="list-profile-{{$order->id}}" role="tabpanel" aria-labelledby="list-profile-list">
                                            <span>{{$order->status}}</span>
                                        </div>
                                        <div class="tab-pane fade" id="list-messages-{{$order->id}}" role="tabpanel" aria-labelledby="list-messages-list">...</div>
                                        <div class="tab-pane fade" id="list-settings-{{$order->id}}" role="tabpanel" aria-labelledby="list-settings-list">...</div>
                                    </div>
                                </div>
                            </div>
                            <!-- Vertically centered modal -->
                            <div class="modal fade" id="modal-order-{{$order->id}}" tabindex="-1"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Усі товари</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-striped table-hover">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Назва</th>
                                                    <th scope="col">Ціна</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($order->products_electro as $order_product)
                                                        <tr>
                                                            <th scope="row">{{$order_product->name}}</th>
                                                            <td>{{$order_product->price_uah}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
