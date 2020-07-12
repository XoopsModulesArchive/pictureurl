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


/**
 * This function is responsible of activating picture url block when installation
 * process is invoked.
 */
function xoops_module_install_pictureurl(&$module) {

	global $xoopsDB;

	// Getting all module blocks
	$pictureurlBlocks =& XoopsBlock::getByModule($module->getVar('mid'));

	// Getting the block to be activated
	$pictureurlBlock =& $pictureurlBlocks[0];

	// Activating the block and error check
	if (!$xoopsDB->queryF('UPDATE `'.$xoopsDB->prefix('newblocks').'` SET `visible`=\'1\' WHERE `bid`=\''.$pictureurlBlock->getVar('bid').'\'')) return false;

	if (!$xoopsDB->queryF('INSERT INTO `'.$xoopsDB->prefix('group_permission').'` (`gperm_groupid`, `gperm_itemid`, `gperm_modid`, `gperm_name`) VALUES (\'3\',\''.$pictureurlBlock->getVar('bid').'\',\'1\',\'block_read\')')) return false;

        if (!$xoopsDB->queryF('DELETE FROM `'.$xoopsDB->prefix('block_module_link').'` WHERE `block_id` = \''.$pictureurlBlock->getVar('bid').'\'')) return false;

	if (!$xoopsDB->queryF('INSERT INTO `'.$xoopsDB->prefix('block_module_link').'` (`block_id`, `module_id`) VALUES (\''.$pictureurlBlock->getVar('bid').'\', \'0\')')) return false;

	// All right
	return true;
}
?>