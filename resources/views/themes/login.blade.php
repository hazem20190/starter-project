<!DOCTYPE html>
<html lang="en">

@extends('themes.master')
@section('title', 'Login')
@section('content')

    <body>
        @include('themes.partials.hero', ['banner' => 'Login'])
        <!-- ================ contact section start ================= -->
        <section class="section-margin--small section-margin">
            <div class="container">
                <div class="row">
                    <div class="col-6 mx-auto">
                        <form action="{{ route('login.post') }}" class="form-contact contact_form" method="post"
                            novalidate="novalidate">
                            @csrf
                            <div class="form-group">
                                <input class="form-control border" name="email" type="email"
                                    placeholder="Enter email address" value="{{ old('email') }}" autofocus>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="form-group">
                                <input class="form-control border" name="password" type="password"
                                    placeholder="Enter your password">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div class="form-group text-center text-md-right mt-3">
                                <button type="submit" class="button button--active button-contactForm">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- ================ contact section end ================= -->
    </body>
@endsection


</html>
