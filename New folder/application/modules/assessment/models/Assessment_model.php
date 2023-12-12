<?php 

/**
  * 
  */
 class Assessment_model extends CI_Model
 {
 	
  public function save($data='',$id=0,$position=false)
  {
    // code...
    if ($id > 0) {
      // code...
      return $this->update($data);
    }

    if ($position === true) {
      // code...
      return $this->update_position($data);
    }
      return $this->add($data);
  }
  private function add($data)
  {
    // code...
    if ($this->check($data)) {
      // code...
      return array('status'=>false,'msg'=>'Already exist!');

    }
    try {
    // return $this->db->add($data); 
      $this->db->trans_start(false);
      $this->db->insert('ass_domain_question',$data);
      $this->db->trans_complete();
      $errors = $this->db->error()['message'];
      if (!empty($errors)) {
        // code...
        return array('status'=>false,'msg'=>$errors);
        
      }
        return array('status'=>true,'msg'=>'Successfully added.');

    } catch (Exception $e) {
      log_message('error: '.$e->getMessage(),1);

      return;
    }

  }
  public function remove_student_score($data)
  {
    // code...
    $this->db->trans_start();
      $this->db->where('student_id',$data['student_id']);
      $this->db->where('domain',$data['domain']);
      $result = $this->db->delete('assessment');
    $this->db->trans_complete();
    if ($result) {
      // code...
      return array('status'=>true,'msg'=>'Successfully deleted.');
    }
      return array('status'=>false,'msg'=>'No data wa deleted.');
  }
  private function check($data)
  {
    // code...
    return $this->db->get_where('ass_domain_question',$data)->row(0);
  }

  public function list($cat='')
  {
    // code...
    if (empty($cat)) {
      // code...
      return false;
    }

    return $this->db->order_by('step','ASC')->get_where('ass_domain_question',array('domain'=>$cat))->result();

  }
  private function update_position($data)
  {
    // code...
    $i=1;
      $this->db->trans_start(false);

    foreach ($data as $key => $value) {
      // code...
      $this->db->set('step',$i++);
      $this->db->where('domain','gross_motor');
      $this->db->where('id',$value);
      $this->db->update('ass_domain_question');
    }
      $this->db->trans_complete();
      return $this->db->error()['message'];

  }
  public function remove($id)
  {
    // code...
    $this->db->delete('ass_domain_question',array('id'=>$id));
    return;
  }

  public function save_score($data)
  {
    // code...
    if ($row = $this->db->get_where('assessment',array('domain'=>$data->domain,'student_id'=>$data->student_id,'type'=>$data->type))->row(0)) {
      // code...
     // $this->db->set($domain,$score);
      $this->db->where('id',$row->id);
      $this->db->update('assessment',$data);
      return $row->id;
    }
    $this->db->insert('assessment',$data);
    return $this->db->insert_id();
  }


  public function save_score_array($domain='',$score=0,$type=0,$student_id=0,$date_assessment=null)
  {
    // code...
    if ($row = $this->db->get_where('ass_raw_score',array('student_id'=>$student_id,'type'=>$type))->row(0)) {
      // code...
     // $this->db->set($domain,$score);
      $this->db->where('student_id',$student_id);
      $this->db->where('type',$type);
      $this->db->update('ass_raw_score',array($domain=>$score,'date_assessment'=>$date_assessment));
      return $row->id;
    }
    $this->db->insert('ass_raw_score',array($domain=>$score,'type'=>$type,'student_id'=>$student_id,'date_assessment'=>$date_assessment));
    return $this->db->insert_id();
  }

  public function save_score_sum($raw_score_id=0,$domain='',$score=0)
  {
    // code...
    if ($row = $this->db->get_where('ass_raw_score_sum',array('raw_score_id'=>$raw_score_id))->row(0)) {
      // code...
      $this->db->where('raw_score_id',$raw_score_id);
      $this->db->update('ass_raw_score_sum',array($domain=>$score));
      return $row->id;
    }
    $this->db->insert('ass_raw_score_sum',array($domain=>$score,'raw_score_id'=>$raw_score_id));
    return $this->db->insert_id();
  }
  public function save_scaled_score($raw_score_id=0,$domain='',$score=0)
  {
    // code...
    if ($row = $this->db->get_where('ass_scaled_score',array('raw_score_id'=>$raw_score_id))->row(0)) {
      // code...
     // $this->db->set($domain,$score);
      $this->db->where('raw_score_id',$raw_score_id);
      $this->db->update('ass_scaled_score',array($domain=>$score));
      return $row->id;
    }
    $this->db->insert('ass_scaled_score',array($domain=>$score,'raw_score_id'=>$raw_score_id));
    return $this->db->insert_id();
  }

  public function get_checked($student_id=0,$type=0)
  {
    // code...

    return $this->db->get_where('assessment',array('type'=>$type,'student_id'=>$student_id))->result();
    
    if (!empty($result)) {
      // code...
      return $result->answer;
    }
    return null;
  }

  public function get_sum_scaled_score($worker_id=0,$year_id=0,$type=0)
  {
    // code...
    return $this->db->get_where('v_sum_scaled_score',array('worker_id'=>$worker_id,'year_id'=>$year_id,'type'=>$type))->result();
  }
public function get_raw_score($student_id=0,$domain = null)
  {
    // code...
    if (!empty($domain)) {
      // code...
    $sql = sprintf('SELECT * FROM v_raw_score where student_id = %u and domain =  "%s"',$student_id,$domain);
    $query = $this->db->query($sql);
    return $query->result();

    }else{

    $sql = sprintf('SELECT * FROM v_raw_score where student_id = %u',$student_id);
    $query = $this->db->query($sql);
    return $query->result();
 
    }
  }

public function get_date_assessment($student_id,$type)
  {
    // code...
  $sql = sprintf('SELECT date_assessment FROM assessment where student_id = %u and type = %u',$student_id,$type);
    $query = $this->db->query($sql);
    return $query->row(0);
  }

 } 


?>