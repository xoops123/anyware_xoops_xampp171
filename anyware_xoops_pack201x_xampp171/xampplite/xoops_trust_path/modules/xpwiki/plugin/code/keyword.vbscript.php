<?php
/**
 * Microsoft VBScript Web $this->Content (ASP)
 */

//$capital = true;                      // ͽ������ʸ����ʸ������̤��ʤ�
$switchHash['"'] = $this->cont['PLUGIN_CODE_NONESCAPE_LITERAL'];  

$switchHash['\''] = $this->cont['PLUGIN_CODE_COMMENT'];    
$switchHash['r'] = $this->cont['PLUGIN_CODE_COMMENT_WORD'];
$switchHash['R'] = $this->cont['PLUGIN_CODE_COMMENT_WORD'];
$code_comment = Array(
	'\'' => Array(
				 Array('/^\'/', "\n", 1),
	    ),
	'r' => Array(
				 Array('/^rem\s/i', "\n", 1),
		),
	'R' => Array(
				 Array('/^rem\s/i', "\n", 1),
		),
);

$outline_def = Array(
					 /*
					 'If' => Array('End', 1),
					 'Select' => Array('End', 1),
					 'For' => Array('Next', 1),
					 'Do' => Array('Loop', 1),
					 'While' => Array('Wend', 1),
					 'With' => Array('End', 1),
					 */
					 '#region' => Array('#endregion', 0),
					 );
			  
$code_css = Array(
  'operator',
  'identifier',
  'pragma',
  'system',
  );

