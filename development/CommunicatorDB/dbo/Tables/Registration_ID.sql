CREATE TABLE [dbo].[Registration_ID] (
    [registration_id] UNIQUEIDENTIFIER NOT NULL,
    [User_id_user]    NVARCHAR (50)    NOT NULL,
    PRIMARY KEY CLUSTERED ([registration_id] ASC),
    CONSTRAINT [FK_UserReg] FOREIGN KEY ([User_id_user]) REFERENCES [dbo].[User] ([id_user])
);

