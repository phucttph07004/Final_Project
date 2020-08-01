@extends('frontend.layout.layout')
@section('content')
<section class="breadCrumb" style="background: url(/images/contact-breadcrumb.jpg); background-repeat: no-repeat;background-size:cover;">
            <div class="container">
            @foreach($news as $new)
                <h1 class="breadCrumb__title">{{$new->title}}</h1>
                @endforeach
            </div>
            <a href="index.html" class="breadCrumb__homeIcon">
                <i class="fa fa-home"></i>
            </a>
        </section>
        <!-- End breadcrumb -->

        <!-- Start news -->
        <section class="news-detail">
            <div class="container">
                <div class="row">
                    <div class="col-9">
                        @foreach($news as $new)
                            <div class="news-detail__content">
                                <div class="news-detail__img">
                                    <img src="{{$new->image}}" alt="news detail image">
                                </div>
                                <div class="news__detail-info">
                                    <p class="news-date">{{$new->created_at->format('d-m-Y')}}</p>
                                    <p class="news-comment">3 comment</p>
                                </div>
                                <h1 class="news__detail-title">{{$new->title}}</h1>
                                <p class="content">
                                {{$new->content}}
                                </p>
                            </div>
                        @endforeach
                        <div class="news-detail__mid">
                            <div class="tag">
                                <p>Tag: </p>
                                <ul class="tag__list">
                                    <li class="tag__item">
                                        <a href="" class="item-link">english</a>
                                    </li>
                                    <li class="tag__item">
                                        <a href="" class="item-link">school</a>
                                    </li>
                                </ul>
                            </div>
                            <ul class="share">
                                <li class="share__item">
                                    <a href="" class="item-link"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li class="share__item">
                                    <a href="" class="item-link"><i class="fa fa-twitter"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="comment">
                            <p class="comment-title">2 Comment</p>
                            <div class="comment__detail">
                                <div class="col-2">
                                    <div class="avatar">
                                        <img src="/images/about-breadcrumb.jpg" alt="news detail image">
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="comment__info">
                                        <p class="author">Truong</p>
                                        <p class="comment__date">20 June 2020</p>
                                    </div>
                                    <div class="comment__content">
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi fugiat molestiae neque vitae sapiente culpa ut, voluptas, </p>
                                    </div>
                                </div>
                            </div>
                            <div class="comment__detail">
                                <div class="col-2">
                                    <div class="avatar">
                                        <img src="/images/about-breadcrumb.jpg" alt="news detail image">
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="comment__info">
                                        <p class="author">Truong</p>
                                        <p class="comment__date">20 June 2020</p>
                                    </div>
                                    <div class="comment__content">
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi fugiat molestiae neque vitae sapiente culpa ut, voluptas, </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment__form">
                            <p class="comment-title">Leave A Comment</p>
                            <form class="comment__form-inner" action="">
                                <div class="col-6">
                                    <input class="form-control" type="text" placeholder="Fullname">
                                </div>
                                <div class="col-6">
                                    <input class="form-control" type="email" name="" id="" placeholder="Email Address">
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" name="" id="" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                                <button class="btn">Send Message</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="related__post">
                            <h2>Related Post</h2>
                            @foreach($relaNews as $relaNew)
                            <div class="related__post-item">
                                <div class="related__post-img">
                                    <img src="{{$relaNew->image}}" alt="news detail image">
                                </div>
                                <div class="related__post-info">
                                    <p class="related__post-date">{{$relaNew->created_at->format('d-m-Y')}}</p>
                                    <h3 class="related__post-title">
                                        <a href="{{route('news.news-detail',[$new->id])}}">{{$relaNew->title}}</a>
                                    </h3>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End news -->
@endsection