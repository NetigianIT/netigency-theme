(function () {
    'use strict';

    var FIELD_NAMES = ['name', 'email', 'subject', 'message'];

    function fieldValue(form, name) {
        var field = form.elements[name];
        return field ? String(field.value || '').trim() : '';
    }

    function ensureErrorEl(field) {
        var group = field.closest('.contact-form-group') || field.parentElement;
        var el = group.querySelector('.contact-field-error');

        if (!el) {
            el = document.createElement('div');
            el.className = 'contact-field-error';
            el.setAttribute('role', 'alert');
            group.appendChild(el);
        }

        return el;
    }

    function ensureStatusEl(form) {
        var el = form.querySelector('.contact-form-status');

        if (!el) {
            el = document.createElement('div');
            el.className = 'contact-form-status';
            el.setAttribute('role', 'status');
            form.appendChild(el);
        }

        return el;
    }

    function ensureSpinner(button) {
        var icon = button.querySelector('.icon');
        if (!icon) {
            return;
        }

        if (!icon.querySelector('.contact-btn-spinner')) {
            var spinner = document.createElement('span');
            spinner.className = 'contact-btn-spinner';
            spinner.setAttribute('aria-hidden', 'true');
            icon.appendChild(spinner);
        }
    }

    function clearFieldErrors(form) {
        FIELD_NAMES.forEach(function (name) {
            var field = form.elements[name];
            if (!field) {
                return;
            }

            field.classList.remove('is-invalid');
            var errorEl = (field.closest('.contact-form-group') || field.parentElement)
                .querySelector('.contact-field-error');
            if (errorEl) {
                errorEl.textContent = '';
                errorEl.classList.remove('is-visible');
            }
        });
    }

    function showFieldErrors(form, errors) {
        var firstField = null;

        Object.keys(errors).forEach(function (name) {
            var field = form.elements[name];
            var messages = errors[name];
            var message = Array.isArray(messages) ? messages[0] : messages;

            if (!field || !message) {
                return;
            }

            field.classList.add('is-invalid');
            var errorEl = ensureErrorEl(field);
            errorEl.textContent = message;
            errorEl.classList.add('is-visible');

            if (!firstField) {
                firstField = field;
            }
        });

        if (firstField && typeof firstField.focus === 'function') {
            firstField.focus({ preventScroll: false });
        }
    }

    function setStatus(form, message, type) {
        var el = ensureStatusEl(form);
        el.textContent = message || '';
        el.classList.remove('is-visible', 'is-success', 'is-error');

        if (message) {
            el.classList.add('is-visible', type === 'success' ? 'is-success' : 'is-error');
        }
    }

    function setLoading(button, isLoading) {
        if (!button) {
            return;
        }

        ensureSpinner(button);
        button.classList.toggle('is-loading', isLoading);
        button.disabled = isLoading;
        button.setAttribute('aria-busy', isLoading ? 'true' : 'false');
    }

    function clientErrors(form) {
        var errors = {};
        var name = fieldValue(form, 'name');
        var email = fieldValue(form, 'email');
        var subject = fieldValue(form, 'subject');
        var message = fieldValue(form, 'message');

        if (!name) {
            errors.name = ['The name field is required.'];
        } else if (name.length < 2) {
            errors.name = ['The name must be at least 2 characters.'];
        } else {
            var namePattern = /^[A-Za-z\u00C0-\u024F\u0980-\u09FF\s.'-]+$/;
            try {
                namePattern = /^[\p{L}\s.'-]+$/u;
            } catch (e) {}
            if (!namePattern.test(name)) {
                errors.name = ['The name format is invalid.'];
            }
        }

        if (!email) {
            errors.email = ['The email field is required.'];
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            errors.email = ['The email must be a valid email address.'];
        }

        if (!subject) {
            errors.subject = ['The subject field is required.'];
        } else if (subject.length < 3) {
            errors.subject = ['The subject must be at least 3 characters.'];
        }

        if (!message) {
            errors.message = ['The message field is required.'];
        } else if (message.length < 10) {
            errors.message = ['The message must be at least 10 characters.'];
        } else if (message.length > 500) {
            errors.message = ['The message may not be greater than 500 characters.'];
        }

        return errors;
    }

    document.addEventListener('input', function (event) {
        var field = event.target;
        var form = field.closest && field.closest('.js-contact-form');
        if (!form || FIELD_NAMES.indexOf(field.name) === -1) {
            return;
        }

        field.classList.remove('is-invalid');
        var errorEl = (field.closest('.contact-form-group') || field.parentElement)
            .querySelector('.contact-field-error');
        if (errorEl) {
            errorEl.textContent = '';
            errorEl.classList.remove('is-visible');
        }
    });

    document.addEventListener('submit', function (event) {
        var form = event.target.closest('.js-contact-form');
        if (!form) {
            return;
        }

        event.preventDefault();
        form.setAttribute('novalidate', 'novalidate');

        var button = form.querySelector('button[type="submit"]');
        var csrfMeta = document.querySelector('meta[name="csrf-token"]');
        var token = csrfMeta ? csrfMeta.getAttribute('content') : '';

        clearFieldErrors(form);
        setStatus(form, '', '');

        var localErrors = clientErrors(form);
        if (Object.keys(localErrors).length) {
            showFieldErrors(form, localErrors);
            return;
        }

        setLoading(button, true);

        fetch(form.getAttribute('action') || '/message', {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': token
            },
            credentials: 'same-origin',
            body: new FormData(form)
        }).then(function (response) {
            if (response.ok) {
                form.reset();
                setStatus(form, 'Message sent successfully.', 'success');
                return;
            }

            return response.json().then(function (data) {
                if (data && data.errors) {
                    showFieldErrors(form, data.errors);
                    return;
                }

                var message = 'Unable to send message.';
                if (response.status === 429) {
                    message = (data && data.message) ? data.message : 'Too many messages. Please try again later.';
                } else if (data && data.message) {
                    message = data.message;
                }
                setStatus(form, message, 'error');
            }).catch(function () {
                setStatus(form, response.status === 429
                    ? 'Too many messages. Please try again later.'
                    : 'Unable to send message.', 'error');
            });
        }).catch(function () {
            setStatus(form, 'Unable to send message.', 'error');
        }).finally(function () {
            setLoading(button, false);
        });
    });
})();
