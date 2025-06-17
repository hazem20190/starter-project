<!DOCTYPE html>
<html lang="en">

@extends('themes.master')
@section('title', 'Register')
@section('content')

    <body>
        @include('themes.partials.hero', ['banner' => 'Register'])
        <!-- ================ contact section start ================= -->
        <section class="section-margin--small section-margin">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('register.post') }}" class="form-contact contact_form" method="post"
                            novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control border" name="name" type="text"
                                            placeholder="Enter your name" value="{{ old('name') }}" autofocus>
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control border" name="email" type="email"
                                            placeholder="Enter email address" value="{{ old('email') }}">
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control border" name="password" type="password"
                                            placeholder="Enter your password">
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control border" name="password_confirmation" type="password"
                                            placeholder="Enter your password confirmation">
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center text-md-right mt-3">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>
                                <button type="submit" class="button button--active button-contactForm">Register</button>
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
