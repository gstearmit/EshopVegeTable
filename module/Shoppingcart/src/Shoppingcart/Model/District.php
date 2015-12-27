<?php

namespace Shoppingcart\Model;

class District { //implements InputFilterAwareInterface

    public $ID;
    public $TenQuanHuyen;
    public $MaTinhThanh;
    public $XuatBan;
    public $ThuTu;
   

    function exchangeArray($data) {
        $this->ID = (isset($data['ID'])) ? $data['ID'] : null;
        $this->TenQuanHuyen = (isset($data['TenQuanHuyen'])) ? $data['TenQuanHuyen'] : null;
        $this->MaTinhThanh = (isset($data['MaTinhThanh'])) ? $data['MaTinhThanh'] : null;
        $this->XuatBan = (isset($data['XuatBan'])) ? $data['XuatBan'] : null;
        $this->ThuTu = (isset($data['ThuTu'])) ? $data['ThuTu'] : null;        
    }

}
