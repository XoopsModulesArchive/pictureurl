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

include_once("admin_header.php");
include_once XOOPS_ROOT_PATH."/class/xoopsformloader.php";
include_once(XOOPS_ROOT_PATH . "/class/uploader.php");

if(!isset($_POST['op'])){
	$op = isset ($_GET['op']) ? $_GET['op'] : '';
}else {
	$op = $_POST['op'];
}

$myts =& MyTextSanitizer::getInstance();

// Executing operation from code
if(!isset($op)){$op=" ";}
switch ($op) {
	case "creatimg":
	creatimg();
	break;
}


function creatimg()
{
	global $xoopsDB, $myts;
	
	$image = (isset($_POST["image"]) ? $myts->makeTboxData4Save($_POST["image"]) : '');
	$defaultimg = (isset($_POST["defaultimg"]) ? $_POST["defaultimg"] : '');
	$url_image = (isset($_POST["url_image"]) ? $myts->makeTboxData4Save($_POST["url_image"]) : '');
	$onmouseover = (isset($_POST["onmouseover"]) ? $myts->makeTboxData4Save($_POST["onmouseover"]) : '');
	$url_page = (isset($_POST["url_page"]) ? $myts->makeTboxData4Save($_POST["url_page"]) : '');
	$align = (isset($_POST["align"]) ? $myts->makeTboxData4Save($_POST["align"]) : '');
	$height = (isset($_POST["height"]) ? $myts->makeTboxData4Save($_POST["height"]) : '');
	$width = (isset($_POST["width"]) ? $myts->makeTboxData4Save($_POST["width"]) : '');
	$marginl = (isset($_POST["marginl"]) ? $myts->makeTboxData4Save($_POST["marginl"]) : '');
	$marginr = (isset($_POST["marginr"]) ? $myts->makeTboxData4Save($_POST["marginr"]) : '');
	$margint = (isset($_POST["margint"]) ? $myts->makeTboxData4Save($_POST["margint"]) : '');
	$marginb = (isset($_POST["marginb"]) ? $myts->makeTboxData4Save($_POST["marginb"]) : '');
	$repeat = (isset($_POST["repeat"]) ? $myts->makeTboxData4Save($_POST["repeat"]) : '');

	if (empty($url_page)) {
		redirect_header("creation.php", 2, _AM_ERRORTARGET);
	}

	if ($defaultimg == '1') {
		$sql = sprintf("UPDATE %s SET defaultimg='0' WHERE defaultimg='1'", $xoopsDB->prefix("pictureurl"));
		$xoopsDB->query($sql)  or die ('erreur requete :'.$sql.'<br />');
	}

	$sql = sprintf("SELECT id FROM ".$xoopsDB->prefix("pictureurl")." WHERE url_page='".$url_page."'");
	$res = $xoopsDB->query($sql) or die ('erreur requete :'.$sql.'<br />');
	if ( $res ) {
		$tab[1] = "";
		while (($row = $xoopsDB->fetchArray($res)) != false) {
			$tab[1] = $row['id'];
		}
	}
	if (!empty($tab[1])) {
		redirect_header("creation.php", 2, _AM_ERRORALIMG);
	}

	$sql = sprintf("INSERT INTO %s (id, image, defaultimg, url_image, onmouseover, url_page, align, height, width, marginl, marginr, margint, marginb, rrepeat) VALUES ('','%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", $xoopsDB->prefix("pictureurl"), $image, $defaultimg, $url_image, $onmouseover, $url_page, $align, $height, $width, $marginl, $marginr, $margint, $marginb, $repeat);
	$xoopsDB->queryF($sql) or die ('erreur requete :'.$sql.'<br />');

	redirect_header("index.php", 2, _AM_ADDIMG);
}

// Xoops admin header
xoops_cp_header();

