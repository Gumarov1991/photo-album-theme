<?php

add_action( 'wp_enqueue_scripts', 'photoAlbum_media' );// подключение стилей и скриптов

function photoAlbum_media() {
    wp_enqueue_style( 'main', get_stylesheet_uri() );
    wp_enqueue_style( 'fonts', get_template_directory_uri() . '/css/fonts.css' );
    wp_enqueue_style( 'title', get_template_directory_uri() . '/css/title.css' );
    //wp_enqueue_style( 'adaptiv', get_template_directory_uri() . '/css/media.css' );
    wp_enqueue_style( 'flex', get_template_directory_uri() . '/libs/flex.css' );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/libs/animate.css' );
    wp_enqueue_style( 'pageable', get_template_directory_uri() . '/libs/pageable/pageable.min.css' );
    wp_enqueue_style( 'lightslider', get_template_directory_uri() . '/libs/lightSlider/css/lightslider.min.css' );
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/fonts/fontawesome/css/all.min.css' );
    wp_enqueue_style( 'lightgallery', get_template_directory_uri() . '/libs/lightGallery/css/lightgallery.min.css' );

    wp_enqueue_script( 'lightslider', get_template_directory_uri() . '/libs/lightSlider/js/lightslider.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'pageable', get_template_directory_uri() . '/libs/pageable/pageable.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'mousewheel', get_template_directory_uri() . '/libs/mousewheel.js', array( 'jquery' ) );
    wp_enqueue_script( 'lightgallery', get_template_directory_uri() . '/libs/lightGallery/js/lightgallery.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'lg-thumbnail', get_template_directory_uri() . '/libs/lightGallery/js/lg-thumbnail.min.js', array( 'lightgallery' ) );
    wp_enqueue_script( 'lg-fullscreen', get_template_directory_uri() . '/libs/lightGallery/js/lg-fullscreen.min.js', array( 'lightgallery' ) );
    wp_enqueue_script( 'lg-autoplay', get_template_directory_uri() . '/libs/lightGallery/js/lg-autoplay.min.js', array( 'lightgallery' ) );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ) );
}



add_filter('show_admin_bar', '__return_false');// отключили верхнюю админ панель

//=========================================== Cоздаем типы страниц ===========================================

add_action( 'init', 'photoAlbum_create_posttypes' );//создаем все нужные типы страниц
function photoAlbum_create_posttypes() {
    register_post_type( 'aboutus',// создание страницы "О нас"
        array(
            'labels' => array(
                'name' => __( 'О нас' ),
                'singular_name' => __( 'О нас' ),
                'add_new_item' => 'Добавить',
                'edit_item' => 'Редактировать "О нас"',
                'new_item' => 'Новая страница "О нас"',
                'all_items' => 'О нас'
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'about' ),
            'supports' => array( 'title', 'editor', 'thumbnail')
        )
    );
}

add_action( 'add_meta_boxes', 'aboutus_fields', 1 );//добавляем метабокс для "О нас"
function aboutus_fields() {
    add_meta_box( 'aboutus_fields', 'Ссылки для кнопок соц сетей', 'aboutus_fields_box_func', 'aboutus', 'normal', 'high' );
}
function aboutus_fields_box_func( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'aboutus_metabox_nonce' );
    $html = '';
    $html .= '<div style="width: 304px; text-align: right">
                <label for="vk">Vk:</label><input type="text" name="vk" style="width: 240px" value="' . get_post_meta($post->ID, 'vk', true) . '" />
              </div>';
    $html .= '<div style="width: 304px; text-align: right">
                <label for="insta">Instagram:</label><input type="text" name="insta" style="width: 240px" value="' . get_post_meta($post->ID, 'insta', true) . '" />
              </div>';
    echo $html;
}

add_action( 'save_post', 'aboutus_fields_update', 0 );//сохраняем метаполе отзывов
function aboutus_fields_update( $post_id ) {
    if (
        !isset( $_POST['aboutus_metabox_nonce'] )
        || !wp_verify_nonce( $_POST['aboutus_metabox_nonce'], basename(__FILE__ ) )
    )
        return $post_id;

    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
        return $post_id;

    $post = get_post($post_id);
    if ($post->post_type == 'aboutus') {
        update_post_meta($post_id, 'vk', sanitize_text_field($_POST['vk']));
        update_post_meta($post_id, 'insta', sanitize_text_field($_POST['insta']));
    }
    return $post_id;
}

