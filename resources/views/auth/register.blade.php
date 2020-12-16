@extends('app')

@section('content')

<main class="page registration-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <br><br>
                <h2 class="text-info">Registration</h2>
                <p>To register, please enter your personal information below.</p>

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{$e}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            </div>
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control item" type="text" name="name" value="{{old('name')}}" placeholder="Your name">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control item" type="email" name="email" value="{{old('email')}}" placeholder="Your email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control item" type="password" name="password" placeholder="Password" >
                </div>
                <div class="form-group">
                    <label for="password">Confirm Password</label>
                    <input class="form-control item" type="password" name="password_confirmation" placeholder="Confirm password"></div>
                <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
            </form>

            <div class="block-heading">
                <p>Already have an account?</p>
                <p><a href="{{route('login')}}">login</a></p>
            </div>

        </div>
    </section>
</main>
@endcontent