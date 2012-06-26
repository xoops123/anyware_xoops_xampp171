Dim objShell
Dim wExec
Dim sCmd
Dim strDrive    ' ドライブ名
Dim cmd		' コマンド代入

Set objShell = CreateObject("WScript.Shell")

' コマンド生成
sCmd = "subst"

' コマンド実行
Set wExec = objShell.Exec("%ComSpec% /c " & sCmd)

Do While wExec.Status = 0  
Loop

Result = wExec.StdOut.ReadAll

strDrive = Left(Result, 1)

'MsgBox strDrive & "ドライブを解除します。"

'ドライブ解除の問いあわせ
Msg = MsgBox(strDrive & "ドライブを解除しても良いですか？", vbQuestion + vbYesNo, "仮想ドライブの解除")

If Msg = vbYes Then 'もしMsgがvbYesなら
	'MsgBox strDrive & "ドライブの解除を実行します。" , vbInformation, "仮想ドライブの解除"

' 仮想ドライブを解除する
cmd = "subst /d " & strDrive & ":"
CreateObject("WScript.Shell").Run cmd ,0

WScript.Echo strDrive & "ドライブを解除しました。"


Else
	MsgBox "キャンセルしました。" , vbCritical, "中止"
End If 

Set wExec = Nothing
Set objShell = Nothing