add_action( 'admin_footer-post.php', 'wph_require_post_elements' );//проверка заполнения блоков
add_action( 'admin_footer-post-new.php', 'wph_require_post_elements' );
function wph_require_post_elements( $post ) {
    if (get_post_type( $post->ID ) == 'aboutus' ) {?>
        <script type="text/javascript">
            verifyFieldsForAboutUs();
        </script>
        <?php
    }
}

add_action('init', 'create_client');
function create_client() {
    if (get_role('client') == null) {
        $user = new WP_User(4); // получим экземпляр класса пользователя с правами админа (как правило это пользователь с id=1)
        $adm_caps = $user->get_role_caps(); // получим массив возможностей админа
        $caps = array(
            'delete_others_posts', // нельзя удалять чужие записи
            'publish_posts' // как уже говорилось выше, право edit_posts отключает всё меню с записями, поэтому можно запретить пользователю публиковать созданные записи (они будут отправляться на утверждение)
        );
        foreach ($caps as $cap) {
            unset($adm_caps[$cap]); // удалим некоторые возможности
        }
        add_role('client', 'Клиент', $adm_caps); // создадим новую роль на основе роли админа, но с урезанными правами

    }
}

add_action('login_head', 'my_custom_login_logo');
function my_custom_login_logo(){
    echo '<style type="text/css">
	h1 a { background-image:url('.get_template_directory_uri().'/img/logo.png) !important; }
	</style>';
}

add_action('add_admin_bar_menus', 'reset_admin_wplogo');
function reset_admin_wplogo(  ){
    remove_action( 'admin_bar_menu', 'wp_admin_bar_wp_menu', 10 ); // удаляем стандартную панель (логотип)
}

