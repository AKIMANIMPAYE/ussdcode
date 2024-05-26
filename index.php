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

} else if ($text == "1") {
    // Business logic for first level response
    $response = "END Mu mezi atandatu ya mbere, onsa gusa\n Ntukagire ikindi uha umwana wawe mu mezi 6 ya mbere, kabone n’amazi. \n Amazi, ibindi binyobwa cyangwa ibindi biribwa bishobora gutera umwana wawe uburwayi.";
} else if ($text == "2") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $response = "CON Imirire \n\n";
    $response .= "1) Abwiriza  \n";
    $response .= "2) Ibiribwa\n";
    $response .= "3) Amafunguro\n";
} else if ($text == "2*1") {
    // This is a second level response where the user selected 1 in the first instance
    $response = "CON Umwana niyuzuza amezi 6, tangira umuhe ubundi bwoko bw’ibiryo.\n";
    $response .= "Amashereka akomeza kuba ingenzi mu bigize indyo y’umwana wawe\n";
    $response .= "Ha umwana amashereka buri gihe mbere yo kumuha ibiryo \n";
    $response .= "Umwana ashobora gukenera igihe kinini kugira ngo amenyere kurya ubundi bwoko bw’ibiryo bitari amashereka.\n";
    $response .= "Ihangane, shishikariza umwana wawe kurya ubyitayeho, ariko ntukabimuhatire.\n";
} else if ($text == "2*2") {
    // This is a second level response where the user selected 2 in the first instance
    $response = "CON Ibigize indyo yuzuye\n\n";
    $response .= "1) Ibitera imbaraga\n";
    $response .= "2) Ibyubaka umubiri \n";
    $response .= "3) Ibirinda indwara\n";
} else if ($text == "2*2*1") {
    // First part of response for 2*2*1
    $response = "CON Ibiribwa bitera imbaraga(ibinyamafufu)\n\n";
    $response .= "-Ibirayi\n";
    $response .= "-Igitoki\n";
    $response .= "-Ibihaza\n";
    $response .= "-Amakaroni y'abana\n";
    $response .= "-Ibijumba\n";
    $response .= "99) Komeza\n"; // Adding a next option for continuation
} else if ($text == "2*2*1*99") {
    // Second part of response for 2*2*1
    $response = "CON Ibiribwa bitera imbaraga(ibinyamafufu) Part 2\n\n";
    $response .= "-Kawunga\n";
    $response .= "-Imyumbati\n";
    $response .= "-Amateke\n";
    $response .= "-Ibigori\n";
    $response .= "-Umuceri\n";
    $response .= "-Ibikoro\n";
} else if ($text == "2*2*2") {
    // First part of response for 2*2*2
    $response = "CON Ibyubaka umubiri(Ibinyameke n'ibikomoka ku matungo)\n\n";
    $response .= "-Amasaka\n";
    $response .= "-Ingano\n";
    $response .= "-Amagi\n";
    $response .= "-Amafi\n";
    $response .= "-Amashaza\n";
    $response .= "-Soya\n";
    $response .= "-Ubunyobwa\n";
    $response .= "99) Next\n"; // Adding a next option for continuation
} else if ($text == "2*2*2*99") {
    // Second part of response for 2*2*2
    $response = "CON Ibyubaka umubiri(Ibinyameke n'ibikomoka ku matungo) Part 2\n\n";
    $response .= "-Inyama\n";
    $response .= "-Ibishyimbo\n";
    $response .= "-Indagara\n";
    $response .= "-Amata\n";
    $response .= "-Uburo\n";
    $response .= "-Uvuta y'inka\n";
    
} else if ($text == "2*2*3") {
    // First part of response for 2*2*3
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
} else if ($text == "2*2*3*99") {
    // Second part of response for 2*2*3
    $response = "CON Ibirinda indwara(imboga n'imbuto) Part 2\n\n";
    $response .= "-Isombe\n";
    $response .= "-Amashu\n";
    $response .= "-Ibishayote\n";
    $response .= "-Karote\n";
    $response .= "-Imiteja\n";
    $response .= "-Ibisusa\n";
    $response .= "-Avoka\n";
    $response .= "-Imineke\n";
}
else if ($text == "2*3") {
    $response = "CON Tegura indyo yuzuye \n\n";
    $response .= "1)Mugitondo\n";
    $response .= "2) saa sita \n";
    $response .= "3) Igicamunsi \n";
    $response .= "4) Nimugoroba\n";
}
else if ($text == "2*3*1") {
     $response = "CON Ifunguro rya 1: Igikoma cy’ifu y’amasaka kirimo amata y’inka\n\n";
    $response .= " Amata y’inka angana na kimwe cya kabiri,\n";
    $response .= "  cy’igikombe cya mironko (250 ml) \n";
    $response .= " Amazi mu gikombe cya mironko \n";
    $response .= " Ifu y’amasaka: Ibiyiko 4 cyangwa 5\n";
    $response .= " Gufata amata ukavanga n’ifu bikanoga\n\n";
    $response .= "99)komeza\n";}
