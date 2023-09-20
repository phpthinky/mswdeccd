<?php 

/**
  * 
  */
 class Students_model extends CI_model
 {
  
  function __construct()
  {
    // code...
    parent::__construct();
  }

  public function countAll($centerId=false)
  {
    // code...
    $this->db->select('*');
    $this->db->from('epupils');
    if (!empty($centerId)) {
      // code...
    
    $this->db->where('centerId',$centerId);
    }
    $query = $this->db->get();
    return $query->num_rows();
    }

  public function listAll($centerId=false)
  {
    // code...
    $this->db->select('*');
    $this->db->from('epupils');
    if (!empty($centerId)) {
      // code...
    
    $this->db->where('centerId',$centerId);
    }
    $query = $this->db->get();
    return $query->result();
    }

  
    public function listAllnotenroll($YearId,$workersId)
  {
    // code...
    if($data = $this->listbyclassess($YearId,$workersId)){
      $ids = array();
      //var_dump($data);
        foreach ($data as $key => $value) {
          // code...
          array_push($ids, $value->id);
        }
    } 
    $data3 = array(); 
    if (!empty($ids)) {
      // code...

    if($data2 = $this->listAll()){
      foreach ($data2 as $a => $b) {
        // code...
        if (!in_array($b->pupilsId,$ids)) {
          // code...
          $data3[] = $b;
        }

      }

    }
    }
    return $data3;
    
  }

  
    public function listmystudents($YearId,$workersId)
  {
    // code...
    $this->db->select("c.pupilsId as id, CONCAT(c.fName,' ', c.mName,' ', c.lName,' ', c.ext) as studentName,address,gender,age,b.StudentType,birthDate");
    $this->db->from('eschoolyear_by_worker a');
    $this->db->join('eschoolyear_by_worker_students b','b.YearId = a.YearId','left');
    $this->db->join('epupils c','c.pupilsId = b.studentId','left');
    $this->db->order_by('studentName','asc');
    $this->db->group_by('pupilsId');
    $this->db->where('b.YearId',$YearId);
    $this->db->where('b.workersId',$workersId  );
    $query = $this->db->get();
    return $query->result();
  }
  
    public function listbyclassess($YearId,$workersId)
  {
    // code...
    $this->db->select("c.pupilsId as id, CONCAT(c.fName,' ', c.mName,' ', c.lName,' ', c.ext) as studentName,c.weight,c.height");
    $this->db->from('eschoolyear_by_worker a');
    $this->db->join('eschoolyear_by_worker_students b','b.YearId = a.YearId','left');
    $this->db->join('epupils c','c.pupilsId = b.studentId','left');
    $this->db->order_by('studentName','asc');
    $this->db->group_by('pupilsId');
    $this->db->where('b.YearId',$YearId);
    $this->db->where('b.workersId',$workersId  );
    $query = $this->db->get();
    return $query->result();
  }

    public function listbyclassess2($YearId,$workersId)
  {
    // code...
    $this->db->select("pupilsId as id, CONCAT(a.fName,' ', a.mName,' ', a.lName,' ', a.ext) as studentName,weight,height");
    $this->db->from('epupils a');
    $this->db->join('eschoolyear_by_worker_students b','b.studentId = a.pupilsId','left');
    $this->db->order_by('studentName','asc');
    $this->db->where('b.YearId',$YearId);
    $this->db->where('b.workersId',$workersId  );
    $query = $this->db->get();
    return $query->result();
  }

  public function save($data)
  {
    // code...
    if (!empty($data->id)) {
      // code...
      return $this->update($data);
    }else{
      return $this->add($data);
    }
  }

  public function add($data)
  {
    // code...
    $this->db->insert('epupils',$data);
    return $this->db->insert_id();

    
  }
  public function if_nameexist($data){
    $this->db
        ->select('*')
        ->where('fName',$data->fName)
        ->where('mName',$data->mName)
        ->where('lName',$data->lName);
        $query = $this->db->get('epupils');
        $result = $query->result();
        return $result;


  }

  
 } ?>