<?php
/*
    Script get Google Map Contents and analyze
     osakanortheq18.php
     Ver.1.0 (UTF-8)
            CC BY 3.0 by M3 (http://caesalpina.com/M3)
 */
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
<head>
<meta name="content-language" content="ja">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Style-Type" content="text/css; charset=UTF-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<meta name="content-language" content="ja">
<meta name="robots"  content="index,follow">
<!--meta http-equiv="refresh" content="0;url=http://"-->
<meta name="keyword" content="">
<meta name="description" content="">
<meta name="author" copyright="" content="">
<meta name="reply-to" content="">
<link rev="made" href="mailto:">
<link rel="next" href="http://">
<link rel="shortcut icon" href="/sidaba/faviconsidaba.png" type="image/x-icon">

<style type="text/css">

  h1 { width: 95%; font-size: 20pt; color: black; background-color: #bbbbbb; border: 1px #000000 solid; padding: 20px 15px 15px 15px; filter: alpha(finishOpacity=100, finishX=0, finishY=50, opacity=10, startX=0, startY=0, style=1); }

  h2 { width: 95%; font-size: 17pt; color: black; background-color: #bbbbbb; border: 1px #000000 solid; padding: 18px 15px 12px 15px; filter: alpha(finishOpacity=100, finishX=0, finishY=50, opacity=10, startX=0, startY=0, style=1); }

  h3 { width: 95%; font-size: 14pt; color: black; background-color: #bbbbbb; border: 1px #000000 solid; padding: 15px 15px 10px 15px; filter: alpha(finishOpacity=100, finishX=0, finishY=50, opacity=10, startX=0, startY=0, style=1); }

  h4  { width: 95%; font-size: 12pt; color: black; background-color: #bbbbbb; border: 1px #000000 solid; padding: 15px 15px 10px 15px; filter: alpha(finishOpacity=100, finishX=0, finishY=50, opacity=10, startX=0, startY=0, style=1); }

  td  { font-size: 8pt;  }


</style>

<script type="" text="" javascript="">
<!--
//-->
</script>
<title>osakanortheq18 sentou php</title>
</head>
<body>
<div id="content">
<?php
  print("<h3>Auto update stopped due to All GAS troubles near 2018 Osaka North Quake ground 0 all recoverd already. [2018-07-02 11:39]</h3>\n");
  print("<b>(you can update data to push \"gen\" button)</b><br />\n");
  print("<a href=\"/osakanortheq18/osakanortheq18.php\">reload</a> <form action=\"/osakanortheq18/osakanortheq18.php\" method=\"get\" name=\"osakanortheq18gen\"><input type=\"submit\" name=\"osakanortheq18sub\" value=\"gen\" /></form>\n");
  print("source: <a href=\"http://caesalpina.com/osakanortheq18/osakanortheq18.php.txt\">osakanortheq18.php</a>    02Jul 11:39 2018 (UTF-8)<br />\n");
  print("test data (update 2 times in 1 day. ): <a href=\"http://caesalpina.com/osakanortheq18/testdata.html\">testdata.html</a><br />\n");
  print(" &nbsp; &nbsp;   log of test data (update 2 times in 1 day. ): <a href=\"http://caesalpina.com/osakanortheq18/log_testdata.html\">log_testdata.html</a><br />\n");
  print("json? data sample: <a href=\"http://caesalpina.com/osakanortheq18/jsontest.json\">jsontest.json</a><br />\n");
  $googlemapurl = 'https://www.google.com/maps/d/u/0/viewer?mid=1hIbVP3i6kqcYF_GECddXyx24514J-PsB&ll=34.8723997%2C135.5899604&z=12';
  print("Refering GoogleMap: <a href=\"$googlemapurl\">$googlemapurl</a><br />\n"); 
 print("　　　　 (ライセンス・作成者などはこちら↑のGoogleMapを参照のこと.. )<br />\n");

  // fetch and cache grom Google Map
  $gdir = '/home/caesalpina/html/osakanortheq18/'; // change depend on env.
  $outputfile = $gdir . 'googlemapsentou.txt';
  chmod($outputfile, 0666);
  $logfile = $gdir . 'gmmapsentou.log';
  chmod($logfile, 0666);

  if ($_REQUEST['osakanortheq18sub'] == 'gen') {
    print("start fetch and organize.\n<br />");
    // Google Map URL
  
    // fetch current Google Map HTML Contents from URL and save 'outputfile' 
    // with wget command logged in 'logfile'
    //
    //   wget -nv -O outputfile -o logfile http://googlemapurl...
    //
    system('wget -nv -O ' . $outputfile . ' ' . ' -o' . $logfile . ' ' . $googlemapurl);
    
    // read 'outputfile' and select line start like '  var _pageData = ...'
    $fp1 = fopen($outputfile, 'r');
    $lf = 0;
    $tl = '';
    $ta = '';
    $ra1 = array();
    $ra2 = array();
    $ja = array();
    while( ! feof( $fp1 ) ){
      $l = fgets($fp1, 9182);
      if (preg_match('/^\s*var _pageData = .*/s', $l, $ra1) ) {
        $lf = 1;
        $tl = $tl . $l;
      } else if ($lf == 1) {
        $lf = 1;
        $tl = $tl . $l;
      }
    }
    fclose($fp1);
    $lf = 0;
    if (preg_match('/^\s*var _pageData = "(.*)";<\/script>/s', $tl, $ra2) ) {
      $ta = str_replace("\\\"","\"", $ra2[1]);
      $ta = str_replace("\\\\u","\\u", $ta);
      $ta = str_replace("\\\\n","\\n", $ta);
    }
    print("end.\n<br />");
    //    print($ta);
    $ja = explode(',',$ta);
    $cja = count($ja);
    $jaf1 = 0;
    $jaf2 = 0;
    $jaf3 = 0;
    $jaf4 = 0;
    $jaf5 = 0;
    $jafc = 0;
    for ($i = 0; $i < $cja; $i++) {

      if (preg_match('/\[\["名称/', $ja[$i], $ra5) && $jaf5 == 0) {
  	  $jafc++;
  	  $jaf5 = 1;
        echo "\n$jafc<br />\n";
      }
      if ($jaf5 > 0) {
  	  $jaf5++;
	  echo "{{{" . $ja[$i] . "}}}<br />\n";
      }
      if (preg_match('/^0$/', $ja[$i], $ra6) && $jaf5 > 0) {
        echo "\n^^^^^^^^^^^^^^^^^^^^^^^^^^<br />\n";
	$jaf5 = 0;
      }
      if (preg_match('/.*最終更新：(.*:[0-9]+)/s', $ja[$i], $ra3) && $jaf1 == 0) {
        $jaf1 = 1;
      }
      if (preg_match('/.*次回更新予定：(.*[0-9]+日)/s', $ja[$i], $ra4) && $jaf2 == 0) {
        $jaf2 = 1;
      }
    }
    $jaf1 = 0;
    $jaf2 = 0;
    $jaf3 = 0;
    $jaf4 = 0;
    $jaf5 = 0;

  } // end if _REQUEST['osakanortheq18sub'] == 'gen' 



?>
</div><!--content-->
<!--footer-->
<?php
  // footer message
  $footstr = <<<EOT
<pre>
    ----
    Script get Google Map Contents and analyze
     osakanortheq18.php
     Ver.1.0 (UTF-8)
            CC BY 3.0 by M3 (http://caesalpina.com/M3)
</pre>
EOT;
  print($footstr);
?>
<!--end footer-->
　

</body>
</html>
