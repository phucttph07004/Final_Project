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
                                <a href="{{route('news.news-detail',[$new->id])}}">
                                    <img src="{{$new->image}}" alt="news">
                                </a>
                            </div>
                            <div class="news__item-info">
                                <p class="news__item-date">{{$new->created_at}}</p>
                                <h2>
                                    <a class="news__item-title" href="{{route('news.news-detail',[$new->id])}}">{{$new -> title}}</a>
                                </h2>
                                <p class="news__item-desc">{{$new->content}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
                <nav aria-label="" class="news__pagination">
                   {{ $news->links() }}
                </nav>
            </div>
        </section>
        <!-- End news -->

@endsection