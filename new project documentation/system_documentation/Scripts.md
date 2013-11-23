

#Scripts#

##department_list.php##
This code creates the list of the departments.
#### Requires####
 - db/connectionScript.php
 - db/DepartmentScript.php

##login.php##
This code checks for user login and perform action according to user information if provided.

### Requires###
 - db/connectionScript.php
 - db/DepartmentScript.php
 - db/UserScript.php
 - db/NotificationScript.php
 - db/NomineeScript.php
 - db/Note_DepartmentScript.php
 - db/Department_UserScript.php
 - db/Department\_Note_UserScript.php
###Header###
Location: /bbdcom/index.php

##logout.php##
 This file checks for login and redirects to the home page when user has logged out.

###Header###
 - Location: /bbdcom/index.php

##Mobile_login.php##
This code is used for logging in for the mobile application.
###Requires###
 - db/connectionScript.php
 - db/UserScript.php
 - db/NotificationScript.php
 - db/DepartmentScript.php
 - db/NomineeScript.php
 - db/Note_DepartmentScript.php
 - db/Department_UserScript.php
 - db/Department\_Note_UserScript.php

##RegistrationID.php##
This file is for the registration ID for each mobile device used by the server to identify devices registered to receive messages. It creates a new ID for each new devices that is registered.

Contains the same _require_ functions as in the above script.
##Send\_basic_messages.php##
Code handles sending messages and uploading images for the birthday function on the web application side.

Contains the same _require_ functions as above function.
###Include###
 - upload_image.php
##Birthday_list.php##
The bithday_list.php displays a short summary of the birthday list of employees, displayed by name, surname, date and department.
##check\_logged_list.php
The file redirects to the bbd home page when login session has timed out.
###Header
- Location: /bbdcom/index.php

##send_birthday.php##
Checks if a message is given and submits
##upload_image.php##
The code handles uploading images in limiting image size and giving image format.