if (!current_user_can('install_plugins') && is_admin()) {
    $path = $_SERVER['REQUEST_URI'];



    if ($path == '/wp-admin/index.php' || $path == '/wp-admin/') {
        wp_redirect(site_url('/wp-admin/upload.php'));
    }

    add_action('_admin_menu', 'plug_scripts_for_admin_screen');
    function plug_scripts_for_admin_screen()
    {
        wp_enqueue_script('admin', get_template_directory_uri() . '/js/admin_for_client.js', array('jquery'));
    }

    add_action('admin_menu', 'remove_admin_menu');
    function remove_admin_menu()
    {
        global $menu;
        $menu[10][0] = 'Альбомы';
        remove_menu_page('index.php');
        remove_menu_page('options-general.php'); // Удаляем раздел Настройки
        remove_menu_page('tools.php'); // Инструменты
        remove_menu_page('users.php'); // Пользователи
        remove_menu_page('plugins.php'); // Плагины
        remove_menu_page('themes.php'); // Внешний вид
        remove_menu_page('edit.php'); // Посты блога
        //remove_menu_page('upload.php'); // Медиабиблиотека
        remove_menu_page('edit.php?post_type=page'); // Страницы
        remove_menu_page('edit-comments.php'); // Комментарии
        remove_menu_page('link-manager.php'); // Ссылки
        remove_menu_page('wpcf7');   // Contact form 7
        remove_menu_page('options-framework'); // Cherry Framework
        remove_submenu_page('edit.php?post_type=aboutus', 'post-new.php?post_type=aboutus');// удалил подменю
        remove_submenu_page('upload.php', 'upload.php');
        remove_submenu_page('upload.php', 'media-new.php');
    }

    add_action('wp_before_admin_bar_render', 'change_main_screen_for_client');
    function change_main_screen_for_client()
    {
        global $wp_admin_bar;
        $wp_admin_bar->remove_menu('comments');
        $wp_admin_bar->remove_menu('appearance');
        $wp_admin_bar->remove_menu('new-content');
        $wp_admin_bar->remove_menu('edit');
        $wp_admin_bar->remove_menu('archive');
    }


    if ($path == '/wp-admin/upload.php') {
        add_action('admin_print_scripts', 'change_mediafiles_page_for_clients');
        function change_mediafiles_page_for_clients()
        { ?>
            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function () {
                    jQuery(document).ready(function ($) {
                        let mainPageButton = $('ul#folders-to-edit > li:first'),
                            mainAlbumButton = $('ul#folders-to-edit > li:nth-child(2)'),
                            clientAlbumsButton = $('ul#folders-to-edit > li').not(mainAlbumButton),
                            addNewButton = $('.mediamatic_main_add_new'),
                            allFilesButton = $('#menu-item-all'),
                            uncategorizedButton = $('#menu-item--1');


                        mainPageButton.children('.action_button').css('display', 'none');
                        mainPageButton
                            .add(clientAlbumsButton)
                            .add(mainAlbumButton)
                            .add(allFilesButton)
                            .add(uncategorizedButton)
                            .mousedown(function () {
                                return false;
                            });

                        mainAlbumButton.on('click', function () {
                            addNewButton.css('visibility', 'visible');
                        });

                        allFilesButton
                            .add(uncategorizedButton)
                            .add(mainPageButton)
                            .add(clientAlbumsButton).on('click', function () {
                            addNewButton.css('visibility', 'hidden');
                        })

                        mainAlbumButton.children('.action_button').on('click', function () {
                            let menu = $('.mediamatic_actions_content.active > ul');
                            menu.children('li:last, li:nth-child(2)').css('display', 'none');
                            menu.children('li:first').css({
                                'display': 'block',
                                'border-bottom': 'none',
                                'padding-bottom': 0,
                                'margin-bottom': 0
                            })

                        });
                        clientAlbumsButton.children('.action_button').on('click', function () {
                            let menu = $('.mediamatic_actions_content.active > ul');
                            menu.children('li:last, li:nth-child(2)').css('display', 'block');
                            menu.children('li:first').css({
                                'display': 'none',
                                'border-bottom': 'none',
                                'padding-bottom': 0,
                                'margin-bottom': 0
                            });
                        });
                        addNewButton.css('visibility', 'hidden');
                    });
                }, false);
            </script>
            <?php
        }
    }

    if ($path == '/wp-admin/profile.php') {
        add_action('admin_print_scripts', 'change_profile_page_for_clients');
        function change_profile_page_for_clients()
        { ?>
            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function () {
                    jQuery(document).ready(function ($) {
                        let h2ForHide = $('#your-profile > h2').not('#your-profile > h2:nth-child(12)'),
                            tablesForHide = $('#your-profile > table')
                                .not('#your-profile > table:nth-child(9), #your-profile > table:nth-child(13)'),
                            wrapForHide = $('#your-profile .user-url-wrap');

                        h2ForHide.add(tablesForHide).add(wrapForHide).css('display', 'none');
                    });
                }, false);
            </script>
            <?php
        }
    }

    if ($path == '/wp-admin/edit.php?post_type=aboutus') {
        add_action('shutdown', 'hide_add_button_for_aboutus');
        function hide_add_button_for_aboutus()
        { ?>
            <script type="text/javascript">
                hideAddButton();
            </script>
            <?php
        }
    }

//Чтобы не выскакивали обновления у пользователей
    add_filter('auto_update_core', '__return_false');   // обновление ядра
    add_filter('pre_site_transient_update_core', '__return_null');

}


//редирект с login на /wp-login.php  и с admin на /wp-admin
add_action('template_redirect', 'login_redirect');
function login_redirect(){
    if( strpos($_SERVER['REQUEST_URI'], 'login')!==false )
        $loc = '/wp-login.php';
    elseif( strpos($_SERVER['REQUEST_URI'], 'admin')!==false )
        $loc = '/wp-admin/';
    if( $loc ){
        header( 'Location: '.get_option('site_url').$loc, true, 303 );
        exit;
    }
}

//Скрываем футер в админке
function change_footer_admin () {return ' ';}
add_filter('admin_footer_text', 'change_footer_admin', 9999);
function change_footer_version() {return ' ';}
add_filter( 'update_footer', 'change_footer_version', 9999);

function translit($str) {
    $str_ready_to_translit = str_replace(' ', '-', mb_strtolower(trim(strip_tags($str))));
    $rus = array('а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я');
    $lat = array('a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya');
    return str_replace($rus, $lat, $str_ready_to_translit);
}


if (current_user_can('install_plugins')) {
add_action('admin_enqueue_scripts', 'test');
function test() {
    //var_dump(get_current_screen());
}

}
