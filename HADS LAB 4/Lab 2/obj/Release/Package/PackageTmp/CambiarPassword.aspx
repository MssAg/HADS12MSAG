<%@ Page Language="vb" AutoEventWireup="false" CodeBehind="CambiarPassword.aspx.vb" Inherits="Lab_2.CambiarPassword" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
    <div>  
        <br />    
        &nbsp;&nbsp;&nbsp;    
        <asp:Label ID="Label1" runat="server" Font-Bold="True" Text="  Email:" Width="150"></asp:Label>
        <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
        <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" ControlToValidate="TextBox1" ErrorMessage="*" ForeColor="#CC0000"></asp:RequiredFieldValidator>
        <asp:RegularExpressionValidator ID="RegularExpressionValidator2" runat="server" ControlToValidate="TextBox1" ErrorMessage="Email Incorrecto" ForeColor="#CC0000" ValidationExpression="\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*"></asp:RegularExpressionValidator>
        <br />
        <br />
        &nbsp;&nbsp;&nbsp;
        <asp:Button ID="Button2" runat="server" Text="Comprobar" />
        <br />
        <br />      
        &nbsp;&nbsp;&nbsp;      
        <asp:Label ID="Label2" runat="server" Font-Bold="True" Text="  Nueva Contraseña:" Width="150"></asp:Label>
        <asp:TextBox ID="TextBox2" runat="server" TextMode="Password"></asp:TextBox>
        <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" ControlToValidate="TextBox2" ErrorMessage="*" ForeColor="#CC0000"></asp:RequiredFieldValidator>
        <asp:RegularExpressionValidator ID="RegularExpressionValidator3" runat="server" ControlToValidate="TextBox2" ErrorMessage="Password entre 6 y 20 caracteres" ForeColor="#CC0000" ValidationExpression="[\w]{6,20}"></asp:RegularExpressionValidator>
        <br />
        <br />
        &nbsp;&nbsp;&nbsp;      
        <asp:Label ID="Label3" runat="server" Font-Bold="True" Text="  Repita la Contraseña:" Width="150"></asp:Label>
        <asp:TextBox ID="TextBox3" runat="server" TextMode="Password"></asp:TextBox>
        <asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" ControlToValidate="TextBox3" ErrorMessage="*" ForeColor="#CC0000"></asp:RequiredFieldValidator>
        <asp:CompareValidator ID="CompareValidator1" runat="server" ErrorMessage="Passwords no coinciden" ControlToCompare="TextBox2" ControlToValidate="TextBox3" ForeColor="#CC0000"></asp:CompareValidator>
        <br />
        <br />
        &nbsp;&nbsp;&nbsp;
        <asp:Label ID="Label4" runat="server" Font-Bold="True" Text="  Pregunta Secreta:" Width="150"></asp:Label>
        <asp:Label ID="Label6" runat="server" Text="Aquí aparecerá la pregunta secreta almacenada en la BD" Width="400px"></asp:Label>
        <br />
        <br />
        &nbsp;&nbsp;&nbsp;
        <asp:Label ID="Label5" runat="server" Font-Bold="True" Text="  Respuesta a la Pregunta Secreta:" Width="150"></asp:Label>
        <asp:TextBox ID="TextBox5" runat="server"></asp:TextBox>
        <asp:RequiredFieldValidator ID="RequiredFieldValidator5" runat="server" ControlToValidate="TextBox5" ErrorMessage="*" ForeColor="#CC0000"></asp:RequiredFieldValidator>
        <br />
        <br />
        &nbsp;&nbsp;&nbsp;
        <asp:Button ID="Button1" runat="server" Text="Cambiar Contraseña" Width="150px" />    
        <br />
        <br />
&nbsp;&nbsp;&nbsp;
        <asp:Label ID="Label7" runat="server"></asp:Label>
        <br />
        <br />
        &nbsp;&nbsp;&nbsp;
        <asp:HyperLink ID="HyperLink1" runat="server" NavigateUrl="~/Inicio.aspx">Volver</asp:HyperLink> 
        <br /> 
    </div>
    </form>
</body>
</html>
