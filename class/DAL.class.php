<?php

class DAL {
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "ecommerce";

    public function getdata($sql) {
        // Establish a connection to the database
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check if the connection was successful
        if ($conn->connect_error) {
            // Throw an exception if there is a connection error
            throw new Exception("Connection failed: " . $conn->connect_error);
        } else {
            // Execute the SQL query
            $result = $conn->query($sql);

            // Check if the query was successful
            if (!$result) {
                // Throw an exception if there is an error with the query
                throw new Exception("Query failed: " . $conn->error);
            } else {
                // Fetch all results as an associative array
                $results = $result->fetch_all(MYSQLI_ASSOC);
                // Close connection
                $conn->close();
                // Return the results
                return $results;
            }
        }
    }

    public function execute($sql) {
        // Establish a connection to the database
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check if the connection was successful
        if ($conn->connect_error) {
            // Throw an exception if there is a connection error
            throw new Exception("Connection failed: " . $conn->connect_error);
        } else {
            // Execute the SQL query
            $result = $conn->query($sql);

            // Check if the query was successful
            if (!$result) {
                // Throw an exception if there is an error with the query
                throw new Exception("Query failed: " . $conn->error);
            } else {
                // Return the ID of the last inserted row
                $insert_id = $conn->insert_id;
                // Close connection
                $conn->close();
                return $insert_id;
            }
        }
    }

    public function movemultiplefiles($image, $i) {
        // Check if $image is an array and if the index $i exists
        if (is_array($image["name"]) && isset($image["name"][$i]) && isset($image["tmp_name"][$i])) {
            $target_dir = "../assets/img/";
            $target_file = $target_dir . basename($image["name"][$i]);
            $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $img_name = pathinfo($target_file, PATHINFO_FILENAME);
            $count = 0;
            $image_name = $image["name"][$i];
    
            // Handle filename collisions
            while (file_exists($target_file)) {
                $new_image = $img_name . "-" . $count . "." . $extension;
                $image_name = $new_image;
                $target_file = $target_dir . $new_image;
                $count++;
            }
    
            // Move uploaded file to target directory
            $res = move_uploaded_file($image["tmp_name"][$i], $target_file);
    
            if ($res) {
                return $image_name;
            } else {
                throw new Exception("Failed to move uploaded file.");
            }
        } else {
            throw new Exception("Invalid file upload data.");
        }
    }
    public function ConnectionDatabase(){
        return new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      }
    
    
    
      // $stmt: This is the prepared statement object.
      // bind_param: This is a method provided by the MySQLi extension in PHP for binding parameters.
      // $types: This variable contains a string that represents the types of the parameters being bound (e.g., 's' for string, 'i' for integer).
      // ...$params: This is the splat operator in PHP, which allows passing an array of values as separate arguments. Here, it passes the parameters that need to be bound to the statement.
      
    
    
    //   Security: It helps prevent SQL injection attacks by ensuring that user input is treated as data and not as part of the SQL query itself.
    
    // Efficiency: It allows the database engine to optimize the execution of the query, as the structure of the query is pre-defined and only the values change.
    
    // So, in summary, "binding" in the context of database interactions is the process of connecting variables to placeholders in a prepared SQL statement.
      
      public function data($sql, $params = array())
      {
          $conn = $this->ConnectionDatabase();
      
          // Check if there are parameters
          if (!empty($params)) {
              $stmt = $conn->prepare($sql);
      
              if ($stmt === false) {
                  throw new Exception($conn->error);
              }
      
              $types = str_repeat('s', count($params));
              $stmt->bind_param($types, ...$params);
      
              $result = $stmt->execute();
      
              if ($result === false) {
                  throw new Exception($stmt->error);
              }
      
              $resultSet = $stmt->get_result();
              $results = $resultSet->fetch_all(MYSQLI_ASSOC);
      
              $stmt->close();
          } else {
              // If there are no parameters, execute the query directly
              $result = $conn->query($sql);
      
              if ($result === false) {
                  throw new Exception($conn->error);
              }
      
              $results = $result->fetch_all(MYSQLI_ASSOC);
          }
      
          $conn->close();
      
          return $results;
      }
      
    

public function moveSingleFile($image) {
    // Check if $image is an array and if the necessary keys exist
    if (isset($image["name"]) && isset($image["tmp_name"])) {
        $target_dir = "../client/assets/images/";
        $target_file = $target_dir . basename($image["name"]);
        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $img_name = pathinfo($target_file, PATHINFO_FILENAME);
        $count = 0;
        $image_name = $image["name"];

        // Handle filename collisions
        while (file_exists($target_file)) {
            $new_image = $img_name . "-" . $count . "." . $extension;
            $image_name = $new_image;
            $target_file = $target_dir . $new_image;
            $count++;
        }

        // Move uploaded file to target directory
        $res = move_uploaded_file($image["tmp_name"], $target_file);

        if ($res) {
            return $image_name;
        } else {
            throw new Exception("Failed to move uploaded file.");
        }
    } else {
        throw new Exception("Invalid file upload data.");
    }
}
public function validatePhoneNumber($phone) {
    $phone = preg_replace('/[\/ ]/', '', $phone);
    $pattern = '/^(?:\+?\d{1,3})?[ -]?\(?\d{3}\)?[ -]?[0-9]{3}[ -]?[0-9]{4}$/';
    $pattern2 = '/^\+?[1-9][0-9]{7,14}$/';
    if (preg_match($pattern, $phone) || preg_match($pattern2, $phone)) {
    return $phone;
    } else {
    return false;
    }
   }
   public function getusersbyusername($username) {
    $sql = "SELECT * FROM users WHERE username = '$username'";
    return $this->getdata($sql);
}

}

?>