<?php
require_once('DAL.class.php');


class customers extends DAL{
    public function getCustomers(){
        $sql="SELECT * from `customers`";
        return $this->getdata($sql);
    }
    public function getCustomersorders($id){
        $sql="SELECT * from `orders` where customers_id=$id";
        return $this->getdata($sql);

    }
    public function getorders(){
        $sql="SELECT * from `orders`,`customers` where orders.customers_id=customers.customers_id";
        return $this->getdata($sql);
    }
    public function getCustomersordersitems($id){
        $sql="SELECT * from `orders_details`,`products_img` where orders_details.products_id=products_img.products_id and orders_id=$id group by products_img.products_id";
        return $this->getdata($sql);

    }
}?>