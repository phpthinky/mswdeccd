<?php 

/**
  * 
  */
 class Weighing_model extends CI_Model
 {
 	function __construct()
 	{
 		// code...
 		parent::__construct();
 	}
  public function add($data)
  {
    // code...

 
    if($this->check($data->student_id,$data->date_weighing)){
      return array('status'=>false,'msg'=>'Already exist!');
    }else{
      if($this->db->insert('e_weighing',$data)){
      return array('status'=>true,'msg'=>'Successfully added.');

      }
      return array('status'=>false,'msg'=>'Something went wrong.');

    }

  }

  public function update($id,$data)
  {
    // code...
      $this->db->where('id',$id);
    if ($this->db->update('e_weighing',$data)) {
      // code...
      return array('status'=>true,'msg'=>'Successfully updated.');

    }else{
      return array('status'=>false,'msg'=>'Something went wrong.');

    }


  }
  public function check($student_id,$date,$type=0)
  {
    // code...
    if($is_type = $this->db->get_where('e_weighing',array('student_id'=>$student_id,'weighing_type'=>$type))->row(0)){

      return $is_type->id;
    }

   if($row =  $this->db->get_where('e_weighing',array('student_id'=>$student_id,'date_weighing'=>$date))->row(0)){

    return $row->id;
   }else{
    return false;
   }

  }

  public function get($id)
  {
    // code...
    $this->db->select('*');
    $this->db->from('e_weighing');
    $this->db->where('student_id',$id);
    $this->db->order_by('date_weighing','DESC');
    $query = $this->db->get();
    return $query->result();
  }

public function get_nutritions($data)
{
  // code...
  return $this->db->get_where('v_current_weighing',$data)->result();
}
public function remove($id)
{
  // code...
  $this->db->where('id',$id);
  $this->db->delete('e_weighing');
  return true;

}



















}