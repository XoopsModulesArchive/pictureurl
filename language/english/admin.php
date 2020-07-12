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

//%%%%%%	Admin	%%%%%
define("_AM_HOME", "Home");
define("_AM_IMAGES","Pictures");
define("_AM_NOIMG","No existing pictures");
define("_AM_DEFIMG","Default picture");
define("_AM_OR","<center><b>OR</b></center>");
define("_AM_URLIMAGE","Picture URL");
define("_AM_PATHIMAGE","Picture path");
define("_AM_URLPAGE","URL where the picture must be displayed");
define("_AM_ONMOUSEOVER","Onmouseover text <br /> (not available with the second smarty variable)");
define("_AM_URL", "URL");
define("_AM_MATCHING_URL", "Where does the picture be displayed ?");

define("_AM_IMG","Pictures");

define("_AM_IMG_CREATION","Create a picture");
define("_AM_IMG_MODIF","Modify a picture");
define("_AM_IMG_ADD","Add a picture to availables pictures");
define("_AM_IMG_SUP","Delete a picture");

define("_AM_FLOAT","Alignment");
define("_AM_FLOATL","Left");
define("_AM_FLOATR","Right");
define("_AM_FLOATC","Center");
define("_AM_HEIGHT","Height");
define("_AM_WIDTH","Width");
define("_AM_PX", "px");
define("_AM_MARGIN","Margin (in px)");
define("_AM_MARGINL","Left");
define("_AM_MARGINR","Right");
define("_AM_MARGINT","Top");
define("_AM_MARGINB","Bottom");
define("_AM_REPEAT","Picture repetition");
define("_AM_IMG_CSS","CSS parameters");
define("_AM_SECVAR","(only availables with the second smarty variable)");

define("_AM_ADDIMG","Picture added successfully");
define("_AM_MODIMG","Picture modified successfully");
define("_AM_SUPIMG","Picture deleted successfully");
define("_AM_ADDRIMG","Picture added to uploads directory successfully");
define("_AM_ERRORIMG","You must put a picture name");
define("_AM_ERRORALIMG","A picture is already displayed on this page");
define("_AM_ERRORTARGET","No target url for displaying image");
define("_AM_ERRORUKIMG","Invalid path");
define("_AM_NOMIMG","No existing picture");

define("_AM_NUM","Number");
define("_AM_IMAGE","Picture");
define("_AM_URLIMG","Picture URL");
define("_AM_URLPG","Page URL");
define("_AM_ACT","Actions");
define("_AM_ALT","Onmouseover text");
define("_AM_IMGDEF","Default picture");

define("_AM_SUBMIT","Submit");
define("_AM_BACK","Back");

define("_AM_EX_URL_1", "Example 1 : <b>http://www.site.com/</b> site root only");
define("_AM_EX_URL_2", "Example 2 : <b>http://www.site.com/modules/news/*</b> all pages of news module");

define("_AM_HELP","This very simple module allow to display a different picture to each page of your XOOPS website.<br />
It adds a new smarty variable, including possibly a display style for the picture.<br /><br />

<br /><b>Installation</b><br /><br />
At the module installation, a picture storage directory will be created automatically (uploads/pictureurl).<br />
Now you don't have to modify your xoops header.php. The script is included in a bloc which is automatically activated during
the module installation. Be carefull, please don't desactivate this bloc or change the pages where it is displayed or
the module won't work properly. Please note that picture url bloc is not visible in your site.

<br /><b>Administration</b><br /><br />
This module does not have any menu or block.<br />
Start by uploading your pictures with admin interface, or directly by ftp in uploads/pictureurl directory of your website.<br /><br />
The form 'create a picture' allows to associate a picture to a page (url) of your site.<br /><br /> 
a) Select a picture in the list or give an URL.<br />
b) You can define this picture as default picture. It will be displayed for all the URLs not defined.<br />
c) Onmouseover text : the text typed corresponds to Alt and Title attributes.<br />
d) URL of the page where the picture must be displayed.<br />
The three elements (a, c, d) are essential for the fisrt smarty variable use -&gt; &lt;&#123;&#36;xoops_pictureurl&#125;&gt;<br /><br />
It is possible to personalize the picture display giving style attributes, then, you can use these information with smarty variable -&gt; &lt;&#123;&#36;xoops_pictureurlcss&#125;&gt;<br />
e) Alignment: corresponds to float attribute.<br />
f) Height : picture height, in pixel.<br />
g) Width : picture width, in pixel.<br />
h) Margins : only filled the necessary margins, a 0 will be put if nothing is put.<br />
i) Picture repetition.<br /><br /> 

<br /><b>Smarty variables integration in your theme or template</b><br /><br />
Edit the file theme.html for example and insert &lt;&#123;&#36;xoops_pictureurl&#125;&gt; or &lt;&#123;&#36;xoops_pictureurlcss&#125;&gt; at the place where your picture must be displayed.
The var &lt;&#123;&#36;xoops_pictureurlcss&#125;&gt; is now a style item that you can integrate in various items like div
(&lt;div style=\"&lt;&#123;&#36;xoops_pictureurl&#125;&gt;\"&gt;...) for example. With this feature you can now put the
picture you want as a background in your style item.
<br />Don't forget to answer yes in dans admin system, preferences, general parameters, Theme files update by themes/ ? directory in order to validate your modification.");
?>