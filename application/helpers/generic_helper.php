<?php 

	
	function email_exists($email)
	{
		$obj = &get_instance();
		$obj->load->model('Admin_model');

		$data2 = $obj->Exame_model->getUserByEmail($email); 
		if($data2 != null){
			return true;
		}
		return false;
	}

	function getActivityName($id)
	{
		$obj = &get_instance();
		$obj->load->model('Activity_model');

		$data1 = $obj->Activity_model->get($id); 
		return $data1["activity_name"];
	}

	function getStakeholderName($id)
	{
		$obj = &get_instance();
		$obj->load->model('Stakeholder_model');

		$data1 = $obj->Stakeholder_model->get($id); 
		return $data1["name"];
	}

	function array_sort($array, $on, $order=SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
            break;
            case SORT_DESC:
                arsort($sortable_array);
            break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}
		
			


?>