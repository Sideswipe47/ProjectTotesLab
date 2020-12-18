@extends('app')
@section('content')
    <main class="page payment-page">
        <section class="clean-block payment-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Tracking</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
                </div>
                <form>
                    <div class="products">
                        <h3 class="title">Delivery Timeline</h3>
                        <div class="item"><span class="price">14:33</span>
                            <p class="item-name">17 October 2020</p>
                            <p class="item-description">Waiting for payment confirmation</p>
                        </div>
                        <div class="item"><span class="price">16:20</span>
                            <p class="item-name">17 October 2020</p>
                            <p class="item-description">Payment accepted and order processed</p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="form-row">
                            <div class="col-sm-12">
                                <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Proceed to Carrier Website</button></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
@endsection