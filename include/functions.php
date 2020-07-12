<?php
//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <http://www.xoops.org/>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //

/*
* Function to get images html tags for template use
*/
function xoops_getpictureurl()
{
	global $xoopsDB;
	$imagesobject= '';
	$urlici= "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	$sql = "SELECT * FROM ".$xoopsDB->prefix("pictureurl")." where url_page ='".$urlici."'";
	$iresult = $xoopsDB->query($sql);

	if (list ($id, $image, $defaultimg, $url_image, $onmouseover, $url_page, $align, $height, $width, $marginl, $marginr, $margint, $marginb, $rrepeat) = $xoopsDB->fetchRow($iresult)) {
		// on a une url dans la table
		if ($url_image ==''){
			$img =  XOOPS_URL.'/uploads/pictureurl/'.$image;
		}
		else {
			$img = $url_image;
		}
		$imagesobject = '<div><img src="'.$img.'" alt="'.$onmouseover.'" title="'.$onmouseover.'"';
		if (!empty($height)) {
			$imagesobject .= 'height="'.$height.'px" ';
		}
		if (!empty($width)) {
			$imagesobject .= 'width="'.$width.'px" ';
		}
		$imagesobject .= ' /></div>';
	}
	else {
		$sql = "SELECT * FROM ".$xoopsDB->prefix("pictureurl")." ORDER BY length(url_page) DESC";
		$iresult = $xoopsDB->query($sql);
		while ( list($id, $image, $defaultimg, $url_image, $onmouseover, $url_page, $align, $height, $width, $marginl, $marginr, $margint, $marginb, $rrepeat) = $xoopsDB->fetchRow($iresult) ) {
			$url_page = ereg_replace("[*]", '.*', $url_page);
			if (preg_match("'".$url_page."'", $urlici)){
				if ($url_image ==''){
					$img =  XOOPS_URL.'/uploads/pictureurl/'.$image;
				}
				else {
					$img = $url_image;
				}
				$imagesobject = '<div><img src="'.$img.'" alt="'.$onmouseover.'" title="'.$onmouseover.'"';
				if (!empty($height)) {
					$imagesobject .= 'height="'.$height.'px" ';
				}
				if (!empty($width)) {
					$imagesobject .= 'width="'.$width.'px" ';
				}
				$imagesobject .= ' /></div>';

				break;
			}
		}
	}

	if ($imagesobject == ''){
		$result = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("pictureurl")." where defaultimg ='1'");

		if (list ($id, $image, $defaultimg, $url_image, $onmouseover, $url_page, $align, $height, $width, $marginl, $marginr, $margint, $marginb, $rrepeat) = $xoopsDB->fetchRow($result)) {
			if ($url_image ==''){
				$img =  XOOPS_URL.'/uploads/pictureurl/'.$image;
			}
			else {
				$img = $url_image;
			}
			$imagesobject = '<div><img src="'.$img.'" alt="'.$onmouseover.'" title="'.$onmouseover.'"';
			if (!empty($height)) {
				$imagesobject .= 'height="'.$height.'px" ';
			}
			if (!empty($width)) {
				$imagesobject .= 'width="'.$width.'px" ';
			}
			$imagesobject .= ' /></div>';
		}
		else{
			$imageobject ='';
		}
	}

	return $imagesobject;
}


