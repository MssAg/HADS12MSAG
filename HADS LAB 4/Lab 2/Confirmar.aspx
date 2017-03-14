<%@ Page Language="vb" AutoEventWireup="false" CodeBehind="Confirmar.aspx.vb" Inherits="Lab_2.Confirmar" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
    <div>   
        <br />
        <asp:Label ID="Label1" runat="server" Text="Aqui aparecera el mensaje resultante del registro." style="text-align: center" Width="400px"></asp:Label>
        <br />
        <br />
        <asp:HyperLink ID="HyperLink1" runat="server" NavigateUrl="~/Inicio.aspx" style="text-align: center" Width="400px">Pulse aqui para identificarse en el sistema.</asp:HyperLink>
    </div>
    </form>
</body>
</html>
