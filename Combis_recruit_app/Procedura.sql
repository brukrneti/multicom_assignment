USE [combisDB]
GO

/****** Object:  Trigger [dbo].[trgCheckInsert]    Script Date: 23.2.2017. 6:13:32 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO


CREATE TRIGGER [dbo].[trgCheckInsert]
ON [dbo].[Podaci] 
AFTER
INSERT 
AS
BEGIN
	DECLARE @ime varchar(max)
	DECLARE @prezime varchar(max)
	DECLARE @postanski_broj varchar(max)
	DECLARE @grad varchar(max)
	DECLARE @telefon varchar(max)
	DECLARE @duplikat int

	SET @ime = (SELECT ime FROM inserted)
	SET @prezime = (SELECT prezime FROM inserted)
	SET @postanski_broj = (SELECT postanski_broj FROM inserted)
	SET @grad = (SELECT grad FROM inserted)
	SET @telefon = (SELECT telefon FROM inserted)
	SET @duplikat = (SELECT COUNT(*) FROM Podaci AS p WHERE p.ime=@ime AND p.prezime=@prezime AND p.postanski_broj=@postanski_broj AND p.grad=@grad AND p.telefon=@telefon)
	
	IF EXISTS(SELECT postanski_broj FROM inserted WHERE postanski_broj NOT LIKE '[0-9][0-9][0-9][0-9][0-9]')
		BEGIN
			RAISERROR ('ZIP code in invalid format, insertion denied!', 16, 1)
			ROLLBACK TRANSACTION
			RETURN
		END

	IF @duplikat>1
		BEGIN
			RAISERROR ('Row found as duplicate, insertion denied!', 16, 1)
			ROLLBACK TRANSACTION
			RETURN
		END
END
GO

ALTER TABLE [dbo].[Podaci] ENABLE TRIGGER [trgCheckInsert]
GO

