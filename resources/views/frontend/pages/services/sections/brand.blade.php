@php
   if($default_content?->brands){
      $brands = is_null($default_content->brands) ? [] : json_decode($default_content->brands);
      $brands = \Modules\Brand\Models\Brand::whereIn('id', $brands)->active()->get();
   }else{
      $brands = \Modules\Brand\Models\Brand::active()->get();
   }
@endphp

@if ($brands->count() > 0)
<style>
    .tp-brand-section {
        padding: 80px 0;
        background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%);
        position: relative;
        overflow: hidden;
    }

    .tp-brand-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent 0%, #e0e0e0 50%, transparent 100%);
    }

    .tp-brand-section::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent 0%, #e0e0e0 50%, transparent 100%);
    }

    .tp-brand-header {
        text-align: center;
        margin-bottom: 50px;
        position: relative;
    }

    .tp-brand-subtitle {
        font-size: 14px;
        font-weight: 600;
        color: #ffb800;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 12px;
        display: inline-block;
        position: relative;
    }

    .tp-brand-subtitle::before,
    .tp-brand-subtitle::after {
        content: '';
        position: absolute;
        top: 50%;
        width: 40px;
        height: 2px;
        background: linear-gradient(90deg, transparent 0%, #ffb800 100%);
    }

    .tp-brand-subtitle::before {
        right: calc(100% + 15px);
    }

    .tp-brand-subtitle::after {
        left: calc(100% + 15px);
        background: linear-gradient(90deg, #ffb800 0%, transparent 100%);
    }

    .tp-brand-title {
        font-size: 42px;
        font-weight: 700;
        color: #1a1a1a;
        margin: 0;
        line-height: 1.2;
    }

    .tp-brand-description {
        font-size: 16px;
        color: #666;
        margin-top: 15px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    .dgm-brand-wrapper {
        position: relative;
        padding: 0 15px;
    }

    .dgm-brand-item {
        background: #ffffff;
        border-radius: 16px;
        padding: 30px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        border: 2px solid #f0f0f0;
        height: 140px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .dgm-brand-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, #ffb800 0%, #ff9500 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
        z-index: 0;
    }

    .dgm-brand-item:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        border-color: #ffb800;
    }

    .dgm-brand-item:hover::before {
        opacity: 0.05;
    }

    .dgm-brand-item img {
        max-width: 100%;
        max-height: 80px;
        width: auto;
        height: auto;
        object-fit: contain;
        filter: grayscale(100%);
        opacity: 0.7;
        transition: all 0.4s ease;
        position: relative;
        z-index: 1;
    }

    .dgm-brand-item:hover img {
        filter: grayscale(0%);
        opacity: 1;
        transform: scale(1.05);
    }

    .dgm-brand-item a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
    }

    /* Swiper customization */
    .dgm-brand-active {
        padding: 20px 0;
    }

    .dgm-brand-active .swiper-slide {
        height: auto;
    }

    /* Trust badges */
    .tp-trust-badges {
        display: flex;
        justify-content: center;
        gap: 40px;
        margin-top: 50px;
        flex-wrap: wrap;
    }

    .tp-trust-badge {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 14px;
        color: #666;
        font-weight: 500;
    }

    .tp-trust-badge i {
        font-size: 24px;
        color: #ffb800;
    }

    .tp-trust-badge span {
        font-weight: 600;
        color: #1a1a1a;
    }

    @media (max-width: 768px) {
        .tp-brand-section {
            padding: 60px 0;
        }

        .tp-brand-title {
            font-size: 32px;
        }

        .tp-brand-header {
            margin-bottom: 40px;
        }

        .dgm-brand-item {
            padding: 25px;
            height: 120px;
        }

        .dgm-brand-item img {
            max-height: 60px;
        }

        .tp-trust-badges {
            gap: 25px;
            margin-top: 40px;
        }

        .tp-brand-subtitle::before,
        .tp-brand-subtitle::after {
            width: 25px;
        }
    }

    @media (max-width: 576px) {
        .tp-brand-section {
            padding: 50px 0;
        }

        .tp-brand-title {
            font-size: 28px;
        }

        .tp-trust-badges {
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }
    }
</style>

<!-- Brand Partners Section -->
<section class="tp-brand-section">
    <div class="container">
        <div class="tp-brand-header">
            <span class="tp-brand-subtitle">Our Valued Partners</span>
            <h2 class="tp-brand-title">Serving Industry Leaders</h2>
            <p class="tp-brand-description">
                Trusted by leading organizations across industries to deliver excellence and innovation
            </p>
        </div>

        <div class="dgm-brand-wrapper">
            <div class="swiper-container dgm-brand-active">
                <div class="swiper-wrapper">
                    @foreach ($brands as $brand)
                    <div class="swiper-slide">
                        <div class="dgm-brand-item">
                            @if (!empty($brand->url))
                                <a href="{{ url($brand->url ?? '#') }}" title="{{ $brand->title }}">
                                    <img src="{{ asset($brand->image) }}" alt="{{ $brand->title }}">
                                </a>
                            @else
                                <img src="{{ asset($brand->image) }}" alt="{{ $brand->title }}">
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Trust Badges -->
        <div class="tp-trust-badges">
            <div class="tp-trust-badge">
                <i class="fas fa-shield-check"></i>
                <div>
                    <span>{{ $brands->count() }}+</span> Trusted Partners
                </div>
            </div>
            <div class="tp-trust-badge">
                <i class="fas fa-award"></i>
                <div>
                    <span>Industry</span> Leaders
                </div>
            </div>
            <div class="tp-trust-badge">
                <i class="fas fa-handshake"></i>
                <div>
                    <span>Long-term</span> Relationships
                </div>
            </div>
        </div>
    </div>
</section>
@endif