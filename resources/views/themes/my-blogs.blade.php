<!DOCTYPE html>
<html lang="en">
@extends('themes.master')
@section('title', 'Myblogs')
@section('content')

    @include('themes.partials.hero', ['banner' => 'My Blogs'])

    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin">
        <div class="container">
            @if (session('StatusBlogDelete'))
                <div class="alert alert-success text-center">{{ session('StatusBlogDelete') }}</div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 15%">#</th>
                        <th scope="col">Title</th>
                        <th style="width: 20%">Action</th>
                    </tr>
                </thead>
                @if (count($my_blogs) > 0)
                    <tbody>
                        @foreach ($my_blogs as $blog)
                            <tr>
                                <th scope="row"> {{ $loop->iteration }}</th>
                                <td>
                                    <a href="{{ route('blogs.show', [$blog->id]) }}" target='_blank'>{{ $blog->title }}</a>
                                </td>
                                <td>
                                    <a href="{{ route('blogs.edit', [$blog->id]) }}"><button type="button"
                                            class="btn btn-success">Edit</button></a>
                                    <form action="{{ route('blogs.destroy', [$blog->id]) }}" method="post" id="delete-form"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <a href="javascript:$('form#delete-form').submit();"><button type="button"
                                                class="btn btn-danger">Delete</button></a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @endif
            </table>
            @if (count($my_blogs) > 0)
                {{ $my_blogs->links('pagination::bootstrap-5') }}
            @endif
        </div>
    </section>
    <!--================ End Blog Post Area =================-->
@endsection

</html>
