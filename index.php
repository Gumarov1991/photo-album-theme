<?php get_header(); ?>
<body>
<?php /*$args = array(
    'post_type' => 'attachment',
    'numberposts' => -1,
    'post_status' => null,
    'post_parent' => null, // any parent
);
$attachments = get_posts($args);
var_dump($attachments);
echo '<br><br>';
$post = get_post(27);
var_dump( $post);
/*var_dump(get_taxonomies());*/
//echo '<br><br>';

/*var_dump($terms);
echo '<br><br>';
var_dump(get_queried_object());
echo '<br><br>';*/
//$post = get_post(16);
//var_dump(get_post_meta(16, 'vk'));
$mainPage = new WP_Query( array(
    'post_type' => 'attachment',
    'post_status' => 'inherit',
    'tax_query' => array(
        array(
            'taxonomy' => 'mediamatic_wpfolder',
            'field'    => 'slug',
            'terms'    => 'main-page'
        )
    )
) );

$aboutUs = new WP_Query( array('post_type' => 'aboutus'));

$albums = get_terms( array(
    'taxonomy' => 'mediamatic_wpfolder',
    'parent' => 15
) );


?>
<div id="main">
    <section class="animated fadeIn" id="home" data-anchor="home">
        <a class="animated fadeInLeft homeLogo" href="#home" id="logo">
            <h1>OUR</h1>
            <p>photo album</p>
        </a>
        <div class="nav-page animated fadeInRight" id="up-page"></div>
        <div class="nav-page animated fadeInRight" id="down-page"></div>
        <div class="wrapper-for-scroll">
            <svg id="Слой_1" data-name="Слой" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 970.6 147.2">
                <defs>
                    <clipPath id="clip-path" transform="translate(-10.7 -6)">
                        <text transform="translate(0 111.4)" font-size="120" fill="none" font-family="GreatVibes-Regular, Great Vibes">- Albert and Viktoriya -</text>
                    </clipPath>
                </defs>
                <title>wed5</title>
                <g clip-path="url(#clip-path)">
                    <g>
                        <line id="right" x1="927.3" y1="80.1" x2="970.3" y2="77.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                        <g id="Viktoriya">
                            <polyline id="a1" points="871.4 88.1 869.4 99.1 870.4 102.1 872.4 104.1 874.4 104.1 879.4 101.1 881.4 98.1 892.4 80.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                            <polyline id="a" points="846.4 95.1 847.4 102.1 851.4 104.1 856.4 102.1 874.4 82.1 880.4 72.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                            <polyline id="y1" points="828.4 79.1 817.4 113.1 807.4 128.1 793.4 139.1 782.4 142.1 777.4 141.1 773.4 137.1 774.4 130.1 780.4 123.1 791.4 118.1 810.4 113.1 831.4 105.1 847.4 92.1 854.4 77.1 865.4 67.1 872.4 64.1 879.4 66.1 882.4 70.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                            <polyline id="y" points="804.4 81.1 799.4 98.1 801.4 103.1 805.4 104.1 810.4 102.1 822.4 85.1 838.4 63.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                            <line id="i2" x1="794.4" y1="50.1" x2="789.4" y2="60.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                            <polyline id="i" points="777.4 91.1 777.4 101.1 781.4 104.1 783.4 104.1 789.4 101.1 803.4 80.1 818.4 59.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                            <polyline id="r1" points="752.4 68.1 767.4 70.1 769.4 70.1 765.4 80.1 759.4 97.1 760.4 103.1 764.4 104.1 768.4 101.1 775.4 92.1 789.4 64.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                            <polyline id="r" points="724.4 89.1 723.7 99.4 727.4 103.1 734.4 103.1 741.4 96.1 750.4 79.1 758.4 60.1 762.4 51.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                            <polygon id="o" points="710.4 86.1 723.4 67.1 730.4 65.1 734.4 67.1 736.4 70.1 736.4 77.1 733.4 87.1 725.4 98.1 720.4 102.1 716.4 104.1 709.4 103.1 708.4 96.1 710.4 86.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                            <line id="t2" x1="681.4" y1="61.1" x2="715.4" y2="61.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                            <polyline id="t1" points="635.4 107.1 644.4 86.1 661.4 70.1 671.4 66.1 674.4 68.1 674.4 70.1 674.4 73.1 670.4 78.1 665.4 81.1 658.4 84.1 656.4 88.1 654.4 95.1 657.4 100.1 662.4 104.1 670.4 103.1 676.4 98.1 690.4 80.1 698.4 72.1 709.4 54.1 713.4 44.1 713.4 36.1 710.4 35.1 705.4 40.1 691.4 66.1 683.4 93.1 685.4 101.1 689.4 104.1 694.4 103.1 708.4 87.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                            <line id="i2-2" x1="634.4" y1="52.1" x2="630.4" y2="59.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                            <polyline id="i-2" points="629.4 63.1 618.4 94.1 617.4 100.1 619.4 103.1 622.4 104.1 626.4 103.1 631.4 99.1 646.4 75.1 674.4 29.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                            <polyline id="v" points="533.4 50.1 542.4 46.1 547.4 48.1 551.4 56.1 549.4 67.1 544.4 76.1 534.4 84.1 521.4 88.1 509.4 85.1 498.4 72.1 499.4 53.1 504.4 40.1 521.4 20.1 540.4 10.1 554.4 5.1 566.4 6.1 577.4 11.1 581.4 24.1 560.4 87.1 556.4 104.1 557.4 112.1 563.4 115.1 570.4 113.1 593.4 96.1 609.4 73.1 618.4 51.1 617.4 40.1 614.4 35.1 608.4 32.1 601.4 33.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                        </g>
                        <g id="and">
                            <polyline id="d2" points="451.4 86.1 449.4 98.1 453.4 104.1 458.4 103.1 464.4 96.1 475.4 77.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                            <polyline id="d" points="427.4 87.1 427.4 102.1 433.4 104.1 439.4 99.1 451.4 83.1 482.4 29.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                            <polyline id="n" points="377.4 108.1 389.4 91.1 399.4 80.1 406.4 74.1 417.4 69.1 404.4 96.1 406.4 103.1 410.4 104.1 414.4 103.1 420.4 96.1 425.4 88.1 434.4 76.1 444.4 66.1 450.4 64.1 454.4 64.1 461.4 67.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                            <polyline id="a2" points="367.4 88.1 367.4 102.1 369.4 104.1 373.4 103.1 381.4 96.1 383.6 92.5 391.4 80.1 402.4 64.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                            <polyline id="a-2" points="379.4 71.1 376.4 66.1 372.4 64.1 364.4 65.1 350.4 78.1 343.4 96.1 344.4 102.1 348.4 104.1 353.4 102.1 358.4 97.1 365.9 86.7 371.4 79.1 377.4 72.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                        </g>
                        <g id="Albert">
                            <line id="t2-2" x1="287.4" y1="61.1" x2="322.4" y2="61.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                            <polyline id="t1-2" points="293.4 82.1 299.4 78.1 309.4 65.1 314.4 56.1 320.4 42.1 319.4 35.1 315.4 35.1 309.4 42.1 297.4 67.1 290.4 90.1 290.4 99.1 294.4 104.1 299.4 103.1 303.4 100.1 309.4 92.1 316.4 79.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                            <polyline id="r-2" points="266.4 69.1 280.4 71.1 273.4 86.1 269.4 97.1 269.4 102.1 272.4 103.1 274.4 104.1 278.4 102.1 292.4 82.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                            <polyline id="e" points="226.4 85.1 235.4 86.1 241.4 84.1 249.4 80.1 255.4 73.1 256.4 67.1 253.4 64.1 247.4 65.1 238.4 73.1 229.4 89.1 229.4 98.1 232.4 102.1 235.4 104.1 242.4 104.1 247.4 101.1 253.4 94.1 260.4 81.1 272.4 51.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                            <polyline id="b" points="193.4 78.1 188.4 96.1 191.4 103.1 197.4 104.1 207.4 100.1 215.4 90.1 220.4 76.1 219.4 69.1 215.4 65.1 207.4 64.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                            <polyline id="l" points="131.4 79.1 129.4 104.1 134.4 111.1 139.4 111.1 147.4 107.1 160.4 89.1 174.4 75.1 187.4 56.1 192.4 46.1 194.4 40.1 194.4 33.1 192.4 32.1 185.4 36.1 175.4 56.1 165.4 81.1 162.4 98.1 164.4 102.1 168.4 104.1 170.4 104.1 175.4 102.1 181.4 96.1 201.4 62.1 222.8 30.2" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                            <polyline id="a-3" points="84.4 20.1 78.4 28.1 80.4 37.1 86.4 41.1 98.4 47.1 108.4 50.1 132.4 51.1 151.4 47.1 165.4 40.1 170.4 30.1 169.4 22.1 164.4 17.1 156.4 14.1 141.4 15.1 120.4 23.1 101.4 40.1 85.4 61.1 77.4 82.1 75.4 93.1 78.4 105.1 83.4 109.1 90.4 109.1 96.4 108.1 109.4 100.1 126.4 84.1 133.1 75.4 150.4 53.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                        </g>
                        <line id="left" x1="0.3" y1="80" x2="45.3" y2="77.6" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="10"/>
                    </g>
                </g>
            </svg>
            <ul id="main-slider">
                <?php
                    if ( $mainPage->have_posts() ) {
                        while ( $mainPage->have_posts() ) {
                            $mainPage->the_post();
                            $src = get_the_guid();
                            echo '<li>' . '<img src="'. $src . '" alt="">' . '</li>';
                        }
                        wp_reset_postdata();
                    } else {
                        echo 'Ошибка вывода изображений для главной страницы. Проверьте, чтобы в альбоме "Main Page", были фотографии';
                    }
                ?>
            </ul>
        </div>
    </section>

    <section class="other-section" data-anchor="about-us" >



        <div class="wrapper">
            <h2>About us</h2>
            <div class="about-us flex_main flex_wrap flex_jcontent-between">
                <?php
                if ( $aboutUs->have_posts() ) {
                    while ( $aboutUs->have_posts() ) {
                        $aboutUs->the_post(); ?>
                        <div class="about-column flex_main flex_column flex_jcontent-between">
                            <?php the_post_thumbnail(); ?>
                            <h3><?php echo esc_html( get_the_title() ); ?></h3>
                            <?php the_content(); ?>
                            <div class="social flex_main flex_jcontent-center">
                                <a class="vk" href="<?php echo get_post_meta(the_ID(), 'vk'); ?>" target="_blank"></a>
                                <a class="insta" href="<?php echo get_post_meta(the_ID(), 'insta'); ?>" target="_blank"></a>
                            </div>
                        </div>
                            <?php
                    }
                    wp_reset_postdata();
                } else {
                    echo 'Ошибка вывода изображений для главной страницы. Проверьте, чтобы в альбоме "Main Page", были фотографии';
                }
                ?>
            </div>
        </div>

    </section>
    <?php
    if ( count($albums) != 0 ) {
        foreach ($albums as $album) {
            $title = $album->name;
            $name = translit($title);
            ?>
            <section class="album" data-anchor="<?php echo $name; ?>">
                <div class="wrapper">
                    <h2><?php echo $title; ?></h2>
                    <div class="gallery">
                        <?php
                            $photos = new WP_Query( array(
                                'post_type' => 'attachment',
                                'post_status' => 'inherit',
                                'posts_per_page' => -1,
                                'nopaging' => true,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'mediamatic_wpfolder',
                                        'field'    => 'name',
                                        'terms'    => $name
                                    )
                                )
                            ) );
                            if ( $photos->have_posts() ) {
                                while ( $photos->have_posts() ) {
                                    $photos->the_post();
                                    $src = get_the_guid();
                                    ?>
                                    <a href="<?php echo $src; ?>">
                                        <img src="<?php echo $src; ?>">
                                        <div class="demo-gallery-poster">
                                            <img src="<?php echo get_template_directory_uri() . '/img/zoom.png'; ?>">
                                        </div>
                                    </a>
                                    <?php
                                }
                                wp_reset_postdata();
                            } else {
                                echo 'Ошибка вывода изображений. Проверьте, чтобы в текущем альбоме были фотографии';
                            }
                        ?>
                    </div>
                </div>
            </section>
            <?php
        }
    } else {
        echo 'Ошибка вывода альбомов, проверьте наличие альбомов';
    }
    ?>
<?php get_footer(); ?>