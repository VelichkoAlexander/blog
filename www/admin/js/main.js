'use strict';
(function () {


    var app = {

        initialize: function () {
            this.setUpListeners();
        },
        setUpListeners: function () {
            $('#add_post').on('submit', app.submitForm);
            $('#slug_post').on('keyup', app.checkUri);
            app.getTags();
            // $('#title_post').liTranslit({
            //     elAlias: $('#slug_post')
            // });
            tinymce.init({
                selector: '.ide',
                height: 250

            });

        },
        submitForm: function (e) {
            var url = $(this).attr('action');
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: url,
                data: $(this).serialize()
            }).done(function (data) {
                var response  = JSON.parse(data);
                if(response.status === 'fail' || response.status ==='error'){
                    alert(response.message);
                }else if(response.status === 'success'){
                    document.location.href  = '/admin';
                }

            });


        },
        checkUri: function (e) {
            var uri = $(this).val(),
                url = '/admin/posts/check_uri/',
                slug = $('#slug_post'),
                btn = $('button[type=submit]');
            btn.attr('disabled');

            $.ajax({
                url: url + uri
            }).done(function (data) {
                var arr = JSON.parse(data);
                if (+arr.uri) {
                    slug.parent().removeClass('has-success').addClass('has-error');
                    btn.attr('disabled', 'disabled');
                } else if (!+arr.uri) {
                    slug.parent().removeClass('has-error').addClass('has-success');
                    btn.removeAttr('disabled');
                }
            });

        },
        getTags: function () {
            var url = '/admin/posts/get_tags';
            $.ajax({
                url: url
            }).done(function (data) {
                return $('#myTags').tagit({
                    availableTags: JSON.parse(data)['tags'],
                    autocomplete: {delay: 0, minLength: 2},
                    showAutocompleteOnFocus: false,
                    fieldName: "tags[]"
                });
            })

        }

    };
    app.initialize();
}());