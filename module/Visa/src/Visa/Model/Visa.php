<?php

namespace Visa\Model;

class Visa {
    public $id;
    public $visa_type;
    public $text_visatype;
    public $is_emb;
    public $is_urgently;
    public $date_arrival;
    public $date_exit;
    public $arrival_time;
    public $flight_number;
    public $private_letter;
    public $fasttrack;
    public $pickup;
    public $purpose;
    public $arrival_port;
    public $location;
    public $text_location;
    public $text_express;
    public $promotion_discount;
    public $discount_value;
    public $discount_amount;
    public $promotion_code;
    public $express;
    public $service;
    public $email_discount;
    public $number_of;
    
    
   
 
    function exchangeArray($data) 
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->visa_type = (isset($data['visa_type'])) ? $data['visa_type'] : null;
        $this->text_visatype = (isset($data['text_visatype'])) ? $data['text_visatype'] : null;
        $this->is_emb = (isset($data['is_emb'])) ? $data['is_emb'] : null;
        $this->is_urgently = (isset($data['is_urgently'])) ? $data['is_urgently'] : null;
        $this->date_arrival = (isset($data['date_arrival'])) ? $data['date_arrival'] : null;
        $this->date_exit = (isset($data['date_exit'])) ?$data['date_exit'] : null;
        
        $this->arrival_time = (isset($data['arrival_time'])) ? $data['arrival_time'] : null;
        $this->flight_number = (isset($data['flight_number'])) ? $data['flight_number'] : null;
        $this->private_letter = (isset($data['private_letter'])) ? $data['private_letter'] : null;
        $this->fasttrack = (isset($data['fasttrack'])) ? $data['fasttrack'] : null;
        $this->pickup = (isset($data['pickup'])) ? $data['pickup'] : null;
        $this->purpose = (isset($data['purpose'])) ? $data['purpose'] : null;
        $this->arrival_port = (isset($data['arrival_port'])) ?$data['arrival_port'] : null;
        
        $this->location = (isset($data['location'])) ? $data['location'] : null;
        $this->text_location = (isset($data['text_location'])) ? $data['text_location'] : null;
        $this->text_express = (isset($data['text_express'])) ? $data['text_express'] : null;
        $this->promotion_discount = (isset($data['promotion_discount'])) ? $data['promotion_discount'] : null;
        $this->discount_value = (isset($data['discount_value'])) ? $data['discount_value'] : null;
        $this->discount_amount = (isset($data['discount_amount'])) ? $data['discount_amount'] : null;
        $this->promotion_code = (isset($data['promotion_code'])) ? $data['promotion_code'] : 0;
        $this->express = (isset($data['express'])) ? $data['express'] : null;
        $this->service = (isset($data['service'])) ?$data['service'] : null;
        
        $this->email_discount = (isset($data['email_discount'])) ? $data['email_discount'] : null;
        $this->number_of = (isset($data['number_of'])) ?$data['number_of'] : null;
    }

    public function getArrayCopy() {
        return get_object_vars($this);
    }

}
