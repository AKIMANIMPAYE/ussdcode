<?php
// Read the variables sent via POST from our API
$sessionId = isset($_POST["sessionId"]) ? $_POST["sessionId"] : '';
$serviceCode = isset($_POST["serviceCode"]) ? $_POST["serviceCode"] : '';
$phoneNumber = isset($_POST["phoneNumber"]) ? $_POST["phoneNumber"] : '';
$text = isset($_POST["text"]) ? $_POST["text"] : '';

$response = "";  // Initialize response variable

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON Turwanye imirire mibi mubana\n\n";
    $response .= "1) Amezi 6 yambere\n";
    $response .= "2) Amezi 6 kugeza kumezi 9\n";
    $response .= "3) Amezi 9 kugeza ku mwaka\n";
    $response .= "4) Umwaka kugeza ku myaka 2\n";
    $response .= "5) Imyaka 2 kugeza ku myaka 5\n";
} else if ($text == "1") {
    // Business logic for first level response
    $response = "END Mu mezi atandatu ya mbere, onsa gusa\n";
    $response .= "Ntukagire ikindi uha umwana wawe mu mezi 6 ya mbere, kabone n’amazi.\n";
    $response .= "Amazi, ibindi binyobwa cyangwa ibindi biribwa bishobora gutera umwana wawe uburwayi.\n";
} else if ($text == "2") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $response = "CON Imirire\n\n";
    $response .= "1) Abwiriza\n";
    $response .= "2) Ibiribwa\n";
    $response .= "3) Amafunguro\n";
} else if ($text == "2*1") {
    // This is a second level response where the user selected 1 in the first instance
    $response = "CON Umwana niyuzuza amezi 6, tangira umuhe ubundi bwoko bw’ibiryo.\n";
    $response .= "Amashereka akomeza kuba ingenzi mu bigize indyo y’umwana wawe.\n";
    $response .= "Ha umwana amashereka buri gihe mbere yo kumuha ibiryo.\n";
    $response .= "Umwana ashobora gukenera igihe kinini kugira ngo amenyere kurya ubundi bwoko bw’ibiryo bitari amashereka.\n";
    $response .= "Ihangane, shishikariza umwana wawe kurya ubyitayeho, ariko ntukabimuhatire.\n";
    $response .= "99) Previous\n";
} else if ($text == "2*2") {
    // This is a second level response where the user selected 2 in the first instance
    $response = "CON Indyo yuzuye igirwa\n\n";
    $response .= "1) Ibitera imbaraga\n";
    $response .= "2) Ibyubaka umubiri\n";
    $response .= "3) Ibirinda indwara\n";
    $response .= "99) Previous\n";
} else if ($text == "2*2*1") {
    // This is a third level response
    $response = "CON Ibiribwa bitera imbaraga (ibinyamafufu)\n\n";
    $response .= "- Ibirayi\n";
    $response .= "- Igitoki\n";
    $response .= "- Ibihaza\n";
    $response .= "- Amakaroni y'abana\n";
    $response .= "- Ibijumba\n";
    $response .= "- Kawunga\n";
    $response .= "- Imyumbati\n";
    $response .= "- Amateke\n";
    $response .= "- Ibigori\n";
    $response .= "- Umuceri\n";
    $response .= "- Ibikoro\n";
    $response .= "99) Previous\n";
    $response .= "98) Next\n";
} else if ($text == "2*2*2") {
    // This is a third level response with pagination
    $parts = explode('*', $text);
    $page = isset($parts[3]) ? $parts[3] : '1';

    if ($page == '1') {
        $response = "CON Ibyubaka umubiri (Ibinyameke n'ibikomoka ku matungo) - Page 1\n\n";
        $response .= "1) Amasaka\n";
        $response .= "2) Ingano\n";
        $response .= "3) Amagi\n";
        $response .= "4) Amafi\n";
        $response .= "5) Inyama\n";
        $response .= "6) Ibishyimbo\n";
        $response .= "7) Indagara\n";
        $response .= "8) More\n";
        $response .= "99) Previous\n";
    } else if ($page == '2') {
        $response = "CON Ibyubaka umubiri (Ibinyameke n'ibikomoka ku matungo) - Page 2\n\n";
        $response .= "1) Amata\n";
        $response .= "2) Uburo\n";
        $response .= "3) Uvuta y'inka\n";
        $response .= "4) Amashaza\n";
        $response .= "5) Soya\n";
        $response .= "6) Ubunyobwa\n";
        $response .= "7) Previous\n";
    }
} else if ($text == "2*2*2*8") {
    // Navigate to the next page (page 2) for "2*2*2"
    $response = "CON Ibyubaka umubiri (Ibinyameke n'ibikomoka ku matungo) - Page 2\n\n";
    $response .= "1) Amata\n";
    $response .= "2) Uburo\n";
    $response .= "3) Uvuta y'inka\n";
    $response .= "4) Amashaza\n";
    $response .= "5) Soya\n";
    $response .= "6) Ubunyobwa\n";
    $response .= "7) Previous\n";
} else if ($text == "2*2*2*7") {
    // Navigate to the previous page (page 1) for "2*2*2"
    $response = "CON Ibyubaka umubiri (Ibinyameke n'ibikomoka ku matungo) - Page 1\n\n";
    $response .= "1) Amasaka\n";
    $response .= "2) Ingano\n";
    $response .= "3) Amagi\n";
    $response .= "4) Amafi\n";
    $response .= "5) Inyama\n";
    $response .= "6) Ibishyimbo\n";
    $response .= "7) Indagara\n";
    $response .= "8) More\n";
    $response .= "99) Previous\n";
} else if ($text == "2*2*3") {
    // This is a third level response
    $response = "CON Ibirinda indwara (imboga n'imbuto)\n\n";
    $response .= "- Epinari\n";
    $response .= "- Imbogeri\n";
    $response .= "- Dodo\n";
    $response .= "- Isogo\n";
    $response .= "- Umushogoro\n";
    $response .= "- Isombe\n";
    $response .= "- Amashu\n";
    $response .= "- Ibishayote\n";
    $response .= "- Karote\n";
    $response .= "- Imiteja\n";
    $response .= "- Ibisusa\n";
    $response .= "- Avoka\n";
    $response .= "- Imineke\n";
    $response .= "- Ipapayi\n";
    $response .= "- Watermelon\n";
    $response .= "- Pome\n";
    $response .= "- Ibinyomoro\n";
    $response .= "99) Previous\n";
    $response .= "98) Next\n";
} else if ($text == "99") {
    // Handle "Previous" option to navigate back to the main menu
    $response  = "CON Turwanye imirire mibi mubana\n\n";
    $response .= "1) Amezi 6 yambere\n";
    $response .= "2) Amezi 6 kugeza kumezi 9\n";
    $response .= "3) Amezi 9 kugeza ku mwaka\n";
    $response .= "4) Umwaka kugeza ku myaka 2\n";
    $response .= "5) Imyaka 2 kugeza ku myaka 5\n";
} else if ($text == "98") {
    // Handle "Next" option to navigate to the next page
    // Depending on the current menu context, we might want to navigate to a specific sub-menu or next set of options
    if (strpos($text, "2*2*1") !== false) {
        // Example next page for "2*2*1"
        $response = "CON Ibiribwa bitera imbaraga (ibinyamafufu) - Page 2\n\n";
        $response .= "- Ubugari\n";
        $response .= "- Amajyambere\n";
        $response .= "- Amasaka\n";
        $response .= "- Indagala\n";
        $response .= "99) Previous\n";
    } else if (strpos($text, "2*2*3") !== false) {
        // Example next page for "2*2*3"
        $response = "CON Ibirinda indwara (imboga n'imbuto) - Page 2\n\n";
        $response .= "- Ibitunguru\n";
        $response .= "- Ibisheke\n";
        $response .= "- Ibitina\n";
        $response .= "- Ibihaza\n";
        $response .= "99) Previous\n";
    }
}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;
?>
