'use strict';
(function () {


    var app = {

        initialize: function () {
            this.setUpListeners();
        },
        setUpListeners: function () {
            $('#add_post').on('submit', app.submitForm);
            $('#slug_post').on('keyup', app.checkUri);
            $('select[name="tags"]').select2({
                tags: true,
                tokenSeparators: [',', ' '],
                ajax: {
                    url: "http://blog.dev//admin/posts/get_tags/6",
                    method: 'POST',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            id: function () {
                                app.getTags();
                            },
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        return {
                            results: data.data,
                            // pagination: {
                            //     more: (params.page * 30) < data.total_count
                            // }
                        };
                    },
                    cache: true
                },

                minimumInputLength: 2,

            });
            $('#title_post').liTranslit({
                elAlias: $('#slug_post')
            });
            // app.getTags();

            tinymce.init({
                selector: '.ide',
                height: 250

            });

        },
        submitForm: function (e) {
            var url = $(this).attr('action');
            var dataSent = $(this).serialize();
            console.log(dataSent);
            e.preventDefault();
            // $.ajax({
            //     type: "POST",
            //     url: url,
            //     data: dataSent
            // }).done(function (data) {
            //     var response  = JSON.parse(data);
            //     if(response.status === 'fail' || response.status ==='error'){
            //         alert(response.message);
            //     }else if(response.status === 'success'){
            //         document.location.href  = '/admin';
            //     }

            // });


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
            var url = window.location.pathname;
            var post_id = (url[url.length - 1]);
            if (+post_id > 0) {
                return post_id;
                //     $.ajax({
                //         method : 'POST',
                //         url: preparedUrl,
                //         data: {id: post_id, tag: 'tag12'}
                //     }).done(function (data) {
                //         console.log(data);
                //         return $('select[name="tags"]').select2({
                //             tags: true,
                //             data: JSON.parse(data).data,
                //             tokenSeparators: [',', ' ']
                //         });
                //     })
                // }
            }
        }

    };
    app.initialize();
}());