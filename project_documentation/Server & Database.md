##Server and Database##

###Database Tables:####
The main tables that will be included in the database are:

- **Notification**: Keeps track of the sent Base Notifications
- **User**: Keep track of the system users
- **Group**: A table containing the different groups within BBD eg. SARS, Nedbank, etc.
- **Nominee**: Keeps track of the nominees for a specific month as well as the amount of votes/nominations that they have received for a particular category.

Below is a list of the junction tables:

- **Group_User**: Links users to groups.
- **Group_Note**: Links groups to specific base notifications
- **Group_Note_User**: Links a user from a specific group to a specific base notification.


###Database ERD:###

![Communicator ERD](http://res.cloudinary.com/bandilecloud/image/upload/v1375701608/ERD1_x693id.png)

###Basic Flow of Server Processes###

####Server Receiving a Notification####

- Server receives a Base Notification, from the Communications/HR team, which is specified for a certain group or for all members of BBD.
- The server then processes and saves the Base Notification in the Notification table.
- Based on which group the notification was targeting, an entry is made in the Note\_Group table, and the corresponding received\_counter value is initialized to 0.
- Using the entries from Group\_User and Note\_Group, the server then adds an entry for the notification to the Group\_Note\_User table.(This links the notification to each user that should receive it)
- Once it is confirmed that a user has received the notification, the received column in Group\_Note\_User is marked as true, for that specific user. Additionally the corresponding received\_counter column in Note\_Group is increased by 1.
- Once a receipt of a notification has been counted, the server will removed the corresponding Group\_Note\_User entry. (In order to free space)
- Once the corresponding received\_counter entry in Note\_Group is equal to the corresponding group\_size entry in Group(meaning that all intended recipients have received the notification message), the server will remove that specific notification entry from Note\_Group as well as from Notification.

####Adding a New User####

- When a new user is found, they will be added to the User table.
- A function will then be run, that will fetch all the relevant groups that the user is associated with.
- If the group(s) that is found is not already in the groups table the server will add this group to the group table.
- once the user and the groups are added to their respective tables, the user is then linked to his\her groups by making entries in the Group\_User table.
- If the user is part of a group that is already in the database the group\_size entry for that respective group is then increased by one. Otherwise the user is part of a group that is new to the database in which case the group\_size entry for that group is initialized to 1.