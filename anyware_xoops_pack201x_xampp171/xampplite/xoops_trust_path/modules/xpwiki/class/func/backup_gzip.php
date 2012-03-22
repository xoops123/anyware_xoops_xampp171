<?php
class XpWikiBackupFunc extends XpWikiPukiWikiFunc {
	// �ե����륷���ƥ�ؿ�
	// zlib�ؿ������

	/**
	 * _backup_fopen
	 * �Хå����åץե�����򳫤�
	 *
	 * @access    private
	 * @param     String    $page        �ڡ���̾
	 * @param     String    $mode        �⡼��
	 *
	 * @return    Boolean   FALSE:����
	 */
	function _backup_fopen($page, $mode)
	{
		return gzopen($this->_backup_get_filename($page), $mode);
	}

	/**
	 * _backup_fputs
	 * �Хå����åץե�����˽񤭹���
	 *
	 * @access    private
	 * @param     Integer   $zp          �ե�����ݥ���
	 * @param     String    $str         ʸ����
	 *
	 * @return    Boolean   FALSE:���� ����¾:�񤭹�����Х��ȿ�
	 */
	function _backup_fputs($zp, $str)
	{
		return gzputs($zp, $str);
	}

	/**
	 * _backup_fclose
	 * �Хå����åץե�������Ĥ���
	 *
	 * @access    private
	 * @param     Integer   $zp          �ե�����ݥ���
	 *
	 * @return    Boolean   FALSE:����
	 */
	function _backup_fclose($zp)
	{
		return gzclose($zp);
	}

	/**
	 * _backup_file
	 * �Хå����åץե���������Ƥ��������
	 *
	 * @access    private
	 * @param     String    $page        �ڡ���̾
	 *
	 * @return    Array     �ե����������
	 */
	function _backup_file($page)
	{
		return $this->_backup_file_exists($page) ?
			gzfile($this->_backup_get_filename($page)) :
			array();
	}
}
?>