Imports Lab_2.accesodatosSQL
Imports System.Data.SqlClient
Public Class InstanciasTarea
    Inherits System.Web.UI.Page

    Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
        Dim result As String
        result = conectar()
        If Session.Contents("Usuario") = "" Or Session.Contents("TipoUsuario") = "P" Then
            Server.Transfer("Inicio.aspx", True)
        End If
        TextBox1.Text = Session.Contents("Usuario")
        TextBox2.Text = Request.QueryString("tarea")
        TextBox3.Text = Request.QueryString("horas")
    End Sub


    Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
        Label2.Text = accesodatosSQL.insertarTarea(TextBox1.Text, TextBox2.Text, TextBox3.Text, TextBox4.Text)
    End Sub
End Class