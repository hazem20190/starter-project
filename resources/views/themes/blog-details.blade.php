<!DOCTYPE html>
<html lang="en">
@extends('themes.master')
@section('title', 'blog')
@section('content')

    @include('themes.partials.hero', ['banner' => $blog->title])

    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if ($blog)
                        <div class="main_blog_details">
                            <img class="img-fluid" src="{{ asset("storage/blogs/$blog->image") }}" alt="">
                            <a href="#">
                                <h4>{{ $blog->title }}</h4>
                            </a>
                            <div class="user_details">
                                <div class="float-right mt-sm-0 mt-3">
                                    <div class="media">
                                        <div class="media-body">
                                            <h5>{{ $blog->user->name }}</h5>
                                            <p>{{ $blog->created_at }}</p>
                                        </div>
                                        <div class="d-flex">
                                            <img width="42" height="42" src="{{ asset('assets') }}/img/avatar.png"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p>{{ $blog->description }}</p>
                        </div>
                    @endif
                    @if (count($blog->comment) > 0)
                        <div class="comments-area">
                            <h4>{{ count($blog->comment) }}</h4>
                            @foreach ($blog->comment as $comment)
                                <div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="{{ asset('assets') }}/img/avatar.png" width="50px">
                                            </div>
                                            <div class="desc">
                                                <h5><a href="#">{{ $comment->name }}</a></h5>
                                                <p class="date">
                                                    {{ $comment->created_at->format('D M Y h m s A') }}</p>
                                                <p class="comment">
                                                    {{ $comment->message }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div class="comment-form">
                        <h4>Leave a Reply</h4>
                        @if (session('statusComment'))
                            <div alert alert-success text-center>{{ session('statusComment') }}</div>
                        @endif
                        <form action="{{ route('comment.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-6 name">
                                    <input type="text" class="form-control" placeholder="Enter Name" name="name"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-md-6 email">
                                    <input type="email" class="form-control" value="{{ old('email') }}"
                                        placeholder="Enter email address" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email address'" name="email">
                                    @error('email')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" placeholder="Subject"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'"
                                    value="{{ old('subject') }}">
                                @error('subject')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Messege'" required="" {{ old('message') }}></textarea>
                                @error('message')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="button submit_btn">Post Comment</button>
                        </form>
                    </div>
                </div>
                @include('themes.partials.sidebar')
            </div>
    </section>
    <!--================ End Blog Post Area =================-->
@endsection

</html>
