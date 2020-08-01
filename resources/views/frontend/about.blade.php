@extends('frontend.layout.layout')
@section('content')
     <!-- Start breadcrumb -->
     <section class="breadCrumb" style="background: url(/images/about-breadcrumb.jpg); background-repeat: no-repeat;background-size:cover;">
            <div class="container">
                <h1 class="breadCrumb__title">About</h1>
            </div>
            <a href="index.html" class="breadCrumb__homeIcon">
                <i class="fa fa-home"></i>
            </a>
        </section>
        <!-- End breadcrumb -->

        <!-- Start about content -->

        <section class="about__content">
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <h1 class="section__title">
                            Learn More About our English Center
                        </h1>
                    </div>
                </div>
                <p class="about__content-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere ut repudiandae praesentium minima quae, officiis saepe itaque eos pariatur fugiat ab veniam aliquid illum sit sapiente illo dolores possimus corporis? Lorem ipsum dolor sit, amet consectetur
                    adipisicing elit. Doloremque sequi magnam neque molestias modi quas dolor, earum amet illum similique natus ratione magni delectus blanditiis! Est distinctio reprehenderit commodi harum.

                </p>
                <p class="about__content-text">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit dolorum ipsum quod neque, illo deserunt assumenda aspernatur distinctio explicabo architecto, reprehenderit dolores repellat saepe soluta dolor deleniti voluptate sit nisi?
                </p>
            </div>
        </section>
        <!-- End about content -->

        <section class="about__number">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="about__number-item">
                            <p class="number">1000</p>
                            <p class="item__name">Student</p>
                            <div class="lines lines--orange"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="about__number-item">
                            <p class="number">100</p>
                            <p class="item__name">Teacher</p>
                            <div class="lines lines--yellow"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="about__number-item">
                            <p class="number">10</p>
                            <p class="item__name">Branch</p>
                            <div class="lines lines--blue"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="about__number-item">
                            <p class="number">1000</p>
                            <p class="item__name">Total Sessions</p>
                            <div class="lines lines--violet"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
                                <p class="info-quote">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, exercitationem. Excepturi quas velit nemo, ex laboriosam recusandae
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
                                <p class="info-quote">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, exercitationem. Excepturi quas velit nemo, ex laboriosam recusandae
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
                                <p class="info-quote">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, exercitationem. Excepturi quas velit nemo, ex laboriosam recusandae
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End teacher -->
@endsection()