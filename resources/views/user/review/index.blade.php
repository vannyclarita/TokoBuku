@extends('template.user')

@section('section')

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href=""><i class="fa fa-home"></i> Home</a>
                        <a href="#">Shopping </a>
                        <span>{{ $products->product_name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                {{-- @if ($products->image)
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            <a class="pt active" href="#product-1">
                                <img src="{{ asset('product-image/'.$products->image->image_name)}}" alt="">
                            </a>
                            <a class="pt" href="#product-2">
                                <img src="{{ asset('img/product/details/thumb-2.jpg')}}" alt="">
                            </a>
                            <a class="pt" href="#product-3">
                                <img src="{{ asset('img/product/details/thumb-3.jpg')}}" alt="">
                            </a>
                            <a class="pt" href="#product-4">
                                <img src="{{ asset('img/product/details/thumb-4.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                <img data-hash="product-1" class="product__big__img" src="{{ asset('product-image/'.$products->image->image_name)}}" alt="">
                                <img data-hash="product-2" class="product__big__img" src="{{ asset('img/product/details/product-3.jpg')}}" alt="">
                                <img data-hash="product-3" class="product__big__img" src="{{ asset('img/product/details/product-2.jpg')}}" alt="">
                                <img data-hash="product-4" class="product__big__img" src="{{ asset('img/product/details/product-4.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                @else --}}
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            @if (count($products->images)>0)
                            @foreach ( $products->image as $image )
                            <a class="pt active" href="#product-1">
                                <img src="{{ asset('product-image/'.$image->image_name)}}" alt="">
                            </a>
                            @endforeach
                            @else
                            <a class="pt active" href="#product-1">
                                <img src="{{ asset('img/product/details/product-1.jpg')}}" alt="">
                            </a>
                            <a class="pt active" href="#product-1">
                                <img src="{{ asset('img/product/details/product-3.jpg')}}" alt="">
                            </a>
                            <a class="pt active" href="#product-1">
                                <img src="{{ asset('img/product/details/product-2.jpg')}}" alt="">
                            </a>
                            <a class="pt active" href="#product-1">
                                <img src="{{ asset('img/product/details/product-4.jpg')}}" alt="">
                            </a>
                            @endif
                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                @if (count($products->images)>0)
                                @foreach ( $products->image as $image )
                                <img data-hash="product-1" class="product__big__img" src="{{ asset('product-image/'.$image->image_name)}}" alt="">
                                @endforeach
                                @else
                                <img data-hash="product-1" class="product__big__img" src="{{ asset('img/product/details/product-1.jpg')}}" alt="">
                                <img data-hash="product-2" class="product__big__img" src="{{ asset('img/product/details/product-3.jpg')}}" alt="">
                                <img data-hash="product-3" class="product__big__img" src="{{ asset('img/product/details/product-2.jpg')}}" alt="">
                                <img data-hash="product-4" class="product__big__img" src="{{ asset('img/product/details/product-4.jpg')}}" alt="">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @endif --}}
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3>{{$products->product_name}} <span>Brand: SKMEIMore Men Watches from SKMEI</span></h3>
                        <div class="rating">
                            @for ($i = 1; $i <= $products->product_rate; $i++ )
                                <i class="fa fa-star"></i>
                            @endfor
                            <span>( 138 reviews )</span>
                        </div>
                        @if ($products->discount)
                        <div class="product__details__price">{{ $products->price }} <span>Rp. 200.000</span></div>
                        @else()
                        <div class="product__details__price">{{ $products->price }}</div>
                        @endif
                        <p>{{ $products->description }}</p>
                        <form method="POST" action="{{ url('transaction/'.$products->id) }}">
                        @csrf
                        <div class="form-group">
                        <div class="product__details__button">
                            <div class="quantity">
                                <span>Quantity:</span>
                                <div class="pro-qty">
                                    <input type="text" name="qty" value="" placeholder="1">
                                </div>
                            </div>
                            <form method="POST" id="cart{{$products->id}}" action="{{ url('cart/'.$products->id) }}">
                            @csrf
                            </form>
                            <a onclick="document.getElementById('cart{{$products->id}}').submit()" class="cart-btn"><span class="icon_bag_alt"></span> Add to cart</a>
                            <ul>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Availability:</span>
                                    <div class="stock__checkbox">
                                        <label for="stockin">
                                            In Stock
                                            <input type="checkbox" id="stockin">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <span>Available color:</span>
                                    <div class="color__checkbox">
                                        <label for="red">
                                            <input type="radio" name="color__radio" id="red" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                        <label for="black">
                                            <input type="radio" name="color__radio" id="black">
                                            <span class="checkmark black-bg"></span>
                                        </label>
                                        <label for="grey">
                                            <input type="radio" name="color__radio" id="grey">
                                            <span class="checkmark grey-bg"></span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <span>Available size:</span>
                                    <div class="size__btn">
                                        <label for="xs-btn" class="active">
                                            <input type="radio" id="xs-btn">
                                            xs
                                        </label>
                                        <label for="s-btn">
                                            <input type="radio" id="s-btn">
                                            s
                                        </label>
                                        <label for="m-btn">
                                            <input type="radio" id="m-btn">
                                            m
                                        </label>
                                        <label for="l-btn">
                                            <input type="radio" id="l-btn">
                                            l
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <span>Promotions:</span>
                                    <p>Free shipping</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews ( 2 )</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h6>Reviews</h6>
                                <form method="POST" action="{{ url('user/addreview/'.$products->id) }}">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-group">
                                            <textarea type="text" name="review" class="form-control @error('review') is-invalid @enderror" placeholder="Review..." > {{ old('review') }}</textarea>
                                            @error('review')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="integer" name="rate" class="form-control @error('rate') is-invalid @enderror" value="{{ old('rate') }}" placeholder="Rating.." >
                                            @error('rate')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>RELATED PRODUCTS</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{asset('img/product/related/rp-1.jpg')}}">
                            <div class="label new">New</div>
                            <ul class="product__hover">
                                <li><a href="{{asset('img/product/related/rp-1.jpg')}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Buttons tweed blazer</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 59.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{asset('img/product/related/rp-2.jpg')}}">
                            <ul class="product__hover">
                                <li><a href="{{asset('img/product/related/rp-2.jpg')}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Flowy striped skirt</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 49.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{asset('img/product/related/rp-3.jpg')}}">
                            <div class="label stockout">out of stock</div>
                            <ul class="product__hover">
                                <li><a href="{{asset('img/product/related/rp-3.jpg')}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Cotton T-Shirt</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 59.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{asset('img/product/related/rp-4.jpg')}}">
                            <ul class="product__hover">
                                <li><a href="{{asset('img/product/related/rp-4.jpg')}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Slim striped pocket shirt</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 59.0</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

   @endsection
