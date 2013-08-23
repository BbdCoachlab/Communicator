CREATE TABLE [dbo].[Notification]
(
	[id_notification] INT NOT NULL PRIMARY KEY, 
    [subject] NVARCHAR(50) NOT NULL, 
    [image] TEXT NULL, 
    [message] TEXT NOT NULL, 
    [rsvp_type] INT NULL, 
    [expiry_date] DATE NULL
)
