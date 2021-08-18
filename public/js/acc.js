jQuery(document).ready(function(){
    jQuery('#editsettingsdiv').toggle(false);
    jQuery('#profileedit').toggle(false);

    jQuery('#savesettingsdiv').toggle(false);
    jQuery('#saveprofilediv').toggle(false);

    var profile_edit = false;
    var settings_edit = false;


    //nav links
    jQuery('#profilebut').on('click', function(event) {
        jQuery('#editsettingsdiv').toggle(false);

        jQuery('#settingsedit').toggle(false);
        jQuery('#savesettingsdiv').toggle(false);
        settings_edit = false;

        jQuery('#settings').toggle(false);
        if(!profile_edit){
            jQuery('#profile').toggle(true);
            jQuery('#editprofilediv').toggle(true);
        }
    });

    jQuery('#settingsbut').on('click', function(event) {
        jQuery('#editprofilediv').toggle(false);

        jQuery('#profileedit').toggle(false);
        jQuery('#saveprofilediv').toggle(false);
        profile_edit = false;

        jQuery('#profile').toggle(false);
        if(!settings_edit){
            jQuery('#settings').toggle(true);
            jQuery('#editsettingsdiv').toggle(true);
        }
    });




    //edit buttons
    jQuery('#editprofile').on('click', function(event) {
        profile_edit = true;
        jQuery('#profileedit').toggle(true);
        jQuery('#editprofilediv').toggle(false);
        jQuery('#saveprofilediv').toggle(true);
        jQuery('#profile').toggle(false);
    });

    //edit buttons
    jQuery('#editsettings').on('click', function(event) {
        settings_edit = true;
        jQuery('#settingsedit').toggle(true);
        jQuery('#editsettingsdiv').toggle(false);
        jQuery('#savesettingsdiv').toggle(true);
        jQuery('#settings').toggle(false);
    });

    //submission of profile edits
    document.getElementById("profileform").onsubmit=function(event) {
        document.getElementById('abouti').value=tinyMCE.get('editor').getContent();
        document.getElementById('showmaili').value=document.getElementById('showmail').checked;
        document.getElementById('showloci').value=document.getElementById('showloca').checked;

        if(tinymce.activeEditor.getContent({format: 'text'}).length>1000){
            alert("Character limit of 1000 has been exceeded.")
            return false;
        }
        return;
    };
});

//about editor
tinymce.init({
    content_css: '/css/bootstrap.min.css',
    selector:'#editor',
    menubar: false,
    statusbar: true,
    branding: false,
    plugins: 'wordcount autoresize anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview print searchreplace table template textpattern toc visualblocks visualchars',
    toolbar: 'undo redo | styleselect | italic strikethrough removeformat backcolor link | bullist numlist | alignleft aligncenter alignright alignjustify | outdent indent | help ',
    skin: 'bootstrap',
    toolbar_drawer: 'floating',
    min_height: 200,
    autoresize_bottom_margin: 16,
    elementpath: false,
    init_instance_callback: function (editor) {
        $(editor.getContainer()).find('button.tox-statusbar__wordcount').click();
        document.getElementsByClassName("tox-statusbar__wordcount")[0].innerText =
            document.getElementsByClassName("tox-statusbar__wordcount")[0].innerText + " (max 1000)";
    },
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
        editor.on('blur', () => {
            editor.getContainer().style.boxShadow="",
                editor.getContainer().style.borderColor=""
        });
        editor.on('MouseEnter', () => {
            if(!document.getElementsByClassName("tox-statusbar__wordcount")[0].innerText.includes("MAX")){
                document.getElementsByClassName("tox-statusbar__wordcount")[0].innerText =
                    document.getElementsByClassName("tox-statusbar__wordcount")[0].innerText + " (max 1000)";
            }
        });
        editor.on('MouseLeave', () => {
            if(!document.getElementsByClassName("tox-statusbar__wordcount")[0].innerText.includes("MAX")){
                document.getElementsByClassName("tox-statusbar__wordcount")[0].innerText =
                    document.getElementsByClassName("tox-statusbar__wordcount")[0].innerText + " (max 1000)";
            }
        });
    }
});

//about editor
tinymce.init({
    content_css: '/css/bootstrap.min.css',
    selector:'#editor2',
    menubar: false,
    statusbar: false,
    plugins: 'autoresize anchor autolink charmap code codesample directionality fullpage help hr image imagetools insertdatetime link lists media nonbreaking pagebreak preview print searchreplace table template textpattern toc visualblocks visualchars',
    toolbar: false,
    skin: 'bootstrap',
    toolbar_drawer: 'floating',
    contenteditable: false,
    setup: (editor) => {
        editor.on('init', () => {
            editor.setMode('readonly');
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




