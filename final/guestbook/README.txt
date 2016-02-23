
guestbook.php
===========================

Why?
----
This script is meant to simply illustrate how one might go about beginning to contstruct a guestbook or bulletin board system using php and HTML forms. It doesn't do much, but that should make it easier to understand. 


Installation
-------------
You just unzip the archive and you should have

guestbook          (folder)
   index.php       (the script)
   comments.txt    (where the guestbook/comments get written)
   README.txt      (this file!)
   
You must take care to insure that "comments.txt" is WRITEABLE by the php script. On some systems PHP will be running as if it were the user, so user:read/write is enough (and probably the default). On other systems, you may need to set world: or "other":read/write for the script to work properly. If submitted comments are not being saved to the comments file, it's probably a permission problem.

