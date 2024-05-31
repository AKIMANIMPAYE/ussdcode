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
    $response .= "0. Garuka\n";
} else if ($text == "2*1") {
    // This is a second level response where the user selected 1 in the first instance
    $response = "CON Umwana niyuzuza amezi 6,\n ";
    $response.="tangira umuhe ubundi bwoko bw’ibiryo.\n";
    $response .= "Amashereka akomeza kuba ingenzi mu bigize indyo y’umwana wawe\n";
    $response .= "99)Komeza \n";
    $response .= "0. Garuka\n";
   
}
else if ($text == "2*1*99") {
    // This is a second level response where the user selected 1 in the first instance
    $response="CON tangira umuhe ubundi bwoko bw’ibiryo.\n";
    $response .= "Umwana ugitangira kurya umugaburira inshuro byibuze 2 kumunsi\n";
    $response .= "Tangiza umwana ubwoko bumwe(urugero:ikirayi\n";
    $response .= "igitoki,igikoma,ipapayi) kigirango urebeko ntakibazo bimutera \n";
    $response .= "99) Komeza \n";
    $response .= "0. Garuka\n";
}
else if ($text == "2*1*99*99") {
    // This is a second level response where the user selected 1 in the first instance
    $response = "END Mugihe umwana umaze kubonako ibiribwa bitandukanye ntacyo \n";
    $response .= "Bimutwara tangira kujya uvanga ibiribwa kugirango indyo  \n";
    $response .= "yuzuye iboneke igizwe(ibyubaka umubiri,ibitera imbaraga ni \n";
    $response .= "ibirinda indwara) \n";

}

else if ($text == "2*0" || $text == "2*1*0" || $text == "2*1*99*0" || $text == "2*1*99*99*0"){

    $response  = "CON Turwanye imirire mibi mubana\n\n";
   $response .= "1) Amezi 6 yambere\n";
   $response .= "2) Amezi 6 kugeza kumezi 9\n";
   $response .= "3) Amezi 9 kugeza ku mwaka \n";
   $response .= "4) Umwaka kugeza ku myaka 2 \n";
   $response .= "5) Imyaka 2 kugeza ku myaka 5 \n";
                   }
else if ($text == "2*2") {
    // This is a second level response where the user selected 2 in the first instance
    $response = "CON Ibigize indyo yuzuye\n\n";
    $response .= "1) Ibitera imbaraga\n";
    $response .= "2) Ibyubaka umubiri \n";
    $response .= "3) Ibirinda indwara\n";
    $response .= "0) Garuka \n";
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
    $response = "CON Ibiribwa bitera imbaraga(ibinyamafufu)\n\n";
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
    $response = "CON Ibyubaka umubiri(Ibinyameke n'ibikomoka ku matungo)\n\n";
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
    $response .= "0) Garuka";
} else if ($text == "2*2*3*99") {
    // Second part of response for 2*2*3
    $response = "CON Ibirinda indwara(imboga n'imbuto)\n\n";
    $response .= "-Isombe\n";
    $response .= "-Amashu\n";
    $response .= "-Ibishayote\n";
    $response .= "-Karote\n";
    $response .= "-Imiteja\n";
    $response .= "-Ibisusa\n";
    $response .= "-Avoka\n";
    $response .= "-Imineke\n";
    $response .= "0) Garuka";
}
else if ($text == "2*3") {
    $response = "CON Tegura indyo yuzuye \n\n";
    $response .= "1)Mugitondo\n";
    $response .= "2) saa sita \n";
    $response .= "3) Igicamunsi \n";
    $response .= "4) Nimugoroba\n";
    $response .= "0) Garuka";
}
else if ($text == "2*3*1") {
     $response = "CON Ifunguro rya 1: Igikoma cy’ifu y’amasaka kirimo amata y’inka\n\n";
    $response .= " Amata y’inka angana na kimwe cya kabiri,\n";
    $response .= "  cy’igikombe cya mironko (250 ml) \n";
    $response .= " Amazi mu gikombe cya mironko \n";
    $response .= " Ifu y’amasaka: Ibiyiko 4 cyangwa 5\n";
    $response .= " Gufata amata ukavanga n’ifu bikanoga\n";
    $response .= "99)komeza\n";
    $response .= "0) Garuka";
}
else if ($text == "2*3*1*99") {
        $response = "CON Igikoma cy’ifu y’amasaka kirimo amata y’inka \n\n";
        $response .= "kubivanga n’amazi yenda kuzura igikombe,\n";
        $response.="cya mironko (3/4) bikanoga neza\n";
        $response .= "gucanira andi mazi angana n’ igikombe cya mironko,\n";
        $response.="cyenda kuzura (3/4) cyabira ukongeramo (rwa ruvange rw’amata n’ifu\n";
        $response .= "gushigisha kugeza kibize bihagije\n";
        $response .= "99)Komeza\n";
        $response .= "0) Garuka \n";
    }

else if ($text == "2*3*1*99*99") {
        $response = "CON Ifunguro rya 2:Igikoma cy’ifu y’ibigori kirimo amata y’inka \n\n";
        $response .= "Amata y’inka angana na kimwe cya kabiri,\n";
        $response.="cy’igikombe cya mironko (250ml),\n";
        $response .= "Amazi mu gikombe cya mironko cyuzuye,\n";
        $response.="Ibiyiko 3 cyangwa 4 by’ifu y’ibigori\n";
        $response .= "99)Komeza\n";
        $response .= "0) Garuka \n";
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
        $response .= "99)Komeza\n";
        $response .= "0) Garuka \n";
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
        $response .= "99)Komeza\n";
        $response .= "0) Garuka";
    }
 else if ($text == "2*3*1*99*99*99") {
        $response = "CON Ifunguro rya 3:Igikoma cy’uruvange rw’amafu (SOSOMA)\n\n";
        $response .="Ibikenewe mu gutegura ibikombe bibiri bya mironko:\n";
        $response.="Ifu y’ibigori ibiyiko 3\n";
        $response .= "Ifu y’amasaka ibiyiko 3\n";
        $response.="Ifu ya soya ikiyiko 1,\n ";
        $response.="99)Komeza,\n ";
        $response .= "0) Garuka \n";
    }
else if($text == "2*3*1*99*99*99*99"){
        $response.=" CON Kuvanga ya mafu yose, gufata amazi angana na kimwe,\n";
        $response.=" cya kabiri cy’igikombe cya mironko ku
        mazi yapimwe ukayavangisha ya fu ku buryo inoga neza\n";
        $response.="kubiza amazi yasigaye ku yapimwe,
    ugasukamo rwa ruvange, gushigisha kugeza kibize bihagije\n";
    $response .= "0) Garuka \n";
 }
else if ($text == "2*3*2") {
        $response = "CON Ifunguro rya 1: Ikirayi kimwe\n\n";
       $response .= " Fata ikirayi kimwe,igihate ugiteke\n";
       $response .= " nikimara gusha\n";
       $response .= " nomba neza ikirayi ugaburire umwana\n";
       $response .= " ibiryo byumwana bigomba kuba\n binobye binoze kandi bifashe bihagije\n";
       $response .= "99) komeza\n";
       $response .= "0) Garuka \n";
    }
