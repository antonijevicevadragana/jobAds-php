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

function loadPartials($name) {
$path =basePath("App/views/partials/{$name}.php");

if (file_exists($path)) {
   require $path;
} else {
   echo "Partial {$name} dosen't exist";
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