# cpsc113-social-todo-php

This is my app. Again, I am so sorry that this is so late.

I used PHP and a MySQL database (running off of PHPMyAdmin) for the second social todo. I used a great deal of code from a previous problem set for CS50, namely the login/logout/register capabilities (with some changes), connecting to the database (config.json), and the CSS.

However, because I was unable to figure out how to start the server outside of the CS50 Cloud 9 IDE, this also includes the vendor library that came with the problem set, and was built in the CS50 Cloud 9 IDE rather than a "regular" Cloud 9 workspace. The appropriate credits are left in; the add/delete task and marking tasks as complete/incomplete capabilities are not taken from the CS50 problem set, although they do make use of CS50 resources that I found through the documentation of special functions, e.g. CS50::query rather than mysqli.query.

## How to run this
First, make sure that all servers are stopped by running

  killall -9 server
  apache50 stop

Then, restart the Apache server and the PHPMyAdmin database:

  apache50 start
  mysql50 start

This should be all you need to start the app!
