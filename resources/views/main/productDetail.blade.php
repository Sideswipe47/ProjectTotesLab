@extends('app')

@section('content')
<main class="page product-page">
    <section class="clean-block clean-product dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Product Page</h2>

            </div>
            <div class="block-content">
                <div class="product-info">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="gallery">
                                <div class="sp-wrap"><a href="https://harvest-goods.com/wp-content/uploads/2019/08/Totebag-Stripe-Blue.jpg"><img class="img-fluid d-block mx-auto" src="https://harvest-goods.com/wp-content/uploads/2019/08/Totebag-Stripe-Blue.jpg"></a><a href="https://harvest-goods.com/wp-content/uploads/2019/08/Totebag-Stripe-Blue.jpg"><img class="img-fluid d-block mx-auto" src="https://harvest-goods.com/wp-content/uploads/2019/08/Totebag-Stripe-Blue.jpg"></a><a href="https://harvest-goods.com/wp-content/uploads/2019/08/Totebag-Stripe-Blue.jpg"><img class="img-fluid d-block mx-auto" src="https://harvest-goods.com/wp-content/uploads/2019/08/Totebag-Stripe-Blue.jpg"></a></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info">
                                <h3>{{$product->name}}</h3>
                                <div class="rating">
                                    @for ($i = 0; $i < ceil($product->rating); ++$i)
                                        <img src="{{asset('assets/img/star.svg')}}">
                                        @endfor
                                        @for ($i = 0; $i < 5 - ceil($product->rating); ++$i)
                                            <img src="{{asset('assets/img/star-empty.svg')}}">
                                            @endfor
                                </div>
                                <div class="price">
                                    <h3>IDR {{$product->price}}</h3>
                                </div>
                                <form action="{{route('cartAdd', $product->id)}}" method="POST" class="form-group">
                                    @csrf
                                    <div class="input-group">
                                        <input type="number" id="quantity" name="quantity" class="form-control quantity-input">
                                        <span class="input-group-append">
                                            <button class="btn btn-primary">Add to cart</button>
                                        </span>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-info">
                    <div>
                        <ul class="nav nav-tabs" role="tablist" id="myTab">
                            <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-toggle="tab" id="description-tab" href="#description">Description</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" id="specifications-tabs" href="#specifications">Specifications</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-toggle="tab" id="reviews-tab" href="#reviews">Reviews</a></li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane active fade show description" role="tabpanel" id="description">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <div class="row">
                                    <div class="col-md-5">
                                        <figure class="figure"><img class="img-fluid figure-img" src="https://harvest-goods.com/wp-content/uploads/2019/08/Totebag-Stripe-Blue.jpg"></figure>
                                    </div>
                                    <div class="col-md-7">
                                        <h4>Lorem Ipsum</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7 right">
                                        <h4>Lorem Ipsum</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                    <div class="col-md-5">
                                        <figure class="figure"><img class="img-fluid figure-img" src="https://harvest-goods.com/wp-content/uploads/2019/08/Totebag-Stripe-Blue.jpg"></figure>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show specifications" role="tabpanel" id="specifications">
                                <div class="table-responsive table-bordered">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="stat">Material</td>
                                                <td>{{$product->material->name}}</td>
                                            </tr>
                                            <tr>
                                                <td class="stat">Size</td>
                                                <td>{{$product->size->toString}}</td>
                                            </tr>
                                            <tr>
                                                <td class="stat">Category</td>
                                                <td>{{$product->category->name}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade show" role="tabpanel" id="reviews">
                                @foreach($reviews as $r)
                                <div class="reviews">
                                    <div class="review-item">
                                        <div class="rating">
                                            @for ($i = 0; $i < ceil($r->rating); ++$i)
                                                <img src="{{asset('assets/img/star.svg')}}">
                                                @endfor
                                                @for ($i = 0; $i < 5 - ceil($r->rating); ++$i)
                                                    <img src="{{asset('assets/img/star-empty.svg')}}">
                                                    @endfor
                                        </div>
                                        <h4>{{$r->subject}}</h4><span class="text-muted"><a href="#">{{$r->user->name}}</a>, {{$r->created_at}}</span>
                                        <p>{{$r->description}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clean-related-items">
                    <h3>Related Products</h3>
                    <div class="items">
                        <div class="row justify-content-center">
                            <div class="col-sm-6 col-lg-4">
                                <div class="clean-related-item">
                                    <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="https://harvest-goods.com/wp-content/uploads/2018/09/tote-bag-geometry-depan.jpg"></a></div>
                                    <div class="related-name"><a href="#">Lorem Ipsum dolor</a>
                                        <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                        <h4>$300</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="clean-related-item">
                                    <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="https://cf.shopee.co.id/file/fb967106110fc00e894b6944e7361e30"></a></div>
                                    <div class="related-name"><a href="#">Lorem Ipsum dolor</a>
                                        <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                        <h4>$300</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="clean-related-item">
                                    <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="https://harvest-goods.com/wp-content/uploads/2019/08/Totebag-Stripe-Blue.jpg"></a></div>
                                    <div class="related-name"><a href="#">Lorem Ipsum dolor</a>
                                        <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                        <h4>$300</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection