'use strict';
(function () {


    var app = {

        initialize: function () {
            this.setUpListeners();
        },
        setUpListeners: function () {
            $('#add_post').on('submit', app.submitForm);
            $('#slug_post').on('keyup', app.checkUri);
            $('.select2_tags').select2({
                tags: true,
                tokenSeparators: [',', ' '],
                minimumInputLength: 2,
                multiple: true,
                ajax: {
                    url: "/admin/posts/get_tags/",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term,
                            id: app.getId,
                            id_tags: app.getTags,
                            page: params.page
                        };
                    },
                    processResults: function (data, params) {
                        return {
                            results: data.data,
                        };
                    },
                    cache: true
                },
            });

            $('#title_post').liTranslit({
                elAlias: $('#slug_post')
            });
            tinymce.init({
                selector: '.ide',
                height: 250

            });
            $('.delete-btn').on('click', app.deletPost);
            $('#post_img').ajaxfileupload({
                action: '/admin/upload/do_upload/',
                onComplete: function(response) {
                    $('#img_name').val(response.upload_data);
                    // console.log(JSON.stringify(response));
                },
                onStart: function() {
                },
                onCancel: function() {
                    console.log('no file selected');
                }
            });
        },
        submitForm: function (e) {
            var url = $(this).attr('action');
            var dataSent = $(this).serializeArray();
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: url,
                data: dataSent,
            }).done(function (data) {
                var response = JSON.parse(data);
                if (response.status === 'fail' || response.status === 'error') {
                    alert(response.message);
                } else {
                    alert(response.message);
                    document.location.href = '/admin';
                }
            });
        },
        checkUri: function (e) {
            var uri = $(this).val(),
                url = '/admin/posts/check_uri/',
                slug = $('#slug_post');
            $.ajax({
                dataType: 'json',
                url: url + uri
            }).done(function (data) {
                var arr = data;
                if (+arr.uri) {
                    slug.parent().removeClass('has-success').addClass('has-error');
                } else {
                    slug.parent().removeClass('has-error').addClass('has-success');
                }
            });

        },
        getId: function () {
            var post_id = $('#id').val();
            if (+post_id > 0) {
                return post_id;
            }
        },
        getTags: function () {
            var tags = $('.select2_tags option:selected');
            var arrTags = [];
            $.each(tags, function(index, value) {
                if(app.isNumeric($(value).val()) && $(value).val() !== $(value).text()){
                    arrTags[index] = $(value).val();
                }
            });
                return arrTags;
        },
        deletPost: function (e) {
            e.preventDefault();
            var delButton = e.target;
            var url = $(delButton).attr('href');
            if (confirm('Are you sure you want to delete this record')) {
                $.ajax({
                    dataType: 'json',
                    url: url
                }).done(function (data) {
                    if (data.status === 'success') {
                        alert(data.message);
                        $(delButton).parent().parent().remove()
                    } else {
                        alert(data.message);
                    }
                });
            }
        },
        isNumeric: function (n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
        }
    };
    app.initialize();
}());