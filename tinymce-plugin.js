(function() {
     /* Register the buttons */
     tinymce.create('tinymce.plugins.MyButtons', {
          init : function(ed, url) {
               /**
               * Inserts shortcode content
               */
               ed.addButton( 'hidefeed_shortcode', {
                    title : 'Insert hidefeed shortcode',
                    image : url + '/images/hi.png',
                    cmd: 'hidefeed_shortcode_cmd'
               });
               ed.addCommand( 'hidefeed_shortcode_cmd', function() {
                    var selected_text = ed.selection.getContent();
                    var return_text = '';
                    return_text = '[hidefeed]' + selected_text + '[/hidefeed]';
                    ed.execCommand('mceInsertContent', 0, return_text);
               });


          },
          createControl : function(n, cm) {
               return null;
          },
     });
     /* Start the buttons */
     tinymce.PluginManager.add( 'hidefeed_shortcode_script', tinymce.plugins.MyButtons );
})();