else if ($text == "2*3*1*99") {
        $response = "CON Igikoma cy’ifu y’amasaka kirimo amata y’inka \n\n";
        $response .= "kubivanga n’amazi yenda kuzura igikombe,\n";
        $response.="cya mironko (3/4) bikanoga neza\n";
        $response .= "gucanira andi mazi angana n’ igikombe cya mironko,\n";
        $response.="cyenda kuzura (3/4) cyabira ukongeramo (rwa ruvange rw’amata n’ifu\n";
        $response .= "gushigisha kugeza kibize bihagije \n";
        $response .= "99)Komeza";
    }

else if ($text == "2*3*1*99*99") {
        $response = "CON Ifunguro rya 2:Igikoma cy’ifu y’ibigori kirimo amata y’inka \n\n";
        $response .= "Amata y’inka angana na kimwe cya kabiri,\n";
        $response.="cy’igikombe cya mironko (250ml),\n";
        $response .= "Amazi mu gikombe cya mironko cyuzuye,\n";
        $response.="Ibiyiko 3 cyangwa 4 by’ifu y’ibigori\n";
        $response .= "99)Komeza";
    }
else if ($text == "2*3*1*99*99") {
        $response = "CON Ifunguro rya 2:Uko bitegurwa \n\n";
        $response .= "Gufata amata ukavanga n’ifu bikanoga,\n";
        $response.="kubivanga n’amazi angana n’igikombe cya mironko,\n";
        $response .= "cyenda kuzura (3/4) bikanoga neza,\n";
        $response.="gucanira andi mazi angana n’igikombe,\n ";
        $response.="cya mironko cyenda kuzura (3/4),\n";
        $response.="yabira ukongeramo rwa ruvange rw’amata n’ifu\n";
        $response.="gushigisha kugeza kibize bihagije\n";
        $response .= "99)Komeza";
    }
else if ($text == "2*3*1*99*99") {
        $response = "CON Ifunguro rya 3: Igikoma cy’ifu y’ibigori kirimo amata y’inka \n\n";
        $response .= "Amata y’inka angana na kimwe cya kabiri\n cy’igikombe cya mironko (250ml)\n";
        $response.="Amazi mu gikombe cya mironko cyuzuye\n";
        $response .= " Ibiyiko 3 cyangwa 4 by’ifu y’ibigori\n";
        $response.="gucanira andi mazi angana n’igikombe,\n ";
        $response.="cya mironko cyenda kuzura (3/4),\n";
        $response.="yabira ukongeramo rwa ruvange rw’amata n’ifu\n";
        $response.="gushigisha kugeza kibize bihagije\n";
        $response .= "99)Komeza";
    }
 else if ($text == "2*3*1*99*99*99") {
        $response = "CON Ifunguro rya 3:Igikoma cy’uruvange rw’amafu (SOSOMA)\n\n";
        $response .="Ibikenewe mu gutegura ibikombe bibiri bya mironko:\n";
        $response.="Ifu y’ibigori ibiyiko 3\n";
        $response .= "Ifu y’amasaka ibiyiko 3\n";
        $response.="Ifu ya soya ikiyiko 1,\n ";
        $response.="99)Komeza,\n ";}
