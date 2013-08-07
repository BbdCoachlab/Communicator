# Web Application  #
##Introduction
The communication and Human Resource teams at BBD use emails to do internal staff communications. This method of communication is not always efficient as it results in employees receiving enormous amounts of emails. As a consequence, some employees end up ignoring these emails. In addition to the emails being ignored, some of the mails might be sent to the junk mail (spam) which again they end up being unread.

The web application is aimed at bridging this communication challange. It will enable the Communication and Human Resources teams to create and send notifications to  the employees mobile phones. 
 
##The Application

The main function of the web application is  creating and sending notifications to employees. To acheive this, the application sends each notification to the server. The server then pushes the notification to the mobile application.

The major notifications which will be created are:

- **Birthday Notification**: This is a base notification containing the subject, message and image.
 The web page for creating this notification may look like this:

![](http://res.cloudinary.com/dfkqmkuwv/image/upload/v1375713467/birthdayScreen_rvm7sz.png)

- **Events Notifications**: This is a notification about events that will be happening in the business. These events can either be rsvp events such as year of end functions or non-rsvp events such as health awareness day. For the rsvp events, the employees have to send an rsvp to the Human resources team or the communication team. In addition to just sending an rsvp, employees can also state their dietary requirement, how many people will they bring to the event, and whether they need transport arrangements.  

A screen for events would look more similar to that of birthdays but with extra fields for:

           - rsvp or non-rsvp type events
           - stating number of people to bring along
           - stating dietary requirements
           - transport arrangements
          	
- **Awards**: The awards functionality is divided into two. The first one is a notification of people who won or a reminder to nominate. This functionality is similar to the birthday notification and thus will contain attributes similar to it. The second functionality is nomination. This functionality allows employees to nominate the employer of the month based on the following categories: (i) The silent Operator, (ii) Helping your People, (iii) Ultimate BBD Agent, and (iv) Whatever It Takes.

## Other Functionality ##

In addition to the functionalities mentioned above, the web application will use Yammer Authentication to verify users. This means that members of the communication and Human resource teams need to have Yammer acccounts in order to use the web application. 


The Authentication flow on the web application will be the Server-side flow. This flow has three steps: (i) User Authentication which verifies if the user is who they claim to be; (ii) App Authorization which authorises the App to access user's data; and (iii) App Authentication  which ensures that the user is providing their own information and not someone else's.

An example of a login page for the web would look like this:
![](http://res.cloudinary.com/dfkqmkuwv/image/upload/v1375769561/loginScreen_i7bktz.png) 
## Conclusion ##
Effective communication is one of the important elements in business and in everyday life. The web application, together with the mobile application will try to provide an effecient method of communication between the Communications team  and the employees at BBD. 
