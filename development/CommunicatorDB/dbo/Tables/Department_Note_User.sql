CREATE TABLE [dbo].[Department_Note_User] (
    [received]                     BIT           DEFAULT ((0)) NOT NULL,
    [Notification_id_notification] INT           NOT NULL,
    [Deparment_id_department]      INT           NOT NULL,
    [User_id_user]                 NVARCHAR (50) NOT NULL,
    CONSTRAINT [PK_Department_Note_User] PRIMARY KEY CLUSTERED ([Notification_id_notification] ASC, [Deparment_id_department] ASC, [User_id_user] ASC),
    CONSTRAINT [FK_GNU_id_deparment] FOREIGN KEY ([Deparment_id_department]) REFERENCES [dbo].[Department] ([id_department]),
    CONSTRAINT [FK_GNU_id_notification] FOREIGN KEY ([Notification_id_notification]) REFERENCES [dbo].[Notification] ([id_notification]),
    CONSTRAINT [FK_GNU_id_User] FOREIGN KEY ([User_id_user]) REFERENCES [dbo].[User] ([id_user])
);

