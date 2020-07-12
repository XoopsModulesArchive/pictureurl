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

//%%%%%%	Partie administration	%%%%%
define("_AM_HOME", "Accueil");
define("_AM_IMAGES","Images");
define("_AM_NOIMG","Aucune image r&eacute;f&eacute;renc&eacute;e");
define("_AM_DEFIMG","Image par defaut");
define("_AM_OR","<center><b>OU</b></center>");
define("_AM_URLIMAGE","URL de l'image");
define("_AM_PATHIMAGE","Chemin de l'image");
define("_AM_URLPAGE","URL de la page ou doit s'afficher l'image");
define("_AM_ONMOUSEOVER","Texte du survol de la souris <br /> (non dispo avec la seconde variable smarty)");
define("_AM_URL", "URL");
define("_AM_MATCHING_URL", "O&ugrave; l'image doit - elle s'afficher ?");

define("_AM_IMG","Images");
define("_AM_IMG_LIST", "Liste des images");

define("_AM_IMG_CREATION","Cr&eacute;er une image");
define("_AM_IMG_MODIF","Modifier une image");
define("_AM_IMG_ADD","Ajouter une image aux images disponibles");
define("_AM_IMG_SUP","Supprimer une image");

define("_AM_FLOAT","Alignement");
define("_AM_FLOATL","Gauche");
define("_AM_FLOATR","Droite");
define("_AM_FLOATC","Centre");
define("_AM_HEIGHT","Hauteur");
define("_AM_WIDTH","Largeur");
define("_AM_PX", "px");
define("_AM_MARGIN","Marges (en px)");
define("_AM_MARGINL","Gauche");
define("_AM_MARGINR","Droite");
define("_AM_MARGINT","Haut");
define("_AM_MARGINB","Bas");
define("_AM_REPEAT","R&eacute;p&eacute;tition de l'image");
define("_AM_IMG_PARAMS", "Param&egrave;tres de l'image");
define("_AM_IMG_CSS","Param&egrave;tres CSS");
define("_AM_SECVAR","(accessibles uniquement avec la seconde variable smarty)");

define("_AM_ADDIMG","Image ajout&eacute;e avec succ&eacute;s");
define("_AM_MODIMG","Image modifi&eacute;e avec succ&eacute;s");
define("_AM_SUPIMG","Image supprim&eacute;e avec succ&eacute;s");
define("_AM_ADDRIMG","Image ajout&eacute;e au r&eacute;pertoire uploads avec succ&eacute;s");
define("_AM_ERRORIMG","Vous devez rentrer un nom d'image");
define("_AM_ERRORALIMG","Une image a d&eacute;j&agrave; &eacute;t&eacute; attribu&eacute;e &agrave; cette page");
define("_AM_ERRORTARGET","Pas d'URL cible renseign&eacute;e");
define("_AM_ERRORUKIMG","Le chemin rentr&eacute; est invalide");
define("_AM_NOMIMG","Aucune image existante");

define("_AM_NUM","Numero");
define("_AM_IMAGE","Image");
define("_AM_URLIMG","URL de l'image");
define("_AM_URLPG","URL de la page");
define("_AM_ACT","Actions");
define("_AM_ALT","Texte du survol");
define("_AM_IMGDEF","Image par d&eacute;faut");

define("_AM_SUBMIT","Soumettre");
define("_AM_BACK","Retour");

define("_AM_EX_URL_1", "Exemple 1 : <b>http://www.site.com/</b> pour la racine du site uniquement");
define("_AM_EX_URL_2", "Exemple 2 : <b>http://www.site.com/modules/news/*</b> pour toutes les pages du module news");

