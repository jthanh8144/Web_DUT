<?php
    class Entity_SinhVien {
        public $IDSV;
        public $TenSV;
        public $GioiTinh;
        public $IDK;

        public function __construct($_IDSV, $_TenSV, $_GioiTinh, $_IDK)
        {
            $this->IDSV = $_IDSV;
            $this->TenSV = $_TenSV;
            $this->GioiTinh = $_GioiTinh;
            $this->IDK = $_IDK;
        }
    }
?>