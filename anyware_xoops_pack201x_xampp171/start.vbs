Option Explicit
On Error Resume Next

Dim str
Dim strDrive    ' �h���C�u��
Dim strXAMPP    ' XAMPP�t�H���_��
Dim objWshShell
Dim cmd		' �R�}���h���
Dim objFSO
Dim objWShell
Dim strNewFolder    ' �ړ�����t�H���_
Dim strCmdLine      ' ���s����R�}���h
Dim strUrl      ' �\������y�[�W
Dim objIE       ' IE �I�u�W�F�N�g
Dim strCheckPath	'xampp�t�H���_�`�F�b�N�p�̃p�X
Dim objFileSys

Set objFSO = WScript.CreateObject("Scripting.FileSystemObject")
Set objWshShell = CreateObject("WScript.Shell")
Set objWShell = CreateObject("WScript.Shell")
Set objFileSys = CreateObject("Scripting.FileSystemObject")

Function blnCheck(strLen)
Dim objRE
Set objRE = new RegExp
objRE.IgnoreCase = True
objRE.pattern = "[^a-zA-Z]"
blnCheck = objRE.Test(strLen)
Set objRE = Nothing
End Function

'�J�����g�f�B���N�g���� str �ɑ��
str= objWshShell.CurrentDirectory

'�t�H���_�ƃt�@�C���̑��݊m�F���s��
'xampp�t�H���_�̑��݊m�F
If objFileSys.FileExists(str & "\xampp\xampp-control.exe") = True Then
   strXAMPP = "xampp"
ElseIf objFileSys.FileExists(str & "\xampplite\xampp-control.exe") = True Then
   strXAMPP = "xampplite"
Else
	WScript.echo "xampp�t�H���_�� xampp-control.exe ���Ȃ��̂ŁA�I�����܂��B"
	WScript.Quit 0
End If

Set objFileSys = Nothing

Do
	'�h���C�u��I������
	strDrive = InputBox("�h���C�u���^�[��I�����Ă��������B")

	On Error Resume Next

	If blnCheck(strDrive) Then
	    Msgbox "�h���C�u���^�[�͔��p�A���t�@�x�b�g�œ��͂��Ă��������B"
	ElseIf strDrive = "" Then
		WScript.Quit 0
	Else
			strDrive = Left(strDrive, 1)
			'WScript.Echo "�I�������h���C�u��:" & strDrive
		If (objFSO.DriveExists(strDrive)) then
				WScript.Echo "�I�������h���C�u�͂��łɑ��݂��܂��B���̃h���C�u��I��ŉ������B"
		else
				'WScript.Echo "�h���C�u�͑��݂��܂���B"
				Exit Do
		end if
	End If
	On Error Goto 0
Loop

'************* �w�肵���h���C�u��xampp���N������ *****************

cmd = "subst " & strDrive & ": " & str 

CreateObject("WScript.Shell").Run cmd ,0

' 5�b�҂�
 WScript.Sleep 5000


If (objFSO.DriveExists(strDrive)) then
else
	' ����Ȃ����A����5�b�҂�
        WScript.Sleep 5000
end if

' InternetExplorer���N������
strUrl = strDrive & ":\xampp\htdocs\index.html"
Set objIE = WScript.CreateObject("InternetExplorer.Application")
If Err.Number = 0 Then
    objIE.Navigate strUrl
    objIE.Visible = True
Else
    WScript.Echo "�G���[�F" & Err.Description
End If


If Err.Number = 0 Then
    strNewFolder = strDrive & ":\xampp"
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
