# Push Notifications for BBD Communicator #
BBD communicator uses push notifications extensively to send messages from the communication team to the employees. The general flow of push notification is depicted below:
![](http://res.cloudinary.com/dfkqmkuwv/image/upload/v1381320513/Push_Notification_xbpewn.png)

##Push Notification on Server  ##
The web application sends a message to the cloud service, along with an target token. 
The target token can be:

 - **Registration id** - An ID issued by the notification sevice to the device application which enables it to receive messages. Once the device has a registration key it sends it to the BBD communicator server, which uses it to identify devices that are registered to receive messages. That is the registration id is tied up to BBD communicator application running on a particular device. 
 - **Notification key** - This key allows the server to send a message to a single user which uses multiple devices. It is a string which maps a single user to multiple registration IDs. The notification key enables each instance app to reflect the latest message on each device that the user owns. For example, if a user read the message in their tablet, then the message will also be marked as read in their phone(or any other device which they have the app installed). For instructions on how to generate a notification key, read [User Notifications](http://developer.android.com/google/gcm/notifications.html) page on Android developers site.


 

## Note for Developers ##

The follwing should be noted about developing push notifications in general:

 - Push notification service does not provide any guarantee about delivery or order of messages.
 - Notification service does not provide any message handling. It simply passes the message as raw data. Thus the device receiving the message should decide how to display the message to the user interface.
 - The push notification service depends on which mobile software one is developing for. For Adroid, the Notification service is GCM and more instructions on how to set it up can be found by clicking [here](http://lessons.runrev.com/s/lessons/m/4069/l/59312-how-do-i-use-push-notifications-with-android).

 
 

 