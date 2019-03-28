(function ($) {
    $.fn.ajaxsearch = function (options) {
        let query = false;
        var settings = $.extend(
            $.fn.ajaxsearch.defaults,
            options
        );

        return this.keyup(function () {
            query = this.val();
            console.log(settings.source(query));

        })
    }

    $.fn.ajaxsearch.defaults = {
        container: $('#ajaxsearch-contents'),
        source: function(query) {
             $.get(
                'autocomplete/' + query,
                 function(data) {
                    return data;
                 }
            )

        },
    }

})(jQuery);