else if($text == "2*3*1*99*99*99*99"){
        $response.=" CON Kuvanga ya mafu yose, gufata amazi angana na kimwe,\n";
        $response.=" cya kabiri cy’igikombe cya mironko ku
        mazi yapimwe ukayavangisha ya fu ku buryo inoga neza\n";
        $response.="kubiza amazi yasigaye ku yapimwe,
    ugasukamo rwa ruvange, gushigisha kugeza kibize bihagije\n";
 }
else if ($text == "2*3*2") {
        $response = "CON Ifunguro rya 1: Ikirayi kimwe\n\n";
       $response .= " Fata ikirayi kimwe,igihate ugiteke\n";
       $response .= " nikimara gusha\n";
       $response .= " nomba neza ikirayi ugaburire umwana\n";
       $response .= " ibiryo byumwana bigomba kuba\n binobye binoze kandi bifashe bihagije\n";
       $response .= "99) komeza\n";}
else if ($text == "2*3*2") {
     $response = "CON Ifunguro rya 1: Ikirayi kimwe\n\n";
    $response .= " Fata ikirayi kimwe,igihate ugiteke\n";
    $response .= " nikimara gusha  \n";
    $response .= " nomba neza ikirayi ugaburire umwana\n";
    $response .= " ibiryo byumwana bigomba kuba\n binobye binoze kandi bifashe bihagije\n";
    $response .= "99) komeza\n";
}
else if ($text == "2*3*2*99") {
    $response = "CON Ifunguro rya 2:Igitoki Kinobye \n\n";
    $response .= " Umwana ugitangira kurya mutekere\n";
    $response .= "Igitoki kimwe nikimara gushya neza ukinombe\n";
    $response .= "umwana agomba kubirya binoze \n neza kuko nibwo atangiye kurya \n";
    $response .= "ibiryo byumwana bigomba kuba\n binobye binoze kandi bifashe bihagije\n\n";
    $response .= "99)Komeza\n";
}
else if ($text == "2*3*2*99") {
    $response = "CON Ifunguro rya 3:Ikijumba Kinobye\n\n";
    $response .= " Tekera umwana ikijumba kimwe\n";
    $response .= "Nikimara gushya neza \n";
    $response .= "urakinomba ukoresheje ikiyiko kinoge neza\n neza kuko nibwo atangiye kurya \n";
    $response .= "Ibiryo byumwana bigomba kuba\n binobye binoze kandi bifashe bihagije\n"; 
}
else if ($text == "2*3*2*99*") {
    $response = "CON Ifunguro rya 4:Imvange yibirayi n'imboga\n\n";
    $response .= "ikirayi\n";
    $response .= "Karote\n";
    $response .= "Inyanya\n";
    $response .= "Igitunguru\n"; 
    $response .= "Indagara(ziseye)\n";
    $response .= "Amavuta\n";
    $response .= "99)Komeza\n";
}
else if ($text == "2*3*2*99*99") {

    $response = "CON Uko bitegurwa:\n";
    $response .="Tunganya ibirayi(2),Karote ebyiri(2)\n";
    $response .="Igitunguru kimwe,inyanya(3) nindagara\n";
    $response .="Utuyiko 2 amavuta ikiyiko kimwe\n";
    $response .="Teka amafunguro wibuke koroshya ibiryo kugirango\n";
    $response .="ubone uko ubinomba ariko byoroshye\n";  
}
else if ($text == "2*3*3") {
    $response = "CON Ifunguro(imbuto) 1:Imineke\n\n";
    $response .= " umwana muhe imineke(2)\n";
    $response .= " yitonore uyinombere kwisahane ye\n";
    $response .= " Nibimara kunoga neza gaburira umwana\n";
    $response .= " Iyo ugaburira umwana ikintu cyambere witaho \n";
    $response .= " nisuku yibiribwa nibikoresho ukoresha\n\n";
    $response .= "99)komeza\n";}

