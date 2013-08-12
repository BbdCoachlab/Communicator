##Database##

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


####Database ERD:####

![Communicator ERD](http://res.cloudinary.com/bandilecloud/image/upload/v1375701608/ERD1_x693id.png)
