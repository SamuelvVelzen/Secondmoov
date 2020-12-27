{{--
  Template Name: Homepage
--}}

@extends('layouts.app')

@section('content')

    <?php
    // TO SHOW THE PAGE CONTENTS
    while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
    <div class="entry-content-page">
    <?php the_content(); ?> <!-- Page Content -->
    </div><!-- .entry-content-page -->

    <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query
    ?>


    {{--    @while(have_posts())--}}
    {{--        @php( the_content())--}}
    {{--        @php(wp_reset_query()) //resetting the page query--}}
    {{--    @endwhile--}}


    @include('components.texts', ["text_1" => "text_1", "text_2" => "text_2", "options" => ["position" => "center"]])

@endsection
