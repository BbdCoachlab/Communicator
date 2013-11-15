CREATE TABLE [dbo].[Notification] (
    [id_notification]   INT           IDENTITY (1, 1) NOT NULL,
    [subject]           NVARCHAR (50) NOT NULL,
    [image]             TEXT          NULL,
    [message]           TEXT          NULL,
    [rsvp_type]         TEXT          NULL,
    [expiry_date]       DATE          NULL,
    [notification_type] NVARCHAR (50) NOT NULL,
    PRIMARY KEY CLUSTERED ([id_notification] ASC)
);


