@extends('frontend.layouts.master')
@section('title','Chi Tiết Chương Trình')
@section('main-content')

 <!-- Begin Li's Breadcrumb Area -->
 <div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{route('home')}}">Trang Chủ</a></li>
                <li class="active">Tin Khuyến Mãi</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Li's Main Blog Page Area -->
<div class="li-main-blog-page li-main-blog-details-page pt-60 pb-60 pb-sm-45 pb-xs-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Blog Sidebar Area -->
            <div class="col-lg-3 order-lg-2 order-2">
                <div class="li-blog-sidebar-wrapper">
                    <div class="li-blog-sidebar">
                        <div class="li-sidebar-search-form">
                            <form action="#">
                                <input type="text" class="li-search-field" placeholder="search here">
                                <button type="submit" class="li-search-btn"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="li-blog-sidebar pt-25">
                        <h4 class="li-blog-sidebar-title">Các tin khuyến mãi khác</h4>
                    </div>
                   
                    <div class="li-blog-sidebar">
                    @foreach($recent_posts as $posts)
                        <div class="li-recent-post pb-30">
                            <div class="li-recent-post-thumb">
                                <a href="blog-details.html">
                                    <img class="img-full" src="{{$posts->photo}}" alt="{{$posts->photo}}">
                                </a>
                            </div>
                            <div class="li-recent-post-des">
                                <span><a href="blog-details.html">{{$posts->title}}</a></span>
                                <span class="li-post-date">{{$posts->created_at->format('D,M,Y')}}</span>
                            </div>
                        </div>
                        @endforeach
    
                    </div>
                    
                </div>
            </div>
            <!-- Li's Blog Sidebar Area End Here -->
            <!-- Begin Li's Main Content Area -->
            <div class="col-lg-9 order-lg-1 order-1">
                <div class="row li-main-content">
                    <div class="col-lg-12">
                        <div class="li-blog-single-item pb-30">
                            <div class="li-blog-banner">
                                <a href="blog-details.html"><img class="img-full" src="{{$post->photo}}" alt=""></a>
                            </div>
                            <div class="li-blog-content">
                                <div class="li-blog-details">
                                    <h3 class="li-blog-heading pt-25"><a href="#">{{$post->title}}</a></h3>
                                    <div class="li-blog-meta">
                                        <a class="author" href="#"><i class="fa fa-user"></i>{{$post->author_info['name']}}</a>
                                        <a class="comment" href="#"><i class="fa fa-comment-o"></i> 3 comment</a>
                                        <a class="post-time" href="#"><i class="fa fa-calendar"></i> 25 nov 2018</a>
                                    </div>
                                    <p>{!!$post->summary !!}</p>
                                    <!-- Begin Blog Blockquote Area -->
                                    {{-- <div class="li-blog-blockquote">
                                        <blockquote>
                                            <p>Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur. In venenatis elit ac ultrices convallis. Duis est nisi, tincidunt ac urna sed, cursus blandit lectus. In ullamcorper sit amet ligula ut eleifend. Proin dictum tempor ligula, ac feugiat metus. Sed finibus tortor eu scelerisque scelerisque.</p>
                                        </blockquote>
                                    </div> --}}
                                    <!-- Blog Blockquote Area End Here -->
                                    <p>{!!$post->description !!}</p>
                                    <div class="li-tag-line">
                                        <h4>tag:</h4>
                                        <a href="#">Headphones</a>,
                                        <a href="#">Video Games</a>,
                                        <a href="#">Wireless Speakers</a>
                                    </div>
                                    <div class="li-blog-sharing text-center pt-30">
                                        <h4>Chia sẻ qua:</h4>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Begin Li's Blog Comment Section -->
                        <div class="li-comment-section">
                            <h3>({{$post->allComments->count()}}) Bình Luận</h3>
                            {{-- <ul>
                                <li>
                                    <div class="author-avatar pt-15">
                                        <img src="images/product-details/user.png" alt="User">
                                    </div>
                                    <div class="comment-body pl-15">
                                            <span class="reply-btn pt-15 pt-xs-5"><a href="#">reply</a></span>
                                        <h5 class="comment-author pt-15">admin</h5>
                                        <div class="comment-post-date">
                                            20 nov, 2018 at 9:30pm
                                        </div>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim maiores adipisci optio ex, laboriosam facilis non pariatur itaque illo sunt?</p>
                                    </div>
                                </li>
                            </ul> --}}
                            @include('frontend.pages.comment', ['comments' => $post->comments, 'post_id' => $post->id, 'depth' => 3])
                        </div>
                        <!-- Li's Blog Comment Section End Here -->
                        <!-- Begin Blog comment Box Area -->
                        <div class="li-blog-comment-wrapper">
                            <h3>leave a reply</h3>
                            <p>Your email address will not be published. Required fields are marked *</p>
                            <form action="{{route('post-comment.store',$post->slug)}}" method="POST">
                                @csrf
                                <div class="comment-post-box">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>Nội dung</label>
                                            <textarea name="comment" placeholder="Nội dung bình luận"></textarea>
                                        </div>
                                        {{-- <div class="col-lg-4 col-md-4 col-sm-4 mt-5 mb-sm-20 mb-xs-20">
                                            <label>Name</label>
                                            <input type="text" name="name" class="coment-field" placeholder="Họ Tên">
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 mt-5 mb-sm-20 mb-xs-20">
                                            <label>Email</label>
                                            <input type="text" name="email" class="coment-field" placeholder="Email">
                                        </div> --}}
                                        <div class="col-lg-12">
                                            <div class="coment-btn pt-30 pb-xs-30 pb-sm-30 f-left">
                                                <input class="li-btn-2" type="submit" name="submit" value="Bình Luận">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Blog comment Box Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Li's Main Content Area End Here -->
        </div>
    </div>
</div>
<!-- Li's Main Blog Page Area End Here -->
@endsection