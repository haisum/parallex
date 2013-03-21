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

Requirements
------------
- Web site will be in Parallax Concept
- Top Menu: Home, Music, Drama Series, Shows, Schedule, Live & Mobile
Sub menu of Music
Sub menu of Drama Series
Sub menu of Shows
-Top Menu contain: Logo, Menu Bar, Login, register, FB Register, Search
- Part one has Slider that contain 4 slides of: About Nex1, Tune in, Mobile Apps & new Shows Countdown
- Second part “Music” that will show the Music thumbnail and name of the program. When you click on that it will show Promo video, Description, program timing. 
- Third part “Drama Series” that will show the 5 Drama Series thumbnail and name of the program. When you click on that it will show Promo video, Description, program timing. 
- Fourth part “Shows” that will show the Show thumbnails and name of the program. When you click on that it will show Promo video, Description, program timing. 
- Fifth part is “Schedule” that there will be 3 categories of Music, Drama Series, Shows that show the timing of each program in a table with GMT and DXB timing.
- Sixth part is a video player that is the LIVE show of the TV.
- Seventh part is the icon of the mobile apps that user click and takes him to App store or Android Market.
- Top menu will have a section for login and register of users and FB register.
- We will create a page for online shopping where user can buy the product or service online. User will be redirected to a new page where he view different products and then add any products to the cart and checkout and pa online using Paypal or/and online payment gateway of the local bank that will be provided by the client.