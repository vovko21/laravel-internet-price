@extends('layouts.master')

@include('clientside_view.header')

@section('content')
    <div class="container">
        <div class="row mt-5 m-0 p-0">
            <aside class="col-lg-3 col-md-4 col-sm-12 m-0 p-0">
                <form class="d-flex flex-column align-self-end" method="GET" action="{{ route("all.products") }}">
                    <h3>Фільтр</h3>
                    <!--Accordion-->
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <!--Item-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseOne" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                    Ціна
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                 aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <!--Body-->
                                <div class="accordion-body">
                                    <div class="d-flex justify-content-between">
                                        <label for="price_from">Ціна від
                                            @if(isset(request()->price_from))
                                                <input class="form-control w-25p" type="text" id="price_from"
                                                       value="{{request()->price_from }}">
                                            @else
                                                <input class="form-control w-25p" type="text" id="price_from" value="0">
                                            @endif
                                        </label>
                                        <label class="justify-self-end" for="price_to">до
                                            @if(isset(request()->price_to))
                                                <input class="form-control w-25p" type="text" id="price_to"
                                                       value="{{ request()->price_to }}">
                                            @else
                                                <input class="form-control w-25p" type="text" id="price_to" value="">
                                            @endif
                                        </label>
                                    </div>
                                    <div class="middle mt-2">
                                        <div class="multi-range-slider">
                                            @if(isset(request()->price_from))
                                                <input name="price_from" type="range" id="input-left" min="0" max="1000"
                                                       value="{{request()->price_from}}">
                                            @else
                                                <input name="price_from" type="range" id="input-left" min="0" max="1000"
                                                       value="0">
                                            @endif

                                            @if(isset(request()->price_to))
                                                <input name="price_to" type="range" id="input-right" min="0" max="1000"
                                                       value="{{request()->price_to}}">
                                            @else
                                                <input name="price_to" type="range" id="input-right" min="0" max="1000"
                                                       value="1000">
                                            @endif
                                            <div class="slider">
                                                <div class="track"></div>
                                                <div class="range"></div>
                                                <div class="thumb left"></div>
                                                <div class="thumb right"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Item-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                    Релевантність
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                 aria-labelledby="flush-collapseTwo" data-bs-parent="#accordionFlushExample">
                                <!--Body-->
                                <div class="accordion-body">
                                    <div class="form-check">
                                        <input name="new" class="form-check-input" type="checkbox" value="{{request()->new}}" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Нове
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="sale" class="form-check-input" type="checkbox" value="{{request()->sale}}" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Знижка
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input name="hit" class="form-check-input" type="checkbox" value="{{request()->hit}}" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Популярне
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Buttons-->
                    <div class="col d-flex align-items-end justify-content-end">
                        <button type="submit" class="btn btn-dark">Фільтр</button>
                        <a href="{{ route("all.products") }}" class="btn btn-warning c-white ml-2">Скинути</a>
                    </div>
                </form>
            </aside>
            <section class="col-lg-9 col-md-8 col-sm-12 m-0 p-0">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center m-0">
                    @if(sizeof($filteredProducts) != 0)
                        @foreach($filteredProducts as $productElectro)
                            @include('clientside_view.product_minimized_card', compact($productElectro))
                        @endforeach
                    @else
                        <h3>Немає таких товарів</h3>
                    @endif
                </div>
                <div class="d-flex justify-content-center">
                    {{ $filteredProducts->links('clientside_view.paginator') }}
                </div>
            </section>
        </div>
    </div>
@endsection

@section('footer')
    @include('clientside_view.footer')
@endsection

@section('scripts')
    <script src="/js/clientside/slide-filter.js"></script>
@endsection
