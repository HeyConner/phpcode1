<?php
    class Contact
    {
        private $name;
        private $number;
        private $address;

        function __construct($name, $number, $address)
        {
            $this->name = $name;
            $this->number = $number;
            $this->address = $address;
        }

        function getname()
        {
            return $this->name;
        }
        function setName($person)
        {
            $this->name = $person;
        }
        function getNumber()
        {
            return $this->number;
        }
        function setNumber($phone_number)
        {
            $this->number= $phone_number;
        }
        function getAddress()
        {
            return $this->address;
        }
        function setAddress($home)
        {
            $this->address = $home;
        }

        function save()
        {
            array_push($_SESSION['contact_list'], $this);
        }
        static function getAll()
        {
            return $_SESSION['contact_list'];
        }
        static function deleteAll() {
          $_SESSION['contact_list'] = array();
        }
    }
?>
