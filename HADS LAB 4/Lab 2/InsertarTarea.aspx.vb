Imports Lab_2.accesodatosSQL
Imports System.Data.SqlClient
Public Class InsertarTarea
    Inherits System.Web.UI.Page

    Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
        Dim result As String
        result = conectar()
        If Session.Contents("Usuario") = "" Or Session.Contents("TipoUsuario") = "A" Then
            Server.Transfer("Inicio.aspx", True)
        End If
    End Sub

    Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
        Label2.Text = añadirTarea(TextBox1.Text, TextBox3.Text, DropDownList1.SelectedValue, TextBox2.Text, DropDownList2.SelectedValue)
    End Sub
End Class