else if ($text == "2*3*2") {
     $response = "CON Ifunguro rya 1: Ikirayi kimwe\n\n";
    $response .= " Fata ikirayi kimwe,igihate ugiteke\n";
    $response .= " nikimara gusha  \n";
    $response .= " nomba neza ikirayi ugaburire umwana\n";
    $response .= " ibiryo byumwana bigomba kuba\n binobye binoze kandi bifashe bihagije\n";
    $response .= "99) komeza\n";
    $response .= "0) Garuka \n";
}
else if ($text == "2*3*2*99") {
    $response = "CON Ifunguro rya 2:Igitoki Kinobye \n\n";
    $response .= " Umwana ugitangira kurya mutekere\n";
    $response .= "Igitoki kimwe nikimara gushya neza ukinombe\n";
    $response .= "umwana agomba kubirya binoze \n neza kuko nibwo atangiye kurya \n";
    $response .= "ibiryo byumwana bigomba kuba\n binobye binoze kandi bifashe bihagije\n";
    $response .= "99)Komeza\n";
    $response .= "0) Garuka \n";
}
else if ($text == "2*3*2*99") {
    $response = "CON Ifunguro rya 3:Ikijumba Kinobye\n\n";
    $response .= " Tekera umwana ikijumba kimwe\n";
    $response .= "Nikimara gushya neza \n";
    $response .= "urakinomba ukoresheje ikiyiko kinoge neza\n neza kuko nibwo atangiye kurya \n";
    $response .= "Ibiryo byumwana bigomba kuba\n binobye binoze kandi bifashe bihagije\n"; 
    $response .= "0) Garuka \n";
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
    $response .= "0) Garuka \n";
}
else if ($text == "2*3*2*99*99") {

    $response = "CON Uko bitegurwa:\n";
    $response .="Tunganya ibirayi(2),Karote ebyiri(2)\n";
    $response .="Igitunguru kimwe,inyanya(3) nindagara\n";
    $response .="Utuyiko 2 amavuta ikiyiko kimwe\n";
    $response .="Teka amafunguro wibuke koroshya ibiryo kugirango\n";
    $response .="ubone uko ubinomba ariko byoroshye\n";  
    $response .= "99)Komeza\n";
    $response .= "0) Garuka \n";
}
else if ($text == "2*3*2*99*99*99") {
    $response = "CON Ifunguro 5:porichi ivanze namata\n";
    $response .= "Fata amata igikombe cya mironko,\n";
    $response .= "shyiramo amazi igice kigikombe cya mironko\n";
    $response .= "Teka amata nampara gushyuha shyiramo\n";
    $response .= "Ibiyiko 4 bya porichi\n"; 
    $response .= "genda uvanga gake gake\n";
    $response .= "uko bigenda bishya bigenda bifata komeza\n";
    $response .= "uvangemo nibimara gutogota bikureho\n";
    $response .= "reka bihore ugaburira umwana wawe\n";
    $response .= "99)komeza\n";
    $response .= "0) Garuka \n";
}

else if ($text == "2*3*3") {
    $response = "CON Ifunguro(imbuto) 1:Imineke\n\n";
    $response .= " umwana muhe imineke(2)\n";
    $response .= " yitonore uyinombere kwisahane ye\n";
    $response .= " Nibimara kunoga neza gaburira umwana\n";
    $response .= " Iyo ugaburira umwana ikintu cyambere witaho \n";
    $response .= " nisuku yibiribwa nibikoresho ukoresha\n\n";
    $response .= "99)komeza\n";
    $response .= "0) Garuka \n";
}

