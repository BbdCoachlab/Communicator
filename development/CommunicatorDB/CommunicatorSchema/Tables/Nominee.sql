CREATE TABLE [dbo].[Nominee]
(
	[User_id_user] NVARCHAR(50) NOT NULL, 
    [category_1] INT NOT NULL DEFAULT 0, 
    [category_2] INT NOT NULL DEFAULT 0, 
    [category_3] INT NOT NULL DEFAULT 0, 
    CONSTRAINT [FK_Nominee_id_user] FOREIGN KEY ([User_id_user]) REFERENCES [User]([id_user]), 
    CONSTRAINT [PK_Nominee] PRIMARY KEY ([User_id_user]) 
)
