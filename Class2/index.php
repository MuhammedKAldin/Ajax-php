<!DOCTYPE html>
<html>
<head>
	<title>AJAX</title>
</head>
<body>

<div class="form-style" id="contact_form">
    <div class="form-style-heading">Plesase Contact Us</div>

    <div id="contact_results"></div>

    <div id="contact_body">
        <label><span>Name <span class="required">*</span></span>
            <input type="text" name="name" id="name" required="true" class="input-field"/>
        </label>


        <label>
            <input type="submit" id="submit_btn" value="Submit" />
        </label>
    </div>

</div>

<!-- include Google hosted jQuery Library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- Start jQuery code -->
<script type="text/javascript">
$(document).ready(function() {
    $("#submit_btn").click(function() { 
        
        var proceed = true;

        if(proceed) //everything looks good! proceed...
        {
            //get input field values data to be sent to server
            post_data = {
                'user_name'     : $('input[name=name]').val(), 
            };

            //Ajax post data to server
            $.post('submit.php', post_data, function(response){  
                if(response.type == 'error'){ //load json data from server and output message     
                    output = '<div class="error">'+response.text+'</div>';
                    
                    // highlighting field contains problem
                    if(response.inputName.toString() == "name")
                    {
                        $("#contact_form input[name=name]").css('border-color','red');
                    }
                    
                }else{
                    output = '<div class="success">'+response.text+'</div>';
                    //reset values in all input fields
                    $("#contact_form  input[required=true], #contact_form textarea[required=true]").val(''); 
                    $("#contact_form #contact_body").slideUp(); //hide form after success
                }
                $("#contact_form #contact_results").hide().html(output).slideDown();
            }, 'json');
        }
    });

    //reset previously set border colors and hide all message on .keyup()
    $("#contact_body  input[required=true], #contact_body textarea[required=true]").keyup(function() { 
        $(this).css('border-color',''); 
        $("#contact_results").slideUp();
    });
});

// $("#form_id").submit(function(e) {
//     var form = $(this);
//     var btntxt = $("button", form).text();
//     $("button", form).text('Please wait...');
//     e.preventDefault();
//     var url = form.attr('action');
//     $.ajax({
//         type: "POST",
//         url: url,
//         data: form.serialize(),
//         success: function(data) {
//             var obj = JSON.parse(data);
//             if (obj.status == true) {
//                 //success
//             } else {
//                 //failed
//             }
//             $("button", form).text(btntxt);
//         }
//     });
// });

</script>


</body>

