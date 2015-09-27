function importXML() {

    var $URLField = $('#url');
    var $mainBtn = $('#btn');

    var $errorBlock = $('#errorBlock');
    var $successBlock = $('#successBlock');
    var $productsBlock = $('#productsBlock');
    var $loadingBlock = $('#loadingBlock');
    var $failBlock = $('#failBlock');
    var $summeryLabel = $('#summery');

    $errorBlock.hide();
    $successBlock.hide();
    $productsBlock.hide();
    $loadingBlock.hide();
    $failBlock.hide();

    window.location.href = '#bottom';

    if ($URLField.val().length === 0) {
        $errorBlock.show();
        return;
    }

    $mainBtn.prop("disabled", true);
    $loadingBlock.show();
    $productsBlock.show().html('');

    var lastResponseLen = false;
    $.ajax('/index/get-products/', {
        data : {
           url : $URLField.val()
        },
        xhrFields: {
            onprogress: function (e) {
                var thisResponse, response = e.currentTarget.response;
                if (lastResponseLen === false) {
                    thisResponse = response;
                    lastResponseLen = response.length;
                }
                else {
                    thisResponse = response.substring(lastResponseLen);
                    lastResponseLen = response.length;
                }

                var array = thisResponse.split("\n");
                var arrayLength = array.length - 1;
                for (var i = 0; i < arrayLength; i++) {
                    try {
                        var JSONResponce = jQuery.parseJSON(array[i]);
                        $productsBlock.append(getProduct(JSONResponce));
                    } catch (e) {
                        console.log('<<<ERROR');
                        console.log(array[i]);
                        console.log('<<<;');
                    }
                }
                window.location.href = '#bottom';
            }
        }
    }).done(function (data) {
        $successBlock.show();
        $loadingBlock.hide();
        $mainBtn.prop("disabled", false);

        var array = data.split("\n");
        var lastElement = array.length - 1;
        try {
            var JSONResponce = jQuery.parseJSON(array[lastElement]);
            $summeryLabel.html(JSONResponce.countOfProducts);
        } catch (e) {
            console.log('<<<ERROR');
            console.log(array[lastElement]);
            console.log('<<<;');
            $('#summeryBlock').hide();
        }
    }).fail(function (data) {
        $failBlock.show();
        $loadingBlock.hide();
        $mainBtn.prop("disabled", false);
    });
}

function getProduct(product) {
    // render the template
    var postsHTML = twig({ref: "product"}).render(product);
    return postsHTML;
}

$(function () {
    var template = twig({
        id: "product",
        href: "templates/product.twig",
        async: false
    });
});
