<?php

include_once('m/M_Page.php');

class C_Page extends C_Base
{
	
	public function action_index(){
	    $page = new M_Page();
		$this->title .= 'Главная страница';
		$text = $page->text_get();
		//$today = date();
		$this->content = $this->Template('v/v_index.php', array('text' => $text));	
	}

}