$code_keyword = Array(

//MsgBox�ؿ������

'vbOKOnly' => 2,
'vbOKCancel' => 2,
'vbAbortRetryIgnore' => 2,
'vbYesNoCancel' => 2,
'vbYesNo' => 2,
'vbRetryCancel' => 2,
'vbCritical' => 2,
'vbQuestion' => 2,
'vbExclamation' => 2,
'vbInformation' => 2,
'vbDefaultButton1' => 2,
'vbDefaultButton2' => 2,
'vbDefaultButton3' => 2,
'vbDefaultButton4' => 2,
'vbApplicationModal' => 2,
'vbSystemModal' => 2,

//Tristate�����

'TristateTrue' => 2,
'TristateFalse' => 2,
'TristateUseDefault' => 2,

//VarType�ؿ������

'vbEmpty' => 2,
'vbNull' => 2,
'vbInteger' => 2,
'vbLong' => 2,
'vbSingle' => 2,
'vbDouble' => 2,
'vbCurrency' => 2,
'vbDate' => 2,
'vbString' => 2,
'vbObject' => 2,
'vbError' => 2,
'vbBoolean' => 2,
'vbVariant' => 2,
'vbDataObject' => 2,
'vbDecimal' => 2,
'vbByte' => 2,
'vbArray' => 2,

//�������

'vbBlack' => 2,
'vbRed' => 2,
'vbGreen' => 2,
'vbYellow' => 2,
'vbBlue' => 2,
'vbMagenta' => 2,
'vbCyan' => 2,
'vbWhite' => 2,

//�ü�ե���������

'WindowsFolder' => 2,
'SystemFolder' => 2,
'TemporaryFolder' => 2,

//��Ӥ����
'vbBinaryCompare' => 2,
'vbTextCompare' => 2,
'vbDatabaseCompare' => 2,

//���դȻ�������

'vbSunday' => 2,
'vbMonday' => 2,
'vbTuesday' => 2,
'vbWednesday' => 2,
'vbThursday' => 2,
'vbFriday' => 2,
'vbSaturday' => 2,
'vbFirstJan1' => 2,
'vbFirstFourDays' => 2,
'vbFirstFullWeek' => 2,
'vbUseSystem' => 2,
'vbUseSystemDayOfWeek' => 2,

//���շ��������
'vbGeneralDate' => 2,
'vbLongDate' => 2,
'vbShortDate' => 2,
'vbLongTime' => 2,
'vbShortTime' => 2,

//�ե�����°�������

'Normal' => 2,
'ReadOnly' => 2,
'Hidden' => 2,
'System' => 2,
'Volume' => 2,
'Directory' => 2,
'Archive' => 2,
'Alias' => 2,
'Compressed' => 2,

//�ե����������Ϥ����

'ForReading' => 2,
'ForWriting' => 2,
'ForAppending' => 2,

//ʸ��������

'vbCr' => 2,
'vbCrLf' => 2,
'vbFormFeed' => 2,
'vbLf' => 2,
'vbNewLine' => 2,
'vbNullChar' => 2,
'vbNullString' => 2,
'vbTab' => 2,
'vbVerticalTab' => 2,

//����¾�����
'vbObjectError' => 2,

//���饹
'Class_Initialize' => 2,
'Class_Terminate' => 2,

//�ؿ�

'Abs' => 2,
'Array' => 2,
'Asc' => 2,
'Atn' => 2,
'CBool' => 2,
'CByte' => 2,
'CCur' => 2,
'CDate' => 2,
'CDbl' => 2,
'Chr' => 2,
'CInt' => 2,
'CLng' => 2,
'Cos' => 2,
'CreateObject' => 2,
'CSng' => 2,
'CStr' => 2,
'Date' => 2,
'DateAdd' => 2,
'DateDiff' => 2,
'DatePart' => 2,
'DateSerial' => 2,
'DateValue' => 2,
'Day' => 2,
'Eval' => 2,
'Exp' => 2,
'Filter' => 2,
'Fix' => 2,
'FormatCurrency' => 2,
'FormatDateTime' => 2,
'FormatNumber' => 2,
'FormatPercent' => 2,
'GetLocale' => 2,
'GetObject' => 2,
'GetRef' => 2,
'Hex' => 2,
'Hour' => 2,
'InputBox' => 2,
'InStr' => 2,
'InStrRev' => 2,
'Int' => 2,
'IsArray' => 2,
'IsDate' => 2,
'IsEmpty' => 2,
'IsNull' => 2,
'IsNumeric' => 2,
'IsObject' => 2,
'Join' => 2,
'LBound' => 2,
'LCase' => 2,
'Left' => 2,
'Len' => 2,
'LoadPicture' => 2,
'Log' => 2,
'LTrim' => 2,
'Mid' => 2,
'Minute' => 2,
'Month' => 2,
'MonthName' => 2,
'MsgBox' => 2,
'Now' => 2,
'Oct' => 2,
'Replace' => 2,
'RGB' => 2,
'Right' => 2,
'Rnd' => 2,
'Round' => 2,
'RTrim' => 2,
'ScriptEngine' => 2,
'ScriptEngineBuildVersion' => 2,
'ScriptEngineMajorVersion' => 2,
'ScriptEngineMinorVersion' => 2,
'Second' => 2,
'Sgn' => 2,
'Sin' => 2,
'Space' => 2,
'Split' => 2,
'Sqr' => 2,
'StrComp' => 2,
'String' => 2,
'StrReverse' => 2,
'Tan' => 2,
'Time' => 2,
'Timer' => 2,
'TimeSerial' => 2,
'TimeValue' => 2,
'Trim' => 2,
'TypeName' => 2,
'UBound' => 2,
'UCase' => 2,
'VarType' => 2,
'Weekday' => 2,
'WeekdayName' => 2,
'Year' => 2,

//�᥽�å�
'Clear' => 2,
'Execute' => 2,
'Raise' => 2,
'Replace' => 2,
'Test' => 2,

//���֥�������

//�黻��

'Not' => 2,
'And' => 2,
'Or' => 2,
'Xor' => 2,
'Mod' => 2,
'Eqv' => 2,
'Imp' => 2,
'Is' => 2,

//�ץ�ѥƥ�
'Description' => 2,
'FirstIndex' => 2,
'Global' => 2,
'HelpContext' => 2,
'HelpFile' => 2,
'IgnoreCase' => 2,
'Length' => 2,
'Number' => 2,
'Pattern' => 2,
'Source' => 2,
'Value' => 2,

//���ơ��ȥ���
'Call' => 2,
'Case' => 2,
'Class' => 2,
'Const' => 2,
'Dim' => 2,
'Do' => 2,
'Else' => 2,
'Erase' => 2,
'Error' => 2,
'Execute' => 2,
'ExecuteGlobal' => 2,
'Exit' => 2,
'Explicit' => 2,
'For' => 2,
'ForEach' => 2,
'Function' => 2,
'Get' => 2,
'If' => 2,
'Let' => 2,
'Loop' => 2,
'Next' => 2,
'On' => 2,
'Option' => 2,
'Private' => 2,
'Property' => 2,
'Public' => 2,
'Randomize' => 2,
'ReDim' => 2,
'Rem' => 2,
'Select' => 2,
'Set' => 2,
'Sub' => 2,
'Then' => 2,
'Wend' => 2,
'While' => 2,
'With' => 2,

  );?>