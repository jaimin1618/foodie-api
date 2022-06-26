<?php

class DBConnect {
    private static string $db_host;
    private static string $db_user;
    private static string $db_pass;
    private static string $db_name;

    public static mysqli $conn;

    /**
     * @param array for database config
     * @return mysqli connection
     */
    public function __construct(array $db) {
        self::$db_host = $db['host'];
        self::$db_user = $db['user'];
        self::$db_pass = $db['password'];
        self::$db_name = $db['name'];

        self::$conn = new mysqli(
            self::$db_host,
            self::$db_user,
            self::$db_pass,
            self::$db_name
        );

        $this->check_connection();
        return self::$conn;
    }

    public function check_connection() {
        if (self::$conn->connect_errno) {
            $message = 'Database Connection Failed: ';
            $message .= self::$conn->connect_error;
            $message .= '[' . self::$conn->connect_errno . '];';
            exit($message);
        }
    }

    public function disconnect() {
        if (isset(self::$conn)) {
            self::$conn->close();
        }
    }
}
