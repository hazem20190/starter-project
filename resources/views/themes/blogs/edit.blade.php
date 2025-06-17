<!DOCTYPE html>
<html lang="en">
@extends('themes.master')
@section('title', 'Edit Blogs')
@section('content')

    @include('themes.partials.hero', ['banner' => 'Edit Blog'])
    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="thumb">
                <img class="card-img rounded-0" src="{{ asset("storage/blogs/$blog->image") }}" alt=""
                    style="max-width:100%; height: auto;">
            </div>
            <div class="row">
                <div class="col-md-8 col-lg-9">
                    <form action="{{ route('blogs.update', [$blog->id]) }}" class="form-contact contact_form" method="post"
                        id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @if (session('StatusUpdateBlog'))
                            <div class="alert alert-success text-center">{{ session('StatusUpdateBlog') }}</div>
                        @endif
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <input class="form-control" name="title" type="text"
                                        placeholder="Enter your title blog" value="{{ $blog->title }}">
                                    @error('title')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="image" type="file"
                                        placeholder="Upload image for blog">
                                    @error('image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="category_id">
                                        <option value="0">Select Category</option>
                                        @if (count($categories) > 0)
                                            @foreach ($categories as $category)
                                                <option
                                                    value="{{ $category->id }}"@if ($category->id == $blog->category_id) {{ 'selected' }} @endif>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <textarea class="form-control different-control w-100" name="description" cols="30" rows="6"
                                        placeholder="Write your blog here">{{ $blog->description }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center text-md-right mt-3">
                            <button type="submit" class="button button--active button-contactForm">Edit Blog</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection

</html>
