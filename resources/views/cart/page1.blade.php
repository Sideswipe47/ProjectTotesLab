@extends('app')
@section('content')
<main class="page shopping-cart-page">
        <section class="clean-block clean-cart dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Shopping Cart</h2>
                    <p>Here is the list of items you have added to your cart.</p>
                </div>
                <div class="content">
                    <div class="row no-gutters">
                        <div class="col-md-12 col-lg-8">
                            <div class="items">

                            @foreach($shoppingCart->cartItems as $item)
                            <div class="product">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-md-3">
                                            <div class="product-image"><img class="img-fluid d-block mx-auto image" src="https://harvest-goods.com/wp-content/uploads/2019/08/Totebag-Stripe-Blue.jpg"></div>
                                        </div>
                                        <div class="col-md-5 product-info"><a class="product-name" href="#">Lorem Ipsum dolor</a>
                                            <div class="product-specs">
                                                <div><span>Category:&nbsp;</span><span class="value">{{$item->product->category->name}}</span></div>
                                                <div><span>Material:&nbsp;</span><span class="value">{{$item->product->material->name}}</span></div>
                                                <div><span>Size:&nbsp;</span><span class="value">{{$item->product->size->toString}}</span></div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity">Quantity</label><input type="number" id="number" class="form-control quantity-input" value="{{$item->quantity}}"></div>
                                        <div class="col-6 col-md-2 price"><span>IDR {{$item->subtotal}}</span></div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="summary">
                                <div class="progress">
                                    <div class="progress-bar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">25%</div>
                                </div>
                                <h3>Summary</h3>
                                <h4><span class="text">Grand Total</span><span class="price">IDR {{$shoppingCart->grandTotal}}</span></h4>
                                <button class="btn btn-primary btn-block btn-lg" type="button">Next Step</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection