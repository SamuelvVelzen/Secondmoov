{{--
    component to display multiple texts

    $text_1: string contains slug of acf field text 1
    $text_2: string contains slug of acf field text 2
    $options: array contains options for postion
--}}

@if(get_field($text_1) || get_field($text_2))
    <div class="row col-12">
        <p class="col-12 col-md-6 {{!get_field($text_2) && isset($options["position"]) && $options["position"] == "center" ? "offset-md-3 text-center" :null}}">
            {{the_field($text_1)}}
        </p>
        <p class="col-12 col-md-6 {{get_field($text_1) ? null : "offset-md-6"}}">
            {{the_field($text_2)}}
        </p>
    </div>
@endif