                    <!-- Start Blog Post Siddebar -->
                    @php
                        $categories = App\Models\Category::get();
                        $recentBlogs = App\Models\Blog::latest()->get();
                    @endphp
                    <div class="col-lg-4 sidebar-widgets">
                        <div class="widget-wrap">
                            <div class="single-sidebar-widget newsletter-widget">
                                <h4 class="single-sidebar-widget__title">Newsletter</h4>

                                <form action="{{ route('subscribe.store') }}" method="post">
                                    @csrf
                                    <div class="form-group mt-30">
                                        <div class="col-autos">
                                            @if (session('status'))
                                                <div class="alert alert-success">{{ session('status') }}</div>
                                            @endif
                                            <input type="text" name="email" class="form-control"
                                                value="{{ old('email') }}" placeholder="Enter email"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Enter email'">

                                            @error('email')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="bbtns d-block mt-20 w-100">Subcribe</button>
                                </form>
                            </div>
                            <div class="single-sidebar-widget post-category-widget">
                                @if ($categories)
                                    <h4 class="single-sidebar-widget__title">Category</h4>
                                    <ul class="cat-list mt-20">
                                        @foreach ($categories as $category)
                                            <li>
                                                <a href="{{ route('theme.category', [$category->name]) }}"
                                                    class="d-flex justify-content-between">
                                                    <p>{{ $category->name }}</p>
                                                    <p>( {{ $category->blog->count() }} )</p>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>

                            <div class="single-sidebar-widget popular-post-widget">
                                @if (count($recentBlogs) > 0)
                                    <h4 class="single-sidebar-widget__title">Recent Blogs</h4>
                                    <div class="popular-post-list">
                                        @foreach ($recentBlogs as $Blog)
                                            <div class="single-post-list">
                                                <div class="thumb">
                                                    <img class="card-img rounded-0"
                                                        src="{{ asset("storage/blogs/$Blog->image") }}" alt="">
                                                    <ul class="thumb-info">
                                                        <li><a href="#">{{ $Blog->user->name }}</a></li>
                                                        <li><a href="#">{{ $Blog->created_at->format('M Y') }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="details mt-20">
                                                    <a href="{{ route('blogs.show', [$Blog->id]) }}">
                                                        <h6>{{ $Blog->title }}</h6>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- End Blog Post Siddebar -->
