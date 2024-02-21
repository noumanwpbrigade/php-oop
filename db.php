<?php
class database{
	private $host;
	private $dbusername;
	private $dbpassword;
	private $dbname;
	
	protected function connect(){
		$this->host='localhost';
		$this->dbusername='root';
		$this->dbpassword='';
		$this->dbname='oop_curd';
		$con=new mysqli($this->host,$this->dbusername,$this->dbpassword,$this->dbname);
		return $con;
	}
}

// Query class (select, insert, delete, update)
class query extends database{
	public function getData($table,$field='*',$condition_arr='',$order_by_field='',$order_by_type='desc',$limit=''){
		$sql="select $field from $table ";
		if($condition_arr!=''){
			$sql.=' where ';
			$c=count($condition_arr);	
			$i=1;
			foreach($condition_arr as $key=>$val){
				if($i==$c){
					$sql.="$key='$val'";
				}else{
					$sql.="$key='$val' and ";
				}
				$i++; // to add "and " in sql 
			}
		}
		if($order_by_field!=''){
			$sql.=" order by $order_by_field $order_by_type ";
		}
		
		if($limit!=''){
			$sql.=" limit $limit ";
		}
		//die($sql);
		$result=$this->connect()->query($sql);
		if($result->num_rows>0){
			echo "data founded";
            $resultt = mysqli_fetch_assoc($result);
            echo "<pre>";
            print_r($resultt);
		}else{
			echo "no data founded";
		}
	}

}








?>


<h2>hello developer</h2>