/*
* Function to get images with css style
*/
function xoops_getpictureurlcss()
{
	global $xoopsDB;
	$imagesobject= '';
	$urlici= "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	$sql = "SELECT * FROM ".$xoopsDB->prefix("pictureurl")." where url_page ='".$urlici."'";
	$iresult = $xoopsDB->query($sql);

	if (list ($id, $image, $defaultimg, $url_image, $onmouseover, $url_page, $align, $height, $width, $marginl, $marginr, $margint, $marginb, $rrepeat) = $xoopsDB->fetchRow($iresult)) {
		if ($url_image ==''){
			$img =  XOOPS_URL.'/uploads/pictureurl/'.$image;
		}
		else
		{
			$img = $url_image;
		}

		$imagesobject = '<style type="text/css">#img {background: url('.$img.');';
		if (!empty($align)) {
			$imagesobject .= 'float:'.$align.';';
		}
		if (!empty($marginl)) {
			$imagesobject .= 'margin-left:'.$marginl.'px;';
		}
		if (!empty($marginr)) {
			$imagesobject .= 'margin-right:'.$marginr.'px;';
		}
		if (!empty($margint)) {
			$imagesobject .= 'margin-top:'.$margint.'px;';
		}
		if (!empty($marginb)) {
			$imagesobject .= 'margin-bottom:'.$marginb.'px;';
		}
		if ($rrepeat=='1') {
			$imagesobject .= 'background-repeat:repeat;';
		}
		else {
			$imagesobject .= 'background-repeat:no-repeat;';
		}

		$imagesobject .= '}</style>';
	}
	else {
		$sql = "SELECT * FROM ".$xoopsDB->prefix("pictureurl")." ORDER BY length(url_page) DESC";
		$iresult = $xoopsDB->query($sql);
		while ( list($id, $image, $defaultimg, $url_image, $onmouseover, $url_page, $align, $height, $width, $marginl, $marginr, $margint, $marginb, $rrepeat) = $xoopsDB->fetchRow($iresult) )
		{
			$url_page = ereg_replace("[*]", '.*', $url_page);
			if (preg_match("'".$url_page."'", $urlici)){
				if ($url_image ==''){
					$img =  XOOPS_URL.'/uploads/pictureurl/'.$image;
				}
				else {
					$img = $url_image;
				}
				$imagesobject = '<style type="text/css">#img {background-image: url('.$img.');';
				if (!empty($align)) {
					$imagesobject .= 'float:'.$align.';';
				}

				if (!empty($marginl)) {
					$imagesobject .= 'margin-left:'.$marginl.'px;';
				}
				if (!empty($marginr)) {
					$imagesobject .= 'margin-right:'.$marginr.'px;';
				}
				if (!empty($margint)) {
					$imagesobject .= 'margin-top:'.$margint.'px;';
				}
				if (!empty($marginb)) {
					$imagesobject .= 'margin-bottom:'.$marginb.'px;';
				}
				if ($rrepeat=='1') {
					$imagesobject .= 'background-repeat:repeat;';
				}
				else {
					$imagesobject .= 'background-repeat:no-repeat;';
				}

				$imagesobject .= '}</style>';
				break;
			}
		}
	}


	if ($imagesobject == ''){

		$iresult = $xoopsDB->query("SELECT * FROM ".$xoopsDB->prefix("pictureurl")." where defaultimg ='1'");
		if (list ($id, $image, $defaultimg, $url_image, $onmouseover, $url_page, $align, $height, $width, $marginl, $marginr, $margint, $marginb, $rrepeat) = $xoopsDB->fetchRow($iresult)) {
			if ($url_image ==''){
				$img =  XOOPS_URL.'/uploads/pictureurl/'.$image;
			}
			else {
				$img = $url_image;
			}
			$imagesobject = '<style type="text/css">#img {background-image: url('.$img.');';
			if (!empty($align)) {
				$imagesobject .= 'float:'.$align.';';
			}

			if (!empty($marginl)) {
				$imagesobject .= 'margin-left:'.$marginl.'px;';
			}
			if (!empty($marginr)) {
				$imagesobject .= 'margin-right:'.$marginr.'px;';
			}
			if (!empty($margint)) {
				$imagesobject .= 'margin-top:'.$margint.'px;';
			}
			if (!empty($marginb)) {
				$imagesobject .= 'margin-bottom:'.$marginb.'px;';
			}
			if ($repeat=='1') {
				$imagesobject .= 'background-repeat:repeat;';
			}
			else {
				$imagesobject .= 'background-repeat:no-repeat;';
			}

			$imagesobject .= '}</style>';
		}
		else{
			$imageobject ='';
		}
	}

	return $imagesobject;
}


