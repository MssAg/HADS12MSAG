Imports Lab_2.accesodatosSQL
Imports System.Data.SqlClient
Public Class alumno
    Inherits System.Web.UI.Page

    Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
        Dim result As String
        result = conectar()
        If Session.Contents("Usuario") = "" Or Session.Contents("TipoUsuario") = "P" Then
            Server.Transfer("Inicio.aspx", True)
        End If
        Dim dapMbrs As New SqlDataAdapter()
        Dim tblMbrs As New DataTable
        Dim dstMbrs As New DataSet
        Dim dapAsig As New SqlDataAdapter()
        Dim tblAsig As New DataTable
        Dim dstAsig As New DataSet
        If Session.Contents("Usuario") = "" Or Session.Contents("TipoUsuario") = "P" Then
            Server.Transfer("Inicio.aspx", True)
        End If
        dapAsig = asignaturasAlumno(Session.Contents("Usuario"))
        dapAsig.Fill(dstAsig, "Asignaturas")
        tblAsig = dstAsig.Tables("Asignaturas")
        If Page.IsPostBack Then
            tblMbrs = Session.Contents("TablaTareas")
        Else
            Dim index As Integer = 0
            For Each row In tblAsig.Rows
                DropDownList1.Items.Add(tblAsig.Rows(index).Item("codigoasig"))
                index = index + 1
                dapMbrs = tareasAlumno(Session.Contents("Usuario"))
                Dim bldMbrs As New SqlCommandBuilder(dapMbrs)
                dapMbrs.Fill(dstMbrs, "Miembros")
                tblMbrs = dstMbrs.Tables("Miembros")
                Session.Contents("TablaTareas") = tblMbrs
            Next
        End If
        Dim dv As New DataView(tblMbrs)
        dv.RowFilter = "CodAsig ='" & DropDownList1.SelectedValue & "'"
        Dim tblFil = dv.ToTable(True, "Codigo", "Descripcion", "HEstimadas", "TipoTarea")
        Session.Contents("TablaFiltrada") = tblFil
        GridView1.DataSource = tblFil
        GridView1.DataBind()
        If (tblFil.Rows.Count = 0) Then
            Label1.Text = "NO HAY TAREAS PARA ESTA ASIGNATURA"
        Else
            Label1.Text = ""
        End If

    End Sub

    Protected Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
        Session.Abandon()
        Server.Transfer("Inicio.aspx", True)

    End Sub

    Private Sub GridView1_SelectedIndexChanged(sender As Object, e As EventArgs) Handles GridView1.SelectedIndexChanged

        Dim table = Session.Contents("TablaFiltrada")
        Dim email = Session.Contents("Usuario")
        Dim tarea = table.Rows(GridView1.SelectedIndex).Item(0)
        Dim horas = table.Rows(GridView1.SelectedIndex).Item(2)
        Response.Redirect("InstanciarTarea.aspx?tarea=" & tarea & "&horas=" & horas)
    End Sub
End Class