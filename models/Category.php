<?php
  class Category {
 
    private $conn;
    private $table = 'categories';

   
    public $id;
    public $name;
    public $created_at;

    // Constructor 
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get categories
    public function read() {
      
      $query = 'SELECT
        id,
        name,
        created_at
      FROM
        ' . $this->table . '
      ORDER BY
        created_at DESC';

 
      $stmt = $this->conn->prepare($query);

     
      $stmt->execute();

      return $stmt;
    }

    

  // Create 
  public function create() {
  
    $query = 'INSERT INTO ' .
      $this->table . '
    SET
      name = :name';


  $stmt = $this->conn->prepare($query);


  $this->name = htmlspecialchars(strip_tags($this->name));

  
  $stmt-> bindParam(':name', $this->name);

  
  if($stmt->execute()) {
    return true;
  }


  printf("Error: $s.\n", $stmt->error);

  return false;
  }

  

  
  }