define("_AM_HELP","Ce module tr&egrave;s simple permet d'afficher une image diff&eacute;rente pour chaque page de votre site Xoops.<br />
Il ajoute une nouvelle variable smarty comportant &eacute;ventuellement un style d'affichage de l'image.<br /><br />

<br /><b>Installation</b><br /><br />
Lors de l'installation du module, un r&eacute;pertoire de stockage des images sera cr&eacute;&eacute; automatiquement (uploads/pictureurl).
D&eacute;sormais le fonctionnement du module ne n&eacute;c&eacute;ssite plus la modification de header.php. Les &eacute;l&eacute;ments n&eacute;c&eacute;ssaires au fonctionnement
du script sont d&eacute;sormais inclus dans un bloc qui est activ&eacute; automatiquement lors de l'installation. Attention cependant, pour
le bon fonctionnement du module, &agrave; ne pas d&eacute;sactiver ce bloc ou m&ecirc;me changer la page o&ugrave; doit il s'afficher (le bloc
doit &ecirc;tre affich&eacute; sur toutes les pages). A noter que le bloc une fois activ&eacute; reste invisible dans votre site.

<br /><br /><b>Administration</b><br /><br />
Commencez par uploader vos images soit avec l'interface d'administration, soit directement par ftp dans le r&eacute;pertoire uploads/pictureurl de votre site.
Le formulaire 'cr&eacute;er une image' va vous permettre d'associer l'affichage d'une image particuli&egrave;re &agrave; une page (url) de votre site.<br /><br /> 
a) s&eacute;lectionner une image dans la liste d&eacute;roulante ou indiquer son url.<br />
b) vous pouvez d&eacute;finir cette image comme image par d&eacute;faut. Elle s'affichera pour toutes les url que vous n'aurez pas saisies.<br />
c) texte du survol de la souris : le texte que vous saisirez correspond aux attributs Alt et Title.<br />
d) URL de la page o&ugrave; doit s'afficher l'image.<br />
Les trois &eacute;l&eacute;ments (a, c, d) que vous venez de saisir sont indispensables pour l'utilisation de la premi&egrave;re variable smarty -&gt; &lt;&#123;&#36;xoops_pictureurl&#125;&gt;<br /><br />
Il est possible de personnaliser l'affichage de cette image en lui fournissant des attributs de style, vous pourrez alors utiliser ces informations avec la variable smarty -&gt; &lt;&#123;&#36;xoops_pictureurlcss&#125;&gt;<br />
e) Alignement: correspond &eacute; l'attribut float.<br />
f) Hauteur : indiquer la hauteur en pixel de votre image.<br />
g) Largeur : indiquer la largeur en pixel de votre image.<br />
h) Marges : ne remplissez que celles qui sont n&eacute;cessaires, un 0 sera mis par d&eacute;faut si vous n'indiquez rien.<br />
i) R&eacute;p&eacute;tition de l'image.<br /><br />

<b>Int&eacute;gration des variables smarty dans votre th&egrave;me ou template</b><br /><br />
Editez votre fichier theme.html par exemple et ins&eacute;rez &lt;&#123;&#36;xoops_pictureurl&#125;&gt; ou &lt;&#123;&#36;xoops_pictureurlcss&#125;&gt; &agrave; l'endroit o&ugrave; votre image doit s'afficher.
La varable &lt;&#123;&#36;xoops_pictureurlcss&#125;&gt; correspond d&eacute;sormais &agrave; un &eacute;l&eacute;ment de style
que vous pouvez int&eacute;grer &agrave; divers composants comme div (&lt;div style=\"&lt;&#123;&#36;xoops_pictureurl&#125;&gt;\"&gt;...) par exemple.
Ce proc&eacute;d&eacute; permet alors d'int&eacute;grer l'image que vous souhaitez en fond de votre &eacute;l&eacute;ment de style.
<br />N'oubliez pas de r&eacute;pondre oui dans admin system, pr&eacute;f&eacute;rences, param&egrave;tres g&eacute;n&eacute;raux, Mise &agrave; jour des fichiers du th&egrave;me &agrave; partir du r&eacute;pertoire themes/ ? afin que votre modification soit prise en compte.");
?>