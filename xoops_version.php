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

//InfoModule
$modversion['name'] = "pictureurl";
$modversion['version'] = "1.3";
$modversion['description'] = "Gestion des images";
$modversion['credits'] = "http://www.frxoops.og";
$modversion['author'] = "Philou";
$modversion['license'] = "La licence du site actuel s'applique a ce module";
$modversion['image'] = "images/image.png";
$modversion['dirname'] = "pictureurl";

// name of the generated tag
$modversion['tagimg'] = "img";
//$modversion['smarty_pictureurl'] = "xoops_pictureurl";

//Menu
$modversion['hasMain'] = "0";

//Admin
$modversion['hasAdmin'] = "1";
$modversion['adminindex'] = "admin/index.php";
$modversion['adminmenu'] = "admin/menu.php";

//SQL
$modversion['sqlfile']['mysql'] = "sql/mysql.sql";
$modversion['tables'][0] = "pictureurl";

//installation
$modversion['onInstall'] = "include/install.php";

//bloc
$modversion['blocks'][1]['file'] = "pictureurl_block.php";
$modversion['blocks'][1]['name'] = "pictureurl";
$modversion['blocks'][1]['description'] = "creation img smarty";
$modversion['blocks'][1]['show_func'] = "pictureurl_generate";

if (!file_exists(XOOPS_ROOT_PATH."/uploads/pictureurl"))
{
	$chemin=XOOPS_ROOT_PATH.'/uploads/pictureurl';
	mkdir("$chemin",0777);
}
?>