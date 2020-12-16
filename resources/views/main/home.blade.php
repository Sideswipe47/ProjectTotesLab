@extends('app')

@section('content')
    <main class="page catalog-page">
        <section class="clean-block clean-catalog dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Catalog Page</h2>
                    <p>Browse our catalog of totes bag.</p>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="d-none d-md-block">
                                <form class="filters" action="{{route('home')}}">
                                    <div class="filter-item">
                                        <h3>Categories</h3>
                                        @foreach ($categories as $index => $category)
                                        <div class="form-check"><input class="form-check-input" type="radio" id="category-{{$index}}" name="category" value="{{$category->id}}" {{$category->id == $request->category ? 'checked' : ''}}><label class="form-check-label" for="category-{{$index}}">{{$category->name}}</label></div>
                                        @endforeach
                                    </div>
                                    <div class="filter-item">
                                        <h3>Material</h3>
                                        @foreach ($materials as $index => $material)
                                        <div class="form-check"><input class="form-check-input" type="radio" id="material-{{$index}}" name="material" value="{{$material->id}}" {{$material->id == $request->material ? 'checked' : ''}}><label class="form-check-label" for="material-{{$index}}">{{$material->name}}</label></div>
                                        @endforeach
                                    </div>
                                    <div class="filter-item">
                                        <h3>Size</h3>
                                        @foreach ($sizes as $index => $size)
                                        <div class="form-check"><input class="form-check-input" type="radio" id="size-{{$index}}" name="size" value="{{$size->id}}" {{$size->id == $request->size ? 'checked' : ''}}><label class="form-check-label" for="size-{{$index}}">{{$size->toString}}</label></div>
                                        @endforeach
                                    </div>
                                    <button class="btn btn-primary w-100">Filter</button>
                                </form>
                            </div>
                            <div class="d-md-none"><a class="btn btn-link d-md-none filter-collapse" data-toggle="collapse" aria-expanded="false" aria-controls="filters" href="#filters" role="button">Filters<i class="icon-arrow-down filter-caret"></i></a>
                                <div class="collapse"
                                    id="filters">
                                    <form class="filters" action="{{route('home')}}">
                                        <div class="filter-item">
                                            <h3>Categories</h3>
                                            @foreach ($categories as $index => $category)
                                            <div class="form-check"><input class="form-check-input" type="radio" id="category-{{$index}}" name="category" value="{{$category->id}}" {{$category->id == $request->category ? 'checked' : ''}}><label class="form-check-label" for="category-{{$index}}">{{$category->name}}</label></div>
                                            @endforeach
                                        </div>
                                        <div class="filter-item">
                                            <h3>Material</h3>
                                            @foreach ($materials as $index => $material)
                                            <div class="form-check"><input class="form-check-input" type="radio" id="material-{{$index}}" name="material" value="{{$material->id}}" {{$material->id == $request->material ? 'checked' : ''}}><label class="form-check-label" for="material-{{$index}}">{{$material->name}}</label></div>
                                            @endforeach
                                        </div>
                                        <div class="filter-item">
                                            <h3>Size</h3>
                                            @foreach ($sizes as $index => $size)
                                            <div class="form-check"><input class="form-check-input" type="radio" id="size-{{$index}}" name="size" value="{{$size->id}}" {{$size->id == $request->size ? 'checked' : ''}}><label class="form-check-label" for="size-{{$index}}">{{$size->toString}}</label></div>
                                            @endforeach
                                        </div>
                                        <button class="btn btn-primary">Filter</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="products">
                                <div class="row no-gutters">
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="https://harvest-goods.com/wp-content/uploads/2019/08/Totebag-Stripe-Blue.jpg"></a></div>
                                            <div class="product-name"><a href="#">Lorem ipsum dolor sit amet</a></div>
                                            <div class="about">
                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                <div class="price">
                                                    <h3>$100</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="https://harvest-goods.com/wp-content/uploads/2019/08/Totebag-Stripe-Blue.jpg"></a></div>
                                            <div class="product-name"><a href="#">Lorem ipsum dolor sit amet</a></div>
                                            <div class="about">
                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                <div class="price">
                                                    <h3>$100</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="https://harvest-goods.com/wp-content/uploads/2019/08/Totebag-Stripe-Blue.jpg"></a></div>
                                            <div class="product-name"><a href="#">Lorem ipsum dolor sit amet</a></div>
                                            <div class="about">
                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                <div class="price">
                                                    <h3>$100</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="https://harvest-goods.com/wp-content/uploads/2018/09/tote-bag-geometry-depan.jpg"></a></div>
                                            <div class="product-name"><a href="#">Lorem ipsum dolor sit amet</a></div>
                                            <div class="about">
                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                <div class="price">
                                                    <h3>$100</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="https://harvest-goods.com/wp-content/uploads/2018/09/tote-bag-geometry-depan.jpg"></a></div>
                                            <div class="product-name"><a href="#">Lorem ipsum dolor sit amet</a></div>
                                            <div class="about">
                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                <div class="price">
                                                    <h3>$100</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="https://harvest-goods.com/wp-content/uploads/2018/09/tote-bag-geometry-depan.jpg"></a></div>
                                            <div class="product-name"><a href="#">Lorem ipsum dolor sit amet</a></div>
                                            <div class="about">
                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                <div class="price">
                                                    <h3>$100</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="https://cf.shopee.co.id/file/fb967106110fc00e894b6944e7361e30"></a></div>
                                            <div class="product-name"><a href="#">Lorem ipsum dolor sit amet</a></div>
                                            <div class="about">
                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                <div class="price">
                                                    <h3>$100</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="https://cf.shopee.co.id/file/fb967106110fc00e894b6944e7361e30"></a></div>
                                            <div class="product-name"><a href="#">Lorem ipsum dolor sit amet</a></div>
                                            <div class="about">
                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                <div class="price">
                                                    <h3>$100</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <div class="clean-product-item">
                                            <div class="image"><a href="#"><img class="img-fluid d-block mx-auto" src="https://cf.shopee.co.id/file/fb967106110fc00e894b6944e7361e30"></a><a href="#"></a></div>
                                            <div class="product-name"><a href="#">Lorem ipsum dolor sit amet</a></div>
                                            <div class="about">
                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                <div class="price">
                                                    <h3>$100</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <nav>
                                    <ul class="pagination">
                                        <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection