Option Explicit
On Error Resume Next

Dim str
Dim strDrive    ' ドライブ名
Dim objWshShell
Dim cmd		' コマンド代入
Dim objFSO
Dim objWShell
Dim strNewFolder    ' 移動するフォルダ
Dim strCmdLine      ' 実行するコマンド
Dim strUrl      ' 表示するページ
Dim objIE       ' IE オブジェクト

Set objFSO = WScript.CreateObject("Scripting.FileSystemObject")
Set objWshShell = CreateObject("WScript.Shell")
Set objWShell = CreateObject("WScript.Shell")

'カレントディレクトリを str に代入
str= objWshShell.CurrentDirectory

cmd = "subst z: " & str 

CreateObject("WScript.Shell").Run cmd ,0

' 5秒待つ
 WScript.Sleep 5000

If (objFSO.DriveExists("Z")) then
else
	' 足りなけりゃ、もう5秒待つ
        WScript.Sleep 5000
end if


' InternetExplorerを起動する

strUrl = "Z:\xampplite\htdocs\index.html"
Set objIE = WScript.CreateObject("InternetExplorer.Application")
If Err.Number = 0 Then
    objIE.Navigate strUrl
    objIE.Visible = True
Else
    WScript.Echo "エラー：" & Err.Description
End If


If Err.Number = 0 Then
    strNewFolder = "z:\xampplite"
    objWshShell.CurrentDirectory = strNewFolder
	    strCmdLine = "xampp-control.exe"
	    objWshShell.Exec(strCmdLine)
'	        WScript.Echo "xampp を 起動しました。"
Else
    WScript.Echo "エラー: " & Err.Description
End If


Set objIE = Nothing
Set objFSO = Nothing
Set objWshShell = Nothing
Set objWShell = Nothing
