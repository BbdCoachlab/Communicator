CREATE TABLE [dbo].[Note_Department] (
    [received_counter]             INT DEFAULT ((0)) NOT NULL,
    [Department_id_department]     INT NOT NULL,
    [Notification_id_notification] INT NOT NULL,
    CONSTRAINT [PK_Note_Department] PRIMARY KEY CLUSTERED ([Department_id_department] ASC, [Notification_id_notification] ASC),
    CONSTRAINT [FK_NG_id_department] FOREIGN KEY ([Department_id_department]) REFERENCES [dbo].[Department] ([id_department]),
    CONSTRAINT [FK_NG_id_notification] FOREIGN KEY ([Notification_id_notification]) REFERENCES [dbo].[Notification] ([id_notification])
);

