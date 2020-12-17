@extends('app')
@section('content')
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Delivery</h2>
                    <p>Choose your delivery preference and available promotion</p>
                </div>
                <form method="POST" action="{{route('cart/page/2')}}">
                    @csrf
                    @method('PATCH')
                    <div class="progress">
                        <div class="progress-bar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                    </div>
                    <div class="form-group"><label style="margin-top: 15px;">Carrier Option<span class="text-danger">*</span></label>
                        <select class="custom-select {{$errors->any() ? ($errors->has('carrier') ? 'is-invalid' : 'is-valid') : ''}}" name="carrier" id="carrier" onchange="getSelectValue(this)">
                            <option {{old('carrier') ? '' : 'selected'}} disabled value="">-- Select Carrier --</option>
                            @foreach ($deliveryServices as $deliveryService)
                                <option {{($deliveryService->id == old('carrier') || $deliveryService->id == $delivery) ? 'selected' : ''}} value="{{$deliveryService->id}}">{{$deliveryService->name}}</option>
                            @endforeach
                        </select>
                        @error('carrier')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group"><label>Delivery Option<span class="text-danger">*</span></label>
                        <select class="custom-select {{$errors->any() ? ($errors->has('option') ? 'is-invalid' : 'is-valid') : ''}}" name="option" id="option">
                            <option {{old('option') ? '' : 'selected'}} disabled value="">-- {{$delivery ? 'Select Option' : 'Select Carrier first'}} --</option>
                            @if ($deliveryOptions)
                                @foreach ($deliveryOptions as $deliveryOption)
                                    <option {{($deliveryOption->id == old('option') || ($shoppingCart->deliveryOption && $deliveryOption->id == $shoppingCart->deliveryOption->id)) ? 'selected' : ''}} value="{{$deliveryOption->id}}">{{$deliveryOption->description}} -> IDR {{number_format($deliveryOption->cost)}}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('option')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group"><label>Promo Codes</label>
                        <select class="custom-select {{$errors->has('promo') ? 'is-invalid' : ''}}" name="promo" id="promo">
                            <option {{old('promo') ? '' : 'selected'}} disabled value="">-- {{count($userPromotions) == 0 ? 'No available promo' : 'Select Promo (Optional)'}} --</option>
                            @foreach ($userPromotions as $userPromotion)
                                <option {{($userPromotion->id == old('promo') || ($shoppingCart->userPromotion && $userPromotion->id == $shoppingCart->userPromotion->id)) ? 'selected' : ''}} value="{{$userPromotion->id}}">{{$userPromotion->promotion->name}} ({{$userPromotion->promotion->discount}}%)</option>
                            @endforeach
                        </select>
                        @error('promo')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Address<span class="text-danger">*</span></label>
                        <input class="form-control {{$errors->any() ? ($errors->has('address') ? 'is-invalid' : 'is-valid') : ''}}" type="text" id="address" name="address" value="{{$shoppingCart->address ? $shoppingCart->address : old('address')}}">
                        @error('address')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Notes</label>
                        <textarea class="form-control {{$errors->has('note') ? 'is-invalid' : ''}}" id="note" name="note">{{$shoppingCart->note ? $shoppingCart->note : old('note')}}</textarea>
                        @error('note')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Next Step</button></div>
                </form>
            </div>
        </section>
    </main>
@endsection
@section('head')
    @parent
    <script type="text/javascript">

        const url = window.location.href;
        const fixed_url = url.substring(0, url.indexOf('?'));

        function getSelectValue(selectObject) {
            var value = selectObject.value;
            window.location = fixed_url + '?delivery=' + value;
        }
    </script>
@endsection