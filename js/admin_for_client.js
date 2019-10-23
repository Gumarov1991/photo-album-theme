function verifyFieldsForAboutUs() {
    jQuery( document ).ready( function( $ ) {
        $('#submitpost :submit').on('click.edit-post', function( event ) {
            console.log($('#content').val().length)
            if ( !$( '#title' ).val().length ) {
                alert( 'Необходимо указать имя в заголовке.');
                $('#title').focus();
            } else if ( $('#content').val().length == 0 ) {
                alert( 'Заполните поле для текста' );
                $('#content').focus();
            } else if ( $( '#postimagediv #set-post-thumbnail' ).text() == 'Set featured image' ||
                $('#postimagediv #set-post-thumbnail' ).text() == 'Установить изображение записи' ) {
                alert( 'Установите изображение' );
                $( '#postimagediv #set-post-thumbnail' ).focus();
            } else {
                return true;
            }
            return false;
        });
    });
}

function hideAddButton() {
    jQuery(document).ready(function($){
        $('a[href="http://albert-viktoriya.ru/wp-admin/post-new.php?post_type=aboutus"]').css('display', 'none');
    });
}

function changeMainScreenForClient() {
    jQuery(document).ready(function($){
        $('#wp-admin-bar-new-content').css('display', 'none');
        $('#wp-admin-bar-comments')

    });
}
