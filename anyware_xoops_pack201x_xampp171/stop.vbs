Option Explicit
On Error Resume Next

Dim objWshShell
Dim cmd		' �R�}���h���
Dim strNewFolder    ' �ړ�����t�H���_
Dim strCmdLine      ' ���s����R�}���h

Set objWshShell = CreateObject("WScript.Shell")


'xampplite ���I������

'If Err.Number = 0 Then
'    strNewFolder = "z:\xampplite"
'    objWshShell.CurrentDirectory = strNewFolder
'	    strCmdLine = "xampp_stop.exe"
'	    objWshShell.Exec(strCmdLine)
'	        WScript.Echo "xampplite �� �I�����܂����B���� Z �h���C�u���������܂��B"
'Else
'    WScript.Echo "�G���[: " & Err.Description
'End If

' 5�b�҂�
 WScript.Sleep 5000

' Z�h���C�u����������
cmd = "subst /d z:"
CreateObject("WScript.Shell").Run cmd ,0

WScript.Echo "�y�h���C�u���������܂����B"

Set objWshShell = Nothing
