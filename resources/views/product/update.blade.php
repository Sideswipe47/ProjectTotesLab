@extends('app')
@section('content')
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Update</h2>
                    <p>Update {{$product->name}} in the database</p>
                </div>
                <form method="POST" action="{{route('product/update', $product->id)}}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group"><label style="margin-top: 15px;">Category<span class="text-danger">*</span></label>
                        <select class="custom-select {{$errors->any() ? ($errors->has('category') ? 'is-invalid' : 'is-valid') : ''}}" name="category" id="category">
                            <option {{old('category') ? '' : 'selected'}} disabled value="">-- Select materials --</option>
                            @foreach ($categories as $category)
                                <option {{$category->id == (old('category') ?? $product->category_id) ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group"><label style="margin-top: 15px;">Material<span class="text-danger">*</span></label>
                        <select class="custom-select {{$errors->any() ? ($errors->has('material') ? 'is-invalid' : 'is-valid') : ''}}" name="material" id="material">
                            <option {{old('material') ? '' : 'selected'}} disabled value="">-- Select materials --</option>
                            @foreach ($materials as $material)
                                <option {{$material->id == (old('material') ?? $product->material_id) ? 'selected' : ''}} value="{{$material->id}}">{{$material->name}}</option>
                            @endforeach
                        </select>
                        @error('material')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group"><label style="margin-top: 15px;">Size<span class="text-danger">*</span></label>
                        <select class="custom-select {{$errors->any() ? ($errors->has('size') ? 'is-invalid' : 'is-valid') : ''}}" name="size" id="size">
                            <option {{old('size') ? '' : 'selected'}} disabled value="">-- Select sizes --</option>
                            @foreach ($sizes as $size)
                                <option {{$size->id == (old('sizes') ?? $product->size_id) ? 'selected' : ''}} value="{{$size->id}}">{{$size->toString}}</option>
                            @endforeach
                        </select>
                        @error('size')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Name<span class="text-danger">*</span></label>
                        <input class="form-control {{$errors->any() ? ($errors->has('name') ? 'is-invalid' : 'is-valid') : ''}}" type="text" id="name" name="name" value="{{old('name') ?? $product->name}}">
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control {{$errors->any() ? ($errors->has('description') ? 'is-invalid' : (old('description') ? 'is-valid' : '')) : ''}}" type="text" id="description" name="description" rows="3">{{old('description') ?? $product->description}}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Price<span class="text-danger">*</span></label>
                        <input class="form-control {{$errors->any() ? ($errors->has('price') ? 'is-invalid' : 'is-valid') : ''}}" type="text" id="price" name="price" value="{{old('price') ?? $product->price}}">
                        @error('price')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Update</button></div>
                </form>
            </div>
        </section>
    </main>
@endsection
@if ($message = Session::get('success'))
    @include('components.modal', ['title' => 'Success', 'message' => $message])
@endif