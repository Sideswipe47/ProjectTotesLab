@extends('app')
@section('content')
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Delivery</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
                </div>
                <form>
                    <div class="progress">
                        <div class="progress-bar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">50%</div>
                    </div>
                    <div class="form-group"><label style="margin-top: 15px;">Carrier Option</label>
                        <select class="custom-select{{$errors->any() ? ($errors->has('delivery_service') ? 'is-invalid' : 'is-valid') : ''}}" name="delivery_service" id="delivery_service" value="{{old('delivery_service')}}" required>
                            <option {{old('delivery_service') ? '' : 'selected'}} disabled value="">-- Select Product Type --</option>
                            @foreach ($deliveryServices as $deliveryService)
                                <option {{($deliveryService->id == old('delivery_service')) ? 'selected' : ''}} value="{{$deliveryService->id}}">{{$deliveryService->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group"><label>Delivery Option</label>
                        <div class="dropdown"><button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background: rgb(255,255,255);color: rgb(181,184,187);width: 420px;">Choose Delivery</button>
                            <div class="dropdown-menu"><a class="dropdown-item" href="#">Same day delivery</a><a class="dropdown-item" href="#">Regular (1-3 days)</a><a class="dropdown-item" href="#">Free delivery (3-5 days)</a></div>
                        </div>
                    </div>
                    <div class="form-group"><label>Promo Codes</label>
                        <div class="dropdown"><button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="background: rgb(255,255,255);color: rgb(181,184,187);width: 420px;">Select Promotion</button>
                            <div class="dropdown-menu"><a class="dropdown-item" href="#">Promo1</a><a class="dropdown-item" href="#">Promo2</a><a class="dropdown-item" href="#">Promo3</a></div>
                        </div>
                    </div>
                    <div class="form-group"><label>Address</label><input class="form-control" type="email"></div>
                    <div class="form-group"><label>Notes</label><textarea class="form-control"></textarea></div>
                    <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Next Step</button></div>
                </form>
            </div>
        </section>
    </main>
@endsection