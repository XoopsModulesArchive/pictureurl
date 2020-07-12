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

if(!isset($_POST['id'])){
	$id = isset ($_GET['id']) ? $_GET['id'] : '';
}else {
	$id = $_POST['id'];
}

$myts =& MyTextSanitizer::getInstance();

// Executing selected operation
if(!isset($op)){$op=" ";}
switch ($op) {
	case "modifimg":
	modifimg($id);
	break;
	case "supimg":
	supimg($id);
	break;
}

function modifimg($id)
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

	if (empty($image)) {
		redirect_header("index.php", 2, _AM_ERRORIMG);
	}

	if ($defaultimg == '1') {
		$sql = sprintf("UPDATE %s SET defaultimg='0' WHERE defaultimg='1'", $xoopsDB->prefix("pictureurl"));
		$xoopsDB->query($sql)  or die ('erreur requete :'.$sql.'<br />');
	}

	$sql=sprintf("SELECT id FROM ".$xoopsDB->prefix("pictureurl")." WHERE url_page='".$url_page."' and id!=".$id);
	$res = $xoopsDB->query($sql) or die ('erreur requete :'.$sql.'<br />');
	if ( $res ) {
		$tab[1] = "";
		while (($row = $xoopsDB->fetchArray($res)) != false) {
			$tab[1] = $row['id'];
		}
	}
	if (!empty($tab[1])) {
		redirect_header("index.php", 2, _AM_ERRORALIMG);
	}

	$sql = sprintf("UPDATE %s SET id='%s', image='%s', defaultimg='%s', url_image='%s', onmouseover='%s', url_page='%s', align='%s', height='%s', width='%s', marginl='%s', marginr='%s', margint='%s', marginb='%s', rrepeat='%s' WHERE id='%s'", $xoopsDB->prefix("pictureurl"), $id, $image, $defaultimg, $url_image, $onmouseover, $url_page, $align, $height, $width, $marginl, $marginr, $margint, $marginb, $repeat, $id);
	$xoopsDB->query($sql)  or die ('erreur requete :'.$sql.'<br />');

	redirect_header("index.php",1,_AM_MODIMG);
}

function supimg($id)
{
	global $xoopsDB, $_POST, $myts, $eh;

	$xoopsDB->queryF("DELETE FROM ".$xoopsDB->prefix('pictureurl')." WHERE id='$id'") or $eh->show("error delete in supimg");

	redirect_header("index.php",1,_AM_SUPIMG);
}

// Admin header
xoops_cp_header();

$sql = sprintf("SELECT id, image, defaultimg, url_image, onmouseover, url_page FROM ".$xoopsDB->prefix("pictureurl"));
$res = $xoopsDB->query($sql) or die ('erreur requete :'.$sql.'<br />');

if ($res) {
	$m = 0;
	$tab[$m] = "";
	$tab2[$m] = "";
	$tab3[$m] = "";
	$tab4[$m] = "";
	$tab5[$m] = "";
	$tab6[$m] = "";
	$m++;
	while (($row = $xoopsDB->fetchArray($res)) != false) {
		$tab[$m]  = $row['id'];
		$tab2[$m] = $row['image'];
		$tab3[$m] = $row['defaultimg'];
		$tab4[$m] = $row['url_image'];
		$tab5[$m] = $row['onmouseover'];
		$tab6[$m] = $row['url_page'];
		$m++;
	}
}

echo "<table width='100%'><tr><td align='center'><img src='../images/pictureurl.gif' alt='' title=''></td><td align='right' width='55'><a href='../help/help.php'><img src='../images/help.gif' alt='aide' title='aide'></a></td></tr></table><br />";

// Nice menu with tabs
pictureurl_tabsAdminMenu(__FILE__);

if (empty($op)){

	if (isset($tab[1])) {

		include_once('../include/popup.js');

		echo "<table class=\"outer\" width=\"100%\">\n"
			."<th><center>"._AM_IMAGE."</center></th>\n"
			."<th><center>"._AM_ALT."</center></th>\n"
			."<th><center>"._AM_URLPG."</center></th>\n"
			."<th><center>"._AM_IMGDEF."</center></th>\n"
			."<th colspan=\"2\"><center>"._AM_ACT."</center></th>\n";

		$result = $xoopsDB->query("SELECT id, image, defaultimg, url_image, onmouseover, url_page FROM ".$xoopsDB->prefix("pictureurl")." ORDER BY url_page");
		$myts =& MyTextSanitizer::getInstance();
		while ((list($id, $image, $defaultimg, $url_image, $onmouseover, $url_page) = $xoopsDB->fetchRow($result)) != false ) {

			echo '<tr>';

			if (!empty($url_image)) {
				echo '<td class="head" ALIGN="center"><a href="#" onClick="resizePopUp(\'$url_image\',\''._AM_IMAGE.'\');">'.$url_image.'</a></td>';}
				else {
					echo '<td class="head" ALIGN="center"><a href="#" onClick="resizePopUp(\''.XOOPS_URL.'/uploads/pictureurl/'.$image.'\',\''._AM_IMAGE.'\');">'.$image.'</a></td>';
				}

				echo '<td class="head" ALIGN="center">'.$onmouseover.'</td><td class="head" ALIGN="left">'.$url_page.'</td>';

				if ($defaultimg == '1') {
					echo '<td class="head" ALIGN="center" width="12%"><img src="../images/def.png"></td>';
				} else {
					echo '<td class="head"></td>';
				}

				echo '<td class="odd" align="center"><A HREF="index.php?op=modif&id='.$id.'"><img src="../images/modif.png"></a></td>';

				echo '<td class="odd" align="center"><A HREF="index.php?op=supimg&id='.$id.'"><img src="../images/sup.png"></a></td>';
		}
		echo '</tr></table><br />';
	} else {
		echo '<div class="errorMsg">'._AM_NOMIMG.'</div>';
	}
}

