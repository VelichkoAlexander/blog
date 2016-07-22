'use strict';
(function () {


    var app = {

        initialize: function () {
            this.setUpListeners();
        },
        setUpListeners: function () {
            $('#add_post').on('submit', app.submitForm);
            $('#title_post').liTranslit({
                elAlias: $('#slug_post')
            });
            tinymce.init({
                selector: 'textarea',
                height: 250,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code'
                ]
            });

        },
        submitForm: function (e) {
            var url = $(this)[0].action;
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: url,
                data: $(this).serialize()
            }).done(function (data) {
                var arr = JSON.parse(data);
                $(this).find("input").val("");
                $(this).trigger("reset");
                alert(arr.message);
            });

        }

    };
    app.initialize();
}());