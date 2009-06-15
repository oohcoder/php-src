--TEST--
Test ++N operator : various numbers as strings
--FILE--
<?php

$strVals = array(
   "0","65","-44", "1.2", "-7.7", "abc", "123abc", "123e5", "123e5xyz", " 123abc", "123 abc", "123abc ", "3.4a",
   "a5.9"
);


foreach ($strVals as $strVal) {
   echo "--- testing: '$strVal' ---\n";
   var_dump(++$strVal);
}
   
?>
===DONE===
--EXPECT--
--- testing: '0' ---
int(1)
--- testing: '65' ---
int(66)
--- testing: '-44' ---
int(-43)
--- testing: '1.2' ---
float(2.2)
--- testing: '-7.7' ---
float(-6.7)
--- testing: 'abc' ---
unicode(3) "abd"
--- testing: '123abc' ---
unicode(6) "123abd"
--- testing: '123e5' ---
float(12300001)
--- testing: '123e5xyz' ---
unicode(8) "123e5xza"
--- testing: ' 123abc' ---
unicode(7) " 123abd"
--- testing: '123 abc' ---
unicode(7) "123 abd"
--- testing: '123abc ' ---
unicode(7) "123abc "
--- testing: '3.4a' ---
unicode(4) "3.4b"
--- testing: 'a5.9' ---
unicode(4) "a5.0"
===DONE===