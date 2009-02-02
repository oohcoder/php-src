--TEST--
Test compress.zlib:// scheme with the file_get_contents
--SKIPIF--
<?php 
if (!extension_loaded("zlib")) {
	print "skip - ZLIB extension not loaded"; 
}	 
?>
--FILE--
<?php
$outputFileName = __FILE__.'tmp';
$outFile = "compress.zlib://$outputFileName";
$data = b<<<EOT
Here is some plain
text to be read
and displayed.
EOT;

file_put_contents($outFile, $data);
$h = gzopen($outputFileName, 'r');
gzpassthru($h);
gzclose($h);
echo "\n";
unlink($outputFileName);
?>
===DONE===
--EXPECT--
Here is some plain
text to be read
and displayed.
===DONE===