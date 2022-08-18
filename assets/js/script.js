jQuery(document).ready( 
    function ($) {
        $('.btndata2').click(
            function () {
                id = $(this).attr("id");

                var pid2 = 'get-' + id + '-2';
                var pid3 = 'get-' + id + '-3';
                var pid4 = 'get-' + id + '-4';
                var pid5 = 'get-' + id + '-5';

                var name = document.getElementById(pid2).innerText
                var email = document.getElementById(pid3).innerText
                var phone = document.getElementById(pid4).innerText
                var dob = document.getElementById(pid5).innerText

                to_be_print = window.open("");

                to_be_print.document.write(
                    
                    `<div style="padding:50px">
                        <h3>User's Summary</h3>
                        <table cellpadding="10" cellspacing="0" width="100%" style="text-align: left; border: 1px solid black; background-color:#f0f0f1">
                            <tr style="border: 1px solid black;">
                                <th style="border: 1px solid black;">Name</th>
                                <th style="border: 1px solid black;">Email</th>
                                <th style="border: 1px solid black;">Phone</th>
                            </tr>
                            <tr style="border: 1px solid black;">
                                <td style="border: 1px solid black;">${name}</td>
                                <td style="border: 1px solid black;">${email}</td>
                                <td style="border: 1px solid black;">${phone}</td>
                            </tr>
                        </table>
                    </div>`

                );

                to_be_print.print();
                to_be_print.close();

            }
        );
    }
);