<?php

class PKT_Loader
{

   public function model($name)
   {
      require(APP_DIR . 'models/' . strtolower($name) . '.php');

      $model = new $name;

      return $model;
   }

   public function view($name,$vars = array())
   {
      $view = new PKT_View($name);

      if($vars){
         foreach ($vars as $k => $var){
            $view->set($k,$var);
         }
      }

      $view->render();
   }

   public function plugin($name)
   {
      require(APP_DIR . 'hooks/' . strtolower($name) . '.php');
   }

   public function helper($name)
   {
      require(APP_DIR . 'helpers/' . strtolower($name) . '.php');
      $helper = new $name;

      return $helper;
   }

   public function library($name)
   {
      require(APP_DIR . 'libraries/' . strtolower($name) . '.php');
      $helper = new $name;

      return $helper;
   }

   public function redirect($loc)
   {
      global $config;

      header('Location: ' . $config['base_url'] . $loc);
   }

}
