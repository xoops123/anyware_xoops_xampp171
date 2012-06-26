Option Explicit
On Error Resume Next

Dim objWshShell
Dim cmd		' コマンド代入
Dim strNewFolder    ' 移動するフォルダ
Dim strCmdLine      ' 実行するコマンド

Set objWshShell = CreateObject("WScript.Shell")


'xampplite を終了する

'If Err.Number = 0 Then
'    strNewFolder = "z:\xampplite"
'    objWshShell.CurrentDirectory = strNewFolder
'	    strCmdLine = "xampp_stop.exe"
'	    objWshShell.Exec(strCmdLine)
'	        WScript.Echo "xampplite を 終了しました。次に Z ドライブを解除します。"
'Else
'    WScript.Echo "エラー: " & Err.Description
'End If

' 5秒待つ
 WScript.Sleep 5000

' Zドライブを解除する
cmd = "subst /d z:"
CreateObject("WScript.Shell").Run cmd ,0

WScript.Echo "Ｚドライブを解除しました。"

Set objWshShell = Nothing
