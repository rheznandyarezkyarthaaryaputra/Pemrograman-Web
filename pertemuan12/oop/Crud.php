<?php
require_once 'Database.php';

class Crud {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    // Create
    public function create($jabatan, $keterangan) {
        // Prepare the query with placeholders
        $query = "INSERT INTO tabeljabatan (jabatan, keterangan) VALUES (?, ?)";
        
        // Prepare the statement
        $stmt = $this->db->conn->prepare($query);
        
        // Check for errors in preparing the statement
        if (!$stmt) {
            // If there's an error, return false
            return false;
        }
        
        // Bind parameters to the statement
        $stmt->bind_param("ss", $jabatan, $keterangan);
        
        // Execute the statement
        $result = $stmt->execute();
        
        // Close the statement
        $stmt->close();
        
        return $result;
    }
    
    // Read
    public function read() {
        $query = "SELECT * FROM tabeljabatan";
        $result = $this->db->conn->query($query);

        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    
    // Read by ID
    public function readById($id) {
        $query = "SELECT * FROM tabeljabatan WHERE id = ?";
        
        // Prepare the statement
        $stmt = $this->db->conn->prepare($query);
        
        // Bind parameter to the statement
        $stmt->bind_param("i", $id);
        
        // Execute the statement
        $stmt->execute();
        
        // Get result
        $result = $stmt->get_result();
        
        // Fetch associative array
        $row = $result->fetch_assoc();
        
        // Close the statement
        $stmt->close();
        
        return $row;
    }
    
    // Update
    public function update($id, $jabatan, $keterangan) {
        $query = "UPDATE tabeljabatan SET jabatan = ?, keterangan = ? WHERE id = ?";
        
        // Prepare the statement
        $stmt = $this->db->conn->prepare($query);
        
        // Bind parameters to the statement
        $stmt->bind_param("ssi", $jabatan, $keterangan, $id);
        
        // Execute the statement
        $result = $stmt->execute();
        
        // Close the statement
        $stmt->close();
        
        return $result;
    }
    
    // Delete
    public function delete($id) {
        $query = "DELETE FROM tabeljabatan WHERE id = ?";
        
        // Prepare the statement
        $stmt = $this->db->conn->prepare($query);
        
        // Bind parameter to the statement
        $stmt->bind_param("i", $id);
        
        // Execute the statement
        $result = $stmt->execute();
        
        // Close the statement
        $stmt->close();
        
        return $result;
    }
}
?>
