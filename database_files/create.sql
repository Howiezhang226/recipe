CREATE TABLE Recipe
(
    rid INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(50),
    number_of_serving TINYINT(4),
    description TEXT,
    username VARCHAR(20),
    CONSTRAINT recipe_ibfk_1 FOREIGN KEY (username) REFERENCES User (uname)
);
CREATE INDEX username ON Recipe (username);
CREATE TABLE User
(
    uname VARCHAR(20) PRIMARY KEY NOT NULL,
    ugender CHAR(1),
    uloginname VARCHAR(20),
    upassword VARCHAR(100),
    uage TINYINT(4) DEFAULT '0'
);
CREATE TABLE exchange
(
    inputunit VARCHAR(20) NOT NULL,
    outputunit VARCHAR(20) NOT NULL,
    uquantities DOUBLE(8,4),
    CONSTRAINT `PRIMARY` PRIMARY KEY (inputunit, outputunit)
);
CREATE TABLE groups
(
    gid INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    creator VARCHAR(20),
    gname VARCHAR(20),
    CONSTRAINT groups_ibfk_1 FOREIGN KEY (creator) REFERENCES User (uname)
);
CREATE INDEX creator ON groups (creator);
CREATE TABLE ingredient
(
    iid INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    iname VARCHAR(20)
);
CREATE TABLE join_groups
(
    gid INT(10) NOT NULL,
    uname VARCHAR(20) NOT NULL,
    jointime DATETIME NOT NULL,
    CONSTRAINT `PRIMARY` PRIMARY KEY (gid, uname, jointime),
    CONSTRAINT join_groups_ibfk_2 FOREIGN KEY (gid) REFERENCES groups (gid),
    CONSTRAINT join_groups_ibfk_1 FOREIGN KEY (uname) REFERENCES User (uname)
);
CREATE INDEX uname ON join_groups (uname);
CREATE TABLE meeting
(
    mid INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    mname VARCHAR(20),
    mtime DATETIME,
    mholder INT(10),
    mlocation VARCHAR(20),
    CONSTRAINT meeting_ibfk_1 FOREIGN KEY (mholder) REFERENCES groups (gid)
);
CREATE INDEX mholder ON meeting (mholder);
CREATE TABLE rating
(
    uname VARCHAR(20) NOT NULL,
    rid INT(10) NOT NULL,
    star TINYINT(4),
    CONSTRAINT `PRIMARY` PRIMARY KEY (uname, rid),
    CONSTRAINT rating_ibfk_1 FOREIGN KEY (uname) REFERENCES User (uname),
    CONSTRAINT rating_ibfk_2 FOREIGN KEY (rid) REFERENCES Recipe (rid)
);
CREATE INDEX rid ON rating (rid);
CREATE TABLE recipe_item
(
    iid INT(10) NOT NULL,
    rid INT(10) NOT NULL,
    unit VARCHAR(20),
    Quantities DOUBLE(8,4),
    CONSTRAINT `PRIMARY` PRIMARY KEY (iid, rid),
    CONSTRAINT recipe_item_ibfk_1 FOREIGN KEY (iid) REFERENCES ingredient (iid),
    CONSTRAINT recipe_item_ibfk_2 FOREIGN KEY (rid) REFERENCES Recipe (rid)
);
CREATE INDEX rid ON recipe_item (rid);
CREATE TABLE recipe_tag
(
    tid INT(10) NOT NULL,
    rid INT(10) NOT NULL,
    CONSTRAINT `PRIMARY` PRIMARY KEY (tid, rid),
    CONSTRAINT recipe_tag_ibfk_1 FOREIGN KEY (tid) REFERENCES tags (tid),
    CONSTRAINT recipe_tag_ibfk_2 FOREIGN KEY (rid) REFERENCES Recipe (rid)
);
CREATE INDEX rid ON recipe_tag (rid);
CREATE TABLE related_recipe
(
    rid1 INT(10) NOT NULL,
    rid2 INT(10) NOT NULL,
    CONSTRAINT `PRIMARY` PRIMARY KEY (rid1, rid2),
    CONSTRAINT related_recipe_ibfk_1 FOREIGN KEY (rid1) REFERENCES Recipe (rid),
    CONSTRAINT related_recipe_ibfk_2 FOREIGN KEY (rid2) REFERENCES Recipe (rid)
);
CREATE INDEX rid2 ON related_recipe (rid2);
CREATE TABLE report
(
    mid INT(10) NOT NULL,
    uname VARCHAR(20) NOT NULL,
    CONSTRAINT `PRIMARY` PRIMARY KEY (mid, uname),
    CONSTRAINT report_ibfk_1 FOREIGN KEY (mid) REFERENCES meeting (mid),
    CONSTRAINT report_ibfk_2 FOREIGN KEY (uname) REFERENCES User (uname)
);
CREATE INDEX uname ON report (uname);
CREATE TABLE report_photo
(
    reportwphotoid INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    reportphotoname VARCHAR(20),
    reportphotobody VARCHAR(20),
    mid INT(10),
    uname VARCHAR(20),
    CONSTRAINT report_photo_ibfk_1 FOREIGN KEY (mid) REFERENCES ,
    CONSTRAINT report_photo_ibfk_2 FOREIGN KEY (uname) REFERENCES
);
CREATE INDEX mid ON report_photo (mid);
CREATE INDEX uname ON report_photo (uname);
CREATE TABLE review
(
    uname VARCHAR(20) NOT NULL,
    rid INT(10) NOT NULL,
    content TEXT,
    suggestion TEXT,
    rating TINYINT(4),
    CONSTRAINT `PRIMARY` PRIMARY KEY (uname, rid),
    CONSTRAINT review_ibfk_1 FOREIGN KEY (uname) REFERENCES User (uname),
    CONSTRAINT review_ibfk_2 FOREIGN KEY (rid) REFERENCES Recipe (rid)
);
CREATE INDEX rid ON review (rid);
CREATE TABLE review_photo
(
    reviewphotoid INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    reviewphotoname VARCHAR(20),
    reviewphotobody VARCHAR(20),
    rid INT(10),
    uname VARCHAR(20),
    CONSTRAINT review_photo_ibfk_1 FOREIGN KEY (rid) REFERENCES ,
    CONSTRAINT review_photo_ibfk_2 FOREIGN KEY (uname) REFERENCES
);
CREATE INDEX rid ON review_photo (rid);
CREATE INDEX uname ON review_photo (uname);
CREATE TABLE rsvpmeeting
(
    mid INT(10) NOT NULL,
    uname VARCHAR(20) NOT NULL,
    rsvptime DATETIME,
    CONSTRAINT `PRIMARY` PRIMARY KEY (mid, uname),
    CONSTRAINT rsvpmeeting_ibfk_1 FOREIGN KEY (mid) REFERENCES meeting (mid),
    CONSTRAINT rsvpmeeting_ibfk_2 FOREIGN KEY (uname) REFERENCES User (uname)
);
CREATE INDEX uname ON rsvpmeeting (uname);
CREATE TABLE tags
(
    tid INT(10) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    tname VARCHAR(20)
);