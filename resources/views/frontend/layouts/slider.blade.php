<!-- Start WOWSlider.com BODY section -->
<div id="wowslider-container1">
    <div class="ws_images">
        <ul>
            @foreach($sliders as $slider)
            <li><img src="{{asset('public/upload/slider_images/'.$slider->image)}}" alt="Karate" title="Karate" id="wows1_0" /></li>
            @endforeach
        </ul>
    </div>
    <div class="ws_shadow"></div>
</div>