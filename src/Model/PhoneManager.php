<?php


namespace Module2\Model;


class PhoneManager
{
    protected $databasePhone;

    public function __construct()
    {
        $this->databasePhone = new DatabaseConnect();
    }

    function getAllProduct()
    {
        $sql = "SELECT * FROM tbl_phone";
        $statement = $this->databasePhone->connectDB()->query($sql);
        $data = $statement->fetchAll();
        $arr = [];
        foreach ($data as $key => $item) {
            $phone = new Phone($item['name'], $item['price'], $item['color']);
            $phone->setId($item['id']);
            array_push($arr, $phone);
        }
        return $arr;
    }

    function addProduct($phone)
    {
        $sql = "INSERT INTO `tbl_phone`(`id`, `name`, `price`, `color`) VALUES (:id,:name,:price,:color)";
        $statement = $this->databasePhone->connectDB()->prepare($sql);
        $statement->bindParam(':id', $phone->getId());
        $statement->bindParam(':name', $phone->getName());
        $statement->bindParam(':price', $phone->getPrice());
        $statement->bindParam(':color', $phone->getColor());
        $statement->execute();
    }

    function delete($id)
    {
        $sql = "DELETE FROM `tbl_phone` WHERE `id`= :id";
        $statement = $this->databasePhone->connectDB()->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
    }

    function getProductId($id)
    {
        $sql = "SELECT `id`, `name`, `price`, `color` FROM `tbl_phone` WHERE `id`= :id";
        $statement = $this->databasePhone->connectDB()->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $item = $statement->fetch();
        return $item;
    }

    function updateProduct($phone)
    {
        $sql = "UPDATE `tbl_phone` SET `id`=:id,`name`=:name,`price`=:price,`color`=:color WHERE `id`= :id";
        $statement = $this->databasePhone->connectDB()->prepare($sql);
        $statement->bindParam(':id', $phone->getId());
        $statement->bindParam(':name', $phone->getName());
        $statement->bindParam(':price', $phone->getPrice());
        $statement->bindParam(':color', $phone->getPrice());
        $statement->execute();
    }

    function searchProduct($keyword)
    {
        $sql = "SELECT * FROM tbl_phone WHERE name LIKE :keyword ";
        $statement = $this->databasePhone->connectDB()->prepare($sql);
        $statement->bindValue(':keyword', '%' . $keyword . '%');
        $statement->execute();
        $data = $statement->fetchAll();
        $arr = [];
        foreach ($data as $key => $item) {
            $phone = new Phone($item['name'], $item['price'], $item['color']);
            $phone->setId($item['id']);
            array_push($arr, $phone);
        }
        return $arr;
    }


}