@extends('frontend.layouts.master')
@section('title','Chương Trình Khuyến Mãi')
@section('main-content')

 <!-- Begin Li's Breadcrumb Area -->
 <div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="{{route('home')}}">Trang Chủ</a></li>
                <li class="active">Khuyến Mãi</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Li's Main Blog Page Area -->
<div class="li-main-blog-page pt-60 pb-55">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Main Content Area -->
            <div class="col-lg-12">
                <div class="row li-main-content">
                    @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6">
                        <div class="li-blog-single-item pb-25">
                            <div class="li-blog-banner">
                                <a href="{{route('blog.detail',$post->slug)}}"><img class="img-full" src="{{$post->photo}}" alt=""></a>
                            </div>
                            <div class="li-blog-content">
                                <div class="li-blog-details">
                                    <h5 class="li-blog-heading pt-25"><a href="{{route('blog.detail',$post->slug)}}">{{$post->title}}</a></h5>
                                    <div class="li-blog-meta">
                                        <a class="author" href="#"><i class="fa fa-user"></i>{{$post->author_info['name']}}</a>
                                        <a class="comment" href="#"><i class="fa fa-comment-o"></i> 3 comment</a>
                                        <a class="post-time" href="#"><i class="fa fa-calendar"></i> 25 nov 2018</a>
                                    </div>
                                    <p>{!!$post->summary !!}</p>
                                    <a class="read-more" href="{{route('blog.detail',$post->slug)}}">Đọc thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
               
                    <!-- Begin Li's Pagination Area -->
                    <div class="col-lg-12">
                        <div class="li-paginatoin-area text-center pt-25">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="li-pagination-box">
                                        {{-- <li><a class="Previous" href="#">Previous</a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a class="Next" href="#">Next</a></li> --}}
                                        {{$posts->links()}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Pagination End Here Area -->
                </div>
            </div>
            <!-- Li's Main Content Area End Here -->
        </div>
    </div>
</div>
<!-- Li's Main Blog Page Area End Here -->
@endsection