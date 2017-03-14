Imports Lab_2.accesodatosSQL
Imports System.Data.SqlClient
Public Class CambiarPassword
    Inherits System.Web.UI.Page

    Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
        Dim result As String
        result = conectar()
        Label2.Visible = False
        Label3.Visible = False
        Label4.Visible = False
        Label5.Visible = False
        Label6.Visible = False
        TextBox2.Visible = False
        TextBox3.Visible = False
        TextBox5.Visible = False


        Button1.Visible = False

    End Sub
    Private Sub Inicio_Unload(sender As Object, e As EventArgs) Handles Me.Unload
        cerrarconexion()
    End Sub

    Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click

        If comprobarRespuesta(TextBox1.Text, TextBox5.Text) = 1 Then
            cambiarContrasena(TextBox1.Text, TextBox2.Text)
            Label7.Text = "La contraseña ha sido modificada"
        Else
            Label7.Text = "La contraseña no ha sido modificada"
        End If

    End Sub

    Private Sub Button2_Click(sender As Object, e As EventArgs) Handles Button2.Click
        If existeCorreo(TextBox1.Text) = 1 Then
            Label2.Visible = True
            Label3.Visible = True
            Label4.Visible = True
            Label5.Visible = True
            Label6.Visible = True
            TextBox2.Visible = True
            TextBox3.Visible = True
            TextBox5.Visible = True
            Button1.Visible = True
            Dim RS As SqlDataReader
            RS = preguntaSecreta(TextBox1.Text)
            While RS.Read
                Label6.Text = RS.Item("pregunta")
            End While
        Else Label7.Text = "Error: Correo incorrecto"

        End If

    End Sub
End Class