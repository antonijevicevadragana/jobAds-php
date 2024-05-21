<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;

class ListingController
{
  protected $db;

  public function __construct()
  {
    $config = require basePath('config/db.php');
    $this->db = new Database($config);
  }

  public function index()
  {
    $listings = $this->db->query('SELECT * FROM `listings`')->fetchAll();
    //inspect($listings);

    loadView('listings/index', [
      'listings' => $listings
    ]);
  }

  public function create()
  {
    //inspectAndDie('create');
    loadView('listings/create');
  }

  public function show($params)
  {
    $id = $params['id'] ?? '';
    $params  = [
      'id' => $id
    ];

    $listing = $this->db->query('SELECT * FROM `listings` WHERE id = :id', $params)->fetch();

    if (!$listing) {
      ErrorController::notFound('Listing not found');
      return;
    }

    loadView('listings/show', [
      'listing' => $listing
    ]);
  }

  /**
   * store data in DB
   * @return void
   * 
   */

  public function store()
  {
    $allowedFields = ['company', 'city', 'state', 'address', 'phone', 'email', 'title', 'role_summary', 'description', 'requirements', 'benefits', 'tags', 'salary', 'work_location'];

    $newListingData = array_intersect_key($_POST, array_flip($allowedFields));
    $newListingData['user_id'] = 1;

    //sanitize data
    $newListingData = array_map('sanitize', $newListingData);

    $requiredFields = ['company', 'city', 'state', 'address', 'email', 'title', 'role_summary', 'description', 'requirements', 'benefits', 'tags', 'work_location'];

    $errors = [];

    //prolazimo kroz svaki obaveznih polja i ako je prazno upisujemo gresku
    foreach ($requiredFields as $field) {
      if (empty($newListingData[$field]) || !Validation::string($newListingData[$field])) {
        $errors[$field] = ucfirst($field) . ' is required!';
      }
    }

    //validacija mail
    if(!Validation::email($newListingData['email'])) {
      $errors['phone'] = 'Field email is not valid';
    }
    //validacija telefona
    if(!Validation::phone($newListingData['phone'])) {
      $errors['phone'] = 'phone can contain only number';
    }


    if (!empty($errors)) {
      //reload view with err
      loadView('listings/create', [
        'errors' => $errors,
        'listing' => $newListingData
      ]);
    } else {
      //submit data
      //echo "OK";

      $fields = [];

      foreach ($newListingData as $field => $value) {
        $fields[] = $field;
      }

      $fields = implode(', ', $fields);
      //inspectAndDie($fields);
      $values = [];

      foreach ($newListingData as $field => $value) {
        //convert empty strings to NULL
        if ($value = '') {
          $newListingData[$field] = NULL;
        }
        $values[] = ':' . $field;
      }

      $values = implode(', ', $values);
      //inspectAndDie($values);

      $query = "INSERT INTO `listings` ({$fields}) VALUES ({$values})";
      $this->db->query($query, $newListingData);
      $_SESSION['success_message'] = 'Listing added successfully';
      redirect('/listings');
    }
  }

  /**
   * DELETE a single listing
   * 
   * @param arrays $params
   * @return void
   */

  public function destroy($params) {
    $id = $params['id'];

    $params = [
      'id' => $id
    ];

    $listing = $this->db->query('SELECT * FROM `listings` WHERE `id` = :id', $params)->fetch();

    if (!$listing) {
      ErrorController::notFound('Listing not found');
      return;
    }

  $this->db->query('DELETE FROM `listings` WHERE `id` = :id', $params);
  // Set flash msg
  $_SESSION['success_message'] = 'Listing deleted successfully';

  redirect('/listings');
  }

  /**
   * Edit listing
   * @param array $parms
   * @return void
   */

   public function edit($params)
   {
     $id = $params['id'] ?? '';
     $params  = [
       'id' => $id
     ];
 
     $listing = $this->db->query('SELECT * FROM `listings` WHERE id = :id', $params)->fetch();
 
     if (!$listing) {
       ErrorController::notFound('Listing not found');
       return;
     }
     loadView('listings/edit', [
       'listing' => $listing
     ]);
   }
}
