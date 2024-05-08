<?php

return [
    'ticket_purchase'=>[
        "success"=><<<EOF
        You have succesfully purchased ticket through :service_name

        Your ticket code is <u>**:ticket_code**</u>.

        Movie Name: **:movie**

        Date: :date <br>
        Show Time: :start_time to :end_time

        Seat Number: :seat_number

        Please bring this ticket with you.
        EOF
    ]
];