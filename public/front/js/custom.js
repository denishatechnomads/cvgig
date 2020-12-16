document.onreadystatechange = function() {
    if (document.readyState !== "complete") {
        document.querySelector(
            "body").style.visibility = "hidden";
        document.querySelector(
            "#loader").style.visibility = "visible";
    } else {
        document.querySelector(
            "#loader").style.display = "none";
        document.querySelector(
            "body").style.visibility = "visible";
    }
};

//import WProofreader from '@webspellchecker/wproofreader-ckeditor5/src/wproofreader';

// 'link', 'blockQuote',
var ckEditorItems = ['|', 'bold', 'italic', 'underline', 'bulletedList', 'numberedList',
    'indent', 'outdent', '|', 'insertTable', 'undo', 'redo'
];
var lang = 'en';
window.onload = function () {
    if ($(".ck_editor").length > 0) {
        ClassicEditor.create(document.querySelector('.ck_editor'), {
            // plugins: [WProofreader],
            toolbar: {
                items: ckEditorItems,
            },
            language: lang,
            table: {
                contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']
            },
            licenseKey: '',

        }).then(editor => {
            window.editor = editor;

            editor.model.document.on( 'change:data', () => {
                console.log( 'The data has changed!' );
            } );
            // console.log( Array.from( editor.ui.componentFactory.names() ) );
            // editor.exec("selectAll");
        })
            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
                console.warn('Build id: 48jwd4fx71k7-1o304xqkyqwh');
                console.error(error);
            });
    }
};

$(document).ready(function () {
    $(".dropdown-toggle").dropdown();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on("click", ".popover .close", function () {
        $(this).parents(".popover").popover('hide');
    });

    $('html').on('click', function(e) {
        if (typeof $(e.target).data('original-title') == 'undefined' && !$(e.target).parents().is('.popover.in') && !$(e.target).hasClass('fa-lightbulb-o')) {
            $('[data-original-title]').popover('hide');
        }
    });
    /* Add content in editor */
    $(".addContent").on("click", function () {
        var defaultHtml = editor.getData();
        var content = $(this).data('row-content');
        var html = "<ul><li>"+content+"</li></ul>";
        // $(".editorResult").append("<ul><li>"+content+"</li></ul>");
        // var html = $(".editorResult").html();
        editor.setData(defaultHtml+html);
        /*window.editor.model.change( writer => {
            const insertPosition = editor.model.document.selection.getLastPosition();
            const viewFragment = editor.data.processor.toView( content );

            const modelFragment = editor.data.toModel( viewFragment );

            editor.model.insertContent(modelFragment, insertPosition, 'end');
        });*/
    });

    /* Select whole text with bracket */
    $('body').on('dblclick', 'strong', function() {
        var selection = window.getSelection();
        var range = document.createRange();
        range.selectNodeContents(this);
        selection.removeAllRanges();
        selection.addRange(range);
    });

    // The lines below are executed on page load
    $('input[type=text]').each(function() {
      checkForInput(this);
    });

    // The lines below (inside) are executed on change & keyup
    $('input[type=text]').on('change keyup', function() {
      checkForInput(this);
    });

});

function openNav() {
    $("#mySidenav").css('width', "400px");
}

function closeNav() {
    $("#mySidenav").css('width', "0px");
}



function checkForInput(element) {
  const $label = $(element);

  if ($(element).val().length > 0) {
    $label.addClass('has-value');
  } else {
    $label.removeClass('has-value');
  }
}

