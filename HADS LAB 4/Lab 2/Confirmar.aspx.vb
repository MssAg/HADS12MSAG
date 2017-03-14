Imports Lab_2.accesodatosSQL
Imports System.Data.SqlClient
Public Class Confirmar
    Inherits System.Web.UI.Page

    Protected Sub Page_Load(ByVal sender As Object, ByVal e As System.EventArgs) Handles Me.Load
        Dim result As String
        result = conectar()
        Dim email As String = Request.QueryString("email")
        Dim numconfir As Integer = Int(Request.QueryString("numconfir"))
        activarUsuario(email, numconfir)
        If comprobacion(email, numconfir) = 1 Then
            Label1.Text = "Hola, ya estas registrado en el sistema."
        Else
            Label1.Text = "ERROR: Numero de confirmacion incorrecto y/o usuario no registrado."
            HyperLink1.Visible = False

        End If

    End Sub

    Private Sub Inicio_Unload(sender As Object, e As EventArgs) Handles Me.Unload
        cerrarconexion()
    End Sub

End Class