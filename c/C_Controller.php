<?php

session_start();

abstract class C_Controller
{
	protected abstract function render();

	protected abstract function before();
	
	public function Request($action)
	{
		$this->before();//метод вызывается до формирования данных для шаблона
		$this->$action();   //$this->action_index
		$this->render();
	}

	protected function IsGet()
	{
		return $_SERVER['REQUEST_METHOD'] == 'GET';
	}

	protected function IsPost()
	{
		return $_SERVER['REQUEST_METHOD'] == 'POST';
	}


	protected function Template($fileName, $vars = array())
	{
		// Установка переменных для шаблона.
		foreach ($vars as $k => $v)
		{
			$$k = $v;
		}

		// Генерация HTML в строку.
		ob_start();
		include "$fileName";
		return ob_get_clean();	
	}	
	
	// Если вызвали метод, которого нет - завершаем работу
	public function __call($name, $params){
        die('Не пишите фигню в url-адресе!!!');
	}
}
