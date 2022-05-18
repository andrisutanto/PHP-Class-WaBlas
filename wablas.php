<?php
//wablas API class, unofficial WA Blas Class
//https://pati.wablas.com/documentation

class wablas{
    private $token;
    public function __construct() {
        $this->token = "YOURTOKENHERE";
        $this->servername = "https://pati.wablas.com";
    }

    function sendmessagewa($phone,$message)
    {

        $curl = curl_init();
        $data = [
            'phone' => $phone,
            'message' => $message,
            'isGroup' => 'false',
        ];

        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                "Authorization: ".$this->token,
            )
        );

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_URL, $this->servername."/api/send-message");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        $result = curl_exec($curl);
        curl_close($curl);
    }
}

?>