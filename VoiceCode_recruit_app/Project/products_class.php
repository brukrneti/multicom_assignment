<?php
    class Product {
        private $productID;
        private $name;
        private $code;
        private $description;
        private $price;
        private $dateAdded;

        public function User() {
        }

        public function ReturnID(){
            return $this->productID;
        }

        public function ReturnName(){
            return $this->name;
        }

        public function ReturnCode(){
            return $this->code;
        }

        public function ReturnDescription(){
            return $this->description;
        }

        public function ReturnPrice(){
            return $this->price;
        }

        public function ReturnDateAdded(){
            return $this->dateAdded;
        }

        public function SetData($idArg, $nameArg, $codeArg, $descriptionArg, $price, $dateAddedArg) {
            $this->productID = $idArg;
            $this->name = $nameArg;
            $this->code = $codeArg;
            $this->description = $descriptionArg;
            $this->price = $price;
            $this->dateAdded = $dateAddedArg;

        }
    }
?>