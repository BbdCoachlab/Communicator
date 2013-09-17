CREATE TABLE [dbo].[Department_User] (
    [Department_id_department] INT           NOT NULL,
    [User_id_user]             NVARCHAR (50) NOT NULL,
    CONSTRAINT [PK_Department_User] PRIMARY KEY CLUSTERED ([Department_id_department] ASC, [User_id_user] ASC),
    CONSTRAINT [FK_GU_id_department] FOREIGN KEY ([Department_id_department]) REFERENCES [dbo].[Department] ([id_department]),
    CONSTRAINT [FK_GU_id_user] FOREIGN KEY ([User_id_user]) REFERENCES [dbo].[User] ([id_user])
);

