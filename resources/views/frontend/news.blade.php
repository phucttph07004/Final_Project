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
                @foreach($news as $new)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="news__item">
                            <div class="news__item-image">
                                <a href="">
                                    <img src="{{$new->image}}" alt="news">
                                </a>
                            </div>
                            <div class="news__item-info">
                                <p class="news__item-date">{{$new->created_at}}</p>
                                <h2>
                                    <a class="news__item-title" href="/news-detail">{{$new -> title}}</a>
                                </h2>
                                <p class="news__item-desc">{{$new->content}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
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