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
	case "addimg":
	addimg();
	break;
}

function addimg()
{
	$allowed_mimetypes = array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/x-png', 'image/png');
	$img_dir = XOOPS_ROOT_PATH . "/uploads/pictureurl" ;

	$path_img2 = $_POST["xoops_upload_file"][0];
	if (!empty($path_img2) || $path_img2 != "") {
		$uploader = new XoopsMediaUploader($img_dir, $allowed_mimetypes, 999999999, 999999999, 999999999);
		if ($uploader->fetchMedia($path_img2) && $uploader->upload()) {
			$uploader->getSavedFileName();
		} else {
			echo $uploader->getErrors();
		}
	}
	redirect_header("index.php",2,_AM_ADDRIMG);
}

// Xoops admin header
xoops_cp_header();

echo "<table width='100%'><tr><td align='center'><img src='../images/pictureurl.gif' alt='' title=''></td><td align='right' width='55'><a href='../help/help.php'><img src='../images/help.gif' alt='aide' title='aide'></a></td></tr></table><br />";

// Nice menu with tabs
pictureurl_tabsAdminMenu(__FILE__);

if (empty($op)) {
	
	$form = new XoopsThemeForm(_AM_IMG_LIST,'cimg','creation.php','post');

	$image = new XoopsFormText(_AM_IMAGES,'image',50,255, '');
	$images_array = XoopsLists :: getImgListAsArray( XOOPS_ROOT_PATH . "/uploads/pictureurl" );
	$image = new XoopsFormSelect(_AM_IMAGES, "image", $image, 10);
	$image->addOptionArray($images_array);

	$form -> addElement($image);
	$form->display();
	
	// Upload form
	$form = new XoopsThemeForm(_AM_IMG_ADD,'cimg','addition.php?op=addimg','post');
	$form->setExtra("enctype='multipart/form-data'") ; // imperatif !
	$path_img = new XoopsFormFile(_AM_PATHIMAGE,'path_img',999999999999999999999999);
	$path_img->setExtra("") ;

	$submit = new XoopsFormButton('', 'submit', _AM_SUBMIT, 'submit');

	$form -> addElement($path_img);
	$form -> addElement($submit);

	$form->display();
}

xoops_cp_footer();
?>