
jQuery(document).ready( 

    function ($) {
        $('.btndata2').click( 
            function () {
                id = $(this).attr("id");

                var pid1 = 'get-' + id + '-1';
                var pid2 = 'get-' + id + '-2';
                var pid3 = 'get-' + id + '-3';
                var pid4 = 'get-' + id + '-4';
                var pid5 = 'get-' + id + '-5';
                var pid6 = 'get-' + id + '-6';
                var pid7 = 'get-' + id + '-7';
                var pid8 = 'get-' + id + '-8';
                var pid9 = 'get-' + id + '-9';
                var pid10 = 'get-' + id + '-10';

                var image = document.getElementById(pid1).firstChild.src
                var fname = document.getElementById(pid2).innerText
                var lname = document.getElementById(pid3).innerText
                var email = document.getElementById(pid4).innerText
                var dob = document.getElementById(pid5).innerText
                var phone = document.getElementById(pid6).innerText
                var desg = document.getElementById(pid7).innerText
                var gender = document.getElementById(pid8).innerText
                var check = document.getElementById(pid9).innerText
                var skills = document.getElementById(pid10).innerText

                to_be_print = window.open("");

                to_be_print.document.write(
                    
                    `<div style="padding:50px">
                        <div>
                        <h3>Employee Summary</h3>
                        <img src="${image}" width="100" height="100"/>
                        </div>
                    <div>
                        <p><b> First Name </b> </p>  <p> ${fname} </p>
                        <p><b> Last Name </b> </p>  <p> ${lname} </p> 
                        <p><b> Email </b> </p>  <p> ${email} </p> 
                        <p><b> Date of Birth </b> </p>  <p> ${dob} </p> 
                        <p><b> Phone Number </b> </p>  <p> ${phone} </p> 
                        <p><b> Designation </b> </p>  <p> ${desg} </p> 
                        <p><b> Gender </b> </p>  <p> ${gender} </p> 
                        <p><b> Terms and Condition </b> </p>  <p> ${check} </p> 
                        <p><b> Skills level </b> </p>  <p> ${skills} </p>                                                 
                        </div>
                    </div>` 
                );
                to_be_print.print();
                to_be_print.close();

            }
        );
                // Search bar.
            $( "#search_input" ).on(
                "keyup",
                function() {
                    var value = $( this ).val().toLowerCase();
                    $( "#seacrh_table tr" ).filter(
                        function() {
                            $( this ).toggle( $( this ).text().toLowerCase().indexOf( value ) > -1 )
                        }
                    );
                }
            );
    }
);

function updateTextInput(val) {
    document.getElementById('textInput').value=val; 
}




