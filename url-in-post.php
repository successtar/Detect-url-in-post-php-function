
<?php

/*The php fuction will extract url from a post and convert it to a link.

Only url that start with http://, https://, www., and ftp:// 
*/

	//Link in a post
		
		function postlink($text){
			
		$listlink=array();
		//die('a '.count($listlink));
		$text1=' '.str_replace('<br/>',' <br/> ',str_replace('<br />',' <br /> ',$text)).' ';
		//die($text1);
		if (stristr($text1,' http://www.')){$listlink[]=' http://www.';		}
		if (stristr($text1,' https://www.')){$listlink[]=' https://www.';		}
		if (stristr($text1,' www.')){$listlink[]=' www.';		}
		if (stristr($text1,' http://')){$listlink[]=' http://';		}
		if (stristr($text1,' ftp://')){$listlink[]=' ftp://';		}
		if (stristr($text1,' https://')){$listlink[]=' https://';		}	
		
		for($i=0;$i<count($listlink);$i++){
		$linkstart=$listlink[$i];
		
		if (stristr($text1,$linkstart)){$textlinker=stristr($text1,$linkstart);		} else{$textlinker="";	}
		
			$postholder=str_replace($textlinker,'',$text1);	

			while ($textlinker!=""){
			$picklink=' '.strtok($textlinker,' ');
			//die($picklink);
			$postholder=$postholder.' '.'<a title="Visit link" target="_blank" href="'.trim(str_replace('ftp://http://','ftp://',str_replace('https://http://','http://',str_replace('http://http://','http://',str_replace('www.','http://',strtolower($picklink)))))).'"><span style="word-break:break-all">'.trim($picklink).'</span></a>';
			$textlinker=str_replace($picklink,'',$textlinker);
			//die($textlinker);
			if (stristr($textlinker,$linkstart)){$postholder=$postholder.' '.str_replace(stristr($textlinker,$linkstart),'',$textlinker);	$textlinker=stristr($textlinker,$linkstart); 		} else{$postholder=$postholder.' '.$textlinker;	$textlinker="";	}

					}		
					$text1=$postholder;
				}
					return($text1);
			}

$post="This is a demo of possible links https://elementvilla.blogspot.com or www.myexampoint.com/about.php <br/> <br/>That's not all http://gist.github.com/successtar and ftp://google.com not leaving out long url <br/><br/> https://www.google.com/search?source=hp&ei=OVlkW4zZCazI6ASLyZzYAg&q=my+exam+point&oq=my+exa&gs_l=psy-ab.3.4.0l10.3463.7778.0.12179.9.8.1.0.0.0.630.1936.2-4j1j0j1.6.0....0...1.1.64.psy-ab..2.7.1964...0i131k1.0.A9TE02VqFOY <br/><br/> Great!!!!";

echo postlink($post); 
?>
