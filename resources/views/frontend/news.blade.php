@extends('frontend.layout.layout')
@section('content')
    
        <!-- Start breadcrumb -->
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
        <section class="news">
            <div class="container">
                <h1 class="section__title">News</h1>
                <div class="row align-items-center">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="news__item">
                            <div class="news__item-image">
                                <a href="">
                                    <img src="/images/news-1.jpg" alt="news">
                                </a>
                            </div>
                            <div class="news__item-info">
                                <p class="news__item-date">20 Jun 2020</p>
                                <h2>
                                    <a class="news__item-title" href="news-detail.html">Something News</a>
                                </h2>
                                <p class="news__item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, nemo alias commodi earum culpa quis neque, atque iste consectetur iure quos</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="news__item">
                            <div class="news__item-image">
                                <a href="">
                                    <img src="/images/news-2.jpg" alt="news">
                                </a>
                            </div>
                            <div class="news__item-info">
                                <p class="news__item-date">20 Jun 2020</p>
                                <h2>
                                    <a class="news__item-title" href="news-detail.html">Something News</a>
                                </h2>
                                <p class="news__item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, nemo alias commodi earum culpa quis neque, atque iste consectetur iure quos</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="news__item">
                            <div class="news__item-image">
                                <a href="">
                                    <img src="/images/news-3.jpg" alt="news">
                                </a>
                            </div>
                            <div class="news__item-info">
                                <p class="news__item-date">20 Jun 2020</p>
                                <h2>
                                    <a class="news__item-title" href="news-detail.html">Something News</a>
                                </h2>
                                <p class="news__item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, nemo alias commodi earum culpa quis neque, atque iste consectetur iure quos</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="news__item">
                            <div class="news__item-image">
                                <a href="">
                                    <img src="/images/news-1.jpg" alt="news">
                                </a>
                            </div>
                            <div class="news__item-info">
                                <p class="news__item-date">20 Jun 2020</p>
                                <h2>
                                    <a class="news__item-title" href="news-detail.html">Something News</a>
                                </h2>
                                <p class="news__item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, nemo alias commodi earum culpa quis neque, atque iste consectetur iure quos</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="news__item">
                            <div class="news__item-image">
                                <a href="">
                                    <img src="/images/news-2.jpg" alt="news">
                                </a>
                            </div>
                            <div class="news__item-info">
                                <p class="news__item-date">20 Jun 2020</p>
                                <h2>
                                    <a class="news__item-title" href="news-detail.html">Something News</a>
                                </h2>
                                <p class="news__item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, nemo alias commodi earum culpa quis neque, atque iste consectetur iure quos</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="news__item">
                            <div class="news__item-image">
                                <a href="">
                                    <img src="/images/news-3.jpg" alt="news">
                                </a>
                            </div>
                            <div class="news__item-info">
                                <p class="news__item-date">20 Jun 2020</p>
                                <h2>
                                    <a class="news__item-title" href="news-detail.html">Something News</a>
                                </h2>
                                <p class="news__item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, nemo alias commodi earum culpa quis neque, atque iste consectetur iure quos</p>
                            </div>
                        </div>
                    </div>
                </div>
                <nav aria-label="" class="news__pagination">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active">
                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
        <!-- End news -->

@endsection