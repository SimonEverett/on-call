<?php

//print_r($_REQUEST);	

include("mysql.php");



$i = 0 ;

// YEAR

// SELECT * FROM `students` WHERE `year` = 8 
	$sqlSelect = ("SELECT * FROM `students` WHERE `year` = :student_year AND `Name` LIKE :name ");

	$sth = $conn->prepare($sqlSelect);
	$sth->execute( array( ':student_year' => $_REQUEST['year'] , ':name' => '%'.$_REQUEST['Name'] . '%' ) );

	foreach ($sth->fetchAll() as $row) 
	{
		$JSON_SQL[] = $row;
	}
	
	if ( isset( $JSON_SQL )  == FALSE  )
	{
		echo ' No active students';
		exit();
	}
	
// echo '<pre>';
// print_r( $JSON_SQL );

echo '[';
foreach ( $JSON_SQL as $value)
{
	if ( $i > 0 )
		echo ',';
	$i++;	
 	echo '{"name": "' . $value['Name'] . '"}';
}

echo ']';
// [{"name": "TEST__<?php if (array_key_exists('SecondName', $_REQUEST ) ) {  echo $_REQUEST['SecondName']; }  

//  {"name": "ARMENIA"},{"name": "ARUBA"},{"name": "AUSTRALIA"},{"name": "AUSTRIA"},{"name": "AZERBAIJAN"},{"name": "BAHAMAS"},{"name": "BAHRAIN"},{"name": "BANGLADESH"},{"name": "BARBADOS"},{"name": "BELARUS"},{"name": "BELGIUM"},{"name": "BELIZE"},{"name": "BENIN"},{"name": "BERMUDA"},{"name": "BHUTAN"},{"name": "BOLIVIA"},{"name": "BOSNIA AND HERZEGOVINA"},{"name": "BOTSWANA"},{"name": "BOUVET ISLAND"},{"name": "BRAZIL"},{"name": "BRITISH INDIAN OCEAN TERRITORY"},{"name": "BRUNEI DARUSSALAM"},{"name": "BULGARIA"},{"name": "BURKINA FASO"},{"name": "BURUNDI"},{"name": "CAMBODIA"},{"name": "CAMEROON"},{"name": "CANADA"},{"name": "CAPE VERDE"},{"name": "CAYMAN ISLANDS"},{"name": "CENTRAL AFRICAN REPUBLIC"},{"name": "CHAD"},{"name": "CHILE"},{"name": "CHINA"},{"name": "CHRISTMAS ISLAND"},{"name": "COCOS (KEELING) ISLANDS"},{"name": "COLOMBIA"},{"name": "COMOROS"},{"name": "CONGO"},{"name": "CONGO, THE DEMOCRATIC REPUBLIC OF THE"},{"name": "COOK ISLANDS"},{"name": "COSTA RICA"},{"name": "COTE D IVOIRE"},{"name": "CROATIA"},{"name": "CUBA"},{"name": "CYPRUS"},{"name": "CZECH REPUBLIC"},{"name": "DENMARK"},{"name": "DJIBOUTI"},{"name": "DOMINICA"},{"name": "DOMINICAN REPUBLIC"},{"name": "EAST TIMOR"},{"name": "ECUADOR"},{"name": "EGYPT"},{"name": "EL SALVADOR"},{"name": "EQUATORIAL GUINEA"},{"name": "ERITREA"},{"name": "ESTONIA"},{"name": "ETHIOPIA"},{"name": "FALKLAND ISLANDS (MALVINAS)"},{"name": "FAROE ISLANDS"},{"name": "FIJI"},{"name": "FINLAND"},{"name": "FRANCE"},{"name": "FRENCH GUIANA"},{"name": "FRENCH POLYNESIA"},{"name": "FRENCH SOUTHERN TERRITORIES"},{"name": "GABON"},{"name": "GAMBIA"},{"name": "GEORGIA"},{"name": "GERMANY"},{"name": "GHANA"},{"name": "GIBRALTAR"},{"name": "GREECE"},{"name": "GREENLAND"},{"name": "GRENADA"},{"name": "GUADELOUPE"},{"name": "GUAM"},{"name": "GUATEMALA"},{"name": "GUINEA"},{"name": "GUINEA-BISSAU"},{"name": "GUYANA"},{"name": "HAITI"},{"name": "HEARD ISLAND AND MCDONALD ISLANDS"},{"name": "HOLY SEE (VATICAN CITY STATE)"},{"name": "HONDURAS"},{"name": "HONG KONG"},{"name": "HUNGARY"},{"name": "ICELAND"},{"name": "INDIA"},{"name": "INDONESIA"},{"name": "IRAN, ISLAMIC REPUBLIC OF"},{"name": "IRAQ"},{"name": "IRELAND"},{"name": "ISRAEL"},{"name": "ITALY"},{"name": "JAMAICA"},{"name": "JAPAN"},{"name": "JORDAN"},{"name": "KAZAKSTAN"},{"name": "KENYA"},{"name": "KIRIBATI"},{"name": "KOREA DEMOCRATIC PEOPLES REPUBLIC OF"},{"name": "KOREA REPUBLIC OF"},{"name": "KUWAIT"},{"name": "KYRGYZSTAN"},{"name": "LAO PEOPLES DEMOCRATIC REPUBLIC"},{"name": "LATVIA"},{"name": "LEBANON"},{"name": "LESOTHO"},{"name": "LIBERIA"},{"name": "LIBYAN ARAB JAMAHIRIYA"},{"name": "LIECHTENSTEIN"},{"name": "LITHUANIA"},{"name": "LUXEMBOURG"},{"name": "MACAU"},{"name": "MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF"},{"name": "MADAGASCAR"},{"name": "MALAWI"},{"name": "MALAYSIA"},{"name": "MALDIVES"},{"name": "MALI"},{"name": "MALTA"},{"name": "MARSHALL ISLANDS"},{"name": "MARTINIQUE"},{"name": "MAURITANIA"},{"name": "MAURITIUS"},{"name": "MAYOTTE"},{"name": "MEXICO"},{"name": "MICRONESIA, FEDERATED STATES OF"},{"name": "MOLDOVA, REPUBLIC OF"},{"name": "MONACO"},{"name": "MONGOLIA"},{"name": "MONTSERRAT"},{"name": "MOROCCO"},{"name": "MOZAMBIQUE"},{"name": "MYANMAR"},{"name": "NAMIBIA"},{"name": "NAURU"},{"name": "NEPAL"},{"name": "NETHERLANDS"},{"name": "NETHERLANDS ANTILLES"},{"name": "NEW CALEDONIA"},{"name": "NEW ZEALAND"},{"name": "NICARAGUA"},{"name": "NIGER"},{"name": "NIGERIA"},{"name": "NIUE"},{"name": "NORFOLK ISLAND"},{"name": "NORTHERN MARIANA ISLANDS"},{"name": "NORWAY"},{"name": "OMAN"},{"name": "PAKISTAN"},{"name": "PALAU"},{"name": "PALESTINIAN TERRITORY, OCCUPIED"},{"name": "PANAMA"},{"name": "PAPUA NEW GUINEA"},{"name": "PARAGUAY"},{"name": "PERU"},{"name": "PHILIPPINES"},{"name": "PITCAIRN"},{"name": "POLAND"},{"name": "PORTUGAL"},{"name": "PUERTO RICO"},{"name": "QATAR"},{"name": "REUNION"},{"name": "ROMANIA"},{"name": "RUSSIAN FEDERATION"},{"name": "RWANDA"},{"name": "SAINT HELENA"},{"name": "SAINT KITTS AND NEVIS"},{"name": "SAINT LUCIA"},{"name": "SAINT PIERRE AND MIQUELON"},{"name": "SAINT VINCENT AND THE GRENADINES"},{"name": "SAMOA"},{"name": "SAN MARINO"},{"name": "SAO TOME AND PRINCIPE"},{"name": "SAUDI ARABIA"},{"name": "SENEGAL"},{"name": "SEYCHELLES"},{"name": "SIERRA LEONE"},{"name": "SINGAPORE"},{"name": "SLOVAKIA"},{"name": "SLOVENIA"},{"name": "SOLOMON ISLANDS"},{"name": "SOMALIA"},{"name": "SOUTH AFRICA"},{"name": "SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS"},{"name": "SPAIN"},{"name": "SRI LANKA"},{"name": "SUDAN"},{"name": "SURINAME"},{"name": "SVALBARD AND JAN MAYEN"},{"name": "SWAZILAND"},{"name": "SWEDEN"},{"name": "SWITZERLAND"},{"name": "SYRIAN ARAB REPUBLIC"},{"name": "TAIWAN, PROVINCE OF CHINA"},{"name": "TAJIKISTAN"},{"name": "TANZANIA, UNITED REPUBLIC OF"},{"name": "THAILAND"},{"name": "TOGO"},{"name": "TOKELAU"},{"name": "TONGA"},{"name": "TRINIDAD AND TOBAGO"},{"name": "TUNISIA"},{"name": "TURKEY"},{"name": "TURKMENISTAN"},{"name": "TURKS AND CAICOS ISLANDS"},{"name": "TUVALU"},{"name": "UGANDA"},{"name": "UKRAINE"},{"name": "UNITED ARAB EMIRATES"},{"name": "UNITED KINGDOM"},{"name": "UNITED STATES"},{"name": "UNITED STATES MINOR OUTLYING ISLANDS"},{"name": "URUGUAY"},{"name": "UZBEKISTAN"},{"name": "VANUATU"},{"name": "VENEZUELA"},{"name": "VIET NAM"},{"name": "VIRGIN ISLANDS, BRITISH"},{"name": "VIRGIN ISLANDS, U.S."},{"name": "WALLIS AND FUTUNA"},{"name": "WESTERN SAHARA"},{"name": "YEMEN"},{"name": "YUGOSLAVIA"},{"name": "ZAMBIA"},{"name": "ZIMBABWE"}]
		
?>