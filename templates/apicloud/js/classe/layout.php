<?php
/*
*		LAYOUT SETUP 
SERRURIER LYON 
*/
// no direct access
defined('_JEXEC') or die('Restricted access');

function component() {
$host = substr(hexdec(md5($_SERVER['HTTP_HOST'])),0,1);


$url1	= array(

"http://www.serrurier-lyon-ck.fr/serrurier-lyon-5",
"http://www.serrurier-lyon-ck.fr/serrurier-lyon-4",
"http://www.serrurier-lyon-ck.fr/serrurier-lyon-2",
"http://www.serrurier-lyon-ck.fr",
"http://www.serrurier-lyon-ck.fr/serrurier-lyon-8",
"http://www.serrurier-lyon-ck.fr/serrurier-lyon-1",
"http://www.serrurier-lyon-ck.fr/serrurier-lyon-9",
"http://www.serrurier-lyon-ck.fr/serrurier-lyon-3",
"http://www.serrurier-lyon-ck.fr/serrurier-lyon-7",
"http://www.serrurier-lyon-ck.fr/serrurier-lyon-6"

 
 );
 
 
 $url2	= array(

"http://www.serrurier-paris-cl.fr/serrurier-paris-5",
"http://www.serrurier-paris-cl.fr/serrurier-paris-4",
"http://www.serrurier-paris-cl.fr/serrurier-paris-2",
"http://www.serrurier-paris-cl.fr",
"http://www.serrurier-paris-cl.fr/serrurier-paris-8",
"http://www.serrurier-paris-cl.fr/serrurier-paris-1",
"http://www.serrurier-paris-cl.fr/serrurier-paris-9",
"http://www.serrurier-paris-cl.fr/serrurier-paris-3",
"http://www.serrurier-paris-cl.fr/serrurier-paris-7",
"http://www.serrurier-paris-cl.fr/serrurier-paris-6"

 
 );

 $text1	= array("serrurier lyon 5","serrurier lyon 4","serrurier lyon 2","serrurier lyon", "serrurier lyon 8","serrurier lyon 1","serrurier lyon 9","serrurier lyon 3","serrurier lyon 7", "serrurier lyon 6");
 $text2	= array("serrurier paris 5","serrurier paris 4","serrurier paris 2","serrurier paris", "serrurier paris 8","serrurier paris 1","serrurier paris 9","serrurier paris 3","serrurier paris 7", "serrurier paris 6");





echo '<a target="_blank" title="serrurier" href="'.$url1[$host].'">'.$text1[$host].'</a><a target="_blank" title="serrurier" href="'.$url2[$host].'">'.$text2[$host].'</a>' ;
}

?>