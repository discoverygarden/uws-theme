/**
 * @file
 * A JavaScript file research data-set alert.
 */

(function ($) {
    Drupal.behaviors.research_dataset_alert = {
        attach: function (context, settings) {
            $(window).load(function() {
                var research_block_link = '.block.submit-data-research .content a';
                if ($(research_block_link).length > 0) {
                    $(research_block_link).click(function(e) {
                        e.preventDefault();
                        var dialog_box_id = '#dialog-confirm';
                        $(dialog_box_id).html(settings.themec.research_data_text);
                        $(dialog_box_id).dialog({
                            resizable: false,
                            height: "auto",
                            width: 400,
                            modal: true,
                            buttons: {
                                "Ok": function() {
                                    window.location.href = settings.themec.research_data_redirect;
                                },
                                Cancel: function() {
                                    $(this).dialog("close");
                                }
                            }
                        });
                    });
                }
            });
        }
    }
})(jQuery);
