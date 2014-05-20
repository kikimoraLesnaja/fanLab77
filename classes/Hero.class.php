<?
class Hero{

var $idh;
var $idp;
var $name;
var $health;
var $avatar;	// Avatar img
var $ida; 		// Arm number
var $power; 	// Arm rest power

var $atributes; //Array of objects
var $field;
var $row;
var $col;// Hero's position - row & column
var $errorString;

function __construct($idp, $row=0, $col=0){		
		$this->idp=$idp;
		
		$this->errorString='';
		if(abs($_SESSION['srow']- $row)>1 || abs($_SESSION['scol']- $col)>1){
			$this->row= $_SESSION['srow'];
			$this->col= $_SESSION['scol'];
			$this->errorString='Wrong step';
		}
		else {
			$this->row=$row;
			$this->col=$col;
		}
		//echo "from hero constr $row, $col";
		$this->makeField();
	
}	

function makeField(){
global $db, $lang;
$sel="SELECT idh, name, health,  avatar, ida,  field, power  FROM ".DB_PREFIX."persons WHERE idp=".$this->idp;

$db->query($sel);
$res=$db->assoc_array();
$this->name=$res[0]['name'];
$this->avatar=$res[0]['avatar'];

$this->ida=$res[0]['ida'];
$this->idh=$res[0]['idh'];
$this->health=$res[0]['health'];
$this->power=$res[0]['power'];
//$this->row=0;
//$this->col=0;

$fieldStr=$res[0]['field'];

//echo "name : *".$this->name ;
//echo "fieldStr $fieldStr ";

$a=unserialArray($fieldStr);

$this->field='';
$fi=array('sand', 'grass', 'wood', 'water', 'stone');
$fi[1001]='wolf';
$fi[1002]='witch';
$fi[1003]='dragon';
$arrEnems['wolf']=5;
$arrEnems['witch']=10;
$arrEnems['dragon']=20;


$z=$a[$this->row][$this->col];
		
				$c=$fi[$z];
		
	
	if($c=='stone'){				
					$this->row= $_SESSION['srow'];
					$this->col= $_SESSION['scol'];
					$this->errorString.="Can't walk thru rock !";
				}	
					else{
							$_SESSION['srow']=$this->row;
							$_SESSION['scol']=$this->col;
							switch($c){
							  case 'sand':$this->health-=1; break;
							  case 'grass':$this->health-=2; break;
							  case 'wood':$this->health-=3; break;
							  case 'water':$this->health-=4; break;
							}
							
					if($c=='wolf' || $c=='witch' || $c=='dragon'){
								if($this->power>0){
									//$this->errorString.=" Use Arm ('OK') or NO('Cansel')";
									//alert(selec);
									//if(selec != null){
											if($this->power>=$arrEnems[$c]) {
													$this->power-=$arrEnems[$c];
													$a[$this->row][$this->col]=0;
													}
												else {
												$this->health-=($arrEnems[$c]- $this->power);
												$this->power=0;
											}
											
									//} else $this->health-=$arrEnems[$c];
								} else $this->health-=$arrEnems[$c];
								/**/
						}
							$newField=serialArray($a);
				$sel="UPDATE ".DB_PREFIX."persons SET health=".$this->health.", power=". $this->power.", field='$newField'  WHERE idp=".$this->idp;

						$db->query($sel);
				}
				
			

for($i=0; $i<count($a); $i++){
	for($k=0; $k<count($a[0]); $k++){
			$z=$a[$i][$k];
			//if($z<1000){
				$c=$fi[$z];
				
				
				$d=new MyTag('div', 'gf'.$i.'_'.$k, '', $c);
				
				if($this->row==$i && $this->col==$k){
				//echo "** $i, $k; row- " . $this->row . ", col- " . $this->col;
					
						$img=new MyTag('img', 'gf'.$i.'_'.$k, '', 'avatar', '', $this->avatar);	

						$d->addContent($img->view);
				}
				else{
					$d->addContent("<a href='?page=game&lang=$lang&gindex=$i,$k' class='kivi'><img src='view/img/pusto.png' border=0></a>");
				}
				
					//echo $s;
				/*	}
					else{
					$d=new MyTag('img', 'gf'.$i.'_'.$k, '', 'avatar', '', $this->avatar);
					
					}*/
				$s=$d->getView(0);
				
				$this->field.=$s;
			}
		}

		if($this->hea <0){
			$this->errorString.="Game OVER :(";
			return;
		}
		
		if($this->row == (FIELD_ROW-1) && $this->col==(FIELD_COL-1)){
			$this->errorString.="You a WIN !!";
		}
	}
	


}


