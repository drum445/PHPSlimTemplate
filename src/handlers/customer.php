<?php

class CustomerHandler {
	public static function getAll($db) {
	    $sql = "SELECT * FROM customer;";
	    $stmt = $db->query($sql);
	    return $stmt->fetchAll();
	}
}
