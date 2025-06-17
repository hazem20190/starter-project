<!DOCTYPE html>
<html lang="en">
@extends('themes.master')
@section('title', 'Contact')
@section('contact-active', 'active')
@section('content')

    <body>
        @include('themes.partials.hero', ['banner' => 'Contact Us'])
        <!-- ================ contact section start ================= -->
        <section class="section-margin--small section-margin">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>California United States</h3>
                                <p>Santa monica bullevard</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-headphone"></i></span>
                            <div class="media-body">
                                <h3><a href="tel:454545654">00 (440) 9865 562</a></h3>
                                <p>Mon to Fri 9am to 6pm</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3><a href="mailto:support@colorlib.com">support@colorlib.com</a></h3>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-9">
                        <form action="{{ route('contact.store') }}" class="form-contact contact_form" method="post"
                            id="contactForm" novalidate="novalidate">
                            @csrf
                            @if (session('status.contact'))
                                <div class="alert alert-success text-center">{{ session('status.contact') }}</div>
                            @endif
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-group">
                                        <input class="form-control" name="name" type="text"
                                            placeholder="Enter your name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="email" type="email"
                                            placeholder="Enter email address" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" name="subject" type="text"
                                            placeholder="Enter Subject" value="{{ old('subject') }}">
                                        @error('subject')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="form-group">
                                        <textarea class="form-control different-control w-100" name="message" cols="30" rows="5"
                                            placeholder="Enter Message">{{ old('message') }}</textarea>
                                        @error('message')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center text-md-right mt-3">
                                <button type="submit" class="button button--active button-contactForm">Send
                                    Message</button>
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
