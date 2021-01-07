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
                                @if ($product->rating != null)
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
                                @if(Auth::check() && Auth::user()->role == 'member')
                                    @if ($cartItem)
                                        <form action="{{route('cartUpdate', ['id' => $cartItem->id, 'productId' => $product->id])}}" method="POST" class="form-group">
                                            @csrf
                                            <div class="input-group mt-5">
                                                <input type="number" id="quantity" name="quantity" class="form-control quantity-input {{$errors->has('quantity') ? 'is-invalid' : ''}}" value="{{old('quantity') ?? $cartItem->quantity}}">
                                                <span class="input-group-append">
                                                    <button class="btn btn-primary mb-0 py-0">Update cart</button>
                                                </span>
                                            </div>
                                            @error('quantity')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </form>
                                    @else
                                        <form action="{{route('cartAdd', $product->id)}}" method="POST" class="form-group">
                                            @csrf
                                            <div class="input-group mt-5">
                                                <input type="number" id="quantity" name="quantity" class="form-control quantity-input {{$errors->has('quantity') ? 'is-invalid' : ''}}">
                                                <span class="input-group-append">
                                                    <button class="btn btn-primary mb-0 py-0">Add to cart</button>
                                                </span>
                                            </div>
                                            @error('quantity')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </form>
                                    @endif
                                @endif
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

                                @if(Auth::check() && Auth::user()->role == 'member')
                                <form action="{{route('createReview', $product->id)}}" method="POST" autocomplete="off">
                                    @csrf
                                    <div class="reviews">
                                        <div class="review-item">
                                            <label for="title">Review Title</label><br>
                                            <input type="text" name="title">
                                            <div class="rating">
                                                <p style="color: Black;">Rating:</p>
                                                <input type="radio" id="r1" name="rating" value="1">
                                                <label for="r1">1</label>
                                                <input type="radio" id="r2" name="rating" value="2">
                                                <label for="r2">2</label>
                                                <input type="radio" id="r3" name="rating" value="3">
                                                <label for="r3">3</label>
                                                <input type="radio" id="r4" name="rating" value="4">
                                                <label for="r4">4</label>
                                                <input type="radio" id="r5" name="rating" value="5">
                                                <label for="r5">5</label><br>
                                            </div>
                                            <p>Write your review here</p>
                                            <textarea type="text" name="description" class="md-textarea form-control" mdbInput></textarea>
                                            <br>
                                            <input type="submit">   
                                        </div>
                                    </div>
                                </form>
                                @endif

                            </div>

                        </div>
                    </div>
                </div>
                <div class="clean-related-items">
                    <h3>Related Products</h3>
                    <div class="items">
                        <div class="row justify-content-center">
                            @foreach ($relateds as $product)
                            <div class="col-sm-6 col-lg-4">
                                <div class="clean-related-item h-100">
                                    <div class="image"><a href="{{route('product/view', $product->id)}}"><img class="img-fluid d-block mx-auto" src="{{$product->image ? asset('storage/img/' . $product->image->path) : 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6c/No_image_3x4.svg/1200px-No_image_3x4.svg.png'}}"></a></div>
                                    <div class="related-name">
                                        <a href="{{route('product/view', $product->id)}}">{{$product->name}}</a>
                                        @if ($product->rating != null)
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
                                        <h4>IDR {{$product->price}}</h4>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
    @if ($message = Session::get('success'))
        @include('components.modal', ['title' => 'Success', 'message' => $message])
    @endif
@endsection