<%@ Page Language="vb" AutoEventWireup="false" CodeBehind="InstanciarTarea.aspx.vb" Inherits="Lab_2.InstanciasTarea" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body style="height: 446px">
    <form id="form1" runat="server">
    <div style="height: 428px">
    
        <br />
&nbsp;&nbsp;&nbsp;
        <br />
&nbsp;<asp:Label ID="Label1" runat="server" Font-Bold="True" Text="ALUMNOS INSTANCIAR TAREA GENERICA"></asp:Label>
        <br />
        <br />
&nbsp;Usuario&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
        <asp:TextBox ID="TextBox1" runat="server" Enabled="False"></asp:TextBox>
        <br />
        <br />
&nbsp;Tarea&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <asp:TextBox ID="TextBox2" runat="server" Enabled="False"></asp:TextBox>
    
        <br />
        <br />
&nbsp;Horas Est.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <asp:TextBox ID="TextBox3" runat="server" Enabled="False"></asp:TextBox>
        <br />
        <br />
&nbsp;Horas Reales
        <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>
        <br />
        <br />
&nbsp;<asp:Button ID="Button1" runat="server" Text="Actualizar Tarea" />
        <br />
        <br />
        <asp:HyperLink ID="HyperLink1" runat="server" NavigateUrl="~/TareasAlumno.aspx">Página anterior</asp:HyperLink>
    
        <br />
        <br />
        <br />
        <asp:Label ID="Label2" runat="server"></asp:Label>
    
    </div>
        &nbsp;
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
    </form>
</body>
</html>
