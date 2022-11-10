USE [master]
GO
/****** Object:  Database [SAR]    Script Date: 19/10/2022 09:22:50 ******/
CREATE DATABASE [SAR]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'SAR', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL12.SQLEXPRESS\MSSQL\DATA\SAR.mdf' , SIZE = 5120KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'SAR_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL12.SQLEXPRESS\MSSQL\DATA\SAR_log.ldf' , SIZE = 1024KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
GO
ALTER DATABASE [SAR] SET COMPATIBILITY_LEVEL = 120
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [SAR].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [SAR] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [SAR] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [SAR] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [SAR] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [SAR] SET ARITHABORT OFF 
GO
ALTER DATABASE [SAR] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [SAR] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [SAR] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [SAR] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [SAR] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [SAR] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [SAR] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [SAR] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [SAR] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [SAR] SET  ENABLE_BROKER 
GO
ALTER DATABASE [SAR] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [SAR] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [SAR] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [SAR] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [SAR] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [SAR] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [SAR] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [SAR] SET RECOVERY FULL 
GO
ALTER DATABASE [SAR] SET  MULTI_USER 
GO
ALTER DATABASE [SAR] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [SAR] SET DB_CHAINING OFF 
GO
ALTER DATABASE [SAR] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [SAR] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [SAR] SET DELAYED_DURABILITY = DISABLED 
GO
USE [SAR]
GO
/****** Object:  Table [dbo].[Bitacora]    Script Date: 19/10/2022 09:22:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Bitacora](
	[idBitacora] [int] IDENTITY(1,1) NOT NULL,
	[idRequi] [int] NOT NULL,
	[idUsuario] [int] NOT NULL,
	[tabla] [varchar](1) NOT NULL,
	[Accion] [varchar](1) NOT NULL,
	[idEstado] [int] NOT NULL,
	[fechaModificacion] [datetime] NOT NULL,
 CONSTRAINT [PK_idBitacora] PRIMARY KEY CLUSTERED 
(
	[idBitacora] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[C_Estado]    Script Date: 19/10/2022 09:22:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[C_Estado](
	[idestado] [int] IDENTITY(1,1) NOT NULL,
	[codigo] [varchar](20) NULL,
	[nombre] [varchar](150) NULL,
	[descripcion] [varchar](150) NULL,
	[fechaCreacion] [datetime] NULL,
	[fechaModificacion] [datetime] NULL,
 CONSTRAINT [PK_idEstado] PRIMARY KEY CLUSTERED 
(
	[idestado] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[C_Etapa]    Script Date: 19/10/2022 09:22:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[C_Etapa](
	[idEtapa] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](150) NOT NULL,
	[activo] [bit] NULL,
 CONSTRAINT [PK_idEtapa] PRIMARY KEY CLUSTERED 
(
	[idEtapa] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[C_Marca]    Script Date: 19/10/2022 09:22:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[C_Marca](
	[idMarca] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](150) NOT NULL,
	[idEstado] [int] NULL,
	[fechaCreacion] [datetime] NOT NULL,
	[fechaModificacion] [datetime] NOT NULL,
	[idRubro] [int] NULL,
	[usuarioMod] [int] NULL,
 CONSTRAINT [PK_idMarca] PRIMARY KEY CLUSTERED 
(
	[idMarca] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[C_Medida]    Script Date: 19/10/2022 09:22:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[C_Medida](
	[idMedida] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](150) NOT NULL,
	[idEstado] [int] NOT NULL,
	[FechaCreacion] [datetime] NOT NULL,
	[FechaModificacion] [datetime] NOT NULL,
	[usuarioMod] [int] NULL,
 CONSTRAINT [PK_idMedidad] PRIMARY KEY CLUSTERED 
(
	[idMedida] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[C_Roles]    Script Date: 19/10/2022 09:22:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[C_Roles](
	[idRol] [int] IDENTITY(1,1) NOT NULL,
	[descripcion] [varchar](150) NOT NULL,
	[codigo] [varchar](15) NULL,
	[idEstado] [int] NOT NULL,
	[fechaCreacion] [datetime] NOT NULL,
 CONSTRAINT [PK_idRol] PRIMARY KEY CLUSTERED 
(
	[idRol] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[C_Rubro]    Script Date: 19/10/2022 09:22:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[C_Rubro](
	[idRubro] [int] IDENTITY(1,1) NOT NULL,
	[codigoPresupuestario] [int] NOT NULL,
	[descripcion] [varchar](150) NOT NULL,
	[idEstado] [int] NULL,
	[fechaCreacion] [datetime] NOT NULL,
	[fechaModificacion] [datetime] NOT NULL,
	[usuarioMod] [int] NULL,
 CONSTRAINT [PK_idRubro] PRIMARY KEY CLUSTERED 
(
	[idRubro] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[C_SubEtapa]    Script Date: 19/10/2022 09:22:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[C_SubEtapa](
	[idSubEtapa] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](150) NOT NULL,
	[idEtapa] [int] NOT NULL,
	[activo] [bit] NULL,
 CONSTRAINT [PK_idSubEtapa] PRIMARY KEY CLUSTERED 
(
	[idSubEtapa] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[C_UnidadOrganizativa]    Script Date: 19/10/2022 09:22:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[C_UnidadOrganizativa](
	[idUnidadOrg] [int] IDENTITY(1,1) NOT NULL,
	[codUnidad] [varchar](15) NULL,
	[descripcion] [varchar](200) NOT NULL,
	[idEstado] [int] NOT NULL,
	[fechaCreacion] [datetime] NULL,
	[fechaModificacion] [datetime] NULL,
	[usuarioModi] [int] NULL,
 CONSTRAINT [PK_idUnidadOrganizativa] PRIMARY KEY CLUSTERED 
(
	[idUnidadOrg] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[ContactProveedor]    Script Date: 19/10/2022 09:22:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[ContactProveedor](
	[idContacto] [int] IDENTITY(1,1) NOT NULL,
	[idProveedor] [int] NOT NULL,
	[nombre] [varchar](250) NULL,
	[telefono] [varchar](15) NULL,
 CONSTRAINT [PK_idContacto] PRIMARY KEY CLUSTERED 
(
	[idContacto] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[DetalleCompra]    Script Date: 19/10/2022 09:22:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[DetalleCompra](
	[idDeCompra] [int] IDENTITY(1,1) NOT NULL,
	[idRecepcion] [int] NOT NULL,
	[idProducto] [int] NOT NULL,
	[idMedida] [int] NOT NULL,
	[idEstado] [int] NOT NULL,
	[fechaRecibido] [datetime] NULL,
	[cantidaRecibida] [int] NULL,
	[precioUnit] [int] NULL,
	[totalProduc] [int] NULL,
	[montoFinal] [int] NULL,
	[idFactura] [int] NULL,
 CONSTRAINT [PK_DetCompra] PRIMARY KEY CLUSTERED 
(
	[idDeCompra] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[DetalleRequi]    Script Date: 19/10/2022 09:22:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[DetalleRequi](
	[idDetaRequi] [int] IDENTITY(1,1) NOT NULL,
	[idRequi] [int] NOT NULL,
	[numeroRequi] [varchar](50) NULL,
	[fechaSolicita] [datetime] NULL,
	[descripcion] [varchar](250) NULL,
	[cantidadSoli] [int] NULL,
	[cantidadApro] [int] NULL,
	[fechaValidaSol] [datetime] NOT NULL,
	[usuarioValida] [int] NULL,
	[fechaAutorizaULOG] [datetime] NULL,
	[usuarioAutoriza] [int] NULL,
	[idKardex] [int] NULL,
 CONSTRAINT [PK_idDetaRequi] PRIMARY KEY CLUSTERED 
(
	[idDetaRequi] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[documentoXproveedor]    Script Date: 19/10/2022 09:22:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[documentoXproveedor](
	[idDocumentoPro] [int] IDENTITY(1,1) NOT NULL,
	[idProveedor] [int] NOT NULL,
	[nOrdenCompra] [varchar](50) NOT NULL,
	[numeroCompromsi] [varchar](50) NOT NULL,
	[numeroFactura] [varchar](50) NOT NULL,
	[actaRecepcion] [varchar](250) NULL,
 CONSTRAINT [PK_idDocumnentoXproveedor] PRIMARY KEY CLUSTERED 
(
	[idDocumentoPro] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Factura]    Script Date: 19/10/2022 09:22:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Factura](
	[idFactura] [int] IDENTITY(1,1) NOT NULL,
	[codigoFactura] [varchar](50) NOT NULL,
	[fechaIngreso] [datetime] NOT NULL,
	[idProve] [int] NOT NULL,
	[idDetalleCompra] [int] NULL,
	[catindad] [int] NULL,
	[precioUnit] [int] NULL,
	[totalProduc] [int] NULL,
	[montoTotal] [int] NULL,
	[usuaeriRecibe] [int] NULL,
 CONSTRAINT [PK_idFactura] PRIMARY KEY CLUSTERED 
(
	[idFactura] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Historial_Detalle_Requi]    Script Date: 19/10/2022 09:22:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Historial_Detalle_Requi](
	[idHis_DetaRequi] [int] IDENTITY(1,1) NOT NULL,
	[idDetaRe] [int] NOT NULL,
	[idKardex] [int] NOT NULL,
	[montoSolicitdo] [int] NULL,
	[montoEntrefado] [int] NULL,
	[unidadSolicita] [int] NULL,
	[fechaMovimiento] [datetime] NULL,
 CONSTRAINT [PK_idHDR] PRIMARY KEY CLUSTERED 
(
	[idHis_DetaRequi] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Historial_Producto]    Script Date: 19/10/2022 09:22:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Historial_Producto](
	[idHis_Product] [int] IDENTITY(1,1) NOT NULL,
	[idProduct] [int] NOT NULL,
	[costo_unitario] [int] NOT NULL,
	[idProveedor] [int] NULL,
	[idMedida] [int] NULL,
	[cantidMovi] [int] NULL,
	[fechaIngreso] [datetime] NULL,
	[fechaEgreso] [datetime] NULL,
	[usuarioRegistra] [int] NULL,
	[stockExistencia] [int] NULL,
 CONSTRAINT [PK_idHistorialProducto] PRIMARY KEY CLUSTERED 
(
	[idHis_Product] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Historial_Requisicion]    Script Date: 19/10/2022 09:22:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Historial_Requisicion](
	[idRequi_hist] [int] IDENTITY(1,1) NOT NULL,
	[idRequi] [int] NOT NULL,
	[idEstado] [int] NOT NULL,
	[fechaModifica] [datetime] NOT NULL,
	[usuarioModifica] [int] NOT NULL,
 CONSTRAINT [PK_idHitorialRequi] PRIMARY KEY CLUSTERED 
(
	[idRequi_hist] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Kardex]    Script Date: 19/10/2022 09:22:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Kardex](
	[idKardex] [int] IDENTITY(1,1) NOT NULL,
	[idProducto] [int] NOT NULL,
	[idMedida] [int] NULL,
	[precioUnit] [int] NOT NULL,
	[stockMin] [int] NULL,
	[stockMax] [int] NULL,
	[stockActual] [int] NULL,
	[reserva] [int] NULL,
	[preUnitCompra] [int] NULL,
	[monto_final] [int] NULL,
	[costoPromedio] [int] NULL,
 CONSTRAINT [PK_idKardex] PRIMARY KEY CLUSTERED 
(
	[idKardex] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[Productos]    Script Date: 19/10/2022 09:22:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Productos](
	[idProducto] [int] IDENTITY(1,1) NOT NULL,
	[cod_presupuestario] [int] NULL,
	[correlativo] [int] NULL,
	[cod_producto] [varchar](20) NULL,
	[descripcion] [varchar](250) NOT NULL,
	[idMarca] [int] NULL,
	[idproveedor] [int] NULL,
	[idEstado] [int] NOT NULL,
	[idMedida] [int] NULL,
	[observaciones] [varchar](250) NULL,
	[fechaCreacion] [datetime] NOT NULL,
	[fechaModificacion] [datetime] NOT NULL,
	[idRubro] [int] NOT NULL,
 CONSTRAINT [PK_idProducto] PRIMARY KEY CLUSTERED 
(
	[idProducto] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Proveedor]    Script Date: 19/10/2022 09:22:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Proveedor](
	[idProveedor] [int] IDENTITY(1,1) NOT NULL,
	[nombreComercial] [varchar](250) NULL,
	[razonSocial] [varchar](250) NOT NULL,
	[direccion] [varchar](250) NULL,
	[fax] [varchar](150) NULL,
	[telefono1] [varchar](15) NULL,
	[telefono2] [varchar](15) NULL,
	[idDepartamento] [int] NULL,
	[idMunicipio] [int] NULL,
 CONSTRAINT [PK_idProveedor] PRIMARY KEY CLUSTERED 
(
	[idProveedor] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[RecepcionCompra]    Script Date: 19/10/2022 09:22:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[RecepcionCompra](
	[idRecep] [int] IDENTITY(1,1) NOT NULL,
	[nOrdenCompra] [varchar](50) NOT NULL,
	[nPresupuestario] [varchar](50) NOT NULL,
	[codigofactura] [varchar](50) NOT NULL,
	[fechaIngreso] [datetime] NOT NULL,
	[usuarioRecibe] [int] NULL,
 CONSTRAINT [PK_idRecepcion] PRIMARY KEY CLUSTERED 
(
	[idRecep] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[RequisicionProductos]    Script Date: 19/10/2022 09:22:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[RequisicionProductos](
	[idRequi] [int] IDENTITY(1,1) NOT NULL,
	[anio] [int] NULL,
	[correlativo] [int] NULL,
	[numeroRequisicion] [varchar](50) NULL,
	[idUnidadSolicita] [int] NOT NULL,
	[idusuarioSolicita] [int] NOT NULL,
	[fechaSolicita] [datetime] NOT NULL,
	[idEstado] [int] NULL,
	[idEtapa] [int] NULL,
	[idSubEtapa] [int] NULL,
 CONSTRAINT [PK_idRequi] PRIMARY KEY CLUSTERED 
(
	[idRequi] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Usuario]    Script Date: 19/10/2022 09:22:50 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Usuario](
	[idUsuario] [int] IDENTITY(1,1) NOT NULL,
	[correo] [varchar](250) NOT NULL,
	[contra] [varchar](150) NOT NULL,
	[idRol] [int] NOT NULL,
	[estado] [int] NULL,
	[idUnidad] [int] NULL,
	[fechaCreacion] [datetime] NULL,
	[fechaModificacion] [datetime] NULL,
 CONSTRAINT [PK_idUsuario] PRIMARY KEY CLUSTERED 
(
	[idUsuario] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
ALTER TABLE [dbo].[Bitacora]  WITH CHECK ADD  CONSTRAINT [FK_bita_Requisicon] FOREIGN KEY([idRequi])
REFERENCES [dbo].[RequisicionProductos] ([idRequi])
GO
ALTER TABLE [dbo].[Bitacora] CHECK CONSTRAINT [FK_bita_Requisicon]
GO
ALTER TABLE [dbo].[Bitacora]  WITH CHECK ADD  CONSTRAINT [FK_bita_Usurio] FOREIGN KEY([idUsuario])
REFERENCES [dbo].[Usuario] ([idUsuario])
GO
ALTER TABLE [dbo].[Bitacora] CHECK CONSTRAINT [FK_bita_Usurio]
GO
ALTER TABLE [dbo].[C_Marca]  WITH CHECK ADD  CONSTRAINT [FK_id_Estado_Marca] FOREIGN KEY([idEstado])
REFERENCES [dbo].[C_Estado] ([idestado])
GO
ALTER TABLE [dbo].[C_Marca] CHECK CONSTRAINT [FK_id_Estado_Marca]
GO
ALTER TABLE [dbo].[C_Medida]  WITH CHECK ADD  CONSTRAINT [FK_id_Estado_Medida] FOREIGN KEY([idEstado])
REFERENCES [dbo].[C_Estado] ([idestado])
GO
ALTER TABLE [dbo].[C_Medida] CHECK CONSTRAINT [FK_id_Estado_Medida]
GO
ALTER TABLE [dbo].[C_Roles]  WITH CHECK ADD  CONSTRAINT [FK_id_Estado_Roles] FOREIGN KEY([idEstado])
REFERENCES [dbo].[C_Estado] ([idestado])
GO
ALTER TABLE [dbo].[C_Roles] CHECK CONSTRAINT [FK_id_Estado_Roles]
GO
ALTER TABLE [dbo].[C_Rubro]  WITH CHECK ADD  CONSTRAINT [FK_id_estado_rubro] FOREIGN KEY([idEstado])
REFERENCES [dbo].[C_Estado] ([idestado])
GO
ALTER TABLE [dbo].[C_Rubro] CHECK CONSTRAINT [FK_id_estado_rubro]
GO
ALTER TABLE [dbo].[C_SubEtapa]  WITH CHECK ADD  CONSTRAINT [FK_id_Etapa] FOREIGN KEY([idEtapa])
REFERENCES [dbo].[C_Etapa] ([idEtapa])
GO
ALTER TABLE [dbo].[C_SubEtapa] CHECK CONSTRAINT [FK_id_Etapa]
GO
ALTER TABLE [dbo].[C_UnidadOrganizativa]  WITH CHECK ADD  CONSTRAINT [Fk_id_estado_Unidad] FOREIGN KEY([idEstado])
REFERENCES [dbo].[C_Estado] ([idestado])
GO
ALTER TABLE [dbo].[C_UnidadOrganizativa] CHECK CONSTRAINT [Fk_id_estado_Unidad]
GO
ALTER TABLE [dbo].[ContactProveedor]  WITH CHECK ADD  CONSTRAINT [FK_Contac_Proveedor] FOREIGN KEY([idProveedor])
REFERENCES [dbo].[Proveedor] ([idProveedor])
GO
ALTER TABLE [dbo].[ContactProveedor] CHECK CONSTRAINT [FK_Contac_Proveedor]
GO
ALTER TABLE [dbo].[DetalleCompra]  WITH CHECK ADD  CONSTRAINT [FK_ProductoDC] FOREIGN KEY([idProducto])
REFERENCES [dbo].[Productos] ([idProducto])
GO
ALTER TABLE [dbo].[DetalleCompra] CHECK CONSTRAINT [FK_ProductoDC]
GO
ALTER TABLE [dbo].[DetalleCompra]  WITH CHECK ADD  CONSTRAINT [FK_Recepcion] FOREIGN KEY([idRecepcion])
REFERENCES [dbo].[RecepcionCompra] ([idRecep])
GO
ALTER TABLE [dbo].[DetalleCompra] CHECK CONSTRAINT [FK_Recepcion]
GO
ALTER TABLE [dbo].[DetalleRequi]  WITH CHECK ADD  CONSTRAINT [FK_det_Kardex] FOREIGN KEY([idKardex])
REFERENCES [dbo].[Kardex] ([idKardex])
GO
ALTER TABLE [dbo].[DetalleRequi] CHECK CONSTRAINT [FK_det_Kardex]
GO
ALTER TABLE [dbo].[DetalleRequi]  WITH CHECK ADD  CONSTRAINT [FK_det_RequiProd] FOREIGN KEY([idRequi])
REFERENCES [dbo].[RequisicionProductos] ([idRequi])
GO
ALTER TABLE [dbo].[DetalleRequi] CHECK CONSTRAINT [FK_det_RequiProd]
GO
ALTER TABLE [dbo].[documentoXproveedor]  WITH CHECK ADD  CONSTRAINT [FK_DocXPro_Proveedor] FOREIGN KEY([idProveedor])
REFERENCES [dbo].[Proveedor] ([idProveedor])
GO
ALTER TABLE [dbo].[documentoXproveedor] CHECK CONSTRAINT [FK_DocXPro_Proveedor]
GO
ALTER TABLE [dbo].[Factura]  WITH CHECK ADD  CONSTRAINT [FK_Recep_Proveedor] FOREIGN KEY([idProve])
REFERENCES [dbo].[Proveedor] ([idProveedor])
GO
ALTER TABLE [dbo].[Factura] CHECK CONSTRAINT [FK_Recep_Proveedor]
GO
ALTER TABLE [dbo].[Historial_Detalle_Requi]  WITH CHECK ADD  CONSTRAINT [FK_HD_detaRequi] FOREIGN KEY([idDetaRe])
REFERENCES [dbo].[DetalleRequi] ([idDetaRequi])
GO
ALTER TABLE [dbo].[Historial_Detalle_Requi] CHECK CONSTRAINT [FK_HD_detaRequi]
GO
ALTER TABLE [dbo].[Historial_Producto]  WITH CHECK ADD  CONSTRAINT [FK_hisPro_Producto] FOREIGN KEY([idProduct])
REFERENCES [dbo].[Productos] ([idProducto])
GO
ALTER TABLE [dbo].[Historial_Producto] CHECK CONSTRAINT [FK_hisPro_Producto]
GO
ALTER TABLE [dbo].[Historial_Producto]  WITH CHECK ADD  CONSTRAINT [FK_hisProd_Proveedor] FOREIGN KEY([idProveedor])
REFERENCES [dbo].[Proveedor] ([idProveedor])
GO
ALTER TABLE [dbo].[Historial_Producto] CHECK CONSTRAINT [FK_hisProd_Proveedor]
GO
ALTER TABLE [dbo].[Historial_Requisicion]  WITH CHECK ADD  CONSTRAINT [FK_Historial_RequiProd] FOREIGN KEY([idRequi])
REFERENCES [dbo].[RequisicionProductos] ([idRequi])
GO
ALTER TABLE [dbo].[Historial_Requisicion] CHECK CONSTRAINT [FK_Historial_RequiProd]
GO
ALTER TABLE [dbo].[Kardex]  WITH CHECK ADD  CONSTRAINT [FK_kar_Producto] FOREIGN KEY([idProducto])
REFERENCES [dbo].[Productos] ([idProducto])
GO
ALTER TABLE [dbo].[Kardex] CHECK CONSTRAINT [FK_kar_Producto]
GO
ALTER TABLE [dbo].[Productos]  WITH CHECK ADD  CONSTRAINT [FK_prod_Estado] FOREIGN KEY([idEstado])
REFERENCES [dbo].[C_Estado] ([idestado])
GO
ALTER TABLE [dbo].[Productos] CHECK CONSTRAINT [FK_prod_Estado]
GO
ALTER TABLE [dbo].[Productos]  WITH CHECK ADD  CONSTRAINT [FK_prod_Marca] FOREIGN KEY([idMarca])
REFERENCES [dbo].[C_Marca] ([idMarca])
GO
ALTER TABLE [dbo].[Productos] CHECK CONSTRAINT [FK_prod_Marca]
GO
ALTER TABLE [dbo].[Productos]  WITH CHECK ADD  CONSTRAINT [FK_prod_Proveedor] FOREIGN KEY([idproveedor])
REFERENCES [dbo].[Proveedor] ([idProveedor])
GO
ALTER TABLE [dbo].[Productos] CHECK CONSTRAINT [FK_prod_Proveedor]
GO
ALTER TABLE [dbo].[Productos]  WITH CHECK ADD  CONSTRAINT [FK_prod_Rubro] FOREIGN KEY([idRubro])
REFERENCES [dbo].[C_Rubro] ([idRubro])
GO
ALTER TABLE [dbo].[Productos] CHECK CONSTRAINT [FK_prod_Rubro]
GO
ALTER TABLE [dbo].[RequisicionProductos]  WITH CHECK ADD  CONSTRAINT [FK_requi_UnidadOrganizativa] FOREIGN KEY([idUnidadSolicita])
REFERENCES [dbo].[C_UnidadOrganizativa] ([idUnidadOrg])
GO
ALTER TABLE [dbo].[RequisicionProductos] CHECK CONSTRAINT [FK_requi_UnidadOrganizativa]
GO
ALTER TABLE [dbo].[RequisicionProductos]  WITH CHECK ADD  CONSTRAINT [FK_requi_Usuario] FOREIGN KEY([idusuarioSolicita])
REFERENCES [dbo].[Usuario] ([idUsuario])
GO
ALTER TABLE [dbo].[RequisicionProductos] CHECK CONSTRAINT [FK_requi_Usuario]
GO
ALTER TABLE [dbo].[Usuario]  WITH CHECK ADD  CONSTRAINT [FK_id_C_Roles] FOREIGN KEY([idRol])
REFERENCES [dbo].[C_Roles] ([idRol])
GO
ALTER TABLE [dbo].[Usuario] CHECK CONSTRAINT [FK_id_C_Roles]
GO
USE [master]
GO
ALTER DATABASE [SAR] SET  READ_WRITE 
GO
