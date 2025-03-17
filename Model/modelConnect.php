<?php 
    class modelConnect{
        public function mOpenConnect() {
            $host = 'localhost';
            $username = 'sushi_project';
            $password = 'ngocbich2004';
            $db = 'sushi_project';

            return mysqli_connect($host, $username, $password, $db);
        }

        public function mClose($conn) {
            $conn->close();
        }
    }
?>