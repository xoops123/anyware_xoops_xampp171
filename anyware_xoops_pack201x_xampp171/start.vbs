Option Explicit
On Error Resume Next

Dim str
Dim strDrive    ' ドライブ名
Dim strXAMPP    ' XAMPPフォルダ名
Dim objWshShell
Dim cmd		' コマンド代入
Dim objFSO
Dim objWShell
Dim strNewFolder    ' 移動するフォルダ
Dim strCmdLine      ' 実行するコマンド
Dim strUrl      ' 表示するページ
Dim objIE       ' IE オブジェクト
Dim strCheckPath	'xamppフォルダチェック用のパス
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

'カレントディレクトリを str に代入
str= objWshShell.CurrentDirectory

'フォルダとファイルの存在確認を行う
'xamppフォルダの存在確認
If objFileSys.FileExists(str & "\xampp\xampp-control.exe") = True Then
   strXAMPP = "xampp"
ElseIf objFileSys.FileExists(str & "\xampplite\xampp-control.exe") = True Then
   strXAMPP = "xampplite"
Else
	WScript.echo "xamppフォルダに xampp-control.exe がないので、終了します。"
	WScript.Quit 0
End If

Set objFileSys = Nothing

Do
	'ドライブを選択する
	strDrive = InputBox("ドライブレターを選択してください。")

	On Error Resume Next

	If blnCheck(strDrive) Then
	    Msgbox "ドライブレターは半角アルファベットで入力してください。"
	ElseIf strDrive = "" Then
		WScript.Quit 0
	Else
			strDrive = Left(strDrive, 1)
			'WScript.Echo "選択したドライブは:" & strDrive
		If (objFSO.DriveExists(strDrive)) then
				WScript.Echo "選択したドライブはすでに存在します。他のドライブを選んで下さい。"
		else
				'WScript.Echo "ドライブは存在しません。"
				Exit Do
		end if
	End If
	On Error Goto 0
Loop

'************* 指定したドライブでxamppを起動する *****************

cmd = "subst " & strDrive & ": " & str 

CreateObject("WScript.Shell").Run cmd ,0

' 5秒待つ
 WScript.Sleep 5000


If (objFSO.DriveExists(strDrive)) then
else
	' 足りなけりゃ、もう5秒待つ
        WScript.Sleep 5000
end if

' InternetExplorerを起動する
strUrl = strDrive & ":\xampp\htdocs\index.html"
Set objIE = WScript.CreateObject("InternetExplorer.Application")
If Err.Number = 0 Then
    objIE.Navigate strUrl
    objIE.Visible = True
Else
    WScript.Echo "エラー：" & Err.Description
End If


If Err.Number = 0 Then
    strNewFolder = strDrive & ":\xampp"
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
