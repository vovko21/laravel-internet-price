@extends('layouts.master')

@section('includes')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/clientside/cart.css" rel="stylesheet"/>
@endsection

@section('content')
    <div class="container">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-md-9">
                    <div class="ibox">
                        @if($order == null || $order->products_electro->isEmpty())
                            <div class="ibox-content d-flex">
                                <h2 class="justify-items-center">Кошик пустий</h2>
                            </div>
                        @else
                            <div class="ibox-title">
                                <span
                                    class="pull-right">(<strong>{{$order->count_products_electro()}}</strong>) items</span>
                                <h5>Items in your cart</h5>
                            </div>

                            @foreach($order->products_electro as $product)
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table shoping-cart-table">
                                            <tbody>
                                            <tr>
                                                <td width="90">
                                                    <div class="cart-product-imitation">
                                                    </div>
                                                </td>
                                                <td class="desc">
                                                    <h3>
                                                        <a href="{{ url('view', [$product->id]) }}" class="link-dark">
                                                            {{$product->name}}
                                                        </a>
                                                    </h3>
                                                    <p class="small">
                                                        It is a long established fact that a reader will be distracted
                                                        by the
                                                        readable
                                                        content of a page when looking at its layout. The point of using
                                                        Lorem
                                                        Ipsum is
                                                    </p>
                                                    <dl class="small m-b-none">
                                                        <dt>Description lists</dt>
                                                        <dd>A description list is perfect for defining terms.</dd>
                                                    </dl>

                                                    <form role="form" method="POST"
                                                          action="{{route('cart-remove', ['id' => $product->id])}}">
                                                        <div class="m-t-sm">
                                                            <button class="btn btn-outline-dark"><i
                                                                    class="fa fa-gift"></i> Add gift package
                                                            </button>
                                                            <button class="btn btn-outline-danger"><i
                                                                    class="fa fa-trash"></i> Remove item
                                                            </button>
                                                            @csrf
                                                        </div>
                                                    </form>
                                                </td>

                                                <td>
                                                    {{ $product->price_uah }}
                                                    <s class="small text-muted">{{ $product->price_discount }}</s>
                                                </td>
                                                <td width="65">
                                                    <div class="d-flex">
                                                        <form class="d-flex" role="form" method="POST"
                                                              action="{{ route('cart-remove', ['id' => $product->id]) }}">
                                                            <button type="submit" class="btn btn-outline-secondary">
                                                                <i class="fas fa-chevron-left"></i>
                                                            </button>
                                                            @csrf
                                                        </form>
                                                        {{--                                                <form class="d-flex" role="form" method="POST" action="{{ route('cart-quantity', ['id' => $product->id]) }}">--}}
                                                        <input type="number" class="form-control"
                                                               value="{{ $product->pivot->quantity }}"
                                                               style="width: 60px" name="quantity" readonly>
                                                        {{--                                                </form>--}}
                                                        <form id="add-form" class="d-flex" role="form" method="POST"
                                                              action="{{route('cart-add', ['id' => $product->id])}}">
                                                            <button type="submit" class="btn btn-outline-secondary">
                                                                <i class="fas fa-chevron-right"></i>
                                                            </button>
                                                            @csrf
                                                        </form>
                                                    </div>


                                                    <form id="add-form" class="d-flex" role="form" method="POST"
                                                          action="{{route('cart-add', ['id' => $product->id])}}">
                                                        @csrf
                                                    </form>
                                                </td>
                                                <td>
                                                    <h4>
                                                        {{$product->getPriceByQuantity()}}
                                                    </h4>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="ibox-content">
                            <a class="btn btn-primary pull-right" href=" {{ route('cart-confirmation') }}"><i
                                    class="fa fa fa-shopping-cart"></i> Checkout</a>
                            <a class="btn btn-white" href="/"><i class="fa fa-arrow-left"></i> Continue shopping</a>
                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Cart Summary</h5>
                        </div>
                        <div class="ibox-content">
                    <span>
                        Total
                    </span>
                            <h2 class="font-bold">
                                @if($order != null)
                                    {{$order->getFullPrice()}}
                                @else
                                    0
                                @endif
                            </h2>

                            <hr>
                            <span class="text-muted small">
                        *For United States, France and Germany applicable sales tax will be applied
                    </span>
                            <div class="m-t-sm">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i>
                                        Checkout</a>
                                    <a href="#" class="btn btn-white btn-sm"> Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Support</h5>
                        </div>
                        <div class="ibox-content text-center">
                            <h3><i class="fa fa-phone"></i> +43 100 783 001</h3>
                            <span class="small">
                        Please contact with us if you have any questions. We are avalible 24h.
                    </span>
                        </div>
                    </div>

                    <div class="ibox">
                        <div class="ibox-content">

                            <p class="font-bold">
                                Other products you may be interested
                            </p>
                            <hr>
                            <div>
                                <a href="#" class="product-name"> Product 1</a>
                                <div class="small m-t-xs">
                                    Many desktop publishing packages and web page editors now.
                                </div>
                                <div class="m-t text-righ">

                                    <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i
                                            class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <a href="#" class="product-name"> Product 2</a>
                                <div class="small m-t-xs">
                                    Many desktop publishing packages and web page editors now.
                                </div>
                                <div class="m-t text-righ">

                                    <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i
                                            class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
