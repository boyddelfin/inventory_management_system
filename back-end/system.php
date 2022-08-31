<?php

class System {

    private $data;
    public $title;
    public $url;
    public $page_status;
    private $menu;

    function __construct()
    {
        $this->url = explode("/", $_SERVER['QUERY_STRING']);
        $this->menu = array(
            'app_menu' => [
                'dashboard' => [
                    'singular' => 'Dashboard',
                    'icon' => 'dashboard',
                    'user' => 'all'
                ],
                'products' => [
                    'singular' => 'Product',
                    'icon' => 'inventory',
                    'user' => 'all'
                ],
                'suppliers' => [
                    'singular' => 'Supplier',
                    'icon' => 'add_business',
                    'user' => 'all'
                ],
                'users' => [
                    'singular' => 'User',
                    'icon' => 'people_alt',
                    'user' => 'all'
                ],
            ],
            'my_account' => [
                'profile' => [
                    'singular' => 'Profile',
                    'icon' => 'person',
                    'user' => 'all'
                ],
                'logout' => [
                    'singular' => 'Logout',
                    'icon' => 'logout',
                    'user' => 'all'
                ]
            ],
        );
    }

    public function load() {
        $url = explode("/", $_SERVER['QUERY_STRING']);
        $sessions = new Sessions();
        if($sessions->is_set()) {
            
            if(array_key_exists(0, $url) && !array_key_exists(1, $url)) {
                if( $this->has_page($url[0]) ) {

                    $this->show_page($url[0]);
                    
                } elseif($url[0] == ''){
                    
                    include APP_DIR.'/front-end/pages/dashboard/dashboard.php';
                    
                } else {
                    
                    $this->_404();
                    
                }
            } elseif (array_key_exists(1, $url)) {
                
                if($this->has_sub_page($url[0], $url[1])) {
                    
                    $this->show_sub_page($url[0], $url[1]);
                    
                } elseif($url[1] == '') {
                    
                    $this->show_page($url[0]);

                } else {

                    $this->_404();

                }
            } else {

                $this->_404();

            }
            
        } else {
    
            include APP_DIR.'/front-end/pages/login/login.php';
    
        }
    }
    
    public function show_page($dir, $file_name = null) {
        if($file_name != null) {
            include APP_DIR.'/front-end/pages/'.$dir.'/'.$file_name.'.php';
        } else {
            include APP_DIR.'/front-end/pages/'.$dir.'/'.$dir.'.php';
        }
    }

    public function show_sub_page($dir, $file_name = null) {
        if($file_name != null) {
            include APP_DIR.'/front-end/pages/'.$dir.'/sub/'.$file_name.'.php';
        } else {
            include APP_DIR.'/front-end/pages/'.$dir.'/sub/'.$dir.'.php';
        }
    }
    
    private function has_page($file_name) {
    
        $dir = APP_DIR."/front-end/pages/".$file_name;
        $search_file = '';
    
        if(is_dir($dir)) {
            $dir_list = scandir($dir);
            if($dir_list) {
                $search_file = array_search(strtolower($file_name).'.php', $dir_list);
            } else {
                return false;
            }
        
            if(strtolower($file_name) == 'login') {
                return false;
            }
        }
    
        return $search_file;
    }
    
    private function has_sub_page($parent, $page) {
    
        $dir = APP_DIR."/front-end/pages/".$parent.'/sub';
        $search_file = '';
    
        if(is_dir($dir)) {
            $search_file = array_search($page.'.php', scandir($dir));
    
            if(strtolower($page) == 'login') {
                return false;
            }
        }
    
        return $search_file;
    }
    
    private function _404() {
        http_response_code(404);
        include APP_DIR.'/front-end/pages/404/404.php';
    }
    
    public function page_title() {
        if($this->has_page($this->url[0])) {
            $remove_uscore = str_replace('_', ' ', $this->url[0]);
            $title = preg_replace('/[^A-Za-z0-9\-_]/', ' ', $remove_uscore);
            echo ucwords($title);
        } else {
            echo '404 - Not Found';
        }
    }
    
    public function title($seperator) {
        $sessions = new Sessions();
        if($sessions->is_set()) {
            if($this->has_page($this->url[0])) {
                $title = unslugify($this->url[0]);
                $final_title = ucwords($title);
            } else {
                $final_title = '404 - Not Found';
            }
        } else {
            $final_title = 'Login';
        }
        echo APP_NAME." ".$seperator." ".$final_title;
    }

    public function menu() {
        $menu_template = '<aside
		class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 pt-3 bg-gradient-dark"
		id="sidenav-main"><div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main"><ul class="navbar-nav">';
				
                foreach($this->menu as $seperator => $menus) {
                    $menu_template .= $this->menu_seperator($seperator);

                    foreach($menus as $title => $value) {
                        if($this->url[0] == $title) {
                            $menu_template .= $this->menu_active($title, $value['icon']);
                        } else {
                            $menu_template .= $this->menu_inactive($title, $value['icon']);
                        }
                    }
                }

        $menu_template .= '</ul></div></aside>';

        echo $menu_template;

    }

    private function menu_seperator($name) {
        return '<li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">'.unslugify($name).'</h6>
                </li>';
    }

    private function menu_active($name, $icon) {
        return '<li class="nav-item">
        <a class="nav-link text-white active bg-gradient-primary" href="'._url($name).'">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">'.$icon.'</i>
            </div>
            <span class="nav-link-text ms-1">'.ucwords($name).'</span>
        </a>
        </li>';
    }

    private function menu_inactive($name, $icon) {
        return '<li class="nav-item"><a class="nav-link text-white" href="'._url($name).'"><div class="text-white text-center me-2 d-flex align-items-center justify-content-center"><i class="material-icons opacity-10">'.$icon.'</i></div><span class="nav-link-text ms-1">'.ucwords($name).'</span></a></li>';
    }

}

$system = new System();