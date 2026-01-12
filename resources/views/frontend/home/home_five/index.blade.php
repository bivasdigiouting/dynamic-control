@extends('frontend.layouts.master')

@section('meta_title', $seo_setting['home']['seo_title'])
@section('meta_description', $seo_setting['home']['seo_description'])
@section('meta_keywords', $seo_setting['home']['seo_keywords'])


@section('header')
   @include('frontend.layouts.headers.header-5', ['main_menu' => $main_menu])
@endsection

@section('content')
<style>



        

        .banner-section {
            position: relative;
            width: 100%;
            margin: 0;
            /*margin-top: 70px; /* Account for fixed navbar */
            background: #212529;
            border-radius: 0;
            overflow: hidden;
            box-shadow: none;
        }
        .banner-video {
            width: 100%;
            height: auto;
            min-height: 400px;
            object-fit: cover;
            object-position: center;
            display: block;
            background: #212529;
        }
        .floating-btn-group {
            position: absolute;
            bottom: 35%;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            justify-content: center;
            max-width: 90%;
            z-index: 10;
        }
        .floating-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            transition: all 0.3s ease;
            min-width: auto;
            width: auto;
            height: auto;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            letter-spacing: 0.5px;
            border: 2px solid transparent;
        }
        .floating-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .floating-btn:active {
            transform: translateY(0);
            box-shadow: 0 2px 10px rgba(102, 126, 234, 0.4);
        }

        /* Video container for mobile */
        .video-container {
            display: none;
            max-width: 900px;
            margin: 40px auto;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 2px 24px rgba(0,0,0,0.19);
        }
        .video-container video {
            width: 100%;
            height: auto;
            display: block;
        }

       

        
        /* Mobile Layout Container */
        body {
            display: flex;
            flex-direction: column;
        }

       
        .banner-section {
            order: 2;
        }

        
        .video-container {
            order: 4;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .banner-section {
                display: none !important;
                order: 2;
            }
            .video-container {
                display: block;
                margin: 20px;
                border-radius: 12px;
                order: 2;
            }
           
            
            .floating-btn {
                font-size: 12px;
                padding: 10px 18px;
                border-radius: 6px;
                font-weight: 600;
            }

            /* Solar Calculator Mobile Styles */
            .solar-calculator-section {
                padding: 40px 0;
            }

            .calculator-header h2 {
                font-size: 28px;
            }

            .calculator-content {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .calculator-form {
                padding: 30px 20px;
            }

            .calculator-results {
                padding: 30px 20px;
            }

            .tab-btn {
                padding: 12px 15px;
                font-size: 14px;
            }

            .calculate-btn {
                padding: 15px 30px;
                font-size: 16px;
            }

            .current-value span:nth-child(2) {
                font-size: 20px;
            }

            .result-item .value {
                font-size: 24px;
            }
        }

        @media (max-width: 576px) {
            .video-container {
                margin: 15px;
                border-radius: 8px;
            }
        }

        /* Tablet adjustments */
        @media (max-width: 992px) and (min-width: 769px) {
            .banner-section {
                margin: 0;
                width: 100%;
            }
            .floating-btn-group {
                gap: 20px;
            }
            .floating-btn {
                width: 70px;
                height: 36px;
                font-size: 12px;
            }
        }

        /* Large mobile adjustments */
        @media (max-width: 768px) and (min-width: 577px) {
            .video-container {
                margin: 20px;
            }
        }
</style>

 <div class="banner-section" id="banner-section">
        <video id="banner-video" class="banner-video" autoplay muted loop playsinline>
            <source src="{{ asset('frontend/assets/videos/DJI_0002.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="floating-btn-group">
            <div class="floating-btn" id="btn1" title="Show Image 2">Weighing</div>
            <div class="floating-btn" id="btn2" title="Show Image 3">Process Automation</div>
            <div class="floating-btn" id="btn3" title="Show Image 4">Power</div>
        </div>
    </div>
    
    <!-- Video container for mobile -->
    <div class="video-container" id="video-container">
        <video id="mobile-video" autoplay muted loop playsinline controls>
            <source src="{{ asset('frontend/assets/videos/DJI_0002.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    @include('frontend.home.home_five.sections.calculator')

    @php
        $slugs = [
            'about', 'banner', 'text-slider', 'services', 'gallery',
            'portfolio', 'fun-fact', 'process','brand', 'testimonial'
        ];
    @endphp

    @foreach ($slugs as $slug)
        @php $section = $sections[$slug] ?? null; @endphp

        @if ($section?->status)
            @includeIf('frontend.home.home_five.sections.' . $slug, [
                'default_content' => $section->default_content ?? null,
                'content' => $section?->content ?? null,
            ])
        @endif
    @endforeach

    @include('frontend.home.home_five.sections.vision')
    {{-- @include('frontend.home.home_five.sections.brand') --}}

    {{-- @if ($sections['brand']?->status)
        @include('frontend.home.home_five.sections.brand', [
            'default_content' => $sections['brand']?->default_content ?? null,
            'content' => $sections['brand']->content ?? null,
        ])
    @endif --}}

@endsection 

@section('footer')
    @include('frontend.layouts.footers.footer-5', [
        'footer_menu_one' => $footer_menu_one,
        'footer_menu_two' => $footer_menu_two,
    ])
@endsection

@push('js')
    <script>
        /* 
        // Image slider logic disabled for video banner
        // Store image file names
        const images = {
            default: "uploads/slider/image_1.png",
            img2: "uploads/slider/image_2.png",
            img3: "uploads/slider/image_3.png",
            img4: "uploads/slider/image_4.png",
            img5: "uploads/slider/image_5.png"
        };

        const $bannerImg = $("#banner-img");
        const $bannerSection = $("#banner-section");
        let currentHoveredButton = null;

        (function($){
            const imageMap = { btn1: images.img2, btn2: images.img3, btn3: images.img4 };

            $bannerSection.on('mouseenter', '.floating-btn', function(){
                const id = this.id;
                currentHoveredButton = id;
                const src = imageMap[id] || images.default;
                $bannerImg.attr('src', src);
            });

            $bannerSection.on('mouseleave', '.floating-btn', function(){
                currentHoveredButton = null;
                $bannerImg.attr('src', images.default);
            });

            $bannerSection.on('mousemove.bannerHover', function(e){
                let isOverButton = false;
                $('.floating-btn').each(function(){
                    const rect = this.getBoundingClientRect();
                    if (e.clientX >= rect.left && e.clientX <= rect.right &&
                        e.clientY >= rect.top && e.clientY <= rect.bottom) {
                        isOverButton = true;
                        return false;
                    }
                });
                if (!isOverButton && !currentHoveredButton) {
                    $bannerImg.attr('src', images.img5);
                }
            });

            $bannerSection.on('mouseleave', function(){
                $bannerSection.off('mousemove.bannerHover');
                if (!currentHoveredButton) {
                    $bannerImg.attr('src', images.default);
                }
            });
        })(jQuery);

        // Click outside buttons inside banner-section shows image_5
        $bannerSection.on('click', function(e){
            if(!$(e.target).closest('.floating-btn').length){
                currentHoveredButton = null;
                $bannerImg.attr('src', images.img5);
            }
        });
        */

         // Mobile video handling
         function handleMobileVideo() {
             const video = document.getElementById('mobile-video');
             const isMobile = window.innerWidth <= 768;
             
             if (isMobile && video) {
                 // Ensure video plays on mobile
                 video.play().catch(function(error) {
                     console.log('Video autoplay failed:', error);
                 });
             }
         }

         // Handle window resize
         $(window).on('resize', function() {
             handleMobileVideo();
         });

         // Initialize on page load
         $(document).ready(function() {
             handleMobileVideo();
         });

         // Hamburger menu functionality
         $(document).ready(function() {
             const $hamburger = $('#navHamburger');
             const $navMenu = $('#navMenu');

             $hamburger.on('click', function() {
                 $hamburger.toggleClass('active');
                 $navMenu.toggleClass('active');
             });

             // Close menu when clicking on a nav link
             $('.nav-link').on('click', function() {
                 $hamburger.removeClass('active');
                 $navMenu.removeClass('active');
             });

             // Close menu when clicking outside
             $(document).on('click', function(e) {
                 if (!$(e.target).closest('.nav-container').length) {
                     $hamburger.removeClass('active');
                     $navMenu.removeClass('active');
                 }
             });
         });
    </script>
@endpush
