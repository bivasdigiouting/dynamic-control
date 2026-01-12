 <!-- video area start -->
<div class="tp-video-area black-bg mt-60 fix">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                <div class="tp-video-thumb w-100 h-100">
                    <img src="{{ asset($default_content?->image_1) }}" alt="{{ $settings?->app_name }}" style="height: 350px; width: 100%; object-fit: cover;">
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                @if (!empty($default_content?->video_url))
                     <div class="tp-video-thumb w-100 h-100">
                        <video loop="" muted="" autoplay="" playsinline="" style="height: 350px; width: 100%; object-fit: cover;">
                            <source src="{{ asset($default_content?->video_url) }}" type="video/mp4">
                        </video>
                    </div>
                @else
                    <div class="tp-video-thumb w-100 h-100">
                        <img src="{{ asset($default_content?->image_6) }}" alt="{{ $settings?->app_name }}" style="height: 350px; width: 100%; object-fit: cover;">
                    </div>
                @endif
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                <div class="tp-video-thumb w-100 h-100">
                    <img src="{{ asset($default_content?->image_2) }}" alt="{{ $settings?->app_name }}" style="height: 350px; width: 100%; object-fit: cover;">
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                <div class="tp-video-thumb w-100 h-100">
                    <img src="{{ asset($default_content?->image_3) }}" alt="{{ $settings?->app_name }}" style="height: 350px; width: 100%; object-fit: cover;">
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                <div class="tp-video-thumb w-100 h-100">
                    <img src="{{ asset($default_content?->image_4) }}" alt="{{ $settings?->app_name }}" style="height: 350px; width: 100%; object-fit: cover;">
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                <div class="tp-video-thumb w-100 h-100">
                    <img src="{{ asset($default_content?->image_5) }}" alt="{{ $settings?->app_name }}" style="height: 350px; width: 100%; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- video area end -->
