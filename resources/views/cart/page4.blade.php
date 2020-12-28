@extends('app')
@section('content')
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Transaction Complete</h2>
                    <p>Thank you for buying our products</p>
                </div>
                <form>
                    <div class="progress">
                        <div class="progress-bar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                    </div>
                    <div class="form-group"><label style="margin-top: 15px;">Your payment is being processed. Thank you for shopping with us</label></div>
                    <div class="form-group"><a class="btn btn-primary btn-block" href="{{route('transaction')}}">Check Tracking</a></div>
                </form>
            </div>
        </section>
    </main>
@endsection