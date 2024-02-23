<?php

class dynamicchartmodel extends CI_model {

    public function fetch_year(){

        $this->db->select('year');
        $this->db->from('chart_data');
        $this->db->group_by('year','DESC');

        return $this->db->get();

    }

    public function fetch_chart_data($year)
    {
$this->db->where('year',$year);
$this->db->order_by('year','ASC');

return $this->db->get('chart_data');


    }
}


?>