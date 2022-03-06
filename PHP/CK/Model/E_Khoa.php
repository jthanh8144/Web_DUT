<?php
    class Entity_Khoa {
        public $IDK;
        public $TenKhoa;

        public function __construct($_IDK, $_TenKhoa)
        {
            $this->IDK = $_IDK;
            $this->TenKhoa = $_TenKhoa;
        }
    }
?>