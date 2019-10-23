jQuery(document).ready(function($){
    // добавим элемент
    $('a[href="http://albert-viktoriya.ru/wp-admin/post-new.php?post_type=aboutus"]').css('display', 'none');
    $('#wp-word-count .word-count').after('<span>;  Символов: </span><span class="chars-count"></span>');

    var $content    = $('#content'),
        $charscount = $('#wp-word-count .chars-count'),
        mceEditor,
        timeout;

    function timeout_update(){
        clearTimeout(timeout);
        timeout = setTimeout( update, 1000 );
    }

    function update() {
        var text;

        if( ! mceEditor || mceEditor.isHidden() )
            text = $content.val();
        else
            text = mceEditor.getContent({ format:'text' });

        if( text ){
            text = text.replace(/\r?\n|\r/g, ' ') // удалим переносы строк
                .replace(/<[^>]+>/g, '') // удалим теги
                .replace(/\[[^\]]+\]/g, ''); // удалим шотркоды

            $charscount.text( text.length +' ('+ text.replace(/[ ]+/g, '').length +')' );
        }
    }

    // событие нажатия в редакторе tinymce
    $(document).on('tinymce-editor-init', function( event, editor ) {
        if( editor.id !== 'content' ) return; // это не наш редактор

        mceEditor = editor;

        editor.on('nodechange keyup', timeout_update );
    });

    // событие нажатия в текстовом редакторе
    $content.on('input keyup', timeout_update );

    update(); // первый запуск

});