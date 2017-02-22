<%@ Page Language="vb" AutoEventWireup="false" CodeBehind="Aplicacion.aspx.vb" Inherits="Lab_2.Aplicacion" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <style type="text/css">
        .auto-style1 {
            text-align: left;
        }
    </style>
</head>
<body>
    <form id="form1" runat="server">
    <div class="auto-style1">    
        <br />
        <br />
        <br />
        &nbsp;&nbsp;
        <asp:Label ID="Label1" runat="server" Font-Bold="True" Font-Size="XX-Large" Text="TOP SECRET!!" Width="400px" style="text-align: center"></asp:Label>
        <br />
        <br />
        <br />
        &nbsp;&nbsp;
        <asp:HyperLink ID="HyperLink1" runat="server" NavigateUrl="~/Inicio.aspx" Font-Size="Large" Width="400px" style="text-align: center">Volver a Inicio</asp:HyperLink>
        <br />
        <br />  
    </div>
    </form>
</body>
</html>
