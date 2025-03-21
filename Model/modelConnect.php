<?php 
    class modelConnect{
        public function mOpenConnect() {
            $host = '';
            $username = '';
            $password = '';
            $db = '';

            return mysqli_connect($host, $username, $password, $db);
        }

        public function mClose($conn) {
            $conn->close();
        }
    }
?>