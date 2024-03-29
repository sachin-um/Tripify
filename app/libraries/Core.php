<?php
    class Core{
        //URL fromat --> /controller/method/params
        protected $currentController = 'Pages';
        protected $currentMethod ='index';
        protected $param=[];

        public function __construct()
        {
           $url= $this->getURL();

           //Controller
           if (file_exists('../app/controllers/'.ucwords($url[0]).'.php')) {
                $this->currentController=ucwords($url[0]);


                unset($url[0]);

                require_once '../app/controllers/'.$this->currentController.'.php';

                $this->currentController=new $this->currentController;

                //method

                if (isset($url[1])) {
                    if (method_exists($this->currentController,$url[1])) {
                        $this->currentMethod=$url[1];

                        unset($url[1]);
                    }
                }
                //echo $this->currentMethod;

                //Get parameters

                $this->params= $url ? array_values($url): [];

                call_user_func_array([$this->currentController,$this->currentMethod],$this->params);

           }
           else {
            $this->currentController='Pages';


                unset($url[0]);

                require_once '../app/controllers/'.$this->currentController.'.php';

                $this->currentController=new $this->currentController;

                $this->params= $url ? array_values($url): [];
                call_user_func_array([$this->currentController,$this->currentMethod],$this->params);

           }
        
        }


        public function getURL(){
            if (isset($_GET['url'])) {
                $url=rtrim($_GET['url'],'/');
                $url= filter_var($url,FILTER_SANITIZE_URL);
                $url= explode('/',$url);

                return $url;
            }
        }

    }

?>