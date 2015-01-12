<?php

function isBrowserMobile()
{
    if (preg_match('#iPad#', $_SERVER['HTTP_USER_AGENT']))
	{
      return false;	
	}
	
	if (isset($_SERVER['HTTP_X_WAP_PROFILE']) || isset($_SERVER['HTTP_PROFILE']))
	{
  	  return true;
	}  

	if (isset ($_SERVER['HTTP_ACCEPT']))
	{
		$accept = strtolower($_SERVER['HTTP_ACCEPT']);
		if (strpos($accept, 'wap') !== false)
			return true;
	}

	if (isset ($_SERVER['HTTP_USER_AGENT']))
	{
		if (strpos ($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false)
			return true;

		if (strpos ($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false)
			return true;
	}
	
    if (preg_match('#Android|BlackBerry|Cellphone|iPhone|iPod|hiptop|HTC|MIDP-2\.|MMEF20|MOT-V|NetFront|Newt|Nintendo Wii|Nintendo DS|Nitro|Nokia|Opera Mobi|Palm|PlayStation Portable|PSP|portalmmm|SonyEricsson|Symbian|UP.Browser|UP.Link|webOS|Windows CE|WinWAP|YahooSeeker/M1A1-R2D2|LGE VX|Maemo|phone#', $_SERVER['HTTP_USER_AGENT']))
	{
      return true;	
	}  

	return false;
}
?>