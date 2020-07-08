@extends('frontend.layout.layout')
@section('content')
<!-- Start main slider -->
<section class="homeSlider">
    <div class="homeSlider-carousel owl-carousel ow-theme">
        <div class="homeSlider__item">
            <div class="homeSlider__image">
                <img src="/images/homeslider.jpg" alt="Home Slide">
            </div>
        </div>
        <div class="homeSlider__item">
            <div class="homeSlider__image">
                <img src="/images/homeslider.jpg" alt="Home Slide">
            </div>
        </div>
        <div class="homeSlider__item">
            <div class="homeSlider__image">
                <img src="/images/homeslider.jpg" alt="Home Slide">
            </div>
        </div>
    </div>
</section>
<!-- End main slider -->

<!-- Start offer -->
<section class="offer">
    <div class="container">
        <h1 class="section__title">What we're offering</h1>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="offer__block">
                    <div class="offer__block-circle">
                        <img src="/images/offer-icon-1.png" alt="Offer" class="offer__block-image">
                    </div>
                    <p class="offer__block-name">
                        Something Offer
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="offer__block">
                    <div class="offer__block-circle">
                        <img src="/images/offer-icon-1.png" alt="Offer" class="offer__block-image">
                    </div>
                    <p class="offer__block-name">
                        Something Offer
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="offer__block">
                    <div class="offer__block-circle">
                        <img src="/images/offer-icon-1.png" alt="Offer" class="offer__block-image">
                    </div>
                    <p class="offer__block-name">
                        Something Offer
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="offer__block">
                    <div class="offer__block-circle">
                        <img src="/images/offer-icon-1.png" alt="Offer" class="offer__block-image">
                    </div>
                    <p class="offer__block-name">
                        Something Offer
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End offer -->

<!-- Start welcome -->
<section class="welcome">
    <div class="container">
        <div class="row align-items-end justify-content-between">
            <div class="col-md-5">
                <div class="welcome__image">
                    <img src="/images/gallery-1.jpg" alt="welcome">
                </div>
            </div>
            <div class="col-md-6">
                <div class="welcome__content">
                    <h1 class="section__title">Welcome to Something English Center </h1>
                    <p class="welcome__content-desc">
                        There are many variations of pass of lorem ipsum available but the majority have suffered
                        alteration in some form.
                    </p>
                    <a href="" class="welcome__readMore">Discover More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End welcome -->

<!-- Start programs -->
<section class="programs">
    <div class="container">
        <h1 class="section__title">Our Programs</h1>
        <div class="row">
            <div class="col-12 col-md-4 col-lg-4">
                <div class="programs__block">
                    <div class="programs__block-image">
                        <img src="https://via.placeholder.com/350x150" alt="programs">
                    </div>
                    <div class="programs__block-text">
                        <h5 class="programs__block-name">Something Programs</h5>
                        <p class="programs__block-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4">
                <div class="programs__block">
                    <div class="programs__block-image">
                        <img src="https://via.placeholder.com/350x150" alt="programs">
                    </div>
                    <div class="programs__block-text">
                        <h5 class="programs__block-name">Something Programs</h5>
                        <p class="programs__block-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4">
                <div class="programs__block">
                    <div class="programs__block-image">
                        <img src="https://via.placeholder.com/350x150" alt="programs">
                    </div>
                    <div class="programs__block-text">
                        <h5 class="programs__block-name">Something Programs</h5>
                        <p class="programs__block-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End programs -->

<!-- Start feedback -->
<section class="feedback">
    <div class="container">
        <h1 class="section__title section__title--white">What Students Say</h1>
        <div class="feedback-carousel owl-carousel owl-theme">
            <div class="feedback__item">
                <p class="feedback__item-content">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti tenetur saepe doloribus corporis
                </p>
                <p class="feedback__item-author">Someone</p>
                <p class="feedback__item-job">Student</p>
                <div class="feedback__item-avatar">

                </div>
            </div>
            <div class="feedback__item">
                <p class="feedback__item-content">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti tenetur saepe doloribus corporis
                </p>
                <p class="feedback__item-author">Someone</p>
                <p class="feedback__item-job">Student</p>
                <div class="feedback__item-avatar">

                </div>
            </div>
            <div class="feedback__item">
                <p class="feedback__item-content">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti tenetur saepe doloribus corporis
                </p>
                <p class="feedback__item-author">Someone</p>
                <p class="feedback__item-job">Student</p>
                <div class="feedback__item-avatar">

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End feedback -->

