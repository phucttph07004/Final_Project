@extends('frontend.layout.layout')
@section('content')

@if(session('thongbao'))
<section class="alert-noti">
    <div class="d-flex align-items-center">
        <div class="col-2">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"
                width="50px" height="50px">
                <g>
                    <g>
                        <g>
                            <path
                                d="M256,0C114.833,0,0,114.833,0,256s114.833,256,256,256s256-114.853,256-256S397.167,0,256,0z M256,472.341    c-119.275,0-216.341-97.046-216.341-216.341S136.725,39.659,256,39.659c119.295,0,216.341,97.046,216.341,216.341    S375.275,472.341,256,472.341z"
                                data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF" />
                        </g>
                    </g>
                    <g>
                        <g>
                            <path
                                d="M373.451,166.965c-8.071-7.337-20.623-6.762-27.999,1.348L224.491,301.509l-58.438-59.409    c-7.714-7.813-20.246-7.932-28.039-0.238c-7.813,7.674-7.932,20.226-0.238,28.039l73.151,74.361    c3.748,3.807,8.824,5.929,14.138,5.929c0.119,0,0.258,0,0.377,0.02c5.473-0.119,10.629-2.459,14.297-6.504l135.059-148.722    C382.156,186.854,381.561,174.322,373.451,166.965z"
                                data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF" />
                        </g>
                    </g>
                </g>
            </svg>
        </div>
        <div class="col-10">
            {{session('thongbao') }}
        </div>
        <div class="close-noti">
            <i class="fa fa-times"></i>
        </div>
    </div>
</section>
@endif
<!-- Start main slider -->
<section class="homeSlider">
    <div class="homeSlider-carousel">
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
        <h1 class="section__title">Toàn diện 4 kỹ năng</h1>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3 ">
                <div class="offer__block wow bounce">
                    <div class="offer__block-circle">
                        <img src="/images/offer-icon-1.png" alt="Offer" class="offer__block-image">
                    </div>
                    <p class="offer__block-name">
                        Nghe 
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="offer__block wow bounce">
                    <div class="offer__block-circle">
                        <img src="/images/offer-icon-1.png" alt="Offer" class="offer__block-image">
                    </div>
                    <p class="offer__block-name">
                       Nói
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="offer__block wow bounce">
                    <div class="offer__block-circle">
                        <img src="/images/offer-icon-1.png" alt="Offer" class="offer__block-image">
                    </div>
                    <p class="offer__block-name">
                       Đọc
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="offer__block wow bounce">
                    <div class="offer__block-circle">
                        <img src="/images/offer-icon-1.png" alt="Offer" class="offer__block-image">
                    </div>
                    <p class="offer__block-name">
                       Viết
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
            <div class="col-md-5 wow slideInLeft">
                <div class="welcome__image ">
                    <img src="/images/gallery-1.jpg" alt="welcome">
                </div>
            </div>
            <div class="col-md-6 wow slideInRight">
                <div class="welcome__content ">
                    <h1 class="section__title">Chào mừng bạn đến với Bee English Center </h1>
                    <p class="welcome__content-desc">
                    Chúng tôi cam kết chuyển giao kiến thức thực tiễn dựa trên nền tảng tư duy giáo dục định hướng & phát huy tối đa khả năng sáng tạo của học viên với mục tiêu tối thượng là giúp người học thay đổi tư duy, phát triển kỹ năng cần thiết, nghe nói tiếng Anh dễ dàng, trôi chảy và tự động.
                    </p>
                    <a href="" class="welcome__readMore">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End welcome -->

