Imports Lab_2.accesodatosSQL
Imports System.Data.SqlClient

Public Class Inicio
    Inherits System.Web.UI.Page
    Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
        Dim result As String
        result = conectar()
    End Sub

    Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
        Dim numreg As Integer
        Try
            numreg = login(TextBox1.Text, TextBox2.Text)
        Catch ex As Exception
            Label3.Text = ex.Message
            Exit Sub
        End Try
        If numreg = 1 Then
            Dim usuario As String = ""
            Session.Contents("Usuario") = TextBox1.Text
            Dim RS As SqlDataAdapter
            Dim DS As New DataSet
            Dim TB As New DataTable
            RS = tipoUsuario(TextBox1.Text)
            RS.Fill(DS, "Tipo")
            TB = DS.Tables("Tipo")
            usuario = TB.Rows(0).Item(0)
            Session.Contents("TipoUsuario") = usuario
            If usuario = "A" Then
                Server.Transfer("TareasAlumno.aspx", True)
            Else
                Server.Transfer("TareasProfesor.aspx", True)
            End If


        Else
            Label3.Text = "Error al logear"
        End If

    End Sub

    Private Sub Inicio_Unload(sender As Object, e As EventArgs) Handles Me.Unload
        cerrarconexion()
    End Sub
End Class