CREATE TABLE [dbo].[Group]
(
	[id_group] INT NOT NULL PRIMARY KEY , 
    [name] NVARCHAR(50) NOT NULL, 
    [group_size] INT NOT NULL DEFAULT 0
)