<!-- Start programs -->
<section class="programs">
    <div class="container">
        <h1 class="section__title">Hệ Thống Khoá Học</h1>
        <div class="row">
            <div class="col-12 col-md-4 col-lg-4">
                <div class="programs__block">
                    <div class="programs__block-image">
                        <img src="https://via.placeholder.com/350x150" alt="programs">
                    </div>
                    <div class="programs__block-text">
                        <h5 class="programs__block-name">COMBO 1</h5>
                        <p class="programs__block-desc">Nền tảng tiếng Anh</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4">
                <div class="programs__block">
                    <div class="programs__block-image">
                        <img src="https://via.placeholder.com/350x150" alt="programs">
                    </div>
                    <div class="programs__block-text">
                        <h5 class="programs__block-name">COMBO 2</h5>
                        <p class="programs__block-desc">Toàn diện 4 kỹ năng</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 col-lg-4">
                <div class="programs__block">
                    <div class="programs__block-image">
                        <img src="https://via.placeholder.com/350x150" alt="programs">
                    </div>
                    <div class="programs__block-text">
                        <h5 class="programs__block-name">COMBO 3</h5>
                        <p class="programs__block-desc">Chuẩn đầu ra TOEIC</p>
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
        <h1 class="section__title section__title--white">Cảm nhận của học viên</h1>
        <div class="feedback-carousel owl-carousel owl-theme">
            <div class="feedback__item">
                <p class="feedback__item-content">
                Mình cảm thấy rất may mắn khi được biết đến trung tâm giao tiếp tiếng Anh từ đầu. Mình thực sự rất ấn tượng với phương pháp dạy và học ở Langmaster ạ. Học không còn chỉ là trên lý thuyết như mình được học trên trường mà đó là sự áp dụng lý thuyết vào thực tiễn. Điều này giúp mình nhớ lâu nhanh hơn. 
                </p>
                <p class="feedback__item-author">Nguyễn Quang Trường</p>
                <div class="feedback__item-avatar">
                    <img src="" alt="">
                </div>
            </div>
             <div class="feedback__item">
                <p class="feedback__item-content">
                Mình cảm thấy rất may mắn khi được biết đến trung tâm giao tiếp tiếng Anh từ đầu. Mình thực sự rất ấn tượng với phương pháp dạy và học ở Langmaster ạ. Học không còn chỉ là trên lý thuyết như mình được học trên trường mà đó là sự áp dụng lý thuyết vào thực tiễn. Điều này giúp mình nhớ lâu nhanh hơn. 
                </p>
                <p class="feedback__item-author">Nguyễn Quang Trường</p>
                <div class="feedback__item-avatar">
                    <img src="" alt="">
                </div>
            </div>
             <div class="feedback__item">
                <p class="feedback__item-content">
                Mình cảm thấy rất may mắn khi được biết đến trung tâm giao tiếp tiếng Anh từ đầu. Mình thực sự rất ấn tượng với phương pháp dạy và học ở Langmaster ạ. Học không còn chỉ là trên lý thuyết như mình được học trên trường mà đó là sự áp dụng lý thuyết vào thực tiễn. Điều này giúp mình nhớ lâu nhanh hơn. 
                </p>
                <p class="feedback__item-author">Nguyễn Quang Trường</p>
                <div class="feedback__item-avatar">
                    <img src="" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End feedback -->


<!-- Start teacher -->
<section class="teacher">
    <div class="container">
        <h1 class="section__title">Đội ngũ giảng viên</h1>
        <div class="teacher-carousel owl-carousel">
           @foreach($teachers as $teacher)
           <div class="teacher__item">
                <div class="teacher__item-img">
                    <img src="storage/{{$teacher->avatar}}" alt="Teacher Image">
                </div>
                <div class="teacher__item-info">
                    <p class="teacher__position">Giảng Viên</p>
                    <h3 class="teacher__name">{{$teacher->fullname}}</h3>
                </div>
            </div>
           @endforeach
        </div>
    </div>
</section>
<!-- End teacher -->

<!-- Start news -->
<section class="news">
    <div class="container">
        <h1 class="section__title">Tin tức</h1>
        <div class="row">
            @foreach($news as $new)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="news__item">
                    <div class="news__item-image">
                        <a href="{{route('news.news-detail',[$new->id])}}">
                            <img src="storage/{{$new->image}}" alt="news">
                        </a>
                    </div>
                    <div class="news__item-info">
                        <p class="news__item-date">{{$new->created_at->format('d-m-Y')}}</p>
                        <h2>
                            <a class="news__item-title" href="{{route('news.news-detail',[$new->id])}}">
                                {{$new -> title}}</a>
                        </h2>
                        <p class="news__item-desc">{{$new->content}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End news -->

<!-- Start Gallery -->
<!-- <div class="gallery">
    <div class="gallery-carousel owl-carousel">
        <div class="gallery__item">
            <a href="/images/gallery-1.jpg"  data-fancybox="gallery" alt="gallery">
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
            <a href="/images/gallery-2.jpg"  data-fancybox="gallery" alt="gallery">
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
            <a href="/images/gallery-3.jpg"  data-fancybox="gallery" alt="gallery">
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
            <a href="/images/gallery-4.jpg"  data-fancybox="gallery" alt="gallery">
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
            <a href="/images/gallery-5.jpg"  data-fancybox="gallery" alt="gallery">
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
</div> -->
<!-- End Gallery -->
@endsection