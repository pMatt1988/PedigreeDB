(function ($) {
    let settings = null;
    let oncooldown = false;
    let timer;
    $.fn.ajaxsearch = function (options) {
        let query = false;
        settings = $.extend(
            $.fn.ajaxsearch.defaults,
            options
        );


        this.keyup(function () {
            query = $(this).val();

            clearTimeout(timer);
            timer = setTimeout(function() {
                    if (query.length >= settings.min) {
                        settings.source(query, process);
                    }
                },
                settings.stopTyping);
        });

        this.blur(function() {
            settings.container.html('');
        });

        return this;
    };

    function process(data) {

        if (settings != null) {

            let output = settings.display(data);
            settings.container.html(output);
        }
    }

    $.fn.ajaxsearch.defaults = {
        min: 1,
        stopTyping: 400,
        container: $('#ajaxsearch-contents'),
        display: function (data) {
            let output = '<ul>';

            data.forEach(function (item) {
                output += '<li>' + item.name + '</li>'
            });

            output += '</ul>';
            console.log('output: ' + output);
            return output;
        },
        source: function (query, process) {
            $.ajax({
                dataType: 'json',
                url: 'autocomplete/' + query,
                success: function (data) {
                    return process(data)
                }

            })
        },
    }

})(jQuery);