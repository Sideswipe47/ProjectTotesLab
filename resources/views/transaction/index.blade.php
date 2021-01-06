@extends('app')

@section('content')
<main class="page blog-post-list">
        <section class="clean-block clean-blog-list dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Purchase History</h2>
                </div>
                <div class="block-content">
                    @foreach($transactions as $index=>$t)
                        <div class="clean-blog-post">
                            <div class="row">
                                <div class="col-lg-5"><img class="rounded img-fluid" src="{{$t->transactionDetail->product ? ($t->transactionDetail->product->image ? asset('storage/img/' . $t->transactionDetail->product->image->path) : 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/No_image_3x4.svg/1200px-No_image_3x4.svg.png') : 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/No_image_3x4.svg/1200px-No_image_3x4.svg.png'}}"></div>
                                <div class="col-lg-7">
                                    <h3>Transaction #{{$transactions->total() - (($transactions->currentPage() - 1) * $transactions->perPage() + $index)}}</h3>
                                    <div class="info"><span class="text-muted">{{\Carbon\Carbon::parse($t->created_at)->setTimezone('Asia/Jakarta')->format('j F Y')}} at {{\Carbon\Carbon::parse($t->created_at)->setTimezone('Asia/Jakarta')->format('H:i:s T')}}&nbsp;</span></div>
                                    <p>Status: {{$t->transactionStatuses->sortBy('created_at')->last()->description}}</p>
                                    <p>Content:</p>
                                    <ol>
                                        @foreach($t->transactionDetails as $td)
                                            <li>
                                                {{$td->product ? $td->product->name : 'Item is no longer available'}}
                                            </li>
                                        @endforeach
                                    </ol>
                                    <p>Total Price: IDR <i>{{number_format($t->grandTotal)}}</i> </p>
                                    <a class="btn btn-outline-primary btn-sm" href="{{route('track', $t->id)}}">Track Order</a>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex flex-column">
                        <div class="mx-auto">
                            {{$transactions->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection