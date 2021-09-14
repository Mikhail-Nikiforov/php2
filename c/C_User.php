<?php

include_once('m/M_User.php');
include_once('m/M_Order.php');

class C_User extends C_Base
{

    public function action_info() {

        $get_user = new M_User();
        $orders = new M_Order();
        $user_info = $get_user->get($_SESSION['user_id']);
        $this->title .= 'Личный кабинет';
        $this->content = $this->Template('v/v_info.php', array('userlogin' => $user_info['login'], 'orders_list' => $orders->show('user')));
    }

	public function action_auth(){
		$this->title .= 'Авторизация';
        $user = new M_User();
		$info = "Пользователь не авторизован";
        if($_POST){
            $info = $user->auth($_POST['login'], $_POST['password']);
		    $this->content = $this->Template('v/v_auth.php', array('text' => $info));
		}
		else{
		   $this->content = $this->Template('v/v_auth.php');
		}


	}

    public function action_reg() {

        $this->title .= 'Регистрация';
        $this->content = $this->Template('v/v_reg.php', array());

        if($this->isPost()) {
            $new_user = new M_User();
            $result = $new_user->registration($_POST['login'], $_POST['password']);
            $this->content = $this->Template('v/v_reg.php', array('text' => $result));
        }
    }

    public function action_logout() {
        $logout = new M_User();
        $result = $logout->logout();
        header("Location: ./index.php");
    }
}
