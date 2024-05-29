<?php
// Read the variables sent via POST from our API
<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON Turwanye imirire mibi mubana\n\n";
    $response .= "1) Amezi 6 yambere\n";
    $response .= "2) Amezi 6 kugeza kumezi 9\n";
    $response .= "3) Amezi 9 kugeza ku mwaka \n";
    $response .= "4) Umwaka kugeza ku myaka 2 \n";
    $response .= "5) Imyaka 2 kugeza ku myaka 5 \n";

} else {
    $exploded_text = explode("*", $text);
    $level = count($exploded_text);

    // Handle "back" option
    if ($text == "0") {
        if ($level == 1) {
            // If at the first level, go back to main menu
            $response  = "CON Turwanye imirire mibi mubana\n\n";
            $response .= "1) Amezi 6 yambere\n";
            $response .= "2) Amezi 6 kugeza kumezi 9\n";
            $response .= "3) Amezi 9 kugeza ku mwaka \n";
            $response .= "4) Umwaka kugeza ku myaka 2 \n";
            $response .= "5) Imyaka 2 kugeza ku myaka 5 \n";
        } else {
            // If at the second level, go back to the previous menu
            $previous_text = implode("*", array_slice($exploded_text, 0, -1));
            switch ($previous_text) {
                case '2':
                    $response = "CON Imirire \n\n";
                    $response .= "1) Abwiriza  \n";
                    $response .= "2) Ibiribwa\n";
                    $response .= "3) Amafunguro\n";
                    $response .= "0) Back\n";
                    break;
                case '2*1':
                    $response = "CON Umwana niyuzuza amezi 6,\n ";
                    $response .= "tangira umuhe ubundi bwoko bw’ibiryo.\n";
                    $response .= "Amashereka akomeza kuba ingenzi mu bigize indyo y’umwana wawe\n";
                    $response .= "99) Komeza \n";
                    $response .= "0) Back\n";
                    break;
                case '2*2':
                    $response = "CON Ibigize indyo yuzuye\n\n";
                    $response .= "1) Ibitera imbaraga\n";
                    $response .= "2) Ibyubaka umubiri \n";
                    $response .= "3) Ibirinda indwara\n";
                    $response .= "0) Back\n";
                    break;
                case '2*2*1':
                    $response = "CON Ibiribwa bitera imbaraga(ibinyamafufu)\n\n";
                    $response .= "-Ibirayi\n";
                    $response .= "-Igitoki\n";
                    $response .= "-Ibihaza\n";
                    $response .= "-Amakaroni y'abana\n";
                    $response .= "-Ibijumba\n";
                    $response .= "99) Komeza\n"; // Adding a next option for continuation
                    $response .= "0) Back\n";
                    break;
                case '2*2*2':
                    $response = "CON Ibyubaka umubiri(Ibinyameke n'ibikomoka ku matungo)\n\n";
                    $response .= "-Amasaka\n";
                    $response .= "-Ingano\n";
                    $response .= "-Amagi\n";
                    $response .= "-Amafi\n";
                    $response .= "-Amashaza\n";
                    $response .= "-Soya\n";
                    $response .= "-Ubunyobwa\n";
                    $response .= "99) Next\n"; // Adding a next option for continuation
                    $response .= "0) Back\n";
                    break;
                case '2*2*3':
                    $response = "CON Ibirinda indwara(imboga n'imbuto)\n";
                    $response .= "-Epinari\n";
                    $response .= "-Imbogeri\n";
                    $response .= "-Dodo\n";
                    $response .= "-Isogo\n";
                    $response .= "-Umushogoro\n";
                    $response .= "-Ipapayi\n";
                    $response .= "-Watermelon\n";
                    $response .= "-Pome\n";
                    $response .= "-Ibinyomoro\n";
                    $response .= "99) Komeza\n"; // Adding a next option for continuation
                    $response .= "0) Back\n";
                    break;
                default:
                    // Handle other cases or errors
                    $response = "END Invalid option\n";
                    break;
            }
        }
    } else {
        // Handle other options based on the text
        switch ($text) {
            case '1':
                $response = "END Mu mezi atandatu ya mbere, onsa gusa\n Ntukagire ikindi uha umwana wawe mu mezi 6 ya mbere, kabone n’amazi. \n Amazi, ibindi binyobwa cyangwa ibindi biribwa bishobora gutera umwana wawe uburwayi.";
                break;
            case '2':
                $response = "CON Imirire \n\n";
                $response .= "1) Abwiriza  \n";
                $response .= "2) Ibiribwa\n";
                $response .= "3) Amafunguro\n";
                $response .= "0) Back\n";
                break;
            case '2*1':
                $response = "CON Umwana niyuzuza amezi 6,\n ";
                $response .= "tangira umuhe ubundi bwoko bw’ibiryo.\n";
                $response .= "Amashereka akomeza kuba ingenzi mu bigize indyo y’umwana wawe\n";
                $response .= "99) Komeza \n";
                $response .= "0) Back\n";
                break;
            case '2*2':
                $response = "CON Ibigize indyo yuzuye\n\n";
                $response .= "1) Ibitera imbaraga\n";
                $response .= "2) Ibyubaka umubiri \n";
                $response .= "3) Ibirinda indwara\n";
                $response .= "0) Back\n";
                break;
            case '2*2*1':
                $response = "CON Ibiribwa bitera imbaraga(ibinyamafufu)\n\n";
                $response .= "-Ibirayi\n";
                $response .= "-Igitoki\n";
                $response .= "-Ibihaza\n";
                $response .= "-Amakaroni y'abana\n";
                $response .= "-Ibijumba\n";
                $response .= "99) Komeza\n"; // Adding a next option for continuation
                $response .= "0) Back\n";
                break;
            case '2*2*2':
                $response = "CON Ibyubaka umubiri(Ibinyameke n'ibikomoka ku matungo)\n\n";
                $response .= "-Amasaka\n";
                $response .= "-Ingano\n";
                $response .= "-Amagi\n";
                $response .= "-Amafi\n";
                $response .= "-Amashaza\n";
                $response .= "-Soya\n";
                $response .= "-Ubunyobwa\n";
                $response .= "99) Next\n"; // Adding a next option for continuation
                $response .= "0) Back\n";
                break;
            case '2*2*3':
                $response = "CON Ibirinda indwara(imboga n'imbuto)\n";
                $response .= "-Epinari\n";
                $response .= "-Imbogeri\n";
                $response .= "-Dodo\n";
                $response .= "-Isogo\n";
                $response .= "-Umushogoro\n";
                $response .= "-Ipapayi\n";
                $response .= "-Watermelon\n";
                $response .= "-Pome\n";
                $response .= "-Ibinyomoro\n";
                $response .= "99) Komeza\n"; // Adding a next option for continuation
                $response .= "0) Back\n";
                break;
            case '2*2*3*99':
                $response = "CON Ibirinda indwara(imboga n'imbuto)\n\n";
                $response .= "-Isombe\n";
                $response .= "-Amashu\n";
                $response .= "-Ibishayote\n";
                $response .= "-Karote\n";
                $response .= "-Imiteja\n";
                $response .= "-Ibisusa\n";
                $response .= "-Avoka\n";
                $response .= "-Imineke\n";
                $response .= "0) Back\n";
                break;
            case '2*3':
                $response = "CON Tegura indyo yuzuye \n\n";
                $response .= "1)Mugitondo\n";
                $response .= "2) saa sita \n";
                $response .= "3) Igicamunsi \n";
                $response .= "4) Nimugoroba\n";
                $response .= "0) Back\n";
                break;
            default:
                // Handle other cases or errors
                $response = "END Invalid option\n";
                break;
        }
    }
}






// Echo the response back to the API
header('Content-type: text/plain');
echo $response;
?>
