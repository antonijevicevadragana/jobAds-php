<?php

namespace Framework;

class Validation
{

   /**
    * validate a string
    * 
    * @param string $value
    * @param int $min
    * @param int $max
    * @return bool
    */

   public static function string($value, $min = 1, $max = INF)
   {
      if (is_string($value)) {
         $value = trim($value);
         $length = strlen($value);
         return $length >= $min && $length <= $max;
      }

      return false;
   }


   /**
    * validate email
    * 
    * @param string $value
    * @return mixed
    */
   public static function email($value)
   {
      $value = trim($value);
      return filter_var($value, FILTER_VALIDATE_EMAIL);
   }

   /**
    * validate number/phone
    * 
    * @param string $value
    * @return bool
    */
   public static function number($value)
   {
      $value = trim($value);
      return preg_match("/^[0-9]*$/", $value);
   }

   /**
    * Match two values 
    * 
    * @param string $value1
    * @param string $value2
    * @return bool
    */

   public static function match($value1, $value2)
   {
      $value1 = trim($value1);
      $value2 = trim($value2);
      return $value1 === $value2;
   }

   /**
    * Alfa numeric validate (alowed letter,number, (?),(!), (,),(.),(:),(;) and space)
    *
    *@param $value
    *@return bool
    */

    public static function alfaNumeric($value)
    {
        $value = trim($value);
        return preg_match("/^[a-zA-Z0-9 \-\?!.,:;]*$/", $value);
    }
    


   /**
 * Alfa numeric validate +
 *
 * @param $value
 * @return bool
 */
public static function alfaNumericPlus($value)
{
    $value = trim($value);
    return preg_match("/^[a-zA-Z0-9 \-\?!+(),.:;]*$/", $value);
}

   /**
    * Validate name
    *
    * @param $value
    * @return bool
    */
   public static function alfa($value)
   {
      $value = trim($value);
      return preg_match("/^[a-zA-Z \-]*$/", $value);
   }


   /**
    * Validate work location (remote, hybrid or on-site)
    *
    * @param $value
    * @return bool
    */
    public static function workLocation($value)
    {
       $value = trim($value);
       return $value ==='remote' || $value ==='Remote' || $value === 'on-site' || $value === 'hybrid' || $value === 'Hybrid';
    }

    /**
     * Validate tags (exp. java,php,sql)
     * 
     * @param $value
     * @return bool
     */

     public static function validateTags($value) 
     {
         $value = trim($value);
         return preg_match("/^[a-zA-Z, ]*$/", $value);
     }
}
