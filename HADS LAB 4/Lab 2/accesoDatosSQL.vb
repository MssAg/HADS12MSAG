Imports System.Data.OleDb
Imports System.Data.SqlClient
Imports System.Net.Mail
Imports Microsoft.VisualBasic

Public Class accesodatosSQL
    Private Shared conexion As New SqlConnection
    Private Shared comando As New SqlCommand
    Public Shared Function conectar() As String
        Try
            conexion.ConnectionString = "Data Source=tcp:hads12msag.database.windows.net,1433;Initial Catalog=HADS12_Usuarios;Persist Security Info=True;User ID=HADS12@hads12msag;Password=Dinosaurio12"
            conexion.Open()
        Catch ex As Exception
            Return "ERROR DE CONEXIÓN: " + ex.Message
        End Try
        Return "CONEXION OK"
    End Function

    Public Shared Sub cerrarconexion()
        conexion.Close()
    End Sub

    Public Shared Function insertar(ByVal email As String, ByVal nombre As String, ByVal apellidos As String, ByVal pregunta As String, ByVal respuesta As String, ByVal dni As String, ByVal pass As String) As Integer


        Randomize()
        Dim numconfir = CLng(Rnd() * 9000000) + 1000000


        Dim st = "insert into Usuarios (email,nombre, apellidos, pregunta, respuesta, dni, numconfir, confirmado, pass) values ('" & email & "','" & nombre & "','" & apellidos & "','" & pregunta & "','" & respuesta & "','" & dni & "','" & numconfir & "',0, '" & pass & "')"
        Dim numregs As Integer
        comando = New SqlCommand(st, conexion)
        Try
            numregs = comando.ExecuteNonQuery()
        Catch ex As Exception
            Return 0
        End Try
        Return numconfir

    End Function

    Public Shared Function login(ByVal email As String, ByVal pass As String) As Integer
        Dim st = "select count(*) from Usuarios where email='" & email & "' and pass='" & pass & "'"
        comando = New SqlCommand(st, conexion)
        Return comando.ExecuteScalar()
    End Function
    Public Shared Function tipoUsuario(ByVal email As String) As SqlDataAdapter
        Dim da = New SqlDataAdapter("select tipo from Usuarios where email='" & email & "'", conexion)
        Return da
    End Function
    Public Shared Function asignaturasAlumno(ByVal email As String) As SqlDataAdapter
        Dim da = New SqlDataAdapter("select * from EstudiantesGrupo inner join GruposClase on EstudiantesGrupo.Grupo = GruposClase.codigo where email='" & email & "'", conexion)
        Return da
    End Function
    Public Shared Function tareasAlumno(ByVal email As String) As SqlDataAdapter
        Dim da = New SqlDataAdapter("select Distinct TareasGenericas.CodAsig, TareasGenericas.Codigo, TareasGenericas.Descripcion, TareasGenericas.HEstimadas, TareasGenericas.TipoTarea from ((EstudiantesGrupo inner join GruposClase on EstudiantesGrupo.Grupo = GruposClase.codigo) inner join TareasGenericas on TareasGenericas.CodAsig = GruposClase.codigoasig) where EstudiantesGrupo.email='" & email & "' and TareasGenericas.Explotacion = 1 and TareasGenericas.Codigo not in (select CodTarea from EstudiantesTareas where EstudiantesTareas.Email = '" & email & "')", conexion)
        Return da
    End Function
    Public Shared Function existeCorreo(ByVal email As String) As Integer
        Dim st = "Select count(*) from Usuarios where email='" & email & "'"
        comando = New SqlCommand(st, conexion)
        Return comando.ExecuteScalar()
    End Function
    Public Shared Function comprobarRespuesta(ByVal email As String, ByVal respuesta As String) As Integer
        Dim st = "select count(*) from Usuarios where email='" & email & "' and respuesta='" & respuesta & "'"
        comando = New SqlCommand(st, conexion)
        Return comando.ExecuteScalar()
    End Function
    Public Shared Function preguntaSecreta(ByVal email As String) As SqlDataReader

        Dim st = "select * from Usuarios where email='" & email & "'"
        comando = New SqlCommand(st, conexion)
        Return comando.ExecuteReader()
    End Function
    Public Shared Function cambiarContrasena(ByVal email As String, ByVal pass As String) As Integer
        Dim st = "update Usuarios set pass = " & pass & " where email='" & email & "'"
        comando = New SqlCommand(st, conexion)
        Return comando.ExecuteNonQuery()
    End Function
    Public Shared Function insertarTarea(ByVal usuario As String, ByVal tarea As String, ByVal horasE As String, ByVal horasR As String) As String
        Dim st = "insert into EstudiantesTareas (Email, CodTarea, HEstimadas, HReales) values ('" & usuario & "','" & tarea & "','" & horasE & "','" & horasR & "')"
        comando = New SqlCommand(st, conexion)
        Dim numregs As Integer
        Try
            numregs = comando.ExecuteNonQuery()
        Catch ex As Exception
            Return ex.Message
        End Try
        Return "TAREA INTRODUCIDA"
    End Function
    Public Shared Function añadirTarea(ByVal codigo As String, ByVal descripcion As String, ByVal asignatura As String, ByVal horasE As String, ByVal tipo As String) As String
        Dim st = "insert into TareasGenericas (Codigo, Descripcion, CodAsig, HEstimadas, Explotacion, TipoTarea) values ('" & codigo & "','" & descripcion & "','" & asignatura & "','" & horasE & "', 0 ,'" & tipo & "')"
        comando = New SqlCommand(st, conexion)
        Dim numregs As Integer
        Try
            numregs = comando.ExecuteNonQuery()
        Catch ex As Exception
            Return ex.Message
        End Try
        Return "TAREA INTRODUCIDA"
    End Function
    Public Shared Function activarUsuario(ByVal email As String, ByVal numconfir As Integer) As Integer
        Dim st = "update Usuarios set confirmado = 1 where email='" & email & "' and numconfir='" & numconfir & "'"
        comando = New SqlCommand(st, conexion)
        Return comando.ExecuteNonQuery()
    End Function
    Public Shared Function comprobacion(ByVal email As String, ByVal numconfir As Integer) As Integer
        Dim st = "select count(*) from Usuarios where email='" & email & "' and numconfir='" & numconfir & "' and confirmado = 1"
        comando = New SqlCommand(st, conexion)
        Return comando.ExecuteScalar()
    End Function
    Public Shared Function enviarEmail(ByVal email As String, ByVal numconfir As Integer) As String
        Try
            'Direccion de origen
            Dim from_address As New MailAddress("hads12msag@gmail.com", "HADS12")
            'Direccion de destino
            Dim to_address As New MailAddress(email, email)
            'Password de la cuenta
            Dim from_pass As String = "hads12dinosaurio"
            'Objeto para el cliente smtp
            Dim smtp As New SmtpClient
            'Host en este caso el servidor de gmail
            smtp.Host = "smtp.gmail.com"
            'Puerto
            smtp.Port = 587
            'SSL activado para que se manden correos de manera segura
            smtp.EnableSsl = True
            'No usar los credenciales por defecto ya que si no no funciona
            smtp.UseDefaultCredentials = False
            'Credenciales
            smtp.Credentials = New System.Net.NetworkCredential(from_address.Address, from_pass)
            'Creamos el mensaje con los parametros de origen y destino
            Dim message As New MailMessage(from_address, to_address)
            'Añadimos el asunto
            message.Subject = "subject"
            'Concatenamos el cuerpo del mensaje a la plantilla
            message.Body = "http://hads12msag.azurewebsites.net/Confirmar.aspx?email=" & email & "&numconfir=" & numconfir

            'Definimos el cuerpo como html para poder escojer mejor como lo mandamos
            message.IsBodyHtml = True
            'Se envia el correo
            smtp.Send(message)
        Catch e As Exception
            Return e.ToString

        End Try
        Return "Todo bien"
    End Function

End Class
