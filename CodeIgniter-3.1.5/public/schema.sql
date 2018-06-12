SET foreign_key_checks = 0;

DROP TABLE IF EXISTS adtPostTags;
DROP TABLE IF EXISTS adtPostCategories;
DROP TABLE IF EXISTS adtTags;
DROP TABLE IF EXISTS adtCategories;
DROP TABLE IF EXISTS adtBlog;

CREATE TABLE adtBlog(
idAdtBlog int UNSIGNED not null auto_increment,
adtBlogAuthor varchar(255) not null,
adtBlogTitle varchar(255) not null,
adtBlogExcerpt varchar(255) not null,
adtPost longtext not null,
adtPostType varchar(25) not null,
adtPostPublishDate varchar(25) null,
PRIMARY KEY (idAdtBlog)
)ENGINE=InnoDB;

CREATE TABLE adtCategories(
idAdtCategories int UNSIGNED not null auto_increment,
adtCategoriesCategory varchar(100) not null,
PRIMARY KEY (idAdtCategories)
)ENGINE=InnoDB;

CREATE TABLE adtTags(
idAdtTags int UNSIGNED not null auto_increment,
adtTagsTag varchar(100) not null,
PRIMARY KEY (idAdtTags)
)ENGINE=InnoDB;


CREATE TABLE adtPostCategories(
idAdtPostCategories int unsigned not null auto_increment,
idAdtBlog int unsigned not null default 0,
idAdtCategories int unsigned not null default 0,
PRIMARY KEY (idAdtPostCategories),
FOREIGN KEY (idAdtBlog) REFERENCES adtBlog(idAdtBlog),
FOREIGN KEY (idAdtCategories) REFERENCES adtCategories(idAdtCategories)
)ENGINE=InnoDB;

CREATE TABLE adtPostTags(
idAdtPostTags int unsigned not null auto_increment,
idAdtBlog int unsigned not null default 0,
idAdtTags int unsigned not null default 0,
PRIMARY KEY (idAdtPostTags),
FOREIGN KEY (idAdtBlog) REFERENCES adtBlogDND5eCharacters(idAdtBlog),
FOREIGN KEY (idAdtTags) REFERENCES adtTags(idAdtTags)
)ENGINE=InnoDB;

SET foreign_key_checks = 1;