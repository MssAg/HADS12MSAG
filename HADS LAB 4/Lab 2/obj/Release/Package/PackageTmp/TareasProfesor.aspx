<%@ Page Language="vb" AutoEventWireup="false" CodeBehind="TareasProfesor.aspx.vb" Inherits="Lab_2.Aplicacion" %>

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
        &nbsp;<asp:Label ID="Label1" runat="server" Text="GESTION DE TAREAS GENERICAS"></asp:Label>
        <br />
        <br />
        &nbsp;&nbsp;
        <asp:DropDownList ID="DropDownList1" runat="server" DataSourceID="SqlDataSource1" DataTextField="codigoasig" DataValueField="codigoasig" AutoPostBack="True">
            
        </asp:DropDownList>
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" ConnectionString="<%$ ConnectionStrings:HADS12_UsuariosConnectionString %>" SelectCommand="SELECT GruposClase.codigoasig FROM GruposClase INNER JOIN ProfesoresGrupo ON ProfesoresGrupo.codigogrupo = GruposClase.codigo WHERE email = @Usuario">
            <selectparameters>
		        <asp:sessionparameter name="Usuario" sessionfield="Usuario"/>
	        </selectparameters>
        </asp:SqlDataSource>
        <br />
        <br />
        <br />
        <asp:Button ID="Button2" runat="server" Text="Insertar Nueva Tarea" />
        <br />
        <br />
        &nbsp;&nbsp;
        <asp:GridView ID="GridView1" runat="server" AllowSorting="True" AutoGenerateColumns="False" AutoGenerateEditButton="True" DataKeyNames="Codigo" DataSourceID="SqlDataSource2">
            <Columns>
                <asp:BoundField DataField="Codigo" HeaderText="Codigo" ReadOnly="True" SortExpression="Codigo" />
                <asp:BoundField DataField="Descripcion" HeaderText="Descripcion" SortExpression="Descripcion" />
                <asp:BoundField DataField="CodAsig" HeaderText="CodAsig" SortExpression="CodAsig" />
                <asp:BoundField DataField="HEstimadas" HeaderText="HEstimadas" SortExpression="HEstimadas" />
                <asp:CheckBoxField DataField="Explotacion" HeaderText="Explotacion" SortExpression="Explotacion" />
                <asp:BoundField DataField="TipoTarea" HeaderText="TipoTarea" SortExpression="TipoTarea" />
            </Columns>
        </asp:GridView>
        <asp:SqlDataSource ID="SqlDataSource2" runat="server" ConnectionString="<%$ ConnectionStrings:HADS12_UsuariosConnectionString %>" SelectCommand="select Distinct TareasGenericas.Codigo, TareasGenericas.Descripcion,TareasGenericas.CodAsig, TareasGenericas.HEstimadas, TareasGenericas.Explotacion, TareasGenericas.TipoTarea from ((EstudiantesGrupo inner join GruposClase on EstudiantesGrupo.Grupo = GruposClase.codigo) inner join TareasGenericas on TareasGenericas.CodAsig = GruposClase.codigoasig) where TareasGenericas.CodAsig = @seleccion" UpdateCommand="UPDATE TareasGenericas SET Descripcion =@Descripcion, CodAsig =@CodAsig, HEstimadas =@HEstimadas, Explotacion =@Explotacion, TipoTarea =@TipoTarea WHERE Codigo = @Codigo">
            <SelectParameters>
                <asp:ControlParameter ControlID="DropDownList1" Name="seleccion" PropertyName="SelectedValue" />
            </SelectParameters>
        </asp:SqlDataSource>
        <br />
        <asp:Button ID="Button1" runat="server" Text="LogOut" />
    
        <br />  
    </div>
    </form>
</body>
</html>
