(function () {
    'use strict';

    document.addEventListener('submit', function (event) {
        var form = event.target.closest('.js-contact-form');
        if (!form) {
            return;
        }

        event.preventDefault();

        var button = form.querySelector('button[type="submit"]');
        var csrfMeta = document.querySelector('meta[name="csrf-token"]');
        var token = csrfMeta ? csrfMeta.getAttribute('content') : '';
        var formData = new FormData(form);

        if (button) {
            button.disabled = true;
        }

        fetch(form.getAttribute('action') || '/message', {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': token
            },
            credentials: 'same-origin',
            body: formData
        }).then(function (response) {
            if (response.ok) {
                form.reset();
                window.alert('message sent successfully');
                return;
            }

            return response.json().then(function (data) {
                var message = 'Unable to send message.';
                if (response.status === 429) {
                    message = (data && data.message) ? data.message : 'Too many messages. Please try again later.';
                } else if (data && data.errors) {
                    var firstError = Object.values(data.errors)[0];
                    if (Array.isArray(firstError) && firstError[0]) {
                        message = firstError[0];
                    }
                } else if (data && data.message) {
                    message = data.message;
                }
                window.alert(message);
            }).catch(function () {
                window.alert(response.status === 429
                    ? 'Too many messages. Please try again later.'
                    : 'Unable to send message.');
            });
        }).catch(function () {
            window.alert('Unable to send message.');
        }).finally(function () {
            if (button) {
                button.disabled = false;
            }
        });
    });
})();
