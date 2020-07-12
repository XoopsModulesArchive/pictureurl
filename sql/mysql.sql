# MySQL-Front 3.2  (Build 6.4)

# Host: portablepm    Database: x2010
# ------------------------------------------------------
# Server version 4.0.22-nt

#
# Table structure for table images
#
CREATE TABLE `pictureurl` (
  `id` int(11) NOT NULL auto_increment,
  `image` varchar(50) NOT NULL default '',
  `defaultimg` int(1) NOT NULL default '0',
  `url_image` varchar(255) default NULL,
  `onmouseover` varchar(255) default NULL,
  `url_page` varchar(255) default NULL,
  `align` varchar(50) default NULL,
  `height` int(10) default NULL,
  `width` int(10) default NULL,
  `marginl` int(10) default NULL,
  `marginr` int(10) default NULL,
  `margint` int(10) default NULL,
  `marginb` int(10) default NULL,
  `rrepeat` varchar(10) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

#
# Dumping data for table images
#

