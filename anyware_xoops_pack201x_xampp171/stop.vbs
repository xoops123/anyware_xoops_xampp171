Dim objShell
Dim wExec
Dim sCmd
Dim strDrive    ' �h���C�u��
Dim cmd		' �R�}���h���

Set objShell = CreateObject("WScript.Shell")

' �R�}���h����
sCmd = "subst"

' �R�}���h���s
Set wExec = objShell.Exec("%ComSpec% /c " & sCmd)

Do While wExec.Status = 0  
Loop

Result = wExec.StdOut.ReadAll

strDrive = Left(Result, 1)

'MsgBox strDrive & "�h���C�u���������܂��B"

'�h���C�u�����̖₢���킹
Msg = MsgBox(strDrive & "�h���C�u���������Ă��ǂ��ł����H", vbQuestion + vbYesNo, "���z�h���C�u�̉���")

If Msg = vbYes Then '����Msg��vbYes�Ȃ�
	'MsgBox strDrive & "�h���C�u�̉��������s���܂��B" , vbInformation, "���z�h���C�u�̉���"

' ���z�h���C�u����������
cmd = "subst /d " & strDrive & ":"
CreateObject("WScript.Shell").Run cmd ,0

WScript.Echo strDrive & "�h���C�u���������܂����B"


Else
	MsgBox "�L�����Z�����܂����B" , vbCritical, "���~"
End If 

Set wExec = Nothing
Set objShell = Nothing

