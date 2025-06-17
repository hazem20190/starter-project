<!DOCTYPE html>
<html lang="en">
@extends('themes.master')
@section('title', 'Blogs')
@section('content')

    @include('themes.partials.hero', ['banner' => 'Add New Blog'])
    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9">
                    <form action="{{ route('blogs.store') }}" class="form-contact contact_form" method="post" id="contactForm"
                        novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        @if (session('status.blog'))
                            <div class="alert alert-success text-center">{{ session('status.blog') }}</div>
                        @endif
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <input class="form-control" name="title" type="text"
                                        placeholder="Enter your title blog" value="{{ old('title') }}">
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
                                        @if ($categories)
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                        placeholder="Write your blog here">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center text-md-right mt-3">
                            <button type="submit" class="button button--active button-contactForm">Add New
                                Blog</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection

</html>
