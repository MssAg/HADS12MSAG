Imports Lab_2.accesodatosSQL
Imports System.Data.SqlClient
Public Class Aplicacion
    Inherits System.Web.UI.Page

    Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
        Dim result As String
        result = conectar()
        If Session.Contents("Usuario") = "" Or Session.Contents("TipoUsuario") = "A" Then
            Server.Transfer("Inicio.aspx", True)
        End If
    End Sub
    Private Sub Inicio_Unload(sender As Object, e As EventArgs) Handles Me.Unload
        cerrarconexion()
    End Sub
    Protected Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
        Session.Abandon()
        Server.Transfer("Inicio.aspx", True)

    End Sub

    Private Sub Button2_Click(sender As Object, e As EventArgs) Handles Button2.Click
        Server.Transfer("InsertarTarea.aspx", True)
    End Sub
End Class