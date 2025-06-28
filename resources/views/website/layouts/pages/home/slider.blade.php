<div class="slider-active owl-carousel">

    <!--Single Slide-->
    @forelse ($sliders as $index => $slider)
        <div class="single__slider bg-opacity"
            style="background-image:url({{ asset('frontend') }}/assets/img/slide/1.jpg)">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="slider-content slider-text-animation">
                            <h1>{{ $slider->sub_title }}</h1>
                            <h2>{{ $slider->slider_title }}</h2>
                            <p>{!! $slider->slider_content !!}</p>
                            <a href="#" class="mym-btn mym-btn-primary">Buy Now</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="slider_layer_image">
                            <img src="{{ asset($slider->image) }}" alt="Slider image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty

        <div class="single__slider bg-opacity"
            style="background-image:url({{ asset('frontend') }}/assets/img/slide/1.jpg)">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="slider-content slider-text-animation">

                            <h2 style="color:red">Slider Not Found!</h2>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    @endforelse

    <!--Single slide end-->

</div>
