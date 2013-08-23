CREATE TABLE [dbo].[Note_Group]
(
	[received_counter] INT NOT NULL DEFAULT 0, 
    [Group_id_group] INT NOT NULL, 
    [Notification_id_notification] INT NOT NULL, 
    CONSTRAINT [FK_NG_id_group] FOREIGN KEY ([Group_id_group]) REFERENCES [Group]([id_group]), 
    CONSTRAINT [FK_NG_id_notification] FOREIGN KEY ([Notification_id_notification]) REFERENCES [Notification]([id_notification]), 
    CONSTRAINT [PK_Note_Group] PRIMARY KEY ([Group_id_group],[Notification_id_notification]),
)
