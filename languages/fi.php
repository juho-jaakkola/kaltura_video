<?php
/**
* Kaltura video client
* @package ElggKalturaVideo
* @license http://www.gnu.org/licenses/gpl.html GNU Public License version 3
* @author Juho Jaakkola <juho.jaakkola@mediamaisteri.com>
* @copyright Mediamaisteri Group 2011
**/

$translations = array(
	'kalturavideo:label:partner_id' => "Partner ID",
	'kalturavideo:error:misconfigured' => "Liitännäinen on väärin konfiguroitu tai Kalturassa tapahtui autentikaatiovirhe.",
	'kalturavideo:error:notconfigured' => "Liitännäistä ei ole vielä konfiguroitu.",
	'kalturavideo:error:missingks' => 'Järjestelmässä on todennäköisesti virhe "Administrator Secret"- tai "Web Service Secret"-asetuksessa.',
	'kalturavideo:error:partnerid' => "Tämä virhe tapahtuu yleensä, jos et ole Kalturan yhteistyökumppani. Lue README-tiedosto ja tee tarvittavat konfiguraatiot.",
	'kalturavideo:error:readme' => "Lue README-tiedosto ja konfiguroi liitännäinen.",
	'kalturavideo:label:closewindow' => "Sulje ikkuna",
	'kalturavideo:label:select_size' => "Valitse soittimen koko",
	'kalturavideo:label:large' => "Suuri",
	'kalturavideo:label:small' => "Pieni",
	'kalturavideo:label:insert' => "Syötä video",
	'kalturavideo:label:edit' => "Muokkaa videota",
	'kalturavideo:label:edittitle' => "Muokkaa videon otsikkoa",
	'kalturavideo:label:miniinsert' => "Syötä",
	'kalturavideo:label:miniedit' => "Muokkaa",
	'kalturavideo:label:cancel' => "Peruuta",
	'kalturavideo:label:gallery' => "Galleria",
	'kalturavideo:label:next' => "Seuraava",
	'kalturavideo:label:prev' => "Edellinen",
	'kalturavideo:label:start' => "Aloita",
	'kalturavideo:label:newvideo' => "Luo uusi video",
	'kalturavideo:label:gotoconfig' => "Konfiguroi Kaltura-videoliitännäinen sijainnissa ",

	//title of the menu, put whatever you want, for example 'Kaltura videos'
	'kalturavideo:label:adminvideos' => "Videot",
	'kalturavideo:label:myvideos' => "Omat ryhmäni",
	'kalturavideo:label:length' => "Pituus:",
	'kalturavideo:label:plays' => "Katseluita: %s",
	'kalturavideo:label:created' => "Created:",
	'kalturavideo:label:details' => "Näytä yksityiskohdat",
	'kalturavideo:label:view' => "Näytä video",
	'kalturavideo:label:delete' => "Poista video",
	'kalturavideo:prompt:delete' => "Haluatko varmasti poistaa tämän videon pysyvästi?",
	'kalturavideo:action:deleteok' => "Video id:llä %ID% poistettiin.",
	'kalturavideo:action:deleteko' => "Videota id:llä %ID% ei voida poistaa!",
	'kalturavideo:action:updatedok' => "Video id:llä %ID% päivitettiin.",
	'kalturavideo:action:updatedko' => "Videota id:llä %ID% ei voida päivittää!",
	'kalturavideo:label:thumbnail' => "Esikatselukuvan url:",
	'kalturavideo:label:sharel' => "HTML-koodi videon jakamiseen (suuri koko):",
	'kalturavideo:label:sharem' => "HTML-koodi videon jakamiseen (pieni koko):",
	'kalturavideo:text:statusnotchanged' => "Näkyvyysasetusta videolle %1% ei voida muuttaa!",
	'kalturavideo:text:novideos' => "Sinulla ei vielä ole omia videoita.",
	'kalturavideo:text:nopublicvideos' => "Julkisia videoita ei ole vielä luotu.",
	'kalturavideo:label:author' => "Omistaja:",
	'kalturavideo:text:nofriendsvideos' => "Ystävilläsi ei vielä ole videoita.",
	'kalturavideo:text:nouservideos' => "Tällä käyttäjällä ei vielä ole omia videoita",
	'kalturavideo:label:showvideo' => "Näytä video",
	'kalturavideo:show:advoptions' => "Videon jakaminen",
	'kalturavideo:hide:advoptions' => "Piilota jakaminen",

	'kalturavideo:text:widgetdesc' => "Tämä vimpain näyttää automaattisesti uusimmat videosi.",
	'kalturavideo:error:edittitle' => "Virhe: Otsikkoa ei voida muuttaa.",
	'kalturavideo:error:objectnotavailable' => "Kohdetta ei ole saatavilla. Päivitä sivu ja yritä uudelleen.",
	'kalturavideo:label:recreateobjects' => "Luo uudelleen kaikki videot-objektit",
	'kalturavideo:edit:notallowed' => "Et voi muokata tätä videota",
	
	/**
	 * River
	 */
	'river:create:object:kaltura_video' => '%s lisäsi videon %s',
	'river:update:object:kaltura_video' => '%s päivitti videota %s',
	'river:comment:object:kaltura_video' => '%s kommentoi videota %s',
	
	// Old river strings
	'kalturavideo:river:created' => "%s lisäsi",
	'kalturavideo:river:annotate' => "%s lisäsi kommentin kohteeseen",
	'kalturavideo:river:item' => "videon",
	'kalturavideo:river:shared' => "Videot",
	'kalturavideo:label:videosfrom' => "Käyttäjän %s videot",
	'kalturavideo:user:showallvideos' => "Näytä kaikki tämän käyttäjän videot",
	'kalturavideo:strapline' => "%s",

	 /**
     * kaltura_video rating system
	 **/
	'kalturavideo:rating' => "Arviointi",
	'kalturavideo:yourrate' => "Sinun arviosi:",
	'kalturavideo:rate' => "Äänestä!",
	'kalturavideo:votes' => "ääntä",
	'kalturavideo:ratesucces' => "Arviosi tallennettiin.",
	'kalturavideo:rateempty' => "Valitse arvo ennen äänestämistä",
	'kalturavideo:notrated' => "Olet jo arvioinut tämän kohteen",

	/**
	 * Groups
	 **/
	'kalturavideo:groupprofile' => "Videot",
	'kalturavideo:text:nogroupvideos' => "Tällä ryhmällä ei vielä ole videoita",
	'kalturavideo:label:collaborative' => "Collaborative",
	'kalturavideo:text:collaborative' => "Tämä sallii myös muiden ryhmän jäsenien muokata videota",
	'kalturavideo:text:collaborativechanged' => "Videon %1% jakamisen asetukset muutettu",
	'kalturavideo:text:collaborativenotchanged' => "Videon %1% jakamisasetuksia ei voida muuttaa",
	'kalturavideo:text:iscollaborative' => "Tämä on jaettu video. Myös sinä voit muokata sitä!",
	'kalturavideo:userprofile' => "Videot",

	//New after version 1.0

	//default title for a new created video, you can put 'New video' for example
	'kalturavideo:title:video' => "New Collaborative Video",
	//elgg notification
	'kalturavideo:newvideo' => "New collaborative video",

	'kaltura_video' => 'Kaikki videot',
	'kaltura_video:allvideos' => 'Videot',
	'kalturavideo:label:friendsvideos' => "Ystävien videot",
	'kalturavideo:label:allgroupvideos' => "Ryhmien videot",
	'kalturavideo:label:allvideos' => "Kaikki videot",
	'kalturavideo:clickifpartner' => "Klikkaa tätä, jos sinulla on Kalturan Jäsen-ID",
	'kalturavideo:clickifnewpartner' => "Klikkaa tätä, jos et ole yhteistyöjäsen Kalturan kanssa",
	'kalturavideo:notpartner' => "Ei Kalturan käyttäjä?",
	'kalturavideo:forgotpassword' => "unohtunut salasana?",
	'kalturavideo:enterkmcdata' => "Syötä Kalturan hallintapaneelin (KMC) sähköpostiosoite ja salasana",
	'kalturavideo:label:sitename' => "Elgg-sivuston nimi",
	'kalturavideo:label:name' => "Syötä nimi",
	'kalturavideo:label:email' => "Syötä sähköpostiosoite",
	'kalturavideo:label:websiteurl' => "Nettisivun osoite",
	'kalturavideo:label:description' => "Kuvaus",
	'kalturavideo:label:phonenumber' => "Puhelinnumero",
	'kalturavideo:label:contenttype' => "Sisällön tyyppi",
	'kalturavideo:label:adultcontent' => "Sisältävätkö videot lapsille sopimatonta sisältöä?",
	'kalturavideo:label:iagree' => "Hyväksyn %s",
	'kalturavideo:label:termsofuse' => "Käyttöehdot",
	'kalturavideo:wizard:description' => "Kuvaa, miten aiot käyttää Kaltura-videoalustaa",
	'kalturavideo:wizard:phonenumber' => "Syötä puhelinnumero",
	'kalturavideo:mustaggreeterms' => "Sinun pitää hyväksyä Kalturan käyttöehdot",
	'kalturavideo:mustenterfields' => "Sinun pitää täyttää kaikki kentät",
	'kalturavideo:registeredok' => "Yhteys Kaltura-palvelimeen on muodostettu ja rekisteröity",
	'kalturavideo:error:noid' => "Pyydettyä kohdetta ei ole saatavilla",
	'kalturavideo:logintokaltura' => "%s Kalturan hallintapaneeliin (KMC) tehdäksesi edistyneempää videoiden hallinnointia",
	'kalturavideo:login' => "Kirjaudu",
	'kalturavideo:text:nogroupsvideos' => "Ryhmillä ei vielä ole videoita",
	'kalturavideo:label:defaultplayer' => "Oletussoitin",
	'kalturavideo:editpassword' => "Klikkaa muokataksesi",
	'kalturavideo:text:recreateobjects' => "Voit koittaa tätä toimintoa, jos päivität Kaltura-liitännäistä vanhemmasta kuin 1.0-versiosta tai jos jotkin videot on poistettu Elggin ulkopuolelta.
Toiminto tarkistaa kaikki Elggin video-objektit ja luo ne uudelleen. Tämä prosessi saattaa kestää jonkin aikaa. 

Huomioi, että kaikki Kaltura-palvelimelle tallennettu metadata päivitetään vastaamaan Elggissä olevaa dataa.
Toiminto ei vaikuta kohteisiin, joita ei ole luotu Kaltura video -pluginilla.",
	'kalturavideo:text:statuschanged' => 'Pääsyoikeudet videolle %2% muutettu tasolle "%1%"',
	'kalturavideo:howtoimportkaltura' => 'Elggin ulkopuolella luotuja videoita on mahdollista tuoda Kalturasta. Tuodaksesi videoita kirjaudu Kalturan hallintapaneeliin (%URLCMS%) ja lisää videoihin seuraavat tagit: "<b>%TAG%</b> <em>elgg_username_to_import</em>". Tämän jälkeen aja toiminto "Luo uudelleen kaikki video-objektit".',
	'kalturavideo:num_display' => "Näytettävien kohteiden määrä",
	'kalturavideo:start_display' => "Aloita videosta numero",
	'kalturavideo:label:addvideo' => "Upota video",
	'kalturavideo:label:addbuttonlongtext' => "Lisää tekstikenttiin painike %s",
	'kalturavideo:option:simple' => "Perustoiminto (painike tektikenttien päällä)",
	'kalturavideo:option:tinymce' => "Yritä integroida tinyMCE-editoriin",
	'kalturavideo:note:addbuttonlongtext' => "Jos lisäät tämän painikkeen, käyttäjät voivat lisätä videoita &lt;object&gt;-tageilla tekstikenttiin. Objektit toimivat vaikka htmlawed-plugin olisi päällä.",
	'kalturavideo:enablevideo' => "Ota käyttöön ryhmän videot",
	'kalturavideo:label:groupvideos' => "Ryhmän videot",
	'kalturavideo:user' => "Käyttäjän %s videot",
	'kalturavideo:user:friends' => "Käyttäjän %s ystävien videot",
	'kalturavideo:notfound' => "Pyytettyä videota ei löytynyt ",
	'kalturavideo:posttitle' => "Käyttäjän %s video: %s",
	'kalturavideo:label:editdetails' => "Muokkaa otsikkoa ja kuvausta",
	'ingroup' => "ryhmässä",

	//new from 10-12-2009
	'item:object:kaltura_video' => "Videot",
	'kalturavideo:thumbnail' => "Esikatselukuva",
	'kalturavideo:comments:allow' => "Salli kommentointi",
	'kalturavideo:rating:allow' => "Salli arviointi",
	//these get inserted into the river links to take the user to the entity
	'kalturavideo:river:updated' => "%s päivitti",
	'kalturavideo:river:create' => "uuden videon nimeltä",
	'kalturavideo:river:update' => "videota",
	//the river search the translation with the object label (kaltura_video)
	'kaltura_video:river:annotate' => "kommentin videoon",
	'kalturavideo:river:rates' => "%s antoi arvion videolle",
	//widget title label
	'kalturavideo:label:latest' => "Uusimmat videot",
	//widget options
	'kalturavideo:showmode' => "Lista",
	'kalturavideo:showmode:thumbnail' => "Lista esikatselukuvakkeista",
	'kalturavideo:showmode:embed' => "Upotetut mini-soittimet",
	'kalturavideo:label:morevideos' => "Lisää videoita",
	'kalturavideo:more' => "Lisää",
	//donate button in tools administrations
	'kalturavideo:note:donate' => "Jos pidät tästä liitännäisestä, harkitse lahjoituksen antamista.",

	//new from  11-21-2009
	'kalturavideo:error:curl' => "PHP:n CURL-laajennosta ei ole käytettävissä.\nOta laajennos käyttöön ennen tämän liitännäisen käyttämistä.\nLöydät lisätietoa README-tiedostosta.",

	//new from version 1.1
	'admin:kaltura_video' => 'Kaltura Video',
	// Elgg 1.8 menu items
	'admin:kaltura_video:server' => 'Palvelin',
	'admin:kaltura_video:partnerid' => 'Tilin asetukset',
	'admin:kaltura_video:custom' => 'Soitin ja editori',
	'admin:kaltura_video:behavior' => 'Käyttöasetukset',
	'admin:kaltura_video:advanced' => 'Erityisasetukset',
	'admin:kaltura_video:credits' => 'Pluginin tekijät',
	'admin:kaltura_video:wizard' => 'Asetusvelho',
	// Old menu items (propably deprecated)
	'kalturavideo:menu:server' => "Palvelin",
	'kalturavideo:menu:custom' => "Soitin ja editori",
	'kalturavideo:menu:behavior' => "Käyttöasetukset",
	'kalturavideo:menu:advanced' => "Erityisasetukset",
	'kalturavideo:menu:credits' => "Pluginin tekijät",
	'kalturavideo:admin' => "Kaltura Video Admin",
	'kalturavideo:admin:serverpart' => "Striimaava palvelin",
	'kalturavideo:admin:partnerpart' => "Kaltura-tilin asetukset",
	'kalturavideo:admin:wizardpart' => "Kaltura Online -videoalustalle rekisteröinti",
	'kalturavideo:admin:player' => "Videosoittimen asetukset",
	'kalturavideo:admin:editor' => "Videoeditorin asetukset",
	'kalturavideo:admin:textareas' => "Tekstikenttäintegraation asetukset",
	'kalturavideo:admin:credits' => "Pluginin tekijät",
	'kalturavideo:admin:support' => "Tuki",

	'kalturavideo:server:info' => "Käyttääksesi Kaltura-videoalustan ominaisuuksia, sinulla pitää olla voimassaoleva kumppanuustunniste Kaltura-palvelimella.",
	'kalturavideo:server:type' => "Valitse Kaltura-palvelimesi",
	'kalturavideo:server:kalturacorp' => "Kalturan kaupallisesti isännöimä versio",
	'kalturavideo:server:kalturace' => "Kalturan ilmainen yhteisöversio (Community Edition, CE)",
	'kalturavideo:server:corpinfo' => "Kalturan kaupallisesta versiosta on mahdollista saada ilmainen kokeilujakso.
Testitili sisältää 10GB ilmaista tilaa.",
	'kalturavideo:server:ceinfo' => "Kalturan yhteisöversio on yhteisön tukema, mutta omatoimisesti ylläpidetty versio Kalturan videoalustasta.",
	'kalturavideo:server:moreinfo' => "Lue lisää",
	'kalturavideo:server:ceurl' => "Kaltura CE -palvelimen URL",
	'kalturavideo:server:alertchange' => "VAROITUS: Muuttaessasi nämä asetukset, menetät kaikki olemassa olevat videosi!
	
Tämän toiminnon jälkeen haluat todennäköisesti uudelleenluoda kaikki video-objektisi.

Haluatko varmasti jatkaa?
",

	'kalturavideo:wizard:cannot' => "Tätä sivua ei voi käyttää nykyisillä asetuksilla",
	'kalturavideo:advanced:recreateobjects' => "Kyllä, luo uudelleen kaikki video-objektit",
	'kalturavideo:recreate:initiating' => "Noudetaan tietoja Kaltura-palvelimelta...",
	'kalturavideo:recreate:stepof' => "Noudetaan videoita (vaihe %NUM% / %TOTAL%)...",
	'kalturavideo:recreate:processedvideos' => "Käsitellyt videot %NUMRANGE% / %TOTAL%...",
	'kalturavideo:recreate:done' => "Noudettiin onnistuneesti kaikki videot!",
	'kalturavideo:recreate:donewitherrors' => "Videoiden noutamisessa ilmeni virheitä!",
	'kalturavideo:changeplayer' => "Tästä voit vaihtaa oletussoittimen uusille videoille (tämä ei vaikuta jo olemassa oleviin videoihin).",
	'kalturavideo:generic' => "Oletus",
	'kalturavideo:customplayer' => "Oma räätälöity soittimeni",
	'kalturavideo:customkcw' => "Oma ohjelmani videoiden lisäämiseen",
	'kalturavideo:customeditor' => "Oma videosoittimeni",
	'kalturavideo:uiconf1' => "Videosoittimen id (Application Studio Player ID)",
	'kalturavideo:text:uiconf1' => '%s Kalturan hallintapaneeliin luodaksesi omia videosoittimia.<br />
Itse luodut soittimet löytyvät Kalturan hallintapaneelista "Application Studio"-osiosta',
	'kalturavideo:uiconf2' => "Videonlisäystoiminnon ID",
	'kalturavideo:uiconf3' => "Videoeditorin ID",
	'kalturavideo:error:uiconf1' => "Virheellinen videosoittimen ID!",
	'kalturavideo:error:uiconf2' => "Virheellinen videonlisäysohjelman ID!",
	'kalturavideo:error:uiconf3' => "Virheellinen videoeditorin ID.",
	'kalturavideo:uiconf:getlist' => "Hae lista vaihtoehdoista",
	'kalturavideo:uiconf1:notfound' => "Omia soittimia ei löytynyt!",
	'kalturavideo:uiconf2:notfound' => "Omia videonlisäysohjelmia ei löytynyt!",
	'kalturavideo:uiconf3:notfound' => "Omia videoeditoreita ei löytynyt!",
	'kalturavideo:playerupdated' => "Videosoittimen ja -editorin asetukset päivitetty.",
	'kalturavideo:label:defaulteditor' => "Oletuseditori",
	'kalturavideo:editor:light' => "Editori vaalealla väriteemalla",
	'kalturavideo:editor:dark' => "Editori tummalla väriteemalla",
	'kalturavideo:label:defaultkcw' => "Oletusohjelma videoiden lisäämiseen",
	'kalturavideo:kcw:light' => "Latausohjelma vaalealla väriteemalla",
	'kalturavideo:kcw:dark' => "Latausohjelma tummalla väriteemalla",

	'kalturavideo:admin:videoeditor' => "Videoeditori",
	'kalturavideo:admin:rating' => "Videon arviointi",

	'kalturavideo:behavior:alloweditor' => "Salli käyttäjille omien videoiden muokkaaminen",
	'kalturavideo:alloweditor:full' => "Näytä videota lisätessä ensin latausohjelma ja sitten videoeditori",
	'kalturavideo:alloweditor:simple' => "Älä näytä editoria videota lisättäessä, mutta salli videon editointi lisäämisen jälkeen",
	'kalturavideo:alloweditor:no' => "Älä salli videoiden editointia",
	'kalturavideo:alloweditor:notallowed' => "Videoiden muokkaaminen ei ole sallittu",

	'kalturavideo:behavior:enablerating' => "Ota käyttöön toiminto videoiden arviointiin",

	//new from 1.2
	'kalturavideo:admin:others' => "Muut asetukset",
	'kalturavideo:behavior:widget' => "Lisää video-vimpain etusivulle (vaatii custom_index-liitännäisen)",
	'kalturavideo:behavior:numvideos' => "Näytettävien videoiden määrä",
	'kalturavideo:option:single' => "Yksinkertainen lista (viimeisimmät videot)",
	'kalturavideo:option:multi' => "Lista, jossa viimeisimmät, katsotuimmat, kommentoiduimmat ja suosituimmat videot",

	'kalturavideo:index:toplatest' => "Suosituimmat videot",
	'kalturavideo:index:latest' => "Viimeisimmät",
	'kalturavideo:index:played' => "Soitetuimmat",
	'kalturavideo:index:commented' => "Kommentoiduimmat",
	'kalturavideo:index:rated' => "Parhaiten arvioidut"

);

add_translation("fi", $translations);

?>
