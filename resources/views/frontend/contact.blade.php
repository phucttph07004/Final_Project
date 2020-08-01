@extends('frontend.layout.layout')

@section('content')
            <!-- Start breadcrumb -->
            <section class="breadCrumb" style="background: url(/images/contact-breadcrumb.jpg); background-repeat: no-repeat;background-size:cover;">
            <div class="container">
                <h1 class="breadCrumb__title">Contact</h1>
            </div>
            <a href="/" class="breadCrumb__homeIcon">
                <i class="fa fa-home"></i>
            </a>
        </section>
        <!-- End breadcrumb -->

        <!-- Start about content -->

        <!-- Start Contact -->
        <section class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h1 class="section__title">Write us a message</h1>
                        <p class="contact__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
                        <a href="tel:0123456789" class="contact__text"><i class="fa fa-phone"></i>012345678</a>
                        <a href="mailto:something@gmail.com" class="contact__text"><i class="fa fa-envelope-o"></i>something@gmail.com</a>
                    </div>
                    <div class="col-md-8">
                        <form class="contact__form" action="">
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
            </div>
        </section>
        <section class="branch">
            <div class="container">
                <h1 class="section__title">Our Branch</h1>
                <div class="row">
                    <div class="col-6">
                        <div class="contact__branch">
                            <h2 class="branch__name">Branch 1</h2>
                            <address class="branch__text">
                                <i class="fa fa-map-marker"></i>Tòa nhà FPT Polytechnic, Phố Trịnh Văn Bô, Nam Từ Liêm, Hà Nội
                            </address>
                            <p class="branch__text">
                                <i class="fa fa-phone"></i> 0123456789
                            </p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="contact__branch">
                            <h2 class="branch__name">Branch 2</h2>
                            <address class="branch__text">
                                <i class="fa fa-map-marker"></i>Tòa nhà FPT Polytechnic, Phố Trịnh Văn Bô, Nam Từ Liêm, Hà Nội
                            </address>
                            <p class="branch__text">
                                <i class="fa fa-phone"></i> 0123456789
                            </p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="contact__branch">
                            <h2 class="branch__name">Branch 3</h2>
                            <address class="branch__text">
                                <i class="fa fa-map-marker"></i>Tòa nhà FPT Polytechnic, Phố Trịnh Văn Bô, Nam Từ Liêm, Hà Nội
                            </address>
                            <p class="branch__text">
                                <i class="fa fa-phone"></i> 0123456789
                            </p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="contact__branch">
                            <h2 class="branch__name">Branch 4</h2>
                            <address class="branch__text">
                                <i class="fa fa-map-marker"></i>Tòa nhà FPT Polytechnic, Phố Trịnh Văn Bô, Nam Từ Liêm, Hà Nội
                            </address>
                            <p class="branch__text">
                                <i class="fa fa-phone"></i> 0123456789
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Contact -->
@endsection