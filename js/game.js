//var creaIdh=0, creaImg='', creaLife=0, creaArm=0, creaArmDet='', creaSex=0, creaName='';
var lang='ee';
var curRow=0, curCol=0;
var  curLife=0, curPower=0;
var arrEnems = [];
arrEnems['wolf'] = 5;
arrEnems['witch'] = 10;
arrEnems['dragon'] = 20;

$(document).ready(function() {
	
	$('.sand').bind('click', stepControl);
	$('.water').bind('click', stepControl);
	$('.wood').bind('click', stepControl);
	$('.stone').bind('click', stepControl );	
	$('.grass').bind('click', stepControl );
	
	$('.wolf').bind('click', stepControl );
	$('.witch').bind('click', stepControl );
	$('.dragon').bind('click', stepControl );
	
	
		curLife=$('#curHealth').attr('width')/2;
		curPower=$('#curPower').attr('width')/2;
		
		
	$('.avatar').bind('click', stepControl );

	$('.kivi').click(function(event){event.preventDefault();});
	/**/
});


var stepControl=function(event){

if(curLife==0){
	var img=$('#gf' + curRow+'_'+ curCol).html();
	var pos=img.indexOf(".");
	var img=img.substr(0, pos)+"_0"+ img.substr(pos);
		
	$('#gf' + curRow+'_'+ curCol).html(img);
 alert('Sorry but this Hero is dead :(');
 return;
}

var id=$(this).attr('id');

var a=id.substr(2).split("_");
var row=eval(a[0]);
var col=eval(a[1]);

//alert(row + ' , '+col);

if(curRow==row && curCol==col){
 
 return;
}

if(Math.abs(row-curRow)>1 || Math.abs(col-curCol)>1){
 alert('Wrong step!');
 return;
}
var nextClass=$('#gf' + row+'_'+col).attr('class');
//alert(nextClass);

var curClass=$('#gf' + curRow+'_'+ curCol).attr('class');
//alert(curClass);

if(nextClass=='stone'){
 alert("Can't walk thru rock !");
 return;
}

var img=$('#gf' + curRow+'_'+ curCol).html();
$('#gf' + row+'_'+col).html(img);
$('#gf' + curRow+'_'+ curCol).html('');
curRow=row;
curCol=col;

	switch(nextClass){
		case 'sand': curLife-=1; break;
		case 'grass': curLife-=2; break;
		case 'wood': curLife-=3; break;
		case 'water': curLife-=4; break;
	}

	if(nextClass=='wolf' || nextClass=='witch' || nextClass=='dragon'){
		if(curPower>0){
				var selec=prompt("Use Arm ('OK') or NO('Cansel')", '');
				//alert(selec);
				if(selec != null){
						if(curPower>=arrEnems[nextClass]) {
								curPower-=arrEnems[nextClass];
								$('#gf' + curRow+'_'+ curCol).attr('class', 'sand');
								}
							else {
							curLife-=(arrEnems[nextClass]-curPower);
							curPower=0;
						}
						
				} else curLife-=arrEnems[nextClass];
			} else curLife-=arrEnems[nextClass];
	}
	
	$('#curHealth').attr('width', curLife*2);
	$('#curPower').attr('width', curPower*2);
	
	if(curLife<=0) {
		
		//alert(img);
		var pos=img.indexOf(".");
		var img=img.substr(0, pos)+"_0"+ img.substr(pos);
		
		$('#gf' + curRow+'_'+ curCol).html(img);
		alert('Game Over !');
			$.get('controller/saveHero.php', {'curLife':curLife, 'curPower':curPower}, function(data){
			
			alert('Data was saved');
			
		});	
		//window.location="?page=game&lang="+lang;
	}
	
	if(curRow==14 && curCol==14) {
		
		alert('Congratulation ! life: ' + curLife + ', power: '+ curPower);
			$.get('controller/saveHero.php', {'curLife':curLife, 'curPower':curPower}, function(data){
			
			alert('Data was saved');
			$('#menuMiddle').html('You WIN!!');
		});	
		//window.location="?page=game&lang="+lang;
	}
}
