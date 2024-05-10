<?php

return [
    'ticket_purchase' => [
        "success" => <<<EOF
        You have succesfully purchased ticket through :serviceName

        Your ticket code is <u>**:ticketCode**</u>.

        Movie Name: **:movieName**

        Date: :date <br>
        Show Time: :startTime to :endTime

        Seat Number: :seatNumber

        Please bring this ticket with you.
        EOF
    ]
];
