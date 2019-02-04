USE [combisDB]
GO

/****** Object:  Table [dbo].[Podaci]    Script Date: 23.2.2017. 6:13:16 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

SET ANSI_PADDING ON
GO

CREATE TABLE [dbo].[Podaci](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[ime] [varchar](20) NULL,
	[prezime] [varchar](20) NULL,
	[postanski_broj] [varchar](10) NULL,
	[grad] [varchar](20) NULL,
	[telefon] [varchar](15) NULL,
 CONSTRAINT [PK_Podaci] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO

SET ANSI_PADDING OFF
GO

