<?
include_once 'config/db.php';
class M_User {

    public $user_id, $user_login, $user_name, $user_password;

    public function __construct () {
    }

    public function logPassCrypt ($login, $pass): string
    {
        return md5($login) . md5($pass);
    }

    public function dbConnecting (): PDO
    {
        return new PDO(DRIVER . ':host='. SERVER . ';dbname=' . DB, USERNAME, PASSWORD);
    }

    public function get ($id) {
        $connect = $this->dbConnecting();
        return $connect->query("SELECT * FROM users WHERE id = '" . $id . "'")->fetch();
    }

    public function registration($login, $pass)
    {
        $connect = $this->dbConnecting();
        $user = $connect->query("SELECT * FROM users WHERE login = '" . $login . "'")->fetch();
        if (!$user) {
            $connect->exec("INSERT INTO users VALUES (null, '" . $login . "', '" . $this->logPassCrypt($login, $pass) . "')");
            return "<p>Вы успешно зарегистрировались!</p>";
        } else {
            return "<p>Пользователь с таким именем уже есть =(</p>";
        }
    }

    public function auth($login, $pass){
        $connect = $this->dbConnecting();
        $user = $connect->query("SELECT * FROM users WHERE login = '" . $login . "'")->fetch();
        if ($user) {
            if ($user["password"] == $this->logPassCrypt($user["login"], strip_tags($pass))) {
                $_SESSION["user_id"] = $user["id"];
                return 'Добро пожаловать в систему, ' . $user["login"] . '!';
            } else {
                return 'Пароль не верный!';
            }
        } else {
            return 'Пользователь с таким логином не зарегистрирован!';
        }
        return true;
    }

    public function logout () {
        if (isset($_SESSION["user_id"])) {
            $_SESSION["user_id"]=null;
            session_destroy();
            return true;
        }
        return false;

    }
}