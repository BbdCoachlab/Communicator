CREATE TABLE [dbo].[Department] (
    [id_department]   INT           IDENTITY (1, 1) NOT NULL,
    [name]            NVARCHAR (50) NOT NULL,
    [department_size] INT           DEFAULT ((0)) NOT NULL,
    PRIMARY KEY CLUSTERED ([id_department] ASC)
);

