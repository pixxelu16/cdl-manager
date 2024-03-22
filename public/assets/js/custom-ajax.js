$(document).ready(function () {
    //Submit home contact form
    $("#submit_home_contact_form").validate({
        rules: {
            your_name: {
                required: true,
            },
            your_email: {
                required: true,
            },
            your_phone: {
                required: true,
            }
        },
        submitHandler: function (form,e) {
            e.preventDefault();
            var your_name = $('#your_name').val();
            var your_email = $('#your_email').val();
            var your_phone = $('#your_phone').val();
        
            var form = new FormData();

            form.append('your_name', your_name);
            form.append('your_email', your_email);
            form.append('your_phone', your_phone);

            //Ajax call
            jQuery.ajax({  
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, 
                url: base_url+'/submit-home-contact-email', 
                data: form,
                processData: false,
                contentType: false, 
                mimeType: "multipart/form-data",
                success: function(response) {
                    $('.home_contact_email').html(response);
                }
            });
        }
    });
});