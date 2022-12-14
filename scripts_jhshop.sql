USE [master]
GO
/****** Object:  Database [db_jhshop]    Script Date: 18/01/2021 23:49:10 ******/
CREATE DATABASE [db_jhshop]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'db_jhshop', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.SQLEXPRESS\MSSQL\DATA\db_jhshop.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'db_jhshop_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL15.SQLEXPRESS\MSSQL\DATA\db_jhshop_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT
GO
ALTER DATABASE [db_jhshop] SET COMPATIBILITY_LEVEL = 150
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [db_jhshop].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [db_jhshop] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [db_jhshop] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [db_jhshop] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [db_jhshop] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [db_jhshop] SET ARITHABORT OFF 
GO
ALTER DATABASE [db_jhshop] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [db_jhshop] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [db_jhshop] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [db_jhshop] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [db_jhshop] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [db_jhshop] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [db_jhshop] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [db_jhshop] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [db_jhshop] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [db_jhshop] SET  DISABLE_BROKER 
GO
ALTER DATABASE [db_jhshop] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [db_jhshop] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [db_jhshop] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [db_jhshop] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [db_jhshop] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [db_jhshop] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [db_jhshop] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [db_jhshop] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [db_jhshop] SET  MULTI_USER 
GO
ALTER DATABASE [db_jhshop] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [db_jhshop] SET DB_CHAINING OFF 
GO
ALTER DATABASE [db_jhshop] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [db_jhshop] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [db_jhshop] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [db_jhshop] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
ALTER DATABASE [db_jhshop] SET QUERY_STORE = OFF
GO
USE [db_jhshop]
GO
/****** Object:  Table [dbo].[cart]    Script Date: 18/01/2021 23:49:10 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[cart](
	[cart_id] [int] IDENTITY(1,1) NOT NULL,
	[user_id] [int] NOT NULL,
	[product_id] [int] NOT NULL,
	[product_name] [varchar](50) NOT NULL,
	[product_price] [decimal](5, 2) NOT NULL,
	[product_size] [varchar](3) NOT NULL,
	[product_color] [varchar](10) NOT NULL,
	[product_brand] [varchar](50) NOT NULL,
	[product_image] [varchar](250) NOT NULL,
	[quantity] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[cart_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[order_product]    Script Date: 18/01/2021 23:49:10 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[order_product](
	[order_product_id] [int] IDENTITY(1,1) NOT NULL,
	[order_id] [int] NOT NULL,
	[product_id] [int] NOT NULL,
	[quantity_product] [int] NOT NULL,
	[subtotal_product] [decimal](5, 2) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[order_product_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[orders]    Script Date: 18/01/2021 23:49:10 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[orders](
	[order_id] [int] IDENTITY(1,1) NOT NULL,
	[user_id] [int] NOT NULL,
	[date] [date] NOT NULL,
	[hour] [time](7) NOT NULL,
	[total_price] [decimal](5, 2) NOT NULL,
	[type_payment] [varchar](50) NOT NULL,
	[type_delivery] [varchar](50) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[order_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[product]    Script Date: 18/01/2021 23:49:10 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[product](
	[product_id] [int] IDENTITY(1,1) NOT NULL,
	[product_name] [varchar](50) NOT NULL,
	[product_price] [decimal](5, 2) NOT NULL,
	[product_size] [varchar](3) NOT NULL,
	[product_color] [varchar](10) NOT NULL,
	[product_brand] [varchar](50) NOT NULL,
	[product_image] [varchar](250) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[product_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[users]    Script Date: 18/01/2021 23:49:10 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[users](
	[user_id] [int] IDENTITY(1,1) NOT NULL,
	[user_name] [varchar](50) NOT NULL,
	[user_email] [varchar](50) NOT NULL,
	[user_password] [varchar](50) NOT NULL,
	[user_address] [varchar](250) NULL,
	[user_place] [varchar](50) NULL,
	[user_postal_code1] [int] NULL,
	[user_postal_code2] [int] NULL,
	[user_nif] [int] NULL,
	[user_phone] [int] NULL,
	[user_admin] [bit] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[user_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[product] ON 

INSERT [dbo].[product] ([product_id], [product_name], [product_price], [product_size], [product_color], [product_brand], [product_image]) VALUES (1, N'Top de Senhora', CAST(24.99 AS Decimal(5, 2)), N'M', N'#321416', N'H&M', N'assets/images/shop-1.jpg')
INSERT [dbo].[product] ([product_id], [product_name], [product_price], [product_size], [product_color], [product_brand], [product_image]) VALUES (2, N'Camisa Homem', CAST(19.99 AS Decimal(5, 2)), N'L', N'#EFE3F1', N'Pull&Bear', N'assets/images/shop-2.jpg')
INSERT [dbo].[product] ([product_id], [product_name], [product_price], [product_size], [product_color], [product_brand], [product_image]) VALUES (3, N'Top de Senhora', CAST(12.99 AS Decimal(5, 2)), N'S', N'#100F31', N'Zara', N'assets/images/shop-3.jpg')
INSERT [dbo].[product] ([product_id], [product_name], [product_price], [product_size], [product_color], [product_brand], [product_image]) VALUES (4, N'Vestido Senhora', CAST(29.99 AS Decimal(5, 2)), N'L', N'#B7172F', N'Lefties', N'assets/images/shop-4.jpg')
SET IDENTITY_INSERT [dbo].[product] OFF
GO
SET IDENTITY_INSERT [dbo].[users] ON 

INSERT [dbo].[users] ([user_id], [user_name], [user_email], [user_password], [user_address], [user_place], [user_postal_code1], [user_postal_code2], [user_nif], [user_phone], [user_admin]) VALUES (1, N'João Rocha', N'joao.bruno86@gmail.com', N'2a90b3a596918190f9b265488c029462416b48c6', NULL, NULL, NULL, NULL, NULL, NULL, 1)
INSERT [dbo].[users] ([user_id], [user_name], [user_email], [user_password], [user_address], [user_place], [user_postal_code1], [user_postal_code2], [user_nif], [user_phone], [user_admin]) VALUES (2, N'Hugo Queirós', N'hhh@hhh.com', N'416d0653d1017e58af347295d436cfd4e41620eb', NULL, NULL, NULL, NULL, NULL, NULL, 1)
SET IDENTITY_INSERT [dbo].[users] OFF
GO
USE [master]
GO
ALTER DATABASE [db_jhshop] SET  READ_WRITE 
GO
