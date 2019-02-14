<?php

require_once "modules/Cases/views/view.edit.php";

class CustomCasesViewEdit extends CasesViewEdit {
	// public function __construct() {
	// 	parent::__construct();
	// }

	public function display() {

		/* Added by Ruvin - SuiteCRM 7.10.12 Bug fix (not display the text editor on edit view of CASE) */
		if ($_REQUEST['module'] == 'Cases' && $_REQUEST['action'] == 'EditView' && (isset($_REQUEST['record']) && !empty($_REQUEST['record']))) {
			echo "
		  <script>
		  $(function() {
		  tinyMCE.execCommand('mceAddControl', false, document.getElementById('description'));
		   document.getElementById('description').style.height = '300px';
		  });
		  </script>
		  ";
		}
		/* ###*/

		parent::display();

		$newScript = '';
		if (empty($this->bean->id)) {
			$newScript = "$('#update_text').closest('.edit-view-row-item').hide();
		                  $('#update_text_label').closest('.edit-view-row-item').hide();
		                  $('#internal').closest('.edit-view-row-item').hide();
		                  $('#internal_label').closest('.edit-view-row-item').hide();
		                  $('#addFileButton').closest('.edit-view-row-item').hide();
		                  $('#case_update_form_label').closest('.edit-view-row-item').hide();";
			$newScript .= "tinyMCE.execCommand('mceAddControl', false, document.getElementById('description'));";
			echo '<script>$(document).ready(function(){' . $newScript . '})</script>';
		}

	}
}
