@extends('frontend.layout.layout')
@section('content')
<section class="breadCrumb" style="background: url(/images/contact-breadcrumb.jpg); background-repeat: no-repeat;background-size:cover;">
            <div class="container">
                <h1 class="breadCrumb__title">News</h1>
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
                        <div class="news-detail__content">
                            <div class="news-detail__img">
                                <img src="/images/homeslider.jpg" alt="news detail image">
                            </div>
                            <div class="news__detail-info">
                                <p class="news-date">20 June 2020</p>
                                <p class="news-comment">3 comment</p>
                            </div>
                            <h1 class="news__detail-title">We Makes Difference in the Life of Child</h1>
                            <p class="content">
                                There are many people variation of passages of lorem ipsum is simply free text available in the majority sed do eius tempo. There are many people variation of passages of lorem Ipsum available in the majority sed do eius tempor incididunt ut labore et
                                alteration in some. Quuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quiaolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt
                                ut labore et dolore magnam dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                            <p class="content">
                                There are many people variation of passages of lorem ipsum is simply free text available in the majority sed do eius tempo. There are many people variation of passages of lorem Ipsum available in the majority sed do eius tempor incididunt ut labore et
                                alteration in some. Quuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quiaolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt
                                ut labore et dolore magnam dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                        </div>
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
                            <div class="related__post-item">
                                <div class="related__post-img">
                                    <img src="/images/gallery-1.jpg" alt="news detail image">
                                </div>
                                <div class="related__post-info">
                                    <p class="related__post-date">23 June, 2020</p>
                                    <h1 class="related__post-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
                                </div>
                            </div>
                            <div class="related__post-item">
                                <div class="related__post-img">
                                    <img src="/images/gallery-1.jpg" alt="news detail image">
                                </div>
                                <div class="related__post-info">
                                    <p class="related__post-date">23 June, 2020</p>
                                    <h1 class="related__post-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
                                </div>
                            </div>
                            <div class="related__post-item">
                                <div class="related__post-img">
                                    <img src="/images/gallery-1.jpg" alt="news detail image">
                                </div>
                                <div class="related__post-info">
                                    <p class="related__post-date">23 June, 2020</p>
                                    <h1 class="related__post-title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End news -->

@endsection