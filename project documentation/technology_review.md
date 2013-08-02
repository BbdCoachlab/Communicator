#Technology Review#
The purpose of this document is to compare and contrast the technologies that can be used to implement the mobile apps.  The mobile apps aim to facilitate the communications between the COMS/HR department and all BBD employees. The app will allow users to receive push notifications, birthday messages, send employee nominations and reply accordingly to event invitations. In addition, the user must be able to add a reminder for the event to their calendar. The app is intended for the following mobile platforms: Android, BlackBerry, iOS and Windows. The following technologies for implementing the apps will be considered:

- Corona SDK
- PhoneGap
- Titanium SDK
- Going Native

The impact of each technology on the requirements of the app will be considered.  Finally, a technology will be chosen to implement the mobile apps.

##Corona SDK##
The Corona SDK is a cross-platform mobile development framework that uses a language called LUA. This will allow us to implement the app once and build to iOS and Android (Kindle Fire and Nook are included as well). Unfortunately BlackBerry and Windows are not included. 

Corona SDK starter is available for free. An Integrated Development Environment (IDE) is provided, however, the IDE is not adequate as it does not provide any debugging support. There are third party IDEs available that provide better debugging support but they are not free. Fortunately, the Corona SDK platform has extensive documentation and sample code available that will minimize the learning curve. 
Below is a list of the advantages and disadvantages of using Corona SDK for the project.

###Advantages###
-	Able to implement the app once and build for iOS and Android.
-	There is a free version of Corona SDK available.
-	There is plenty of documentation and sample code for the platform.
-	Able to access the native calendar to set reminders. 
-	Able to implement push notifications.

###Disadvantages###
-	Cannot use Corona SDK to implement the app for BlackBerry and Windows.
-	The IDE is not easy to use and does not provide debugging support.
-	Corona SDK is primarily used to develop games.


##PhoneGap##
PhoneGap is an open source framework that allows cross-platform mobile apps to be developed using standardized web technologies such as HTML, CSS and JavaScript. PhoneGap “wraps” the native functions with JavaScript. The app can be developed once, with only changes to configuration files and some changes to the JavaScript functions. The app can be built for Android, BlackBerry, iOS and Windows using the PhoneGap Build service.

In order to make use of PhoneGap a JavaScript file needs to be included in to the projects assets folder. This way PhoneGap can be used in any IDE. PhoneGap does provide documentation and sample code for their Application Programming Interface (API).
The advantages and disadvantages of using PhoneGap are listed below.

###Advantages###
-	Able to develop one app and build for Android, BlackBerry, iOS and Windows.
-	Only need to import a JavaScript file into project.
-	Able to use PhoneGap in any IDE.
-	Uses HTML, CSS and JavaScript which the whole team is familiar with.
-	Able to implement push notifications.
-	The app can be styled with CSS, which allows us to change the style efficiently.

###Disadvantages###
-	Need to manage the configuration files for each platform.
-	Some of the JavaScript functions vary for each platform.
-	Cannot access the calendar.


##Titanium SDK##
The Titanium SDK is a platform that allows the development of cross-platform apps using JavaScript. One project can be implemented and built for Android, BlackBerry and Windows (an iOS device is needed to develop for iOS). The IDE provided is based on Eclipse. However, Titanium SDK requires the Java 6 JDK, which is not the latest version so it may not contain the latest security patches.  In addition, the latest IDE requires an update, however this update fails since it tries to try to update from a non-existent repository. 


The free version of Titanium SDK also limits the number of push notifications and API calls in the free version and we would have to use their cloud services. However, it is possible to access the calendar using the Titanium SDK. The API documentation and sample code is available.
The advantages and disadvantages of using Titanium SDK are listed below.

###Advantages###
-	Able to develop one project and build it for Android, BlackBerry and Windows.
-	Access to the calendar is possible.

###Disadvantages###
-	The IDE requires Java 6 SDK.
-	The push notifications are limited in the free version.
-	The IDE does not function properly.
-	We have to use their cloud services.

##Going Native##
Developing the app for every platform natively will allow us to have access to the calendar and to implement push notifications. However, we will have to manage four projects and since each platform is different we have to re-implement the app for each platform. We are unable to develop the app for iOS as we need an iOS device. There is documentation and sample code for each platform available.

The advantages and disadvantages of developing the app natively for each platform are given below.

###Advantages###
-	Able to access the calendar.
-	Able to implement push notifications.
-	Documentation and sample code is available.

###Disadvantages###
-	Have to re-implement the app for each platform.
-	Cannot create an app for iOS.

##Conclusion##
Each of the above technologies has been crudely given suitability scores out of a total of 6. One point is awarded for each platform the technology can produce an app for, push notifications and accessing the calendar. The scores for each technology can be viewed in the table below.
![suitability scores](http://res.cloudinary.com/ddgnvmjdr/image/upload/v1375455151/table_bapel9.png)
Using the suitability scores, we have two options using PhoneGap and Going Native. If PhoneGap is used we will not be able to implement adding reminders on the device's calendar. If Going Native is chosen the app cannot be developed for iOS. However, the removal of the calendar function is more acceptable than not having an app for the iOS platform. Therefore, PhoneGap will be used to develop the apps for the targeted platforms.

##References##
-	[http://www.coronalabs.com/products/corona-sdk/](http://www.coronalabs.com/products/corona-sdk/)
-	[http://phonegap.com/about/faq/](http://phonegap.com/about/faq/)
-	[https://build.phonegap.com/](https://build.phonegap.com/)
-	[http://www.appcelerator.com/platform/titanium-platform/](http://www.appcelerator.com/platform/titanium-platform/)
-	[http://www.oracle.com/technetwork/java/javase/archive-139210.html](http://www.oracle.com/technetwork/java/javase/archive-139210.html)
-	[http://www.appcelerator.com/plans-and-pricing-2/](http://www.appcelerator.com/plans-and-pricing-2/)
-	[http://developer.android.com/training/basics/firstapp/creating-project.html](http://developer.android.com/training/basics/firstapp/creating-project.html)
-	[http://developer.blackberry.com/java/documentation/intro_1968201_11.html](http://developer.blackberry.com/java/documentation/intro_1968201_11.html)
-	[http://msdn.microsoft.com/en-us/library/windowsphone/develop/ff402529%28v=vs.105%29.aspx](http://msdn.microsoft.com/en-us/library/windowsphone/develop/ff402529%28v=vs.105%29.aspx)
-	[http://developer.apple.com/library/ios/#documentation/iphone/conceptual/iphone101/Articles/00_Introduction.html](http://developer.apple.com/library/ios/#documentation/iphone/conceptual/iphone101/Articles/00_Introduction.html)