echo "<table width='100%'><tr><td align='center'><img src='../images/pictureurl.gif' alt='' title=''></td><td align='right' width='55'><a href='../help/help.php'><img src='../images/help.gif' alt='aide' title='aide'></a></td></tr></table><br />\n";

// Nice menu with tabs
pictureurl_tabsAdminMenu(__FILE__);

if (empty($op)) {

	$form = new XoopsThemeForm(_AM_IMG_CREATION,'cimg','creation.php?op=creatimg','post');

	$image = new XoopsFormText(_AM_IMAGES,'image',50,255, '');
	$defaultimg = new XoopsFormRadioYN(_AM_DEFIMG, 'defaultimg', 0);
	$url_image = new XoopsFormText(_AM_URLIMAGE,'url_image',50,255,'');
	$onmouseover = new XoopsFormText(_AM_ONMOUSEOVER,'onmouseover',50,255,'');
	$url_page = new XoopsFormText(_AM_URL,'url_page',50,255,'');

	$images_array = XoopsLists :: getImgListAsArray( XOOPS_ROOT_PATH . "/uploads/pictureurl" );
	$image = new XoopsFormSelect(_AM_IMAGES, "image", $image);
	$image->addOptionArray($images_array);

	$submit = new XoopsFormButton('', 'submit', _AM_SUBMIT, 'submit');

	$form -> addElement($image);
	$form -> insertBreak('<b>'._AM_OR.'</b>', 'head');
	$form -> addElement($url_image);
	$form -> insertBreak('<br /><img src="../images/def.png" />&nbsp;<b>'._AM_MATCHING_URL.'</b><br />&nbsp;', 'even');
	$form -> addElement($url_page);
	$form -> addElement(new XoopsFormLabel('', _AM_EX_URL_1));
	$form ->  addElement(new XoopsFormLabel('',_AM_EX_URL_2));
	$form -> insertBreak('<br /><img src="../images/def.png" />&nbsp;<b>'._AM_IMG_PARAMS.'</b><br />&nbsp;', 'even');
	
	$height = new XoopsFormElementTray(_AM_HEIGHT);
	$height->addElement(new XoopsFormText('', 'height', 10, 255, ''));
	$height->addElement(new XoopsFormLabel('<b>'._AM_PX.'</b>'));
	
	$width = new XoopsFormElementTray(_AM_WIDTH);
	$width->addElement(new XoopsFormText('', 'width', 10, 255, ''));
	$width->addElement(new XoopsFormLabel('<b>'._AM_PX.'</b>'));
	
	$form -> addElement($height);
	$form -> addElement($width);
	$form -> addElement($defaultimg);
	$form -> addElement($onmouseover);

	$align = new XoopsFormRadio(_AM_FLOAT,'align');
	$align -> addOption('left',_AM_FLOATL);
	$align -> addOption('center',_AM_FLOATC);
	$align -> addOption('right',_AM_FLOATR);
	$margin = new XoopsFormElementTray(_AM_MARGIN, '');
	$margin -> addElement(new XoopsFormText(_AM_MARGINL,"marginl",10,255,''));
	$margin -> addElement(new XoopsFormText(_AM_MARGINR,"marginr",10,255,''));
	$margin -> addElement(new XoopsFormText(_AM_MARGINT,"margint",10,255,''));
	$margin -> addElement(new XoopsFormText(_AM_MARGINB,"marginb",10,255,''));

	$repeat = new XoopsFormCheckBox(_AM_REPEAT, 'repeat');
	$repeat -> addOption(1,' ');
	$submit = new XoopsFormButton('', 'submit', _AM_SUBMIT, 'submit');

	$form -> insertBreak('<br /><img src="../images/def.png" />&nbsp;<b>'._AM_IMG_CSS.' '._AM_SECVAR.'</b><br />&nbsp;', 'even');
	$form -> addElement($align);
	$form -> addElement($margin);
	$form -> addElement($repeat);
	$form -> addElement($submit);

	$form->display();
}

xoops_cp_footer();
?>