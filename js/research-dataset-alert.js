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
                        var confirm = window.confirm(settings.themec.research_data_text);
                        if (confirm) {
                            window.location.href = settings.themec.research_data_redirect;
                        }
                    });
                }
            });
        }
    }
})(jQuery);
