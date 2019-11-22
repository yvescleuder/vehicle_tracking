var tracking = tracking || {};

tracking.ajax = (function() {
    'use strict';

    /**
     * Envia uma requisição em Ajax
     * @param method
     * @param action
     * @param data
     * @param dataType
     * @param beforeSend
     * @param error
     * @param success
     */
    var send = function(method, action, data, dataType, beforeSend, error, success) {
        $.ajax({
            type: method,
            url: action,
            data: data,
            dataType: dataType,
            beforeSend: beforeSend,
            error: error,
            success: success
        });
    };

    /**
     * Enquanto não receber uma resposta do Ajax
     * @param loading
     * @param button
     */
    var beforeSend = function(loading, button) {
        $('#'+loading).removeClass('hidden');
        $('#'+button).attr('disabled', 'disabled');
    };

    /**
     * Remove o Loading e bloqueia o botão de ação
     * @param loading
     * @param button
     */
    var removeLoading = function(loading, button) {
        $('#'+loading).addClass('hidden');
        $('#'+button).removeAttr('disabled');
    };

    return {
        send: send,
        beforeSend: beforeSend,
        removeLoading: removeLoading,
    };
}());
