<?php
/**
 *
 */
class Post
{

  protected $pdo;

  public function __construct($pdo) {
      $this->pdo = $pdo;
  }

  public function create($table, array $fields) {
          $columns = implode(', ', array_keys($fields));
          $values = ':' . implode(', :', array_keys($fields));
          $query = "INSERT INTO {$table} ({$columns}) VALUES ($values);";
          //echo $query; --> success

          if ($stmt = $this->pdo->prepare($query)) {
              foreach ($fields as $keys => $data) {
                  $stmt->bindValue(':' . $keys, $data);
              }
              return $stmt->execute();

          } else {
              return false;
          }
      }
      //Update dynamic
      public function updateStudent($table, $id, $name, $roll_no, $email, $phone_no){
        $query = "UPDATE $table SET name=:name,roll_no= :roll_no,email = :email, phone_no = :phone_no WHERE id=$id";
        //echo $query; --> success
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array(':name'=>$name,':roll_no'=>$roll_no,':email'=>$email,':phone_no'=>$phone_no));
        return $stmt->rowCount();
      }
       //Update password
       public function updatePassword($table, $name, $nameAtt, $password){
        $query = "UPDATE $table SET password= :password WHERE $nameAtt= :name";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array(':password' =>$password ,':name'=>$name ));
        return $stmt->rowCount();
    }
        //Update phone count
        public function updatePhoneCount($table, $nameAtt, $name_id, $phone_count){
            $query = "UPDATE $table SET phone_count = :phone_count WHERE $nameAtt = :name_id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(':phone_count'=>$phone_count,':name_id'=>$name_id));
            return $stmt->rowCount();
        }
        // Update hod tch
        public function updateHODTeacher($id, $name, $email, $password){
            $query = "UPDATE teacher SET name = :name,email=:email,password=:password WHERE id=$id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(':name'=>$name,':email'=>$email,':password'=>$password));
            return $stmt->rowCount();
        }

      public function selectPost($class){
        // $stmt = $this->pdo->prepare("SELECT * FROM post WHERE destination LIKE ?");
        // $stmt->bindParam(1, "%$class%", PDO::PARAM_STR);
        // var_dump($stmt->execute());
        $query = "SELECT * FROM post WHERE destination LIKE ? ORDER BY id DESC";
        $params = array("%$class%");
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);


        return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }

      //Get family Teacher
      public function selectFamily( $family_id){
          $query = "SELECT class_name FROM class WHERE id= :class_id";
          $stmt = $this->pdo->prepare($query);
          $stmt ->execute(array(':class_id'=>$family_id));
          return $stmt->fetchAll(PDO::FETCH_COLUMN);
      }

    //   Get classes by major
    public function selectClassByMajor($department_id){
        $query = "SELECT * FROM class WHERE department_id=2";
        $stmt = $this->pdo->prepare($query);
        $stmt ->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Get all names for principle
    public function selectClassesByPrinciple(){
        $query = "SELECT id FROM class";
        $stmt = $this->pdo->prepare($query);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

      //Get class name for teacher manage
      public function selectClass($class_id){
          $query = "SELECT class_name FROM class WHERE id=:id";
          $stmt = $this->pdo->prepare($query);
          $stmt -> execute(array(':id'=>$class_id));
          return $stmt->fetchAll(PDO::FETCH_COLUMN);
      }

      public function selectTeachClass($teacher_id,$family_id){
        $query = "SELECT c.class_name,c.id FROM teach AS t, class AS c WHERE t.teacher_id = :teacher_id AND t.class_id != :family_id AND t.class_id = c.id";
          $stmt = $this->pdo->prepare($query);
          $stmt -> execute(array(':teacher_id'=>$teacher_id,':family_id'=>$family_id));
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
        //Get user's own posts
      public function ownPost($postBy, $status){
        $query = "SELECT * FROM post WHERE posted_by = :postBy AND status = :status ORDER BY created_date LIMIT 5";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array(':postBy' =>$postBy ,':status'=>$status ));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
        //Get user's own posts
        public function ownPosts($postBy, $status){
            $query = "SELECT * FROM post WHERE posted_by = :postBy AND status = :status";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(':postBy' =>$postBy ,':status'=>$status ));
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
          }

      //Get post for student
      public function selectPostsForStudent($class_id){
        $query = "SELECT * FROM post WHERE seen_by LIKE :class_id ORDER BY created_date DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array(':class_id' =>"%$class_id%"));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
      public function selectPostsForStudentId($id){
        $query = "SELECT * FROM post WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(array(':id' =>$id));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
    //Check phone No to Student
      public function confirmPhoneByStudent($table,$name){
          $query = "SELECT * FROM $table WHERE roll_no = :roll";
          $stmt = $this->pdo->prepare($query);
          $stmt -> bindParam(':roll', $name, PDO::PARAM_STR);
          $stmt -> execute();
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }

       //Check phone No to Teacher
       public function confirmPhoneByTeacher($table,$name){
        $query = "SELECT * FROM $table WHERE email = :email";
        $stmt = $this->pdo->prepare($query);
        $stmt -> bindParam(':email', $name, PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

      //Check the login user
      public function loginProcess($table, $nameAtt, $name, $password) {
        $query = "SELECT * FROM $table WHERE $nameAtt = :name AND password = :password";


          $stmt = $this->pdo->prepare($query);
          $stmt->bindParam(':name', $name, PDO::PARAM_STR);
          $stmt->bindParam(':password', $password, PDO::PARAM_STR);
          $stmt->execute();
          return $stmt->rowCount();
      }
      public function selectAll($table){
          $query = "SELECT * FROM $table ";
          $stmt = $this->pdo->prepare($query);
          $stmt->execute();
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
      //Get the login user info detail
      public function selectUser($table, $nameAtt, $name, $password){
        $query = "SELECT * FROM $table WHERE $nameAtt = :name AND password = :password";
          $stmt = $this->pdo->prepare($query);
          $stmt->bindParam(':name', $name, PDO::PARAM_STR);
          $stmt->bindParam(':password', $password, PDO::PARAM_STR);
          $stmt->execute();
          return $stmt->fetchAll(PDO::FETCH_ASSOC);
      }

      //Get posted-person's detail
       public function selectUserById($table ,$id)
      {
          # code...
          $query = "SELECT * FROM $table WHERE id = :id";
          $stmt = $this->pdo->prepare($query);
          $stmt->bindParam(':id', $id, PDO::PARAM_STR);
          $stmt->execute();
          return $stmt->fetchAll(PDO::FETCH_ASSOC);

      }

        //Get major name
        public function selectMajor($nameAtt, $name){
            $query = "SELECT * FROM department WHERE $nameAtt = :name";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(':name' =>$name));
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //Get all teacher by Department 
        public function selectTeacherByDepartment($id, $department_id){
            $query = "SELECT * FROM teacher WHERE id != :id AND department_id = :department_id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(':id'=>$id, ':department_id'=>$department_id));
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        //Get Student Detail
        public function selectStudentByFamilyTeacher($table,$class_id){
            $query = "SELECT * FROM $table WHERE class_id = :class";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(':class'=>$class_id));
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Get student Detail
        public function selectStudentByCoordinator($table,$roll_no){
            $query = "SELECT * FROM $table WHERE roll_no LIKE :roll_no";
            $stmt = $this->pdo->prepare($query);
            $stmt -> execute(array(':roll_no'=>"$roll_no%"));
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        //Get HOD teachers
        public function selectHOD(){
            $query="SELECT t.id,t.name,t.email,d.name as department,t.department_id FROM teacher AS t,department AS d WHERE t.position LIKE '%hod%' AND t.department_id=d.id";
            $stmt=$this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        //Get sub-classes
        public function selectClasses($id){
            $query = "SELECT class_name FROM class WHERE coordinator_id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(':id'=>"$id"));
            return $stmt->fetchAll(PDO::FETCH_COLUMN);
        }

        //Get sub-classes
        public function selectClassesID($id){
            $query = "SELECT id FROM class WHERE coordinator_id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(':id'=>"$id"));
            return $stmt->fetchAll(PDO::FETCH_COLUMN);
        }

        //Update Phone no
        public function updatePhone($table,$name,$nameAtt,$password,$phone){
            $query = "UPDATE $table SET phone_no= :phone_no, status = 1 WHERE $nameAtt= :name AND password = :password";
            echo $phone.'<br>';
            echo $name.'<br>';
            echo $password.'<br>';
            echo $query;
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(array(':phone_no' =>$phone ,':name'=>$name, ':password' => $password));
            return $stmt->rowCount();
        }

         //Up
    
    /*selctClassName*/
    public function selectClassName($id){
      $query="select class_name from class where id= :id";
      $stmt=$this->pdo->prepare($query);
      $stmt->bindParam(':id',$id,PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public function selectCount($id){
      $query="select * from teach where teacher_id= :id";
      $stmt=$this->pdo->prepare($query);
      $stmt->bindParam(':id',$id,PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->rowCount();
  }
  public function selectClassId($class){
      $query="select * from class where class_name= :class";
      $stmt=$this->pdo->prepare($query);
      $stmt->bindParam(':class',$class,PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->rowCount();

  }
  public function selectCodeId($code){
      $query="select * from subject where subject_code= :code";
      $stmt=$this->pdo->prepare($query);
      $stmt->bindParam(':code',$code,PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->rowCount();

  }
  //selectTeacherById
  public function selectTeacherById($id){
    $query="select *,t1.id as teach_id from teacher as t,teach as t1,class as c,subject as s where t.id= :id and t.id=t1.teacher_id and t1.class_id=c.id and t1.subject_id=s.id";
    $stmt=$this->pdo->prepare($query);
    $stmt->bindParam(':id',$id,PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
  public function updateClass($id,$class,$class_id_org,$teach_id){
      $query="update teach as t set t.class_id=(select c.id from class as c where c.class_name='$class') where t.teacher_id= :tch_id and t.id= :teach_id";
      $stmt=$this->pdo->prepare($query);
      $stmt->execute(array(':tch_id'=>$id,':teach_id'=>$teach_id));
      return $stmt->rowCount();
  }
  public function updateCode($id,$code,$subject_id_org,$teach_id){
      $query="update teach as t set t.subject_id=(select s.id from subject as s where s.subject_code='$code') where t.teacher_id= :tch_id and t.id= :teach_id";
      $stmt=$this->pdo->prepare($query);
      $stmt->execute(array(':tch_id'=>$id,':teach_id'=>$teach_id));
      return $stmt->rowCount();
  }
  public function updateDepTeacher($id,$name,$position,$email,$phone_no,$family_for,$coordinator){
      $query="update teacher as t set t.name= :name,t.position= :position,t.email= :email,t.phone_no= :phone_no,t.coordinator= :coordinator,t.family_teacher=(select c.id from class as c where c.class_name='$family_for') where id= :id";
      $stmt=$this->pdo->prepare($query);
      $stmt->execute(array(':name'=>$name,':position'=>$position,':email'=>$email,':phone_no'=>$phone_no,':coordinator'=>$coordinator,':id'=>$id));
      return $stmt->rowCount();
  }
  public function selectCodes($id){
      $query="select * from subject where department_id= :id";
      $stmt=$this->pdo->prepare($query);
      $stmt->bindParam(':id',$id,PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  /*public function selectClasses($id){
      $query="select * from class where department_id= :dep_id";
      $stmt=$this->pdo->prepare($query);
      $stmt->bindParam(':dep_id',$id,PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }*/
  public function selectClassesFor($dep_id){
      $query="select * from class where department_id= :dep_id";
      $stmt=$this->pdo->prepare($query);
      $stmt->bindParam(':dep_id',$dep_id,PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public function insertNewTeach($id,$subject_id,$class_id){
      $query="insert into teach (teacher_id,subject_id,class_id) values (:id,:subject_id,:class_id)";
      $stmt=$this->pdo->prepare($query);
      $stmt->execute(array(':id'=>$id,':subject_id'=>$subject_id,':class_id'=>$class_id));
      return $stmt->rowCount();

  }
  public function deleteTeach($id){
      $query="delete from teach where id= :teach_id";
      $stmt=$this->pdo->prepare($query);
      $stmt->bindParam(':teach_id',$id,PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->rowCount();
  }

    public function deletAdmin($id){
        $query="delete from tbl_admin where id= :admin_id";
        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':admin_id',$id,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
    }


    public function deleteTeachWithTchId($id){
        $query="delete from teach where teacher_id= :teach_id";
        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':teach_id',$id,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function deleteDepTch($id){
        $query="delete from teacher where id= :tid";
        $stmt=$this->pdo->prepare($query);
        $stmt->bindParam(':tid',$id,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->rowCount();
    }
  public function selectTeacherByIdForNew($id){
      $query="select * from teacher where id= :id";
      $stmt=$this->pdo->prepare($query);
      $stmt->bindParam(':id',$id,PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
    function doPages($page_size, $thepage, $query_string, $total=0, $keyword) {
        $index_limit = 10;
        $query='';

        if(strlen($query_string)>0){
            $query = "&amp;".$query_string;
        }
        $current = $this->get_current_page();

        $total_pages=ceil($total/$page_size);
        $start=max($current-intval($index_limit/2), 1);
        $end=$start+$index_limit-1;

        echo '<div id="page_num">';
        echo '<ul class="pagination">';

        if($current==1) {
            echo '';
        } else {
            $i = $current-1;
            echo '<li><a href="'.$thepage.'?page='.$i.$query.'&keyword='.$keyword.'" rel="nofollow" title="go to page '.$i.'"><i class="mdi-navigation-chevron-left"></i></a></li>';
        }
        if($start > 1) {
            $i = 1;
            echo '<li><a href="'.$thepage.'?page='.$i.$query.'&keyword='.$keyword.'" title="go to page '.$i.'">'.$i.'</a></li>';
        }

        for ($i = $start; $i <= $end && $i <= $total_pages; $i++){
            if($i==$current) {
                echo '<li class="active"><a>'.$i.'</a></li>';
            } else {
                echo '<li><a href="'.$thepage.'?page='.$i.$query.'&keyword='.$keyword.'" title="go to page '.$i.'">'.$i.'</a></li>';
            }
        }

        if($total_pages > $end){
            $i = $total_pages;
            echo '<li><a href="'.$thepage.'?page='.$i.$query.'&keyword='.$keyword.'" title="go to page '.$i.'">'.$i.'</a></li>';
        }

        if($current < $total_pages) {
            $i = $current+1;
            echo '<li><a href="'.$thepage.'?page='.$i.$query.'&keyword='.$keyword.'" rel="nofollow" title="go to page '.$i.'"><i class="mdi-navigation-chevron-right"></i></a></li>';
        } else {
            echo '';
        }
        echo '</ul>';
        if ($total != 0){
            echo '<br></div>';
        }else {
            echo '</div>';
        };
    }
    function get_current_page() {
        if(($var=$this->check_integer('page'))) {
            return $var;
        } else {
            return 1;
        }
    }
    function check_integer($which) {
        if(isset($_GET[$which])){
            if (intval($_GET[$which])>0) {
                return intval($_GET[$which]);
            } else {
                return false;
            }
        }
        return false;
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = addslashes(strip_tags($data));
        return $data;
    }


}

 ?>
