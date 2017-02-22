<%@ Page Language="vb" AutoEventWireup="false" CodeBehind="Inicio.aspx.vb" Inherits="Lab_2.Inicio" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
    <div>
        <br />
        <br />
        &nbsp;&nbsp;&nbsp;
        <asp:Label ID="Label1" runat="server" Font-Bold="True" Text="  Email:" Width="150"></asp:Label> 
        <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
        <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" ControlToValidate="TextBox1" ErrorMessage="*" ForeColor="#CC0000"></asp:RequiredFieldValidator>
        <asp:RegularExpressionValidator ID="RegularExpressionValidator2" runat="server" ControlToValidate="TextBox1" ErrorMessage="Email Incorrecto" ForeColor="#CC0000" ValidationExpression="\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*"></asp:RegularExpressionValidator>
        <br />
        <br />
        &nbsp;&nbsp;&nbsp;
        <asp:Label ID="Label2" runat="server" Font-Bold="True" Text="  Contraseña:" Width="150"></asp:Label>
        <asp:TextBox ID="TextBox2" runat="server" style="margin-left: 2px" TextMode="Password"></asp:TextBox>
        <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" ControlToValidate="TextBox2" ErrorMessage="*" ForeColor="#CC0000"></asp:RequiredFieldValidator> 
        <br />  
        <br />  
    </div>
        <p style="width: 176px; margin-left: 87px">
            <asp:Button ID="Button1" runat="server" Text="Login" Height="50px" Width="100px" style="margin-left: 18px" Font-Bold="False" Font-Size="Large" />
            &nbsp;&nbsp;&nbsp;
            <br />
            <br />
            &nbsp;&nbsp;&nbsp;
            <asp:HyperLink ID="HyperLink1" runat="server" NavigateUrl="~/Registro.aspx">Registrarse</asp:HyperLink>
            <br /> 
            &nbsp;&nbsp;&nbsp;
            <asp:HyperLink ID="HyperLink2" runat="server" NavigateUrl="~/CambiarPassword.aspx">Cambiar Contraseña</asp:HyperLink>
        &nbsp;&nbsp;&nbsp;
        </p>
        <div style="margin-left: 120px">
            <asp:Label ID="Label3" runat="server" ForeColor="Red"></asp:Label>
        </div>
    </form>
</body>
</html>