else if ($text == "2*3*3*99") {

    $response = "CON Ifunguro(imbuto) 2: Ipapayi ihiye neza\n";
    $response .= "Fata ipapayi ihiye neza\n";
    $response .= "Uyironge namazi meza\n";
    $response .= "Hata ipapayi uyikatemo duto duto\n";
    $response .= "Niba umwana wawe aribyo atangiye kurya\n"; 
    $response .= "Nomba ipapayi inoge ntugire amazi ushyiramo,\n";
    $response .= "Cyangwa ikindi kintu cyose\n";
    $response .= "99)komeza\n";
    $response .= "0) Garuka \n";
}
else if ($text == "2*3*3*99*99") {
    $response = "CON Ifunguro(imbuto) 3:Avoka ihiye neza\n";
    $response .= "Fata avoka ihiye neza\n";
    $response .= "Uyironge namazi meza\n";
    $response .= "Tonora avoka uyikatemo duto duto\n";
    $response .= "Niba umwana wawe aribwo atangiye kurya\n"; 
    $response .= "Nombera  avoka kwisahane yumwana,\n";
    $response .= "inoge neza gusa ntugire ikindi\n kintu ushyiramo habe namazi\n";
    $response .= "Gaburira ummwana ukoreshe akayiko\n";
    $response .= "99)komeza\n";
    $response .= "0) Garuka \n";
}
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
        $response .= "99)komeza\n";
        $response .= "0) Garuka \n";
    }
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
        $response .= "99)komeza\n";
        $response .= "0) Garuka \n";
    }
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
            $response .= "99)komeza\n\n";
            $response .= "0) Garuka \n";
        }
 else if ($text == "2*3*3*99*99*99*99*99*99") {
            $response = "CON Ifunguro rya 3:Igikoma cy’uruvange rw’amafu (SOSOMA)\n\n";
            $response .="Ibikenewe mu gutegura ibikombe bibiri bya mironko:\n";
            $response.="Ifu y’ibigori ibiyiko 3\n";
            $response .= "Ifu y’amasaka ibiyiko 3\n";
            $response.="Ifu ya soya ikiyiko 1,\n ";
            $response.="99)Komeza,\n ";
            $response .= "0) Garuka \n";
            }
            else if ($text == "2*3*4") {
            $response = "CON Ifunguro rya 1:\n Igitoki,amashaza,inyanya,karote.\n";
            $response .= " Fata ibitoki 2,amashaza ibiyiko 2,inyanya 3,\n";
            $response .= "karote 2,igitunguro kimwe\n";
            $response .= " bitungaye byose ubiteke ushyiremo amazi\n";
            $response .= " ahagije teka ibiryo bishye cyane\n";
            $response .= " nomba neza ibiryo binoge\n cg ukoresheje(blender)\n";
            $response .= "niba uyifite.\n Gaburira umwana wawe ukoresheje akayiko\n";
            $response .= "99)komeza\n";
            $response .= "0) Garuka \n";
        }
            else if ($text == "2*3*4*99") {
                $response = "CON Ifunguro rya 2:\n\n";
                $response .= "(Ikirayi,dodo,inyanya,amavuta).\n";
                $response .= "Fata ibirayi 2,imboga nyeyainyanya 3,\n";
                $response .= "amavuta 2,igitunguro kimwe\n";
                $response .= "bitungaye byose ubiteke ushyiremo amazi\n";
                $response .= "ahagije teka ibiryo bishye cyane\n";
                $response .= "nomba neza ibiryo binoge\n cg ukoresheje(blender)\n";
                $response .= "niba uyifite.\n Gaburira umwana wawe ukoresheje akayiko\n";
                $response .= "99)komeza\n";
                $response .= "0) Garuka \n";
            }
                else if ($text == "2*3*4*99*99") {
                    $response = "CON Ifunguro 3:porichi ivanze namata\n";
                    $response .= "Fata amata igikombe cya mironko,\n";
                    $response .= "shyiramo amazi igice kigikombe cya mironko\n";
                    $response .= "Teka amata nampara gushyuha shyiramo\n";
                    $response .= "Ibiyiko 4 bya porichi\n"; 
                    $response .= "genda uvanga gake gake\n";
                    $response .= "uko bigenda bishya bigenda bifata komeza\n";
                    $response .= "uvangemo nibimara gutogota bikureho\n";
                    $response .= "reka bihore ugaburira umwana wawe\n";
                    $response .= "99)komeza\n";
                    $response .= "0) Garuka \n";
                }
                    else if ($text == "2*3*4*99*99*99") {
                        $response = "CON Ifunguro rya 4:Ikijumba Kinobye\n\n";
                        $response .= "Tekera umwana ikijumba kimwe\n";
                        $response .= "Nikimara gushya neza \n";
                        $response .= "urakinomba ukoresheje ikiyiko kinoge neza\n neza kuko nibwo atangiye kurya \n";
                        $response .= "Ibiryo byumwana bigomba kuba\n binobye binoze kandi bifashe bihagije\n"; 
                        $response .= "99)komeza\n";
                        $response .= "0) Garuka \n";
                    }
            else if($text == "2*3*4*99*99*99*99")
                  {
                    $response = "CON Ifunguro rya 5:\n";
                    $response.="(Amakaroni yabana,\n igi,karote,inyanya)\n";
                    $response .= "Tunganya koroti 2,inyanya 3,amavuta akayiko 1\n";
                    $response .= "karanga karote nizimara kuba\n";
                    $response .= "umutura,shyiramo inyanya\n";
                    $response .= " shyiramo amazi arengeye ho gato\n"; 
                    $response .= " shyiramo shyiramo igi rimwe na makaroni zabana\n"; 
                    $response .= "99)komeza\n";
                    $response .= "0) Garuka \n";
                }
                    else if($text == "2*3*4*99*99*99*99*99")
                  {
                    $response = "CON Ifunguro rya 5:\n";
                    $response .= " shyiramo shyiramo igi rimwe na makaroni zabana\n"; 
                    $response .= "komeza ucanire nyuma yiminota 8 kuramo igi uritonore\n"; 
                    $response .= "urishyiremo ritonoye cishamo akuko ubireke bishye neza\n"; 
                    $response .= "bimpaze gushya nomba neza ibiryo binoge ugaburire umwana\n"; 
                    $response .= "99)komeza\n";
                    $response .= "0) Garuka \n";
                }

                    //  Amezi 9 kugeza ku mwaka(1)

                    else if ($text == "3") {
                        // Business logic for first level response
                        // This is a terminal request. Note how we start the response with END
                        $response = "CON Imirire \n\n";
                        $response .= "1) Abwiriza  \n";
                        $response .= "2) Ibiribwa\n";
                        $response .= "3) Amafunguro\n";
                        $response .= "0) Garuka";
                    } else if ($text == "3*1") {
                        // This is a second level response where the user selected 1 in the first instance
                        $response = "CON Umwana niyuzuza amezi 9 kugeza ku mwaka,\n ";
                        $response.="Komeza konsa umwana wawe ku manywa na ninjoro uko abishatse.\n";
                        $response .= "Ibi bizatuma agumya kugira ubuzima bwiza n’imbaraga,\n";
                        $response .= "99)Komeza\n";
                        $response .= "0) Garuka"; 
                    }
                    else if ($text == "3*1*99") {
                        // This is a second level response where the user selected 1 in the first instance
                        $response="CON kubera ko amashereka aba akiri ingenzi mu bigize indyo y’umwana.\n";
                        $response .= "Amashereka atanga kimwe cyakabiri cy’imbaraga umwana\n ";
                        $response .= " akeneye igihe afite amezi 6 kugeza kuri 12\n";
                        $response .= " Gaburira umwana wawe inshuro 4 ku munsi\n";
                        $response .= "Muhe ku biryo n’abandi bafata mu rugo,binombye cyane,\n";
                        $response .= "99) Komeza \n";
                        $response .= "0) Garuka \n";
                    }
                    else if ($text == "3*1*99*99") {
                        // This is a second level response where the user selected 1 in the first instance
                        $response .= "END Koresha isahani yihariye kugira ngo wizere ko umwana\n";
                        $response .= "arangiza ibiryo wamugeneye.\n";
                        $response .= " Gerageza kumugaburira ibiryo binyuranye kuri buri funguro.\n";
                        $response .="Ibiryo bikomoka ku matungo, ibinyampeke\n";
                       $response .=" ibinyamizi n’ibinyabijumba; imboga n’imbuto\n";
                    } 
                    else if ($text == "3*2") {
                        // This is a second level response where the user selected 2 in the first instance
                        $response = "CON Ibigize indyo yuzuye\n\n";
                        $response .= "1) Ibitera imbaraga\n";
                        $response .= "2) Ibyubaka umubiri \n";
                        $response .= "3) Ibirinda indwara\n";
                    } else if ($text == "3*2*1") {
                        // First part of response for 2*2*1
                        $response = "CON Ibiribwa bitera imbaraga(ibinyamafufu)\n\n";
                        $response .= "-Ibirayi\n";
                        $response .= "-Igitoki\n";
                        $response .= "-Ibihaza\n";
                        $response .= "-Amakaroni y'abana\n";
                        $response .= "-Ibijumba\n";
                        $response .= "99) Komeza\n"; // Adding a next option for continuation
                    } else if ($text == "3*2*1*99") {
                        // Second part of response for 2*2*1
                        $response = "CON Ibiribwa bitera imbaraga(ibinyamafufu)\n\n";
                        $response .= "-Kawunga\n";
                        $response .= "-Imyumbati\n";
                        $response .= "-Amateke\n";
                        $response .= "-Ibigori\n";
                        $response .= "-Umuceri\n";
                        $response .= "-Ibikoro\n";
                    } else if ($text == "3*2*2") {
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
                    } else if ($text == "3*2*2*99") {
                        // Second part of response for 2*2*2
                        $response = "CON Ibyubaka umubiri(Ibinyameke n'ibikomoka ku matungo)\n\n";
                        $response .= "-Inyama\n";
                        $response .= "-Ibishyimbo\n";
                        $response .= "-Indagara\n";
                        $response .= "-Amata\n";
                        $response .= "-Uburo\n";
                        $response .= "-Uvuta y'inka\n";
                        
                    } else if ($text == "3*2*3") {
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
                        $response.="amaronji\n";
                        $response .= "99) Komeza\n"; // Adding a next option for continuation
                    } else if ($text == "3*2*3*99") {
                        // Second part of response for 2*2*3
                        $response = "CON Ibirinda indwara(imboga n'imbuto) \n\n";
                        $response .= "-Isombe\n";
                        $response .= "-Amashu\n";
                        $response .= "-Ibishayote\n";
                        $response .= "-Karote\n";
                        $response .= "-Imiteja\n";
                        $response .= "-Ibisusa\n";
                        $response .= "-Avoka\n";
                        $response .= "-Imineke\n";
                        $response .= "-shoufrere\n";
                    }
                    else if ($text == "3*3") {
                        $response = "CON Tegura indyo yuzuye \n\n";
                        $response .= "1)Mugitondo\n";
                        $response .= "2) saa sita \n";
                        $response .= "3) Igicamunsi \n";
                        $response .= "4) Nimugoroba\n";
                    }
                    else if ($text == "3*3*1") {
                         $response = "CON Ifunguro rya 1: Porichi n'amata\n\n";
                        $response .= " Amata y’inka angana \n";
                        $response .= "  n’igikombe cya mironko\n";
                        $response .= " shyiramo amazi kimwe cya kabiri cyicyo gikombe \n";
                        $response .= " shyiramo ibiyiko 4 bya porichi\n";
                        $response .= " shyira kuziko ucanire ukomeze ukorogemo\n";
                        $response .= " ukoreshe umwuko\n";
                        $response .= "99)komeza\n";}
                    else if ($text == "3*3*1*99") {
                            $response ="CON uko bigenda bishyuha biraza gufata \n";
                            $response .="nibimara kubira bikureho.\n";
                            $response.="Gaburira umwana\n";
                            $response.="Amafunguro yumwana agomba kuba afashe,\n";
                            $response .="ibyo ubibwirwa nuko bifashe kukiyiko\n";
                            $response .="99)Komeza";
                        }
                    
                    else if ($text == "3*3*1*99*99") {
                            $response = "CON Ifunguro rya 2:Igikoma cy’ifu y’ibigori kirimo amata y’inka \n\n";
                            $response .= "Koresha Amata y’inka angana na kimwe cya kabiri,\n";
                            $response.="cy’igikombe cya mironko,\n";
                            $response .= "shyiramo amazi kimwe cyakabiri kicyo gikombe,\n";
                            $response.=" Ibiyiko 3 cyangwa 4 by’ifu y’ibigori\n";
                            $response .= "99)Komeza";
                        }
                    else if ($text == "3*3*1*99*99") {
                            $response = "CON bivange byose kuburyo ubona \n";
                            $response .= "icyanga cyabyo cyanoze,\n";
                            $response.="Canira amazi igikombe kimwe namara kubira\n";
                            $response.="ongeramo rwa ruvange rw’amata n’ifu\n";
                            $response.="shigisha kugeza kibize bihagije\n";
                            $response.="hoza igikoma uhe umwana,\n";
                            $response.=" Gaburira nubona nashaka kwigaburira mureke abyige\n";
                            $response .= "99)Komeza";
                        }
                    else if ($text == "3*3*1*99*99") {
                            $response = "CON Ifunguro rya 3: Igikoma cy’ifu y’ibigori kirimo amata y’inka \n\n";
                            $response .= "koresha amata yinka igikombe kimwe \n";
                            $response.="yashyire mwisafuriya usukemo kimwe\n";
                            $response.=" cyakabiri cyamazi kigikombe wakoresheje\n";
                            $response .= "shyiramo Ibiyiko 3 cyangwa 4 by’ifu y’ibigori\n";
                            $response.="canira andi mazi angana n’igikombe,\n ";
                            $response.="kimwe namara kubira ongeramo,\n";
                            $response.=" rwa ruvange rw’amata n’ifu\n";
                            $response.="shigisha kugeza kibize bihagije\n";
                            $response .= "99)Komeza";
                        }
                     else if ($text == "3*3*1*99*99*99") {
                            $response = "CON Ifunguro rya 3:Igikoma cy’uruvange rw’amafu (SOSOMA)\n\n";
                            $response .="Ibikenewe mu gutegura ibikombe bibiri bya mironko:\n";
                            $response.="Ifu y’ibigori ibiyiko 3\n";
                            $response .= "Ifu y’amasaka ibiyiko 3\n";
                            $response.="Ifu ya soya ikiyiko 1,\n ";
                            $response.="99)Komeza ";}
                    else if($text == "3*3*1*99*99*99*99"){
                            $response.=" CON vanga ya mafu yose,fata amazi angana na kimwe,\n";
                            $response.=" cya kabiri cy’igikombe cya mironko ku\n";
                            $response.="uvangisha ya fu ku buryo inoga neza\n";
                            $response.="Teka amazi igikombe kimwe\n";
                            $response.=" namara kubira sukamo rwa ruvange,\n";
                            $response.="shigisha kugeza kibize bihagije\n";
                            $response.="99)Komeza ";}
                     else if ($text == "3*3*1*99*99*99*99") {
                        $response = "CON Ifunguro rya 4:Igikoma cy'ingano kivanze namasaka\n\n";
                        $response .="fata ibiyiko 2 byifu yamasaka :\n";
                        $response.="Ifu y’ingano ibiyiko 3\n";
                        $response .= "bishyire mwisafuriya ushyiremo ibikombe\n";
                        $response.="bibiri byamazi korogamo icyange kinoge \n ";
                        $response.="ushyire kuziko\n";
                        $response.="99)Komeza ";}
                else if($text == "3*3*1*99*99*99*99"){
                        $response.=" CON  komeza gukorogamo paka igikoma kibize\n";
                        $response.=" igikoma cyumwana kigomba kuba gifashe\n";
                        $response.="igihe kimaze kubira gikureho ugihoze\n";
                        $response.="gaburira umwana igikoma\n";}
                    else if ($text == "3*3*2") {
                        $response = "CON Ifunguro rya 1: Inyama ziseye ,karote n'umuceri\n\n";
                        $response .= " Fata inyama irobo  uziteke uzishye nakamashini\n";
                        $response .= " Tunganya korote ebyiri,inyanya enye uzikate\n";
                        $response .= " nkaranga korote ushyiremo inyanya na zanyama\n";
                        $response .= " twaseye ushyiremo amazi igikombe kimwe\n";
                        $response .= " cyamazi ubireke bibire iminota icumi\n";
                        $response .= "99) komeza\n";}

                        else if ($text == "3*3*2*99") {
                            $response = "CON  tunganya umuceri kimwe cyakabiri\n\n";
                            $response .= " cyigikombe cya mironko\n";
                            $response .= " teka umuceri ushye ariko ntuwumutse cyane \n";
                            $response .= " hasigaremo utuzi dukeya\n";
                            $response .= " arura ibiyiko 4 byumuceri ushyiremo ibiyiko\n";
                            $response .= " bitatu byisosi watetse mbere \n";
                            $response .= " Nombera umwana umugaburire\n";
                            $response .= "99) komeza\n";}

                    else if ($text == "3*3*2*99*99") {
                        $response = "CON Ifunguro rya 2: Invange y'ibirayi\n\n";
                        $response .= " Koresha ibirayi 3 biri mu rugero,\n";
                        $response .= "Umufungo w’imboga rwatsi,\n";
                        $response .= " Ikiyiko cy’amavuta,Igitunguru,Inyanya eshatu, \n";
                        $response .= "ibiyiko bibiri byindagara ziseye\n";
                        $response .= "99)Komeza\n";
                    }
                    else if ($text == "3*3*2*99*99*99") {
                        $response = "CON bitegure nurangiza ubikarange,\n";
                        $response .= "bikiri bibisi ushyiremo amazi ibikombe \n";
                        $response .= "bibiri ucanire bishye \n";
                        $response .= "nombera umwana gusa utabinoza cyane\n";
                        $response .= "Ibiryo byumwana bigomba kuba\n binobye binoze kandi bifashe bihagije\n";
                        $response .= "99)Komeza\n"; 
                    }
                    else if ($text == "3*3*2*99*99*99*99") {
                        $response = "CON Ifunguro rya 4:Imvange yibitoki n'imboga\n\n";
                        $response .= "igitoki\n";
                        $response .= "Karote\n";
                        $response .= "Inyanya\n";
                        $response .= "Igitunguru\n"; 
                        $response .= "Indagara(ziseye)\n";
                        $response .= "Amavuta\n";
                        $response .= "99)Komeza\n";
                    }
                    else if ($text == "3*3*2*99*99*99*99*99") {
                    
                        $response = "CON Uko bitegurwa:\n";
                        $response .="Tunganya ibitoki(4),Karote ebyiri(2)\n";
                        $response .="Igitunguru kimwe,inyanya(3) nindagara\n";
                        $response .="Utuyiko 2 amavuta ikiyiko kimwe\n";
                        $response .="Teka amafunguro wibuke koroshya ibiryo kugirango\n";
                        $response .="ubone uko ubinomba ariko byoroshye\n";  
                        $response .= "99)Komeza\n";
                    }
                    else if ($text == "3*3*2*99*99*99*99*99") {
                        $response = "END Ifunguro 5:porichi ivanze namata\n";
                        $response .= "Fata amata igikombe cya mironko,\n";
                        $response .= "shyiramo amazi igice kigikombe cya mironko\n";
                        $response .= "Teka amata nampara gushyuha shyiramo\n";
                        $response .= "Ibiyiko 4 bya porichi\n"; 
                        $response .= "genda uvanga gake gake\n";
                        $response .= "uko bigenda bishya bigenda bifata komeza\n";
                        $response .= "uvangemo nibimara gutogota bikureho\n";
                        $response .= "reka bihore ugaburira umwana wawe\n";
                    }

                    else if ($text == "3*3*3") {
                        $response = "CON Ifunguro(imbuto) 1:Imineke\n\n";
                        $response .= " umwana muhe imineke(2)\n";
                        $response .= " yitonore uyinombere kwisahane ye\n";
                        $response .= " Nibimara kunoga neza gaburira umwana\n";
                        $response .= " Iyo ugaburira umwana ikintu cyambere witaho \n";
                        $response .= " nisuku yibiribwa nibikoresho ukoresha\n\n";
                        $response .= "99)komeza\n";}
                    
                    else if ($text == "3*3*3*99") {
                    
                        $response = "CON Ifunguro(imbuto) 2: Ipapayi ihiye neza\n";
                        $response .= "Fata ipapayi ihiye neza\n";
                        $response .= "Uyironge namazi meza\n";
                        $response .= "Hata ipapayi uyikatemo duto duto\n";
                        $response .= "Niba umwana wawe aribyo atangiye kurya\n"; 
                        $response .= "Nomba ipapayi inoge ntugire amazi ushyiramo,\n";
                        $response .= "Cyangwa ikindi kintu cyose\n";
                        $response .= "99)komeza\n";}
                    else if ($text == "3*3*3*99*99") {
                        $response = "CON Ifunguro(imbuto) 3:Avoka ihiye neza\n";
                        $response .= "Fata avoka ihiye neza\n";
                        $response .= "Uyironge namazi meza\n";
                        $response .= "Tonora avoka uyikatemo duto duto\n";
                        $response .= "Niba umwana wawe aribwo atangiye kurya\n"; 
                        $response .= "Nombera  avoka kwisahane yumwana,\n";
                        $response .= "inoge neza gusa ntugire ikindi\n kintu ushyiramo habe namazi\n";
                        $response .= "Gaburira ummwana ukoreshe akayiko\n";
                        $response .= "99)komeza\n";}
                    else if ($text == "3*3*3*99*99*99") {
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
                     else if ($text == "3*3*3*99*99*99*99") {
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
                     else if ($text == "3*3*3*99*99*99*99*99") {
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
                     else if ($text == "3*3*3*99*99*99*99*99*99") {
                                $response = "CON Ifunguro rya 3:Igikoma cy’uruvange rw’amafu (SOSOMA)\n\n";
                                $response .="Ibikenewe mu gutegura ibikombe bibiri bya mironko:\n";
                                $response.="Ifu y’ibigori ibiyiko 3\n";
                                $response .= "Ifu y’amasaka ibiyiko 3\n";
                                $response.="Ifu ya soya ikiyiko 1,\n ";
                                $response.="99)Komeza,\n ";
                                }
                                else if ($text == "3*3*4") {
                                $response = "CON Ifunguro rya 1:\n Igitoki,amashaza,inyanya,karote.\n";
                                $response .= " Fata ibitoki 2,amashaza ibiyiko 2,inyanya 3,\n";
                                $response .= "karote 2,igitunguro kimwe\n";
                                $response .= " bitungaye byose ubiteke ushyiremo amazi\n";
                                $response .= " ahagije teka ibiryo bishye cyane\n";
                                $response .= " nomba neza ibiryo binoge\n cg ukoresheje(blender)\n";
                                $response .= "niba uyifite.\n Gaburira umwana wawe ukoresheje akayiko\n";
                                $response .= "99)komeza\n";}
                                else if ($text == "3*3*4*99") {
                                    $response = "CON Ifunguro rya 2:\n\n";
                                    $response .= "(Ikirayi,dodo,inyanya,amavuta).\n";
                                    $response .= "Fata ibirayi 2,imboga nyeyainyanya 3,\n";
                                    $response .= "amavuta 2,igitunguro kimwe\n";
                                    $response .= "bitungaye byose ubiteke ushyiremo amazi\n";
                                    $response .= "ahagije teka ibiryo bishye cyane\n";
                                    $response .= "nomba neza ibiryo binoge\n cg ukoresheje(blender)\n";
                                    $response .= "niba uyifite.\n Gaburira umwana wawe ukoresheje akayiko\n";
                                    $response .= "99)komeza\n";}
                                    else if ($text == "3*3*4*99*99") {
                                        $response = "CON Ifunguro 3:porichi ivanze namata\n";
                                        $response .= "Fata amata igikombe cya mironko,\n";
                                        $response .= "shyiramo amazi igice kigikombe cya mironko\n";
                                        $response .= "Teka amata nampara gushyuha shyiramo\n";
                                        $response .= "Ibiyiko 4 bya porichi\n"; 
                                        $response .= "genda uvanga gake gake\n";
                                        $response .= "uko bigenda bishya bigenda bifata komeza\n";
                                        $response .= "uvangemo nibimara gutogota bikureho\n";
                                        $response .= "reka bihore ugaburira umwana wawe\n";
                                        $response .= "99)komeza\n";}
                                        else if ($text == "3*3*4*99*99*99") {
                                            $response = "CON Ifunguro rya 4:Ikijumba Kinobye\n\n";
                                            $response .= "Tekera umwana ikijumba kimwe\n";
                                            $response .= "Nikimara gushya neza \n";
                                            $response .= "urakinomba ukoresheje ikiyiko kinoge neza\n neza kuko nibwo atangiye kurya \n";
                                            $response .= "Ibiryo byumwana bigomba kuba\n binobye binoze kandi bifashe bihagije\n"; 
                                            $response .= "99)komeza\n";}
                                else if($text == "3*3*4*99*99*99*99")
                                      {
                                        $response = "CON Ifunguro rya 5:\n";
                                        $response.="(Amakaroni yabana,\n igi,karote,inyanya)\n";
                                        $response .= "Tunganya koroti 2,inyanya 3,amavuta akayiko 1\n";
                                        $response .= "karanga karote nizimara kuba\n";
                                        $response .= "umutura,shyiramo inyanya\n";
                                        $response .= " shyiramo amazi arengeye ho gato\n"; 
                                        $response .= " shyiramo shyiramo igi rimwe na makaroni zabana\n"; 
                                        $response .= "99)komeza\n";}
                                        else if($text == "3*3*4*99*99*99*99*99")
                                      {
                                        $response = "CON Ifunguro rya 5:\n";
                                        $response .= " shyiramo shyiramo igi rimwe na makaroni zabana\n"; 
                                        $response .= "komeza ucanire nyuma yiminota 8 kuramo igi uritonore\n"; 
                                        $response .= "urishyiremo ritonoye cishamo akuko ubireke bishye neza\n"; 
                                        $response .= "bimpaze gushya nomba neza ibiryo binoge ugaburire umwana\n"; 
                                        $response .= "99)komeza\n";}

                                        // umwaka kugeza ku myaka 2
                         

                    else if ($text == "4") {
                        // Business logic for first level response
                        // This is a terminal request. Note how we start the response with END
                        $response = "CON Imirire \n\n";
                        $response .= "1) Abwiriza  \n";
                        $response .= "2) Ibiribwa\n";
                        $response .= "3) Amafunguro\n";
                    } else if ($text == "4*1") {
                        // This is a second level response where the user selected 1 in the first instance
                        $response = "CON Umwana ugejeje umwaka aba yatangiye kumera amenyo,\n ";
                        $response.="Umwana abageze mukigero cyuko aba ashaka kwirisha .\n";
                        $response .= "kandi abishishikariye, aha umwana ntabwo \n";
                        $response .= "99)Komeza \n";
                       
                    }
                    else if ($text == "4*1*99") {
                        // This is a second level response where the user selected 1 in the first instance
                        $response="CON abakirya ibiryo binobye binoze cyane.\n";
                        $response .= "Ibiribwa nkimbuto byo abatangiye kubirya bitanobye.\n ";
                        $response .= "Komeza konsa umwana wawe kugeza agize imyaka ibiri\n";
                        $response .= "Anso umwana wawe nyuma yo kurya\n";
                        $response .= " Gaburira umwana wawe inshuro 4 cg 5 ku munsi\n";
                        $response .= "99) Komeza\n";
                    }
                    else if ($text == "4*1*99*99") {
                        // This is a second level response where the user selected 1 in the first instance
                        $response = "CON Koresha isahani yihariye kugira ngo wizere ko umwana\n";
                        $response .= "yamaze amafunguro wamuhaye ikindi ugomba kwita kwisuku cyane.\n";
                        $response .= " Gerageza kumugaburira ibiryo binyuranye kuri buri funguro.\n";
                        $response .="Ibiryo bikomoka ku matungo, ibinyampeke\n";
                       $response.="99)Komeza\n"; 
                    } 
                    else if ($text == "4*1*99*99") {
                        // This is a second level response where the user selected 1 in the first instance
                    
                       $response =" END ibinyamizi n’ibinyabijumba; imboga n’imbuto\n";
                       $response.=" Muhe ku biryo n’abandi bafata mu rugo,binombye\n";
                       $response.=" cyangwa bicagaguyemo uduce duto, ndetse n’ibiryo bifatishwa intoki.\n";  
                       $response.="Umwana mugihe ashaka gukoramo akirisha mureke abyige.\n"; 
                    }
                    
                    else if ($text == "4*2") {
                        // This is a second level response where the user selected 2 in the first instance
                        $response = "CON Ibigize indyo yuzuye\n\n";
                        $response .= "1) Ibitera imbaraga\n";
                        $response .= "2) Ibyubaka umubiri \n";
                        $response .= "3) Ibirinda indwara\n";
                    } else if ($text == "4*2*1") {
                        // First part of response for 2*2*1
                        $response = "CON Ibiribwa bitera imbaraga(ibinyamafufu)\n\n";
                        $response .= "-Ibirayi\n";
                        $response .= "-Igitoki\n";
                        $response .= "-Ibihaza\n";
                        $response .= "-Amakaroni y'abana\n";
                        $response .= "99)Komeza"; // Adding a next option for continuation
                    } 
                    else if ($text == "4*2*1*99") {
                        // First part of response for 2*2*1
                        $response = "CON Ibiribwa bitera imbaraga(ibinyamafufu)\n\n";
                        $response .= "-Ibijumba\n";
                        $response .= "-Amasaka\n";
                        $response .= "-Ingano\n";
                        $response .= "-Amamesa\n";
                        $response .= "-Amavuta y’inka\n";
                        $response .= "-Kawunga\n";
                        $response .= "99)Komeza"; // Adding a next option for continuation
                    } 
                    else if ($text == "4*2*1*99*99") {
                        // Second part of response for 2*2*1
                        $response = "END Ibiribwa bitera imbaraga(ibinyamafufu)\n\n";
                        $response .= "-Imyumbati\n";
                        $response .= "-Amateke\n";
                        $response .= "-Ibigori\n";
                        $response .= "-Umuceri\n";
                        $response .= "-Ibikoro\n";} 
                    else if ($text == "4*2*2") {
                        // First part of response for 2*2*2
                        $response = "CON Ibyubaka umubiri(Ibinyameke n'ibikomoka ku matungo)\n\n";
                        $response .= "-Amasaka\n";
                        $response .= "-Ingano\n";
                        $response .= "-Amagi\n";
                        $response .= "-Amafi\n";
                        $response .= "-Amashaza\n";
                        $response .= "-Soya\n";
                        $response .= "-Ubunyobwa\n";
                        $response .= "99)Komeza\n"; // Adding a next option for continuation
                    } else if ($text == "4*2*2*99") {
                        // Second part of response for 2*2*2
                        $response = "END Ibyubaka umubiri(Ibinyameke n'ibikomoka ku matungo)\n\n";
                        $response .= "-Inyama\n";
                        $response .= "-Ibishyimbo\n";
                        $response .= "-Indagara\n";
                        $response .= "-Amata\n";
                        $response .= "-Uburo\n";
                        $response .= "-Uvuta y'inka";
                        
                    } else if ($text == "4*2*3") {
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
                        $response.="amaronji\n";
                        $response .= "99) Komeza\n"; // Adding a next option for continuation
                    } else if ($text == "4*2*3*99") {
                        // Second part of response for 2*2*3
                        $response = "CON Ibirinda indwara(imboga n'imbuto)\n\n";
                        $response .= "Isombe\n";
                        $response .= "Amashu\n";
                        $response .= "Ibishayote\n";
                        $response .= "Karote\n";
                        $response .= "Imiteja\n";
                        $response .= "Ibisusa\n";
                        $response .= "Avoka\n";
                        $response.=" 99) Komeza";}  
                    else if ($text == "4*2*3*99") {
                        // Second part of response for 2*2*3
                        $response = "CON Ibirinda indwara(imboga n'imbuto)\n\n";
                        $response .="Imineke\n";
                        $response .="shoufrere\n";
                        $response .="Imbongeri\n";
                        $response .="isogi\n";
                        $response .="igisura\n";
                        $response .="imbwija\n";
                        $response.=" 99) Komeza";}                    
                    else if ($text == "4*3") {
                        $response = "CON Tegura indyo yuzuye\n\n";
                        $response .= "1)Mugitondo\n";
                        $response .= "2) saa sita \n";
                        $response .= "3) Igicamunsi \n";
                        $response .= "4) Nimugoroba\n";}
                    else if ($text == "4*3*1") {
                         $response = "CON Ifunguro rya 1: Porichi n'amata\n\n";
                        $response .= " Amata y’inka angana \n";
                        $response .= "  n’igikombe cya mironko\n";
                        $response .= " shyiramo amazi kimwe cya kabiri cyicyo gikombe \n";
                        $response .= " shyiramo ibiyiko 4 bya porichi\n";
                        $response .= " shyira kuziko ucanire ukomeze ukorogemo\n";
                        $response .= " ukoreshe umwuko\n";
                        $response .= "99)komeza\n";}
                    else if ($text == "4*3*1*99") {
                            $response ="CON uko bigenda bishyuha biraza gufata \n";
                            $response .="nibimara kubira bikureho.\n";
                            $response.="Gaburira umwana\n";
                            $response.="Amafunguro yumwana agomba kuba afashe,\n";
                            $response .="ibyo ubibwirwa nuko bifashe kukiyiko\n";
                            $response .="99)Komeza";
                        }
                    
                    else if ($text == "4*3*1*99*99") {
                            $response = "CON Ifunguro rya 2:Igikoma cy’inkamure\n\n";
                            $response .="Amahundo 4 y’amasaka ataruma,ibiyiko 2 by'isukari\n";
                            $response.="Amazi ibikombe bine bya mironko,\n";
                            $response .="manyagura amahundo ujonjoramo ameza n’amabi\n";
                            $response.=" shyira mu isekuru usekure ubinoza neza\n";
                            $response .= "99)Komeza";
                        }
                    else if ($text == "4*3*1*99*99") {
                            $response ="CON shyira iyo nombe mu isafuriya yateguwe\n";
                            $response .="sukamo amazi ibikombe 4 byamironko\n";
                            $response.="vanga ukamura kugira ngo uvanemo ibikatsi\n";
                            $response.="uyungurura,shyira kuziko ucanire\n";
                            $response.="shigisha kugeza gihinduye ibara,gushyiramo isukari.\n";
                            $response.="nikimara kubira tegereza iminota 3 ugikureho\n";
                            $response .= "99)Komeza";}
                    else if ($text == "4*3*1*99*99") {
                            $response = "CON Ifunguro rya 3: Igikoma cy’ifu y’ibigori kirimo amata y’inka \n\n";
                            $response .= "koresha amata yinka igikombe kimwe \n";
                            $response.="yashyire mwisafuriya usukemo kimwe\n";
                            $response.=" cyakabiri cyamazi kigikombe wakoresheje\n";
                            $response .= "shyiramo Ibiyiko 3 cyangwa 4 by’ifu y’ibigori\n";
                            $response.="canira andi mazi angana n’igikombe,\n ";
                            $response.="kimwe namara kubira ongeramo,\n";
                            $response.=" rwa ruvange rw’amata n’ifu\n";
                            $response.="shigisha kugeza kibize bihagije\n";
                            $response .= "99)Komeza";
                        }
                     else if ($text == "4*3*1*99*99*99") {
                            $response = "CON Ifunguro rya 3:Igikoma cya SOSOMA)\n";
                            $response.=" fata Ifu y’ibigori ibiyiko 3,\n";
                            $response .= "Ifu y’amasaka ibiyiko 3,\n";
                            $response.="Ifu ya soya ikiyiko 1,\n ";
                            $response.="99)Komeza ";}
                    else if($text == "4*3*1*99*99*99*99"){
                            $response.=" CON sukamo amazi kimwe cyakabiri cy'igikombe\n";
                            $response.="vangisha ya fu ku buryo inoga neza.\n";
                            $response.="Teka amazi igikombe kimwe\n";
                            $response.="amazi namara kubira sukamo icyanga cyamafu,\n";
                            $response.="shigisha kugeza kibize bihagije\n";
                            $response.="99)Komeza ";}
                     else if ($text == "4*3*1*99*99*99*99") {
                        $response = "CON Ifunguro rya 4:Igikoma cy'ingano kivanze namasaka\n\n";
                        $response .="fata ibiyiko 2 byifu yamasaka :\n";
                        $response.="Ifu y’ingano ibiyiko 3\n";
                        $response .= "bishyire mwisafuriya ushyiremo ibikombe\n";
                        $response.="bibiri byamazi korogamo icyange kinoge \n ";
                        $response.="ushyire kuziko\n";
                        $response.="99)Komeza ";}
                else if($text == "4*3*1*99*99*99*99"){
                        $response.=" CON  komeza gukorogamo paka igikoma kibize\n";
                        $response.=" igikoma cyumwana kigomba kuba gifashe\n";
                        $response.="igihe kimaze kubira gikureho ugihoze\n";
                        $response.="gaburira umwana igikoma\n";}
                    else if ($text == "4*3*2") {
                        $response = "CON Ifunguro rya 1: Inyama ziseye ,karote n'umuceri\n\n";
                        $response .= " Fata inyama irobo  uziteke uzishye nakamashini\n";
                        $response .= " Tunganya korote ebyiri,inyanya enye uzikate\n";
                        $response .= " nkaranga korote ushyiremo inyanya na zanyama\n";
                        $response .= " twaseye ushyiremo amazi igikombe kimwe\n";
                        $response .= " cyamazi ubireke bibire iminota icumi\n";
                        $response .= "99) komeza\n";}

                        else if ($text == "4*3*2*99") {
                            $response = "CON  tunganya umuceri kimwe cyakabiri\n\n";
                            $response .= " cyigikombe cya mironko\n";
                            $response .= " teka umuceri ushye ariko ntuwumutse cyane \n";
                            $response .= " hasigaremo utuzi dukeya\n";
                            $response .= " arura ibiyiko 4 byumuceri ushyiremo ibiyiko\n";
                            $response .= " bitatu byisosi watetse mbere \n";
                            $response .= " Nombera umwana umugaburire\n";
                            $response .= "99) komeza\n";}

                    else if ($text == "4*3*2*99*99") {
                        $response = "CON Ifunguro rya 2: Invange y'ibirayi\n\n";
                        $response .= " Koresha ibirayi 3 biri mu rugero,\n";
                        $response .= "Umufungo w’imboga rwatsi,\n";
                        $response .= " Ikiyiko cy’amavuta,Igitunguru,Inyanya eshatu, \n";
                        $response .= "ibiyiko bibiri byindagara ziseye\n";
                        $response .= "99)Komeza\n";
                    }
                    else if ($text == "4*3*2*99*99*99") {
                        $response = "CON bitegure nurangiza ubikarange,\n";
                        $response .= "bikiri bibisi ushyiremo amazi ibikombe \n";
                        $response .= "bibiri ucanire bishye \n";
                        $response .= "nombera umwana gusa utabinoza cyane\n";
                        $response .= "Ibiryo byumwana bigomba kuba\n binobye binoze kandi bifashe bihagije\n";
                        $response .= "99)Komeza\n"; 
                    }


                    else if ($text == "4*3*2*99*99*99*99") {
                        //inombe 
                        $response = "CON Ifunguro rya 2:  Inombe y’ibirayi n’ubunyobwa\n\n";
                        $response .= " Koresha ibirayi 3 biri mu rugero,\n";
                        $response .= "Umufungo w’imboga rwatsi,\n";
                        $response .= "Karoti,umufungo w’injanga, \n";
                        $response .= "Ibiyiko 2 by’ifu y’ubunyobwa bukaranze\n";
                        $response .= "Inyanya 3 cg 5 n'igitunguru\n";
                        $response .= "99)Komeza\n";
                    }
                    else if ($text == "4*3*2*99*99*99*99*99") {
                        $response = "CON hata ibirayi,bishyire mu mazi ucanire,\n";
                        $response .= "ronga imboga rwatsi, karoti ibitunguru,\n";
                        $response .= "ninyanya bishyire mubirayi byenda gushya \n";
                        $response .= "99)Komeza\n"; 
                    }
                    else if ($text == "4*3*2*99*99*99*99*99*99") {
                        $response = " CON shyiramo ubunyobwa buseye ibiyiko bibiri\n";
                        $response.="shyiramo utuyiko 2 twindagara ziseye";
                        $response .= "bipfundikiye kugeza bihiye neza nyuma ubinomba\n";
                        $response .= "99)Komeza\n"; 
                    }





                    else if ($text == "4*3*2*99*99*99*99*99*99*99") {
                        $response = "CON Ifunguro rya 4:Imvange yibitoki n'imboga\n\n";
                        $response .= "igitoki\n";
                        $response .= "Karote\n";
                        $response .= "Inyanya\n";
                        $response .= "Igitunguru\n"; 
                        $response .= "Indagara(ziseye)\n";
                        $response .= "Amavuta\n";
                        $response .= "99)Komeza\n";
                    }
                    else if ($text == "4*3*2*99*99*99*99*99*99*99*99") {
                    
                        $response = "CON Uko bitegurwa:\n";
                        $response .="Tunganya ibitoki(4),Karote ebyiri(2)\n";
                        $response .="Igitunguru kimwe,inyanya(3) nindagara\n";
                        $response .="Utuyiko 2 amavuta ikiyiko kimwe\n";
                        $response .="Teka amafunguro wibuke koroshya ibiryo kugirango\n";
                        $response .="ubone uko ubinomba ariko byoroshye\n";  
                        $response .= "99)Komeza\n";
                    }
                    else if ($text == "4*3*2*99*99*99*99*99") {
                        $response = "END Ifunguro 5:porichi ivanze namata\n";
                        $response .= "Fata amata igikombe cya mironko,\n";
                        $response .= "shyiramo amazi igice kigikombe cya mironko\n";
                        $response .= "Teka amata nampara gushyuha shyiramo\n";
                        $response .= "Ibiyiko 4 bya porichi\n"; 
                        $response .= "genda uvanga gake gake\n";
                        $response .= "uko bigenda bishya bigenda bifata komeza\n";
                        $response .= "uvangemo nibimara gutogota bikureho\n";
                        $response .= "reka bihore ugaburira umwana wawe\n";
                    }

                    else if ($text == "4*3*3") {
                        $response = "CON Ifunguro(imbuto) 1:Imineke\n\n";
                        $response .= " umwana muhe imineke(2)\n";
                        $response .= " yitonore uyinombere kwisahane ye\n";
                        $response .= " Nibimara kunoga neza gaburira umwana\n";
                        $response .= " Iyo ugaburira umwana ikintu cyambere witaho \n";
                        $response .= " nisuku yibiribwa nibikoresho ukoresha\n\n";
                        $response .= "99)komeza\n";}
                    
                    else if ($text == "4*3*3*99") {
                    
                        $response = "CON Ifunguro(imbuto) 2: Ipapayi ihiye neza\n";
                        $response .= "Fata ipapayi ihiye neza\n";
                        $response .= "Uyironge namazi meza\n";
                        $response .= "Hata ipapayi uyikatemo duto duto\n";
                        $response .= "Niba umwana wawe aribyo atangiye kurya\n"; 
                        $response .= "Nomba ipapayi inoge ntugire amazi ushyiramo,\n";
                        $response .= "Cyangwa ikindi kintu cyose\n";
                        $response .= "99)komeza\n";}
                    else if ($text == "4*3*3*99*99") {
                        $response = "CON Ifunguro(imbuto) 3:Avoka ihiye neza\n";
                        $response .= "Fata avoka ihiye neza\n";
                        $response .= "Uyironge namazi meza\n";
                        $response .= "Tonora avoka uyikatemo duto duto\n";
                        $response .= "Niba umwana wawe aribwo atangiye kurya\n"; 
                        $response .= "Nombera  avoka kwisahane yumwana,\n";
                        $response .= "inoge neza gusa ntugire ikindi\n kintu ushyiramo habe namazi\n";
                        $response .= "Gaburira ummwana ukoreshe akayiko\n";
                        $response .= "99)komeza\n";}
                    else if ($text == "4*3*3*99*99*99") {
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
                     else if ($text == "4*3*3*99*99*99*99") {
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
                     else if ($text == "4*3*3*99*99*99*99*99") {
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
                     else if ($text == "4*3*3*99*99*99*99*99*99") {
                                $response = "CON Ifunguro rya 3:Igikoma cy’uruvange rw’amafu (SOSOMA)\n\n";
                                $response .="Ibikenewe mu gutegura ibikombe bibiri bya mironko:\n";
                                $response.="Ifu y’ibigori ibiyiko 3\n";
                                $response .= "Ifu y’amasaka ibiyiko 3\n";
                                $response.="Ifu ya soya ikiyiko 1,\n ";
                                $response.="99)Komeza,\n ";
                                }
                                else if ($text == "4*3*4") {
                                $response = "CON Ifunguro rya 1:\n Igitoki,amashaza,inyanya,karote.\n";
                                $response .= " Fata ibitoki 2,amashaza ibiyiko 2,inyanya 3,\n";
                                $response .= "karote 2,igitunguro kimwe\n";
                                $response .= " bitungaye byose ubiteke ushyiremo amazi\n";
                                $response .= " ahagije teka ibiryo bishye cyane\n";
                                $response .= " nomba neza ibiryo binoge\n cg ukoresheje(blender)\n";
                                $response .= "niba uyifite.\n Gaburira umwana wawe ukoresheje akayiko\n";
                                $response .= "99)komeza\n";}
                                else if ($text == "4*3*4*99") {
                                    $response = "CON Ifunguro rya 2:\n\n";
                                    $response .= "(Ikirayi,dodo,inyanya,amavuta).\n";
                                    $response .= "Fata ibirayi 2,imboga nyeyainyanya 3,\n";
                                    $response .= "amavuta 2,igitunguro kimwe\n";
                                    $response .= "bitungaye byose ubiteke ushyiremo amazi\n";
                                    $response .= "ahagije teka ibiryo bishye cyane\n";
                                    $response .= "nomba neza ibiryo binoge\n cg ukoresheje(blender)\n";
                                    $response .= "niba uyifite.\n Gaburira umwana wawe ukoresheje akayiko\n";
                                    $response .= "99)komeza\n";}
                                    else if ($text == "4*3*4*99*99") {
                                        $response = "CON Ifunguro 3:porichi ivanze namata\n";
                                        $response .= "Fata amata igikombe cya mironko,\n";
                                        $response .= "shyiramo amazi igice kigikombe cya mironko\n";
                                        $response .= "Teka amata nampara gushyuha shyiramo\n";
                                        $response .= "Ibiyiko 4 bya porichi\n"; 
                                        $response .= "genda uvanga gake gake\n";
                                        $response .= "uko bigenda bishya bigenda bifata komeza\n";
                                        $response .= "uvangemo nibimara gutogota bikureho\n";
                                        $response .= "reka bihore ugaburira umwana wawe\n";
                                        $response .= "99)komeza\n";}
                                        else if ($text == "4*3*4*99*99*99") {
                                            $response = "CON Ifunguro rya 4:Ikijumba Kinobye\n\n";
                                            $response .= "Tekera umwana ikijumba kimwe\n";
                                            $response .= "Nikimara gushya neza \n";
                                            $response .= "urakinomba ukoresheje ikiyiko kinoge neza\n neza kuko nibwo atangiye kurya \n";
                                            $response .= "Ibiryo byumwana bigomba kuba\n binobye binoze kandi bifashe bihagije\n"; 
                                            $response .= "99)komeza\n";}
                                else if($text == "4*3*4*99*99*99*99")
                                      {
                                        $response = "CON Ifunguro rya 5:\n";
                                        $response.="(Amakaroni yabana,\n igi,karote,inyanya)\n";
                                        $response .= "Tunganya koroti 2,inyanya 3,amavuta akayiko 1\n";
                                        $response .= "karanga karote nizimara kuba\n";
                                        $response .= "umutura,shyiramo inyanya\n";
                                        $response .= " shyiramo amazi arengeye ho gato\n"; 
                                        $response .= " shyiramo shyiramo igi rimwe na makaroni zabana\n"; 
                                        $response .= "99)komeza\n";}
                                        else if($text == "4*3*4*99*99*99*99*99")
                                      {
                                        $response = "CON Ifunguro rya 5:\n";
                                        $response .= " shyiramo shyiramo igi rimwe na makaroni zabana\n"; 
                                        $response .= "komeza ucanire nyuma yiminota 8 kuramo igi uritonore\n"; 
                                        $response .= "urishyiremo ritonoye cishamo akuko ubireke bishye neza\n"; 
                                        $response .= "bimpaze gushya nomba neza ibiryo binoge ugaburire umwana\n"; 
                                        $response .= "99)komeza\n";}

                                        else if ($text == "5") {
                                            // Business logic for first level response
                                            // This is a terminal request. Note how we start the response with END
                                            $response = "CON Imirire \n\n";
                                            $response .= "1) Abwiriza  \n";
                                            $response .= "2) Ibiribwa\n";
                                            $response .= "3) Amafunguro\n";
                                        } 
                                    else if($text =="5*1") {
                                        // Business logic for first level response
                                        $response .="CON umwana umaze kuzuza imyaka ibiri abampaze"; 
                                        $response. ="kumenya kurya yarameze amenyo Umwana\n" 
                                        $response.="ufite imyaka ibiri abageze kurwego rwo gufata amafunguro";
                                        $response .= "nkayabantu bakuru murugo\n";
                                        $response .="99)Komeza";}
                                        
                                    else if ($text =="5*1*99") {
                                        // Business logic for first level response
                                        $response ="END Gaburira umwana ibiryo nkibyo abandi barya murugo.\n";
                                        $response="Gaburira umwana amafunguro ishuro eshatu cg enye\n";
                                        $response=" Hagarika konsa umwana akigera ku myaka ibiri";} 




// Echo the response back to the API
header('Content-type: text/plain');
echo $response;
?>
