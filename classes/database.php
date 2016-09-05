<?php

include "news.php";

class Database {
	public $conn;

	public function __construct($host, $username, $password, $dbname) {
		$this->conn = mysqli_connect($host, $username, $password, $dbname);
	}

	public function GetData($id = 0, $orderBy = 0) {
		$sql = "SELECT * FROM news";
		if ($id) {
			$sql .= " WHERE id='$id'";
		}
		if ($orderBy) {
			$sql .= " ORDER BY $orderBy DESC";
		}
		$query = mysqli_query($this->conn, $sql);
		$news = [];
		while ($row = mysqli_fetch_assoc($query)) {
			$newArticle = new News($row['id'], $row['title'], $row['author'], $row['content'], $row['create_date'], $row['filename'], $row['count']);
			array_push($news, $newArticle);
		}
		// var_dump($news);
		return $news;
	}

	public function InsertData($title, $author, $content, $date, $filename) {
		$sql = "INSERT INTO news (title, author, content,  filename, count) VALUES('$title', '$author', '$content','$filename', '0');";
		$query = mysqli_query($this->conn, $sql);
		return $query;
	}

	public function DeleteData($id) {
		$sql = "DELETE FROM news WHERE id='$id'";
		$query = mysqli_query($this->conn, $sql);
	}

	public function UpdateData($author, $title, $content, $filename, $count, $id) {
		$sql = "UPDATE news SET author='$author', title='$title', content='$content', filename='$filename', count='$count' WHERE id='$id'";
		$query = mysqli_query($this->conn, $sql);
		return $query;
	}

}

$db = new Database('localhost', 'root', '', 'webblog');