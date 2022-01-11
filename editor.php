<?php

if (!empty($_POST['editorID']) && isset($_POST['editabledata'])) {
	saveEditable($_POST['editorID'], $_POST['editabledata']);
}

function getEditable($id) {
	$file = "files/content/".$id.".txt";
	if (file_exists($file)) {
		echo file_get_contents($file);
	}
}

function saveEditable($id, $data) {
	$file = "files/content/".$id.".txt";
	file_put_contents($file, $data);
}

?>