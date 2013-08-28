Project Plan Document
=====================

The purpose of this document is to discuss the problem which we are trying to solve. It will outline the problem we need to solve it and how we plan on implementing the solution.
The project consists of creating a mobile app to enhance communication at BB&D.

##Understanding the problem##

At the present moment, the HR/Comms team is using the BBD email address to send important messages to the rest of the employees. The problem with this line of communication is that the employee's emails are being flooded with messages outside their working scope, causing disturbance to the flow of their work. The employees are finding these messages as a form of a spam, causing a late reply back to the HR/Comms team and at times very important messages being ignored. 

The messages sent out by the HR/Comms team consists of:



-  Reminders about employees birthdays 


- Reminders to the BBD employees to nominate and vote for a colleague and announcements of the people who have won. 

- Invitations to events are sent out requiring the employees to RSVP, specify if they would be bringing a date and any special diet requirements that they would need. 

Having employees ignore these messages,makes it difficult for the HR/comms team to prepare accordingly and makes communication about whats going on quite difficult.

##Proposed solution##

The solution that the CoachLab interns are proposing is to create a mobile app, this mobile app will facilitate communication between the HR/Comms team and the rest of the BBD employees. The solution involves the HR/Comms team logging into the web app, using their yammer details.There, they are able to create and send the message of interest. This message is now received as a push notification by the employees, where they are able to read and reply accordingly. The reason for the transition from work email to mobile, is to give them more control of the messages they receive and hence will not interfere with their work. The communication between the HR/Comms team will be made efficient. 

Below is a process diagram of the solution

![](http://res.cloudinary.com/dj7drqsvc/image/upload/v1375769561/procesf_h50uay.png)


To implement this solution a lot of consideration has to be taken into about the tools in which would have to be used. The reason for using the yammer Authentication is for  convenience as the employees information already exist,  which implies that we would be using yammer's data base.

To decide on the technology to be used, research has been conducted on the following options: Corona SDK,	PhoneGap, Titanium SDK and Going Native.

**The** **Corona SDK** is a cross-platform mobile development framework that uses a language called LUA. This will allow the app to be implemented once and to build iOS and Android (Kindle Fire and Nook are included as well). Unfortunately BlackBerry and Windows are not included.

**PhoneGap** is an open source framework that allows cross-platform mobile apps to be developed using standardized web technologies such as HTML, CSS and JavaScript. PhoneGap “wraps” the native functions with JavaScript. The app can be developed once, with only changes to configuration files and some changes to the JavaScript functions. The app can be built for Android, BlackBerry, iOS and Windows using the PhoneGap Build service. 
 
**The Titanium SDK** is a platform that allows the development of cross-platform apps using JavaScript. One project can be implemented and built for Android, BlackBerry and Windows (an iOS device is needed to develop for iOS). The IDE provided is based on Eclipse. However, Titanium SDK requires the Java 6 JDK, which is not the latest version so it may not contain the latest security patches.  In addition, the latest IDE requires an update, however this update fails since it tries to try to update from a non-existent repository. 

Developing the app for every platform natively will allow us to have access to the calendar and to implement push notifications. However, we will have to manage four projects and since each platform is different we have to re-implement the app for each platform. We are unable to develop the app for iOS as we need an iOS device. There is documentation and sample code for each platform available.

Although the decision on using phone gap as the technology that would be used in implementing the solution, each technology option is discussed in detail in the technology overview.

##Project Deliverables##
The objective of this project is to deliver a solution that addresses the current communication issues at BBD which are described above. The proposed solution consists of the following components:

- Web application- A web application must be developed that will allow the COMS/ HR department to create and send birthday notifications, reminders for nominations and event invitations.
- Server- A server must be setup to store all messages that need to be sent and some user responses to the messages.
- Mobile applications- An application must be developed for the Android, BlackBerry, iOS and Windows mobile platforms. The application will allow employees to receive messages from the COMS/ HR department and respond to the messages if required.

##Description of work tasks##
This section outlines the major work tasks required to complete the project.

###Project Planning###
The project planing includes developing the requirements specification for the project. In addition, setting a project schedule and assigning tasks to team members.

The requirements specification will involve eliciting the functional requirements, the following functions have been identified:

- Users must login using Yammer OAuth.
- COMS/HR department must be able to send birthday notifications, reminders for nominations and event invites.
- Employees must recieve the above mentioned communications from the COMS/HR team via a mobile application. In addition users must be able to respond to these communications where applicable. 

Please refer to the requirements documentation for more details on the above mentioned requirements. The project schedule is discussed in the following section. 

###Web Application###
Below is a list of tasks that need to be performed in order to complete the web application.

- Login page- Develop the login page.
- Home page- Develop the home page.
- Birthday Messages page- Develop the page for sending birthday messages.
- Nominations page- Develop the page for sending nomination reminders.
- Events page- Develolp the page for sending event invites.
- Testing- All the pages and their functionality must be tested.

###Server###
Below is a list of tasks that need to be performed in order to implement the server.

- Create Database- Create the database and all the necessary tables.
- Interface for web app
	- Functions for reading data from database
	- Function for writing to database
	- Testing- Test the functionality for the web app interface.
- Interface for mobile app
	- Push notifications
	- Receive user responses- Recieve responses sent from the mobile app.
	- Testing- Test the functionality of the mobile app interface.
- Testing- Test all the functionality of the server.

###Mobile Applications###
The mobile app will be developed for the Android, BlackBerry, iOS and Windows mobile platforms. Below is a list of tasks that need to be performed in order to implement the mobile app for the targeted platforms.

- Login page- Develop the login page.
- Home page- Develop the home page.
- Birthday Messages page- Develop the page for reading birthday messages.
- Nominations page- Develop the page for making nominations and reading nomination reminders.
- Events page- Develop the page for responding to event invites.
- Testing- The mobile app must be fully tested.

##Project Schedule##
Below is the project schedule for implementing the system. It contains the list of tasks to be formed as well as the start date, finish date and person assigned to the the task. We aim to start implementing the project on 19 August 2013 and finish on 14 October 2013.

![project_schedule](http://res.cloudinary.com/ddgnvmjdr/image/upload/v1377694140/timeplan_r92xru.png)

##Conclusion##

In conclusion the CoachLab interns plan on implementing a solution which aims to improve communication between the HR/Comms team and the rest of the BBD employees.