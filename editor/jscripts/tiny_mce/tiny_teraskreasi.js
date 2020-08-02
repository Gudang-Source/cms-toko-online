tinyMCE.init({
mode : "exact",
elements : "teraskreasi",
theme : "advanced",
skin : "bootstrap",

width: "100%",



plugins : "youtubeIframe,advcode,autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",

theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,outdent,indent,blockquote,formatselect,fontselect,fontsizeselect",

theme_advanced_buttons2 : "pastetext,pasteword,|,bullist,numlist,|,undo,redo,|,link,unlink,image,help,code,|,preview,|,forecolor,backcolor,removeformat,|,charmap,youtubeIframe,media,|,fullscreen",

theme_advanced_buttons3 : "",

theme_advanced_toolbar_location : "top",
theme_advanced_toolbar_align : "left",
file_browser_callback : 'openKCFinder',
theme_advanced_resizing : true
});

function openKCFinder(field_name, url, type, win) {
    tinyMCE.activeEditor.windowManager.open({
        file: '../kcfinder/browse.php?opener=tinymce&type=' + type,
        title: '.::TerasKreasi::.',
        width: 700,
        height: 500,
        resizable: "yes",
        inline: true,
        close_previous: "no",
        popup_css: false
    }, {
        window: win,
        input: field_name
    });
    return false;
}
