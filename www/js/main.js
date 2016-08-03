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
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: url,
                data: 'post_id=' + id + '&' + ($(this).serialize())
            }).done(function (response) {
                if (response.status === 'success') {
                    var data = response.data;
                    var html = '<div class="panel panel-default"><div class="panel-heading"><h3 class="panel-title">' + data.author + ' on ' + data.created_date + '</h3></div><div class="panel-body"> ' + data.text + ' </div></div>'
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