jQuery(document).ready(function(){
    jQuery('#editsettingsdiv').toggle(false);
    jQuery('#profileedit').toggle(false);

    var profile_edit = false;
    var settings_edit = false;


    //nav links
    jQuery('#profilebut').on('click', function(event) {
        jQuery('#editprofilediv').toggle(true);
        jQuery('#editsettingsdiv').toggle(false);

        jQuery('#settingsedit').toggle(false);
        settings_edit = false;

        jQuery('#settings').toggle(false);
        if(!profile_edit){
            jQuery('#profile').toggle(true);
        }
    });

    jQuery('#settingsbut').on('click', function(event) {
        jQuery('#editprofilediv').toggle(false);
        jQuery('#editsettingsdiv').toggle(true);

        jQuery('#profileedit').toggle(false);
        profile_edit = false;

        jQuery('#profile').toggle(false);
        if(!settings_edit){
            jQuery('#settings').toggle(true);
        }
    });




    //edit buttons
    jQuery('#editprofile').on('click', function(event) {
        profile_edit = true;
        jQuery('#profileedit').toggle(true);
        jQuery('#profile').toggle(false);
    });

    //edit buttons
    jQuery('#editsettings').on('click', function(event) {
        settings_edit = true;
        jQuery('#settingsedit').toggle(true);
        jQuery('#settings').toggle(false);
    });

});

//about editor
tinymce.init({
    selector:'#editor',
    menubar: false,
    statusbar: false,
    plugins: 'autoresize anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview print searchreplace table template textpattern toc visualblocks visualchars',
    toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor link | removeformat help ',
    skin: 'bootstrap',
    toolbar_drawer: 'floating',
    min_height: 150,
    autoresize_bottom_margin: 16,
    setup: (editor) => {
        editor.on('init', () => {
            editor.getContainer().style.transition="border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out";
            editor.getContainer().className += ' with-border';
        });
        editor.on('focus', () => {
            editor.getContainer().style.boxShadow="0 0 0 .2rem rgba(118, 118, 118, 0.5)",
                editor.getContainer().style.borderColor="#3498DA"
        });
        editor.on('blur', () => {
            editor.getContainer().style.boxShadow="",
                editor.getContainer().style.borderColor=""
        });
    }
});

