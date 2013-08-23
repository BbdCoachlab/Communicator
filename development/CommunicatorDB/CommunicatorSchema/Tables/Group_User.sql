CREATE TABLE [dbo].[Group_User]
(
	[Group_id_group] INT NOT NULL, 
    [User_id_user] NVARCHAR(50) NOT NULL, 
    CONSTRAINT [FK_GU_id_group] FOREIGN KEY ([Group_id_group]) REFERENCES [Group]([id_group]), 
    CONSTRAINT [FK_GU_id_user] FOREIGN KEY ([User_id_user]) REFERENCES [User]([id_user]), 
    CONSTRAINT [PK_Group_User] PRIMARY KEY ([Group_id_group],[User_id_user]) 
)
