Option Explicit
On Error Resume Next

Dim str
Dim strDrive    ' �h���C�u��
Dim objWshShell
Dim cmd		' �R�}���h���
Dim objFSO
Dim objWShell
Dim strNewFolder    ' �ړ�����t�H���_
Dim strCmdLine      ' ���s����R�}���h
Dim strUrl      ' �\������y�[�W
Dim objIE       ' IE �I�u�W�F�N�g

Set objFSO = WScript.CreateObject("Scripting.FileSystemObject")
Set objWshShell = CreateObject("WScript.Shell")
Set objWShell = CreateObject("WScript.Shell")

'�J�����g�f�B���N�g���� str �ɑ��
str= objWshShell.CurrentDirectory

cmd = "subst z: " & str 

CreateObject("WScript.Shell").Run cmd ,0

' 5�b�҂�
 WScript.Sleep 5000

If (objFSO.DriveExists("Z")) then
else
	' ����Ȃ����A����5�b�҂�
        WScript.Sleep 5000
end if


' InternetExplorer���N������

strUrl = "Z:\xampplite\htdocs\index.html"
Set objIE = WScript.CreateObject("InternetExplorer.Application")
If Err.Number = 0 Then
    objIE.Navigate strUrl
    objIE.Visible = True
Else
    WScript.Echo "�G���[�F" & Err.Description
End If


If Err.Number = 0 Then
    strNewFolder = "z:\xampplite"
    objWshShell.CurrentDirectory = strNewFolder
	    strCmdLine = "xampp-control.exe"
	    objWshShell.Exec(strCmdLine)
'	        WScript.Echo "xampp �� �N�����܂����B"
Else
    WScript.Echo "�G���[: " & Err.Description
End If


Set objIE = Nothing
Set objFSO = Nothing
Set objWshShell = Nothing
Set objWShell = Nothing
