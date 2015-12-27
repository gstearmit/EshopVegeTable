<?php

namespace Shoppingcart\Model;

class City { //implements InputFilterAwareInterface

    public $ID;
    public $TenTinhThanh;
    public $XuatBan;
    public $ThuTu;
   

    function exchangeArray($data) {
        $this->ID = (isset($data['ID'])) ? $data['ID'] : null;
        $this->TenTinhThanh = (isset($data['TenTinhThanh'])) ? $data['TenTinhThanh'] : null;
        $this->XuatBan = (isset($data['XuatBan'])) ? $data['XuatBan'] : null;
        $this->ThuTu = (isset($data['ThuTu'])) ? $data['ThuTu'] : null;        
    }

}
