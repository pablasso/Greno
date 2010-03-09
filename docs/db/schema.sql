CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `locations` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `map` text NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `silos` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `location_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `motors` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `qualities` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `silo_id` int(10) unsigned NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `date_custom` datetime NOT NULL,
  `person` varchar(255) NOT NULL,
  `humidity` float(6,2) NOT NULL,
  `impurity` float(6,2) NOT NULL,
  `damage_fungus` float(6,2) NOT NULL,
  `damage_heat` float(6,2) NOT NULL,
  `damage_insects` float(6,2) NOT NULL,
  `damage_rot` float(6,2) NOT NULL,
  `damage_stain` float(6,2) NOT NULL,
  `damage_other` float(6,2) NOT NULL,
  `broken` float(6,2) NOT NULL,
  `weight_specific` float(8,2) NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `plagues` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `silo_id` int(10) unsigned NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `date_custom` datetime NOT NULL,
  `person` varchar(255) NOT NULL,
  `primary_alive_name` varchar(255) NOT NULL,
  `secondary_alive_name` varchar(255) NOT NULL,
  `primary_dead_name` varchar(255) NOT NULL,
  `secondary_dead_name` varchar(255) NOT NULL,
  `primary_alive_sample` float(6,2) NOT NULL,
  `secondary_alive_sample` float(6,2) NOT NULL,
  `primary_dead_sample` float(6,2) NOT NULL,
  `secondary_dead_sample` float(6,2) NOT NULL,
  `primary_alive_total` float(6,2) NOT NULL,
  `secondary_alive_total` float(6,2) NOT NULL,
  `primary_dead_total` float(6,2) NOT NULL,
  `secondary_dead_total` float(6,2) NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `events` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `silo_id` int(10) unsigned NOT NULL,
  `type` varchar(255) NOT NULL,
  `date_custom` datetime NOT NULL,
  `created` datetime default NULL,
  `modified` datetime default NULL,
  `person` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `type` varchar(255) NOT NULL,
  `type_id` int(10) unsigned NOT NULL default 0,
  `created` datetime default NULL,
  `path` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `caption` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `configurations` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `silo_id` int(10) unsigned default NULL,
  `fan_auto` boolean default NULL,
  `humidity_min` int(3) default NULL,
  `humidity_max` int(3) default NULL,
  `fan_service_min` int(4) default NULL,
  `fan_service_max` int(4) default NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `api_requests` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `silo_id` int(10) unsigned default NULL,
  `api_key` varchar(32) default NULL,
  `method` varchar(255) NOT NULL,
  `created` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `floats` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `silo_id` int(10) unsigned default NULL,
  `tagname` varchar(20) NOT NULL,
  `value` float default NULL,
  `time` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `bools` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `silo_id` int(10) unsigned default NULL,
  `tagname` varchar(20) NOT NULL,
  `value` boolean default NULL,
  `time` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;