<?php

namespace App\Controllers;

use Framework\Database;
use Framework\Validation;
use Framework\Session;
use Framework\Authorization;

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
    $listings = $this->db->query('SELECT * FROM `listings` ORDER BY created_at DESC')->fetchAll();
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
    $newListingData['user_id'] = Session::get('user')['id'];

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

    //Extra validation
    if (!Validation::email($newListingData['email'])) {
      $errors['phone'] = 'Field email is not valid';
    }
   
    if (!Validation::number($newListingData['phone'])) {
      $errors['phone'] = 'phone can contain only number';
    }

    if (!Validation::alfa($newListingData['city'])) {
      $errors['city'] = 'City cannot contain numbers';
    }

    if (!Validation::alfa($newListingData['state'])) {
      $errors['state'] = 'State cannot contain numbers';
    }

    if (!Validation::alfa($newListingData['title'])) {
      $errors['title'] = 'Job Title cannot contain numbers';
    }

    if (!Validation::alfa($newListingData['tags'])) {
      $errors['tags'] = 'Tags cannot contain numbers';
    }

    if (!Validation::alfaNumeric($newListingData['address'])) {
      $errors['address'] = 'The field address can contain letters and numbers';
    }

    if (!Validation::alfaNumericPlus($newListingData['requirements'])) {
      $errors['requirements'] = 'Requirements can contain letters, numbers, and ?,!,-,+';
    }

    if (!Validation::alfaNumericPlus($newListingData['requirements'])) {
      $errors['requirements'] = 'Requirments can contain letters, numbers, and ?,!,-,+';
    }

    if (!Validation::alfaNumericPlus($newListingData['benefits'])) {
      $errors['benefits'] = 'Benefits can contain letters, numbers, and ?,!,-,+';
    }

    if (!Validation::alfaNumericPlus($newListingData['description'])) {
      $errors['description'] = 'Description can contain letters, numbers, and ?,!,-,+';
    }

    if (!Validation::alfaNumericPlus($newListingData['role_summary'])) {
      $errors['description'] = 'Description can contain letters, numbers, and ?,!,-,+';
    }

    if (!Validation::number($newListingData['salary'])) {
      $errors['salary'] = 'Salary can contain only numbers';
    }

    if (!Validation::workLocation($newListingData['work_location'])) {
      $errors['work_location'] = 'Work Location can be remote, hybrid or on-site';
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

  public function destroy($params)
  {
    $id = $params['id'];

    $params = [
      'id' => $id
    ];

    $listing = $this->db->query('SELECT * FROM `listings` WHERE `id` = :id', $params)->fetch();

    if (!$listing) {
      ErrorController::notFound('Listing not found');
      return;
    }

    //Authorization
    // if (Session::get('user')['id'] !== $listing->user_id) {
    //   $_SESSION['error_message'] = 'You are not authorized to delete this listing';
    //   return redirect('/listings/'. $listing->id);
    // }

    if (!Authorization::isOwner($listing->user_id)) {
      $_SESSION['error_message'] = 'You are not authorized to delete this listing';
      return redirect('/listings/' . $listing->id);
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

    if (!Authorization::isOwner($listing->user_id)) {
      $_SESSION['error_message'] = 'You are not authorized to update this listing';
      return redirect('/listings/' . $listing->id);
    }

    loadView('listings/edit', [
      'listing' => $listing
    ]);
  }

  /**
   * Update Listing
   *@param array $params
   *@return void
   */

  public function update($params)
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

    if (!Authorization::isOwner($listing->user_id)) {
      $_SESSION['error_message'] = 'You are not authorized to update this listing';
      return redirect('/listings/' . $listing->id);
    }

    $allowedFields = ['company', 'city', 'state', 'address', 'phone', 'email', 'title', 'role_summary', 'description', 'requirements', 'benefits', 'tags', 'salary', 'work_location'];

    $updatedValues = [];

    $updatedValues = array_intersect_key($_POST, array_flip($allowedFields));
    $updatedValues = array_map('sanitize', $updatedValues);

    $requiredFields = ['company', 'city', 'state', 'address', 'email', 'title', 'role_summary', 'description', 'requirements', 'benefits', 'tags', 'work_location'];


    $errors = [];

    //prolazimo kroz svaki obaveznih polja i ako je prazno upisujemo gresku
    foreach ($requiredFields as $field) {
      if (empty($updatedValues[$field]) || !Validation::string($updatedValues[$field])) {
        $errors[$field] = ucfirst($field) . ' is required!';
      }
    }

    //Extra validation
    if (!Validation::email($updatedValues['email'])) {
      $errors['phone'] = 'Field email is not valid';
    }

    if (!Validation::number($updatedValues['phone'])) {
      $errors['phone'] = 'Phone can contain only number';
    }

    if (!Validation::alfa($updatedValues['city'])) {
      $errors['city'] = 'City cannot contain numbers';
    }

    if (!Validation::alfa($updatedValues['state'])) {
      $errors['state'] = 'State cannot contain numbers';
    }

    if (!Validation::alfa($updatedValues['title'])) {
      $errors['title'] = 'Job Title cannot contain numbers';
    }

    if (!Validation::alfa($updatedValues['tags'])) {
      $errors['tags'] = 'Tags cannot contain numbers';
    }

    if (!Validation::alfaNumeric($updatedValues['address'])) {
      $errors['address'] = 'The field address can contain letters and numbers';
    }

    if (!Validation::alfaNumericPlus($updatedValues['requirements'])) {
      $errors['requirements'] = 'Requirements can contain letters, numbers, and ?,!,-,+';
    }

    if (!Validation::alfaNumericPlus($updatedValues['requirements'])) {
      $errors['requirements'] = 'Requirments can contain letters, numbers, and ?,!,-,+';
    }

    if (!Validation::alfaNumericPlus($updatedValues['benefits'])) {
      $errors['benefits'] = 'Benefits can contain letters, numbers, and ?,!,-,+';
    }

    if (!Validation::alfaNumericPlus($updatedValues['description'])) {
      $errors['description'] = 'Description can contain letters, numbers, and ?,!,-,+';
    }

    if (!Validation::alfaNumericPlus($updatedValues['role_summary'])) {
      $errors['description'] = 'Description can contain letters, numbers, and ?,!,-,+';
    }

    if (!Validation::number($updatedValues['salary'])) {
      $errors['salary'] = 'Salary can contain only numbers';
    }

    if (!Validation::workLocation($updatedValues['work_location'])) {
      $errors['work_location'] = 'Work Location can be remote, hybrid or on-site';
    }

    if (!empty($errors)) {
      loadView('listings/edit', [
        'errors' => $errors,
        'listing' => $listing
      ]);
      exit;
    } else {
      //submit data
      $updateFields = [];

      foreach (array_keys($updatedValues) as $field) {
        $updateFields[] = "{$field} = :{$field}";
      }

      $updateFields = implode(', ', $updateFields);
      //inspectAndDie($updateFields);
      $updateQuery = "UPDATE `listings` SET $updateFields WHERE `id`=:id";
      //inspectAndDie($updateQuery);
      $updatedValues['id'] = $id;
      $this->db->query($updateQuery, $updatedValues);

      $_SESSION['success_message'] = 'Listing Updated';
      redirect('/listings/' . $id);
    }
  }

  /**
   * Searc listings by keywords/location
   * 
   * @return void
   */

  public function search()
  {
    // inspectAndDie($_GET);
    $keywords = isset($_GET['keywords']) ? sanitize($_GET['keywords']) : "";
    $location = isset($_GET['location']) ? sanitize($_GET['location']) : "";

    $query = "SELECT * FROM `listings` WHERE (`title` LIKE :keywords OR tags LIKE :keywords OR company LIKE :keywords OR work_location LIKE :keywords) AND (city LIKE :location OR state LIKE :location)";
    $params = [
      'keywords' => "%{$keywords}%",
      'location' => "%{$location}%"
    ];

    $listings = $this->db->query($query, $params)->fetchAll();

    if (!$listings) {
      $_SESSION['error_message'] = 'Not match for ' . $keywords;
      loadView('/listings/index', [
        'listings' => $listings,
        'keywords' => $keywords,
        'location' => $location
      ]);
      exit;
    }
    //inspectAndDie($listings);
    loadView('/listings/index', [
      'listings' => $listings,
      'keywords' => $keywords,
      'location' => $location
    ]);
  }
}
