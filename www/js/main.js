'use strict';
(function () {


    var app = {

        initialize: function () {
            this.setUpListeners();

        },
        setUpListeners: function () {
            $('form[name = "comments_form"]').on('submit', app.submitForm);


        },
        submitForm: function (e) {
            var url = $(this).attr('action'),
                modal = $('#modal-form'),
                comments = $('.comments'),
                id = $('.id').data('id'),
                form = $(this);                    
                form = $(this);                    
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: url,
                data: 'post_id=' + id + '&' + ($(this).serialize())
            }).done(function (response) {
                if (response.status === 'success') {
                    var data = response.data;
                    var html = '<div class="media"><a class="pull-left" href="#"><img class="media-object" src="http://placehold.it/64x64" alt=""></a><div class="media-body"><h4 class="media-heading">'+ data.author +'<small> on'+ data.created_date +'</small></h4>' + data.text + ' </div></div>';
                    comments.append(html);
                } else if (response.status === 'error') {
                    modal.find('.modal-body').html('<p>' + response.message + '</p>');
                    modal.modal();
                }
            });
            form.find('button[type=submit]').prop("disabled", true);
            setTimeout(form_disable, 5000, form, false);
            $(this).trigger("reset");

            function form_disable(form, status) {
                form.find('button[type=submit]').prop("disabled", status)

            }

        }

    };
    app.initialize();
}());
