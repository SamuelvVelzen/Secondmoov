<header class="banner">
    <div class="container">
        <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
        <nav class="nav">
            <ul>
                <?php while( have_rows('testing', 'option') ): the_row(); ?>
                @php($pageID = get_sub_field('test', false, false))
                <li>
                    <a href="{{get_the_permalink($pageID)}}">
                        {{get_the_title($pageID)}}
                    </a>
                </li>
                <?php endwhile; ?>
            </ul>
        </nav>
    </div>
</header>
