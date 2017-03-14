Imports Lab_2.accesodatosSQL
Imports System.Data.SqlClient
Public Class Registro2
    Inherits System.Web.UI.Page

    Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
        Dim result As String
        result = conectar()
    End Sub
    Private Sub Inicio_Unload(sender As Object, e As EventArgs) Handles Me.Unload
        cerrarconexion()
    End Sub

    Protected Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click


        Dim numconfir As Integer = insertar(TextBox1.Text, TextBox2.Text, TextBox3.Text, TextBox7.Text, TextBox8.Text, TextBox4.Text, TextBox5.Text)
        enviarEmail(TextBox1.Text, numconfir)
        Label9.Text = "Se ha enviado su numero de confirmacion"




    End Sub
End Class