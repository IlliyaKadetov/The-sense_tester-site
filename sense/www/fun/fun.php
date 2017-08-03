<?php  
	$link;
	function openDB(){
		global $link;
		$link = mysqli_connect('localhost', 'root', '', 'sensebase');
		if(mysqli_connect_errno()){
			echo mysqli_connect_error();
			exit();
		}
	}
	function getNews($w, $id=null){
		openDB();
		if($id){
			$where = "WHERE `id` = ".$id;
		}
		global $link;
		$sql = "SELECT * FROM `news` $where ORDER BY `id` DESC LIMIT $w";
		$result = mysqli_query($link, $sql);
		$data = mysqli_fetch_all($result, 1);
		return $data;
		closeDB();
	}
	function closeDB(){
		mysqli_close();
	}
?>