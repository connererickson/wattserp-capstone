
$(document).ready(function(){

    var context;

    //Close Modal Dialog Boxes Button
    $('#close_modal_dialog').on('click', function(){
            $('#modal_dialog_update_box').hide();
            $('#modal_dialog_update_background').hide();
    });

    //URL Parameter Actions
    if (getUrlParameter('area')){
        switch(getUrlParameter('area')){
            case 'menu_item' :
                setTimeout(function(){
                    $('.functions_list :nth-child(' + getUrlParameter('item') + ') a').triggerHandler('click');
                },500);
            default :
				break;
        }
    }
});

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};
