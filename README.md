Communicator
==========
Internal tool for BBD staff communication




##Web application####
##Overview of functionality##


###Login function:###

Users will be logged in using the Yammer OAuth API.


####Overview of events function:####
Sends a base message which may include:
=======
###Events function:###
Sends a base message which may include: 


- Subject
- Message
- Image

In addition, questions that require user feedback need to be added.
These questions are:

 -  RSVP
 -  Dietary requirements
 -  Number of guests
 -  Driver required

Users will give feedback to any of the questions listed above from within the app.
	
HEAD
Events may be sent to all employees or just to specific teams.

##Event Invites##
 



	
	
	
Events may be sent to all employees or just to specific teams. Below is the sequence diagram for the events function.
![Events Sequence Diagram](http://res.cloudinary.com/ddgnvmjdr/image/upload/v1374820373/eventsequence_yczehu.png)


###Base Notification###
Base notification is the basic notification that will be used to send messages to the employees on the proposed mobile application. This type of notification uses a push technology. That is, it will use an internet-based communication which is initiated by the publisher(or a central server). The proposed attributes for the base notification are:

- Message
- Image
- Subject

**Message** - The message contains the actual text of the notification. For example if the base notification is a birthday message the the message might be:
> ''happy birthday XXXXX'' 


**Image** - The image is the image of the notification. For example, if the notification is a birthday message then the image might be an image of a cake.

![Happy birthday image](https://f.cloud.github.com/assets/1060960/848359/67b215c2-f45d-11e2-8935-ee987ccca3a9.jpg)


 

##Awards

**Subject** - This attribute will contain the subject of the message/notification that is being sent. For example the Communications or HR team will choose from the following Subject options: 



- Birthday
- Awards
- Invitations/Events
- Newborn babies

**Base Notification Flow Diagram** - 

![Base Flow Diagram](http://res.cloudinary.com/bandilecloud/image/upload/v1375249651/BaseNoteFlow_ap2hlt.png)


###Awards/Nomination function###

A communication employee logs into the Website App and sends
a reminder that will be sent to all the employees informing them to nominate each other (base notification). 


The application will display a list of employees name, surname and their picture.


The application will display a list of employees name, surname and their picture.

From that list,an employee will be able to select who they want to nominate.

Once they have nominated an employee a text box will appear enabling them to comment on why they have nominated the individual.

An email will be sent to the communications team with every person nominated. 

The communications team will send a message to the all the employees showing the people with the highest nominations (base notification). 

A notification will be sent to all the employee showing all the winners (base notification).






A notification will be sent to all the employee showing all the winners (base notification).

process flows for the nominations/awards
 

Step 1  

![](http://res.cloudinary.com/dijnw3hev/image/upload/v1374917509/nma_dwpq5t.jpg)

Step 2 

![](http://res.cloudinary.com/dijnw3hev/image/upload/v1374849966/55_i5movm.jpg)




