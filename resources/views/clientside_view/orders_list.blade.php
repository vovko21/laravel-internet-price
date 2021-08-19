@extends('layouts.master')

@include('clientside_view.header')

@section('content')
    <div class="container mt-5">
        <div class="accordion" id="accordionExample">
            @foreach($orders as $order)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="order-header-{{$order->id}}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#order-{{$order->id}}" aria-expanded="true" aria-controls="order-{{$order->id}}">
                            <div class="me-2">Замовлення - №{{$order->id}} </div>
                            <div><small> від {{$order->created_at}}</small></div>
                        </button>
                    </h2>
                    <div id="order-{{$order->id}}" class="accordion-collapse collapse show" aria-labelledby="order-header-{{$order->id}}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <ul>
                                <li>
                                    <span>Сума: </span>
                                    <span>{{$order->getFullPrice()}}</span>
                                </li>
                            </ul>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-order-{{$order->id}}">
                                Усі товари
                            </button>
                            <!-- Vertically centered modal -->
                            <div class="modal fade" id="modal-order-{{$order->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Усі товари</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @foreach($order->products_electro as $order_product)
                                                {{$order_product->name}}<br/>
                                            @endforeach
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
