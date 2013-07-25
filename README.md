Communicator
============
Internal tool for BBD staff communication

##Login##
Users will be authenticated using the Yammer OAuth API.

##Base Notification##

Base notification is the basic notification that will be used to send messages to the employees on the proposed mobile application. This type of notification uses a push technology. That is, it will use an internet-based communication which is initiated by the publisher(or a central server). The proposed attributes for the base notification are: image, subject and message.

**Message** - The message contains the actual text of the notification. For example if the base notification is a birthday message the the message might be:
> ''happy birthday XXXXX'' 


**Image** - The image is the image of the notification. For example, if the notification is a birthday message then the image might be an image of a cake.

![Happy birthday image](https://f.cloud.github.com/assets/1060960/848359/67b215c2-f45d-11e2-8935-ee987ccca3a9.jpg)

##Event Invites##
 
![Events Sequence Diagram](eventsequence.png)