if ($op == 'modif' && !empty($id)) {

	$sql=sprintf("SELECT id, image, defaultimg, url_image, onmouseover, url_page, align, height, width, marginl, marginr, margint, marginb, rrepeat FROM ".$xoopsDB->prefix("pictureurl")." WHERE id='%s'",$id);
	$res = $xoopsDB->query($sql)  or die ('erreur requete :'.$sql.'<br />');

	if ( $res ) {
		while (($row = $xoopsDB->fetchArray($res)) != false) {
			$id = $row['id'];
			$image = $row['image'];
			$defaultimg = $row['defaultimg'];
			$url_image = $row['url_image'];
			$height = $row['height'];
			$width = $row['width'];
			$onmouseover = $row['onmouseover'];
			$url_page = $row['url_page'];
			$align = $row['align'];
			$marginl = $row['marginl'];
			$marginr = $row['marginr'];
			$margint = $row['margint'];
			$marginb = $row['marginb'];
			$repeat = $row['rrepeat'];
		}
	}

	$form = new XoopsThemeForm(_AM_IMG_MODIF,'cimg','index.php?op=modifimg&id='.$id,'post');

	$images_array = XoopsLists :: getImgListAsArray( XOOPS_ROOT_PATH . "/uploads/pictureurl" );
	$image = new XoopsFormSelect(_AM_IMAGES, "image", $image);
	$image->addOptionArray($images_array);
	$defaultimg = new XoopsFormRadioYN(_AM_DEFIMG, 'defaultimg', $defaultimg);

	$url_image = new XoopsFormText(_AM_URLIMAGE,'url_image',50,255,$myts->makeTboxData4Show($url_image));
	$onmouseover = new XoopsFormText(_AM_ONMOUSEOVER,'onmouseover',50,255,$myts->makeTboxData4Show($onmouseover));
	$url_page = new XoopsFormText(_AM_URL,'url_page',50,255,$myts->makeTboxData4Show($url_page));

	$submit = new XoopsFormButton('', 'submit', _AM_SUBMIT, 'submit');

	$form -> addElement($image);
	$form -> insertBreak('<b>'._AM_OR.'</b>', 'head');
	$form -> addElement($url_image);
	$form -> insertBreak('<br /><img src="../images/def.png" />&nbsp;<b>'._AM_MATCHING_URL.'</b><br />&nbsp;', 'even');
	$form -> addElement($url_page);
	$form -> addElement(new XoopsFormLabel('', _AM_EX_URL_1));
	$form ->  addElement(new XoopsFormLabel('',_AM_EX_URL_2));
	$form -> insertBreak('<br /><img src="../images/def.png" />&nbsp;<b>'._AM_IMG_PARAMS.'</b><br />&nbsp;', 'even');
	
	$heightTray = new XoopsFormElementTray(_AM_HEIGHT);
	$heightTray->addElement(new XoopsFormText('', 'height', 10, 255, $height));
	$heightTray->addElement(new XoopsFormLabel('<b>'._AM_PX.'</b>'));
	
	$widthTray = new XoopsFormElementTray(_AM_WIDTH);
	$widthTray->addElement(new XoopsFormText('', 'width', 10, 255, $width));
	$widthTray->addElement(new XoopsFormLabel('<b>'._AM_PX.'</b>'));
	
	$form -> addElement($heightTray);
	$form -> addElement($widthTray);
	$form -> addElement($defaultimg);
	$form -> addElement($onmouseover);

	$align = new XoopsFormRadio(_AM_FLOAT,'align', $align);
	$align -> addOption('left',_AM_FLOATL);
	$align -> addOption('center',_AM_FLOATC);
	$align -> addOption('right',_AM_FLOATR);
	
	$margin = new XoopsFormElementTray(_AM_MARGIN, '');
	$margin -> addElement(new XoopsFormText(_AM_MARGINL,"marginl",10,255,$marginl));
	$margin -> addElement(new XoopsFormText(_AM_MARGINR,"marginr",10,255,$marginr));
	$margin -> addElement(new XoopsFormText(_AM_MARGINT,"margint",10,255,$margint));
	$margin -> addElement(new XoopsFormText(_AM_MARGINB,"marginb",10,255,$marginb));

	if ($repeat == '1') {
		$repeat = new XoopsFormCheckBox(_AM_REPEAT, 'repeat',1);}
		else { $repeat = new XoopsFormCheckBox(_AM_REPEAT, 'repeat');}

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