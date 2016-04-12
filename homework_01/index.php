<!DOCTYPE html>
<html>
<head>
</head>
<body>
    
    <?php
    $data = array(
        'webgl' => array(
            'title' => 'Компютърна графика с WebGL',
            'description' => '...',
            'lecturer' => 'доц. П. Бойчев', 
        ),
        'go' => array(
            'title' => 'Програмиране с Go',
            'description' => '...',
            'lecturer' => 'Николай Бачийски', 
        ),
    );
    
	function show_page($pageId, $courses) {
            $element = $courses[$pageId];
             $result = '<h1>' .  $element['title'] . '</h1>'
                       . '<h2>' . $element['lecturer'] . '</h2>'
                       . '<p>' . $element['description'] . '</p>';
            // echo '############################################################';
            
            // foreach($element as $k) {
            //     еcho '<h1>title: ' .  $courses[$pageId]['title'] . '</h1>';
            //     echo '<h2>lecturer: ' . $element['lecturer'] . '</h2>';
            //     echo '<p>description: ' . $element['description'] . '</p>';
            // }
            // echo '############################################################';
            
            // foreach( $courses as $key => $value) {
            //     echo $key; 
            //     echo '<h1>title: ' . $value['title'] . '</h1>';
            //     echo $value['lecturer'];
            //     echo $value['description'];
            // }
            return $result;
    }
    
    function show_nav($data, $pageId) {
        $classForSelectedPage = ' class="selected"';
        $result = '<nav>';
        
        foreach( $data as $key => $value) {
            $result .= '<a href="?page='.$key.'"';
            if($key === $pageId){
                $result .= $classForSelectedPage;
            }
            $result .= '>';
            $result .= $value['title'];
            $result .= '</a>';
        }
        
        $result .= '</nav>';
        
        return $result;
    }
    
    ##echo show_page('webgl', $data);
    ##echo show_nav($data, 'webgl');
    
    
   c class Request { 

        private $_method = 'get'; 
        private $_path = '/index.php'; 
        private $_url = '/index.php?a=1&b=2'; 
        private $_userAgent = 'Test Agent'; 

        public function __construct($paramet) { 
             $_method = $paramet['REQUEST_METHOD'];
             $_path = $paramet['SCRIPT_NAME'];
             $_url = $paramet['REQUEST_URI'];
            $_userAgent = $paramet['HTTP_USER_AGENT'];
        } 

        public function getMethod() { 
            return $this->_method;      
        }
        
        public function getPath() { 
            return $this->_path;
            //return '/index.php';
        }
        
        public function getURL() { 
            return $this->_url;
            //return '/index.php?a=1&b=2';
        }
        
        public function getUserAgent() { 
            return $this->_userAgent;
            //return 'Test Agent';
        } 

    } 
    
    class GetRequest extends Request{
        
        private $data; 
        
        public function __construct($paramet) { 
            parent::__construct($paramet);
            
           
            
            $data = json_encode($paramet['REQUEST_URI']);
            
        } 
        
        public function getData() { 
            return $this->data;
            
            //return '{"a":"1","b":"2"}';
        }
        
    }


    
    $input = '{"DOCUMENT_ROOT":"\/php_stuff","REMOTE_ADDR":"127.0.0.1","REMOTE_PORT":"53892","SERVER_SOFTWARE":"PHP 5.5.30 Development Server","SERVER_PROTOCOL":"HTTP\/1.1","SERVER_NAME":"localhost","SERVER_PORT":"8000","REQUEST_URI":"\/index.php?a=1&b=2","REQUEST_METHOD":"GET","SCRIPT_NAME":"\/index.php","SCRIPT_FILENAME":"\/php_stuff\/index.php","PHP_SELF":"\/index.php","QUERY_STRING":"a=1&b=2","HTTP_HOST":"localhost:8000","HTTP_CONNECTION":"keep-alive","HTTP_CACHE_CONTROL":"max-age=0","HTTP_ACCEPT":"text\/html,application\/xhtml+xml,application\/xml;q=0.9,image\/webp,*\/*;q=0.8","HTTP_UPGRADE_INSECURE_REQUESTS":"1","HTTP_USER_AGENT":"Test Agent","HTTP_ACCEPT_ENCODING":"gzip, deflate, sdch","HTTP_ACCEPT_LANGUAGE":"en-US,en;q=0.8,bg;q=0.6","REQUEST_TIME_FLOAT":1456721254.3913,"REQUEST_TIME":1456721254,"argv":["a=1&b=2"],"argc":1}';
    
    
    ##test code
    $file = fopen(getenv('OUTPUT_PATH'),"w");
    
        $__fp = fopen("php://stdin", "r");

        $_server = fgets($__fp);
        $_server = json_decode(trim($_server), true);

        function testClass($server) {
            $result = array();
            $req = new GetRequest($server);
            $result[] = $req->getMethod();
            $result[] = $req->getPath();
            $result[] = $req->getURL();
            $result[] = $req->getUserAgent();
            $result[] = $req->getData();
            return $result;
        }

        $res = testClass($_server);
        foreach ($res as $res_cur) {
            fwrite($file, $res_cur . "\n" );
        }
        fclose($file);

    
    
    
?>
</body>
    </html>