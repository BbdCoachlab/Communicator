CREATE TABLE [dbo].[User]
(
	[id_user] NVARCHAR(50) NOT NULL PRIMARY KEY, 
    [name] NVARCHAR(50) NOT NULL, 
    [surname] NVARCHAR(50) NOT NULL, 
    [email] NVARCHAR(50) NULL, 
    [profile_pic_url] TEXT NULL, 
    [birthdate] DATE NULL
)