/*
* Function to show the admin menu
*/
function show_modimage_adminmenu()
{
	echo	'<table class="outer" width="100%">
	<tr class="even"><td><center><a href="index.php?op=creat">'._AM_IMG_CREATION.'<br /><img src="../images/creer.png"></a></center></td>
	<td><center><a href="index.php?op=modif">'._AM_IMG_MODIF.'<br /><img src="../images/modif.png"></a></center></td>
	<td><center><a href="index.php?op=sup">'._AM_IMG_SUP.'<br /><img src="../images/sup.png"></a></center></td></tr>
	</table><br /><br />';
}

function pictureurl_tabsAdminMenu($file) {
	
	global $xoopsModule;
	
	// Configuring different tables
	$url = XOOPS_URL."/modules/".$xoopsModule->getVar('dirname').'/admin';
	$tabs = array();
	$tabs[] = array(
				'title' => _AM_HOME,
				'url' => $url.'/index.php',
				'color' => ''
				);
	$tabs[] = array(
				'title' => _AM_IMG_CREATION,
				'url' => $url.'/creation.php',
				'color' => ''
				);
	$tabs[] = array(
				'title' => _AM_IMG_ADD,
				'url' => $url.'/addition.php',
				'color' => ''
				);

	// Call generic function with correct params
	xoops_tabAdminMenu($xoopsModule, $file, $tabs);
}

/**
 * Creates nice menu with tabs. This idea comes from smartSection and formulaire modules.
 *
 * @author alban.montaigu@wanadoo.fr
 * @version 0.1
 */
function xoops_tabAdminMenu($module, $file, $tabs) {
	
	// Nice buttons styles
	$imgUrl = XOOPS_URL."/modules/".$module->getVar('dirname').'/images';
	echo "<style type='text/css'>\n"
		."#buttontop { float:left; width:100%; background: #e7e7e7; font-size:93%; line-height:normal; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; margin: 0; }\n"
		."#buttonbar { float:left; width:100%; background: #e7e7e7 url('".$imgUrl."/bg.gif') repeat-x left bottom; font-size:93%; line-height:normal; border-left: 1px solid black; border-right: 1px solid black; margin-bottom: 12px; }\n"
		."#buttonbar ul { margin:0; margin-top: 15px; padding:10px 10px 0; list-style:none; }\n"
		."#buttonbar li { display:inline; margin:0; padding:0; }\n"
		."#buttonbar a { float:left; background:url('".$imgUrl."/left_both.gif') no-repeat left top; margin:0; padding:0 0 0 9px; border-bottom:1px solid #000; text-decoration:none; }\n"
		."#buttonbar a span { float:left; display:block; background:url('".$imgUrl."/right_both.gif') no-repeat right top; padding:5px 15px 4px 6px; font-weight:bold; color:#765; }\n"
		."/* Commented Backslash Hack hides rule from IE5-Mac */\n"
		."#buttonbar a span {float:none;}\n"
		."/* End IE5-Mac hack */\n"
		."#buttonbar a:hover span { color:#333; }\n"
		."#buttonbar #current a { background-position:0 -150px; border-width:0; }\n"
		."#buttonbar #current a span { background-position:100% -150px; padding-bottom:5px; color:#333; }\n"
		."#buttonbar a:hover { background-position:0% -150px; }\n"
		."#buttonbar a:hover span { background-position:100% -150px; }\n"
		."</style>\n";
	
	// Current tab special settings
	$page = preg_replace("'^.*[\\/](.*?\.php).*$'", "\\1", $file);
	foreach ($tabs as $i => $tab) {
		if (strpos($tab['url'], $page)) {
			$tabs[$i]['color'] = 'current';
		}
	}

	// Displaying tabs
	echo "<div id='buttontop'>\n"
		."<table style=\"width: 100%; padding: 0; \" cellspacing=\"0\">\n"
		."<tr>\n"
		."<td style='font-size: 10px; text-align: right;' colspan='2'>&nbsp;</td>\n"
		."</tr>\n"
		."</table>\n"
		."</div>"
		."<div id='buttonbar'>\n"
		."<ul>";
	foreach ($tabs as $tab) {
		echo "<li id='" . $tab['color'] . "'><a href=\"".$tab['url']."\"><span>".$tab['title']."</span></a></li>\n";
	}
	echo "</ul>\n"
		."</div>&nbsp;\n";
}
?>