<?php
/*
 DFRWS 2008 Decoding Tool by Philipp Hellmich (phil@hellmi.de)

 All files in dataPath were extracted from the pcap file using pyflag / pflash and an awk script:

pyflash < exec  > out.txt
cat out.txt | awk -f parse.awk  > exec2
pyflash < exec2  > out2.txt

debian:/pyflag/tools/net# cat exec
load dfrws
cd /network/streams/2007-12-17/192.168.151.130-219.93.175.67/
stat *

debian:/pyflag/tools/net# cat exec2
load dfrws
cp /network/streams/2007-12-17/192.168.151.130-219.93.175.67/42136:80/forward /tmp/net/data/664

debian:/pyflag/tools/net# cat parse.awk
#!/usr/bin/env awk -f
BEGIN { print "load dfrws" }
{
		if ($1 == "filename")  { printf("cp %s ", $3) }
		if ($1 == "inode_id")  { printf("/tmp/net/data/%s\n",$3) }
}

*/


$dataPath = "/pyflag/tools/net/data";
$headerLine = 'cookie';
$chunkSize = 1236;

$urls = array( "http://youtube.com/", "http://www.google.com/search?hl=en&q=pig+latin", "http://www.idioma-software.com/pig/pig_latin.html", "http://www.yahoo.com/", "http://mail.yahoo.com/", "http://www.myspace.com/", "http://vids.myspace.com/index.cfm?fuseaction=vids.individual&VideoID=23886700", "http://youtube.com/", "http://youtube.com/watch?v=ZiRHyzjb5SI", "http://youtube.com/watch?v=1RUFBGDvsy0", "http://www.google.com/search?hl=en&q=juicy+fruit", "http://www.wrigley.com/wrigley/products/pop_juicy_fruit.asp", "http://www.amazon.com/Juicy-Fruit-Mtume/dp/B0000025UL", "http://www.facebook.com/", "http://www.live.com/", "http://search.live.com/results.aspx?q=hurricane", "http://www.ebay.com/", "http://books.ebay.com/", "http://photography.ebay.com/", "http://crafts.ebay.com/", "http://en.wikipedia.org/wiki/Main_Page", "http://en.wikipedia.org/wiki/Lee_Smith_%28baseball_player%29", "http://en.wikipedia.org/wiki/Lee_Smith_\%28baseball_player\%29&action=edit", "http://www.msn.com/", "http://www.slate.com/id/2179838/?GT1=10733", "http://mail.live.com/", "http://costarica.en.craigslist.org/rfs/", "http://costarica.en.craigslist.org/apa/");

echo "DFRWS 2008 xfer.pl Decoder\n";
echo "\n- - - - - - - - - - - - - - - - - - - -\n";

$files = array();
$d = dir($dataPath);
echo "Handle: " . $d->handle . "\n";
echo "Path: " . $d->path . "\n";
while (false !== ($entry = $d->read())) {
	if(is_numeric($entry)) $tempArr[$entry] = file($d->path . "/" . $entry); 
   }
$d->close();

$tempKeys = array_keys($tempArr);
sort($tempKeys);
foreach($tempKeys as $key) {
    $files[$key] = $tempArr[$key];
}
#var_dump($files);

$i = 0;
$dataArr = array();
foreach($files as $key => $file) {

	/*
	Not needed due to suspect modified original xfer.pl script

	$request = split(" ", $file[0],3);
	if(!in_array($request[1],$urls)) {
		var_dump($request);
		var_dump($file);
		echo "- - - - - - - \n";
		continue;
	}
	*/
	foreach($file as $line) {
		# Search for:
		#	Cookie: Sessid=
		$pos = (stripos($line, $headerLine));
		if(is_numeric($pos)) {
			$data = split("\=", $line,2);
			/*	
			Not needed due to suspect modified original xfer.pl

            $i++;
			if ($i % 3 == 0) { 
				$search = 'RMID';
			} if ($i % 2 == 0) { 
				$search = 'Sessid';
			} else {
				$search = 'CVal';
			}
			$pos2 = stripos($data[0], $search);
			if(!is_numeric($pos2)) {
				echo "Could not find $search in $data[0]\n"; 
				$i--;
				continue;
			}
			
			echo "Found $search in $data[0]\n"; 
			*/
			$cookieStr = trim($data[1]);

			# Duplicate check
			if(in_array($cookieStr,$dataArr)) {
				echo "duplicate found: id $key\n";
				#	var_dump($file);
				continue;
			}

			# Length check
			if(strlen($cookieStr) > $chunkSize) {
                echo "possible broken packet: id $key\n";
  				#	var_dump($file);
                continue;
			}
			$dataArr[] = $cookieStr;
		}
	}
}

$dataStr = join("", $dataArr);

echo "Found data in " . count ($dataArr) . " packets\n";

echo "Writting to result to undecoded_archive.zip\n";
file_put_contents('undecoded_archive.zip',$dataStr);

$decodedStr = (base64_decode($dataStr));

echo "Decodd " . strlen ($dataStr) . " chars to " . strlen($decodedStr). " bytes\n";

echo "Writting to result to decoded_archive.zip\n";
file_put_contents('decoded_archive.zip',$decodedStr);

?>
