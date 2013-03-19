Parallex
========

experimenting a parallex website

----------

Guidelines
---------

**DB CHANGES**
- Whatever schema changes you make to database, make a file that includes alter/drop/create commands with timestamp eg 20130320.sql and save it in schema folder.
- There will be a main schema.sql file that will define complete db schema dump structure of db after each change and update this file. 
Both steps are important for pushing db changes!

**DB Schema**
- Collation for databse and each table should be UTF8_BIN
- Engine for each table is going to be InnoDB. MyISAM not allowed.
