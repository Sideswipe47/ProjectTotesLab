@extends('app')
@section('content')
    <main class="page payment-page">
        <section class="clean-block payment-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Payment</h2>
                    <p>Choose a payment method.</p>
                </div>
                <form action="{{route('cart/page/3')}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="products">
                        <div class="progress" style="border-width: 0px;">
                            <div class="progress-bar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%;">75%</div>
                        </div>
                        <h3 class="title" style="margin-top: 15px;">Checkout</h3>
                        @foreach ($shoppingCart->cartItems as $cartItem)
                        <div class="item"><span class="price">IDR {{number_format($cartItem->subtotal)}}</span>
                            <p class="item-name">{{$cartItem->product->name}}</p>
                            <p class="item-description">{{$cartItem->product->material->name}}</p>
                        </div>
                        @endforeach
                        @if ($shoppingCart->userPromotion)
                        <div class="total"><span style="font-size: 19.2px;">Promo: {{$shoppingCart->userPromotion->promotion->name}}</span></div>
                        <div class="item"><span class="price">IDR {{number_format($shoppingCart->discount)}}</span>
                            <p class="item-name"></p>
                            <p class="item-description">{{$shoppingCart->userPromotion->promotion->discount}}% discount</p>
                        </div>
                        @endif
                        <div class="total"><span style="font-size: 19.2px;">Delivery: {{$shoppingCart->deliveryService->name}}</span></div>
                        <div class="item"><span class="price">IDR {{number_format($shoppingCart->deliveryOption->cost)}}</span>
                            <p class="item-name"></p>
                            <p class="item-description">{{$shoppingCart->deliveryOption->description}}</p>
                        </div>
                        <div class="total"><span>Total</span><span class="price">IDR {{number_format($shoppingCart->grandTotal)}}</span></div>
                    </div>
                    <div class="card-details">
                        <h3 class="title">Credit Card Details</h3>
                        <div class="form-row">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label for="card-holder">Card Holder</label>
                                    <input class="form-control {{$errors->any() ? ($errors->has('cardHolder') ? 'is-invalid' : 'is-valid') : ''}}" type="text" placeholder="Card Holder" id="cardHolder" name="cardHolder" value="{{old('cardHolder')}}">
                                    @error('cardHolder')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group"><label>Expiration date</label>
                                    <div class="input-group expiration-date">
                                        <input class="form-control {{$errors->any() ? ($errors->has('expiredMonth') ? 'is-invalid' : 'is-valid') : ''}}" type="text" placeholder="MM" id="expiredMonth" name="expiredMonth" value="{{old('expiredMonth')}}">
                                        <input class="form-control {{$errors->any() ? ($errors->has('expiredYear') ? 'is-invalid' : 'is-valid') : ''}}" type="text" placeholder="YY" id="expiredYear" name="expiredYear" value="{{old('expiredYear')}}">
                                        <div class="invalid-feedback">
                                            @error('expiredMonth')
                                            {{$message}}
                                            @enderror
                                            @error('expiredYear')
                                            @error('expiredMonth')
                                            <br>
                                            @enderror
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group"><label for="card-number">Card Number</label><input class="form-control" type="text" placeholder="Card Number" id="cardNumber" name="cardNumber"></div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group"><label for="cvc">CVC</label><input class="form-control" type="text" id="cvc" placeholder="CVC" name="cvc"></div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Next Step</button></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection