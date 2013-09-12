CREATE TABLE [dbo].[Notification] (
    [id_notification] NVARCHAR(50)  NOT NULL,
    [subject]         NVARCHAR (50) NOT NULL,
    [image]           TEXT          NULL,
    [message]         TEXT          NOT NULL,
    [rsvp_type]       INT           NULL,
    [expiry_date]     DATE          NULL,
    PRIMARY KEY CLUSTERED ([id_notification] ASC)
);

