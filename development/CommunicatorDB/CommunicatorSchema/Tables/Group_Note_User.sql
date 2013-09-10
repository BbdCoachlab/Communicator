CREATE TABLE [dbo].[Group_Note_User]
(
	[received] BIT NOT NULL DEFAULT 0, 
    [Notification_id_notification] INT NOT NULL, 
    [Group_id_group] INT NOT NULL, 
    [User_id_user] NVARCHAR(50) NOT NULL, 
    CONSTRAINT [FK_GNU_id_notification] FOREIGN KEY ([Notification_id_notification]) REFERENCES [Notification]([id_notification]), 
    CONSTRAINT [FK_GNU_id_group] FOREIGN KEY ([Group_id_group]) REFERENCES [Group]([id_group]), 
    CONSTRAINT [FK_GNU_id_User] FOREIGN KEY ([User_id_user]) REFERENCES [User]([id_user]), 
    CONSTRAINT [PK_Group_Note_User] PRIMARY KEY ([Notification_id_notification],[Group_id_group],[User_id_user]) 
)
