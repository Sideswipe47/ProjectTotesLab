@extends('app')

@section('content')
<main class="page blog-post-list">
        <section class="clean-block clean-blog-list dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Purchase History</h2>
                </div>
                <div class="block-content">
                    @foreach($transactions as $t)
                    <div class="clean-blog-post">
                        <div class="row">
                            <div class="col-lg-5"><img class="rounded img-fluid" src="https://harvest-goods.com/wp-content/uploads/2018/09/tote-bag-geometry-depan.jpg"></div>
                            <div class="col-lg-7">
                                <h3>Lorem Ipsum dolor sit amet</h3>
                                <div class="info"><span class="text-muted">{{$t->created_at}}&nbsp;</span></div>
                                <p>Status: {{$t->transactionStatuses->sortBy('created_at')->last()->description}}</p>
                                <p>Content:</p>
                                <ol>
                                    @foreach($t->transactionDetails as $td)
                                        <li>
                                            {{$td->product->name}}
                                        </li>
                                    @endforeach
                                </ol>
                                <p>Total Price: IDR <i>{{number_format($t->grandTotal)}}</i> </p>
                                <button class="btn btn-outline-primary btn-sm" type="button">Track Order</button>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection