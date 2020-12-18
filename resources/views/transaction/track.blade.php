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
                        @foreach ($transaction->transactionStatuses as $transactionStatus)
                        <div class="item"><span class="price">{{ \Carbon\Carbon::parse($transactionStatus->created_at)->setTimezone('Asia/Jakarta')->format('H:i')}}</span>
                            <p class="item-name">{{ \Carbon\Carbon::parse($transactionStatus->created_at)->setTimezone('Asia/Jakarta')->format('l, j F Y')}}</p>
                            <p class="item-description">{{$transactionStatus->description}}</p>
                        </div>
                        @endforeach
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