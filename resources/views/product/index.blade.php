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
                            @if (count($product->images) != 0)
                                <div class="gallery">
                                    <div class="sp-wrap">
                                        @foreach ($product->images as $image)
                                            <a href="{{asset('storage/img/' . $image->path)}}">
                                                <img class="img-fluid d-block mx-auto" src="{{asset('storage/img/' . $image->path)}}">
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/No_image_3x4.svg/1200px-No_image_3x4.svg.png" alt="No image" class="mw-100">
                            @endif
                        </div>
                        <div class="col-md-6 mt-5">
                            <div class="info">
                                <h3>{{$product->name}}</h3>
                                @if ($product->rating)
                                    <div class="rating">
                                        @for ($i = 0; $i < ceil($product->rating); ++$i)
                                            <img src="{{asset('assets/img/star.svg')}}">
                                        @endfor
                                        @for ($i = 0; $i < 5 - ceil($product->rating); ++$i)
                                            <img src="{{asset('assets/img/star-empty.svg')}}">
                                        @endfor
                                    </div>
                                @else
                                    <p class="mb-0 text-muted">No rating</p>
                                @endif
                                <div class="price">
                                    <h3>IDR {{$product->price}}</h3>
                                </div>
                                <form action="{{route('cartAdd', $product->id)}}" method="POST" class="form-group">
                                    @csrf
                                    <div class="input-group mt-5">
                                        <input type="number" id="quantity" name="quantity" class="form-control quantity-input">
                                        <span class="input-group-append">
                                            <button class="btn btn-primary mb-0 py-0">Add to cart</button>
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
                                @if ($product->description)
                                    @foreach (preg_split('/\r\n|\r|\n/', $product->description) as $paragraph)
                                        <p>{{$paragraph}}</p>
                                    @endforeach
                                @else
                                    <p>No description</p>
                                @endif
                            </div>
                            <div class="tab-pane fade show specifications" role="tabpanel" id="specifications">
                                <div class="table-responsive table-bordered">
                                    <table class="table table-bordered mb-0">
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
                                @forelse($reviews as $r)
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
                                            <h4>{{$r->subject}}</h4><span class="text-muted"><a href="#">{{$r->user->name}}</a>, {{\Carbon\Carbon::parse($r->created_at)->setTimezone('Asia/Jakarta')->format('j F Y')}} at {{\Carbon\Carbon::parse($r->created_at)->setTimezone('Asia/Jakarta')->format('H:i:s T')}}</span>
                                            <p>{{$r->description}}</p>
                                        </div>
                                    </div>
                                @empty
                                    <p class="description">This product has no review yet</p>
                                @endforelse
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