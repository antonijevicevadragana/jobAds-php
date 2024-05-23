<?php

function basePath($path = "")
{
   return __DIR__ . '/' . $path;
}


function loadView($name, $data=[])
{
   $path = basePath("App/views/{$name}.view.php");

   if (file_exists($path)) {
      extract($data);
      require $path;
   } else {
      echo "View {$name} dosen't exist";
   }
}

function loadPartials($name, $data=[]) {
   $partialPath= basePath("App/views/partials/{$name}.php");
   if(file_exists($partialPath)){
     extract($data); 
       require $partialPath;
   }
   else {
       echo "View {$name} not found!";
   }

}


function inspect($value)
{
   echo "<pre>";
   var_dump($value);
   echo "</pre>";
}

function inspectAndDie($value)
{
   echo "<pre>";
   die(var_dump($value));
   echo "</pre>";
}

/**
 * Sanitaze Data
 * @param string $data
 * @return string
 */

 function sanitize($data) {
   return filter_var(trim($data), FILTER_SANITIZE_SPECIAL_CHARS);
 }


 function redirect($url) {
   header("Location: {$url}");
   exit;
 }

 function numberFormating($number) {
   return number_format($number,2,",",".");
 }

