<?phpfunction my_autoloader($className){    $dirs = [        'c/',        'm/'    ];    $found = false;    foreach ($dirs as $dir) {        $fileName = __DIR__ . '/' . $dir . '/' . $className . '.php';        if (is_file($fileName)) {            require_once($fileName);            $found = true;        }    }}spl_autoload_register('my_autoloader');$action = 'action_';$action .=(isset($_GET['act'])) ? $_GET['act'] : 'index';switch ($_GET['c']){	case 'articles':		$controller = new C_Page();        break;    case 'User':		$controller = new C_User();		break;    case 'catalog':        $controller = new C_Catalog();        break;    case 'product':        $controller = new C_Product();        break;    case 'basket':        $controller = new C_Basket();        break;    case 'order':        $controller = new C_Order();        break;	default:		$controller = new C_Page();}$controller->Request($action);