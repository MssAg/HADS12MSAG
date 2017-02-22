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
            Server.Transfer("Aplicacion.aspx", True)
        Else
            Label3.Text = "Error al logear"
        End If

    End Sub

    Private Sub Inicio_Unload(sender As Object, e As EventArgs) Handles Me.Unload
        cerrarconexion()
    End Sub
End Class