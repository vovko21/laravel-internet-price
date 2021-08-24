<div class="col mb-4"  style="width: 18rem;">
    <div class="card h-100">
        <!-- Badges-->
        <div class="row position-absolute mt-1">
            @if($productElectro->isHit())
                <div class="col-12 d-flex justify-content-end">
                    <div class="badge bg-warning text-white">
                        Популярне
                    </div>
                </div>
            @endif
            @if($productElectro->isSale())
                <div class="col-12 d-flex justify-content-end mt-1">
                    <div class="badge bg-dark text-white">
                        Знижка
                    </div>
                </div>
            @endif
            @if($productElectro->isNew())
                <div class="col-12 d-flex justify-content-end mt-1">
                    <div class="badge bg-danger text-white">
                        Нове
                    </div>
                </div>
            @endif
        </div>
        <!-- Product image-->
        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..."/>
        <!-- Product details-->
        <div class="card-body p-4">
            <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder"><a class="link-dark" href="{{route('view', $productElectro->id)}}">{{$productElectro->name}}</a></h5>
                <!-- Product price-->
                @if($productElectro->isSale())
                    <span class="text-muted text-decoration-line-through">{{$productElectro->price_discount}} грн</span>
                @else
                    {{$productElectro->price_uah}} грн
                @endif
            </div>
        </div>
        <!-- Product actions-->
        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
            </div>
        </div>
    </div>
</div>

