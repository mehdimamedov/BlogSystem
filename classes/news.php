<?php

class News {
	public $id;
	public $title;
	public $author;
	public $content;
	public $date;
	public $fileName;
	public $count;

	public function __construct($id, $title, $author, $content, $date, $fileName, $count) {
		$this->id = $id;
		$this->title = $title;
		$this->author = $author;
		$this->content = $content;
		$this->date = $date;
		$this->fileName = $fileName;
		$this->count = $count;
	}
}

?>