<!-- Start subscribe -->
<section class="subscribe">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-6">
                <p class="subscribe__text">
                    Don’t miss our daily updates
                </p>
            </div>
            <div class="col-md-12 col-lg-6">
                <form action="">
                    <input type="email" placeholder="Enter Email Here">
                    <button class="btn">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End subscribe -->

<!-- Start teacher -->
<section class="teacher">
    <div class="container">
        <h1 class="section__title">Meet Our Teacher</h1>
        <div class="row">
            <div class="col-4">
                <div class="teacher__item">
                    <div class="teacher__item-image">
                        <img src="/images/teacher.jpg" alt="teacher">
                    </div>
                    <div class="overlay"></div>
                    <div class="teacher__item-info">
                        <p class="info-name">Someone</p>
                        <p class="info-position">Teacher</p>
                        <p class="info-quote">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus,
                            exercitationem. Excepturi quas velit nemo, ex laboriosam recusandae
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="teacher__item">
                    <div class="teacher__item-image">
                        <img src="/images/teacher.jpg" alt="teacher">
                    </div>
                    <div class="overlay"></div>
                    <div class="teacher__item-info">
                        <p class="info-name">Someone</p>
                        <p class="info-position">Teacher</p>
                        <p class="info-quote">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus,
                            exercitationem. Excepturi quas velit nemo, ex laboriosam recusandae
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="teacher__item">
                    <div class="teacher__item-image">
                        <img src="/images/teacher.jpg" alt="teacher">
                    </div>
                    <div class="overlay"></div>
                    <div class="teacher__item-info">
                        <p class="info-name">Someone</p>
                        <p class="info-position">Teacher</p>
                        <p class="info-quote">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus,
                            exercitationem. Excepturi quas velit nemo, ex laboriosam recusandae
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End teacher -->

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
                        <p class="news__item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, nemo
                            alias commodi earum culpa quis neque, atque iste consectetur iure quos</p>
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
                        <p class="news__item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, nemo
                            alias commodi earum culpa quis neque, atque iste consectetur iure quos</p>
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
                        <p class="news__item-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, nemo
                            alias commodi earum culpa quis neque, atque iste consectetur iure quos</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End news -->

<!-- Start Gallery -->
<div class="gallery">
    <div class="gallery-carousel owl-carousel">
        <div class="gallery__item">
            <a href="/images/gallery-1.jpg" data-fancybox="gallery">
                <div class="gallery__item-image">
                    <div class="gallery__item-plus">
                        <i class="fa fa-plus"></i>
                    </div>
                    <div class="overlay"></div>

                    <img src="/images/gallery-1.jpg" alt="gallery">
                </div>
            </a>
        </div>
        <div class="gallery__item">
            <a href="/images/gallery-2.jpg" data-fancybox="gallery">
                <div class="gallery__item-image">
                    <div class="gallery__item-plus">
                        <i class="fa fa-plus"></i>
                    </div>
                    <div class="overlay"></div>

                    <img src="/images/gallery-2.jpg" alt="gallery">
                </div>
            </a>
        </div>
        <div class="gallery__item">
            <a href="/images/gallery-3.jpg" data-fancybox="gallery">
                <div class="gallery__item-image">
                    <div class="gallery__item-plus">
                        <i class="fa fa-plus"></i>
                    </div>
                    <div class="overlay"></div>

                    <img src="/images/gallery-3.jpg" alt="gallery">
                </div>
            </a>
        </div>
        <div class="gallery__item">
            <a href="/images/gallery-4.jpg" data-fancybox="gallery">
                <div class="gallery__item-image">
                    <div class="gallery__item-plus">
                        <i class="fa fa-plus"></i>
                    </div>
                    <div class="overlay"></div>

                    <img src="/images/gallery-4.jpg" alt="gallery">
                </div>
            </a>
        </div>
        <div class="gallery__item">
            <a href="/images/gallery-5.jpg" data-fancybox="gallery">
                <div class="gallery__item-image">
                    <div class="gallery__item-plus">
                        <i class="fa fa-plus"></i>
                    </div>
                    <div class="overlay"></div>

                    <img src="/images/gallery-5.jpg" alt="gallery">
                </div>
            </a>
        </div>
    </div>
</div>
<!-- End Gallery -->
@endsection