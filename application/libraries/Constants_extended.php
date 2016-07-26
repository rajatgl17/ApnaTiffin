<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Constants_extended
{
    private $CI;
    public function __construct()
    {
        $this->CI = & get_instance();
        $this->setConstants();
    }
    
    private function setConstants()
    {
        $query = $this->CI->db->get('mst_constants');
        foreach($query->result() as $row)
        {
            define((string)$row->name, $row->value);
        }
        return ;
    }
}