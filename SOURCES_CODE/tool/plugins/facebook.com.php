<?php
/*******************************************************************
* PHProxy++ is copyright 2007-2012 PHProxy++ Team
* and/or its licensors, successors and assigners. All rights reserved.
*
* Use of PHProxy++ is subject to the terms of the Software License Agreement.
* http://phproxy-plus.sourceforge.net/license.php
******************************************************************/

function preRequest() {
	global $URL;
	if ($URL['host'] != 'm.facebook.com') {
		$URL['host'] = preg_replace('/((www\.)?facebook\.com)/', 'm.facebook.com', $URL['host']);
		$URL['href'] = preg_replace('/\/\/((www\.)?facebook\.com)/', '//m.facebook.com', $URL['href']);
	}
}
