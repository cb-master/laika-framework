///////////////////
//// Functions ////
///////////////////

// Validate Input is Number for Date
function validateProrataDate(element, message_id){
    let date = parseInt($(element).val());
    let message = $('#' + message_id);

    if(!(date > 0) || !(date < 28)){
        $(element).addClass('invalid-border');
        message.addClass('app-d-inline').html("** Please Enter Value Between 1 - 28");
    }else{
        $(element).removeClass('invalid-border');
        message.html('').removeClass('app-d-inline');
    }
}

// Require Prorata Date
function requireProrataDate(element){
    let prorata_billing_date = $('#prorata_billing_date');
    prorata_billing_date.prop('required', $(element).is(':checked'));
}

// Set New Product Price in Form
function productTypeChange(element){
    let types = ['free', 'onetime', 'recurring'];
    let type = $('#' + element.id).val().toLowerCase();
    let paymentOneTime = $('#onetime_type');
    let paymentRecurring = $('#recurring_type');

    if (types.includes(type)) {
        if(type === 'free') {
            paymentOneTime.removeClass('app-d-block').addClass('app-d-none');
            paymentRecurring.removeClass('app-d-block').addClass('app-d-none');
        }else if(type === 'onetime'){
            paymentOneTime.removeClass('app-d-none').addClass('app-d-block');
            paymentRecurring.removeClass('app-d-block').addClass('app-d-none');
        }else if(type === 'recurring'){
            paymentOneTime.removeClass('app-d-block').addClass('app-d-none');
            paymentRecurring.removeClass('app-d-none').addClass('app-d-block');
        }
    }
}

// Display or Hide
function toggle(id){
    $('#'+id).toggleClass('app-d-none');
}

// New Product Invoice Type Select
function newProductInvoiceType(element) // Not Used Yet
{
    let forProduct = $('#forProduct');
    let forNonProduct = $('#forNonProduct');
    let showProducts = $('#showProducts');

    if ($(element).is(forProduct)) {
        forProduct.prop('checked', true);
        forNonProduct.prop('checked', false);
        showProducts.addClass('app-d-block').removeClass('app-d-none');
    } else if ($(element).is(forNonProduct)) {
        forProduct.prop('checked', false);
        forNonProduct.prop('checked', true);
        showProducts.addClass('app-d-none').removeClass('app-d-block');
    }
}

///////////////////////
//// API Functions ////
///////////////////////

async function call_in(slug, postType, json = {}) {
    try {
        postType = postType.toUpperCase();
        const row = JSON.stringify(json);
        const options = {
            method: postType,
            headers: {
                "Content-type":"application/json",
                "Authorization":token
            },
            body: row,
            redirect: "follow"
        };

        // For GET and HEAD methods, body should not be included in the requestOptions
        if (postType === 'GET' || postType === 'HEAD') {
            delete options.body;
            // options.method = 'POST';
        }

        const response = await fetch(`${WEBHOST}/api/${slug}/`, options);
        const result = await response.json();
        return result;

    }catch(error) {
        return {
            status: 200,
            message: "success",
            data: {}
        };
    }
}

// Get Client
async function get_client(client) {
    await call_in('client/'+client+'/', 'get')
        .then(response => {
            console.log(response);
        })
        .catch(error => {
            console.log('Error:', error);
            return {
                status: 200,
                message: "success",
                data: {}
            };
        });
}

///////////////////////////
//// SERVICE Functions ////
///////////////////////////

// // Select Service
// function select_service(element)
// {
//     let inputId = element.id.replace('_Service', '');
//     let services = $('[name="service"]');
//     services.each(function(){
//     let serviceId = $(this).attr('id').replace('_Input', '');
//     if(serviceId === inputId) {
//         $(element).addClass('app-bg-default app-text-white');
//     }else{
//         let change = $('#' + serviceId + '_Service');
//         change.removeClass('app-bg-default app-text-white');
//     }
//     });
//     $('#' + inputId + '_Input').prop('checked', true);
// }