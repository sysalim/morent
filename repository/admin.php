<?php
require_once __DIR__ . "/kenoksi.php";
class admin
{
  // class ini akan berisi berbagai perintah yang akan dikirim ke perintah yang akan memanggil semua yang di perlukan di alaman dashbord
  public $connection;
  function __construct()
  {
    $database = new Database;
    $this->connection = $database->getConnection();
  }

  public function getByStatistict($type_id): int
  {
    $sql = "SELECT * FROM ordercar JOIN products ON product_id = products.id WHERE products.type_id = ?;";
    $stmt = $this->connection->prepare($sql);
    $stmt->bindParam(1, $type_id);
    $stmt->execute();
    return count($stmt->fetchAll(PDO::FETCH_ASSOC));
  }

  public function getByTimeUpdate(): array
  {
    $sql = "SELECT waktu_order, products.name, gambar.gambar_1, products.harga, products.name FROM ordercar JOIN products ON product_id = products.id JOIN gambar ON products.gambar_id = gambar.id JOIN type ON products.type_id = type.id ORDER BY waktu_order DESC LIMIT 7";
    $stmt = $this->connection->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
