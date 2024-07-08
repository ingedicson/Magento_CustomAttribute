define(['jquery'], function ($) {
    'use strict';
    
    console.log('customValidation.js loaded');

    return function (originalWidget) {
        $.widget('mage.validation', originalWidget, {
            _create: function () {
                this._super();
                var self = this;

                $('#custom_attribute').on('blur', function () {
                    var value = $(this).val();
                    var errorMessage = 'Custom Product Attribute must be at least 3 characters long.';
                    
                    // Elimina el mensaje de error existente
                    $(this).next('.error-message').remove();

                    if (value.length < 3) {
                        // Muestra el mensaje de error debajo del campo de entrada
                        $(this).after('<div class="error-message" style="color: red;">' + errorMessage + '</div>');
                    }
                });
            }
        });

        return $.mage.validation;
    };
});