else if ($text == "2*3*3*99") {

    $response = "CON Ifunguro(imbuto) 2: Ipapayi ihiye neza\n";
    $response .= "Fata ipapayi ihiye neza\n";
    $response .= "Uyironge namazi meza\n";
    $response .= "Hata ipapayi uyikatemo duto duto\n";
    $response .= "Niba umwana wawe aribyo atangiye kurya\n"; 
    $response .= "Nomba ipapayi inoge ntugire amazi ushyiramo,\n";
    $response .= "Cyangwa ikindi kintu cyose\n";
    $response .= "99)komeza\n";}
else if ($text == "2*3*3*99*99") {
    $response = "CON Ifunguro(imbuto) 3:Avoka ihiye neza\n";
    $response .= "Fata avoka ihiye neza\n";
    $response .= "Uyironge namazi meza\n";
    $response .= "Tonora avoka uyikatemo duto duto\n";
    $response .= "Niba umwana wawe aribwo atangiye kurya\n"; 
    $response .= "Nombera  avoka kwisahane yumwana,\n";
    $response .= "inoge neza gusa ntugire ikindi\n kintu ushyiramo habe namazi\n";
    $response .= "Gaburira ummwana ukoreshe akayiko\n";
    $response .= "99)komeza\n";}
else if ($text == "2*3*3*99*99*99") {
        $response = "CON Ifunguro(imbuto) 4:Ikinyomoro\n";
        $response .= "Fata ibinyomoro bibiri bihiye neza,\n";
        $response .= "ubyoze namazi meza\n";
        $response .= "Fata iinyomoro ugikande gake gake kugirango,\n";
        $response .= "Umutobe wegerane\n"; 
        $response .= "kata ikinyomoro hejuru, ukoresheje ikiyiko\n";
        $response .= "kuramo umutobe uwushyira kwisahane yumwana\n";
        $response .= "Gaburira umwana ukoreshe akayiko\n";
        $response .= "ibuka ko umwana umuha umutobe gusa\n";
        $response .= "99)komeza\n";}
 else if ($text == "2*3*3*99*99*99*99") {
        $response = "CON Ifunguro 5:Amata\n";
        $response .= "Fata yuzuye igikombe cya mironko,\n";
        $response .= "shyiramo amazi igice kigikombe cya mironko(1/2)\n";
        $response .= "Teka amata mwisafuriya ifite isuku\n";
        $response .= "Amata nampara kubira ishuro 2\n"; 
        $response .= "yakure kuziko uyahoze uhe umwana\n";
        $response .= "Irinde gushyira isukarimo isukari\n";
        $response .= "isuka sinziza ku mwana uri munsi\n";
        $response .= "yumwaka umwe\n";
        $response .= "99)komeza\n";}
 else if ($text == "2*3*3*99*99*99*99*99") {
            $response = "CON Ifunguro 5:porichi ivanze namata\n";
            $response .= "Fata amata igikombe cya mironko,\n";
            $response .= "shyiramo amazi igice kigikombe cya mironko\n";
            $response .= "Teka amata nampara gushyuha shyiramo\n";
            $response .= "Ibiyiko 4 bya porichi\n"; 
            $response .= "genda uvanga gake gake\n";
            $response .= "uko bigenda bishya bigenda bifata komeza\n";
            $response .= "uvangemo nibimara gutogota bikureho\n";
            $response .= "reka bihore ugaburira umwana wawe\n";
            $response .= "99)komeza\n\n";}
 else if ($text == "2*3*3*99*99*99*99*99*99") {
            $response = "CON Ifunguro rya 3:Igikoma cy’uruvange rw’amafu (SOSOMA)\n\n";
            $response .="Ibikenewe mu gutegura ibikombe bibiri bya mironko:\n";
            $response.="Ifu y’ibigori ibiyiko 3\n";
            $response .= "Ifu y’amasaka ibiyiko 3\n";
            $response.="Ifu ya soya ikiyiko 1,\n ";
            $response.="99)Komeza,\n ";
            }









// Echo the response back to the API
header('Content-type: text/plain');
echo $response;
?>
