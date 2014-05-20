var creaIdh=0, creaImg='', creaLife=0, creaArm=0, creaArmDet='', creaPower=0, creaSex=0, creaName='';
var lang='ee';

$(document).ready(function() {
	
	$('.heroType').bind('click', getHeroTy);
	$('.heroSex').bind('click', getHeroSe);
	$('#heroname').bind('keyup', getHeroNa);
	$('.heroImg').bind('click', getHeroImg );
	
	$('#herosave').bind('click', heroSave );
	$('#selHeroType').hide();
	
		$('#herosave').click(function(event){event.preventDefault();});
});


var getHeroTy=function(event){
//alert('heroParams=');
		var idh=0, sex=0;
		
		var sex=$(".heroSex:checked").val();	
		//alert("sex=" + sex);		
		
		idh= $(this).val();
		var s=$("#htlab"+idh).html();
		
		var a=s.split("(");
		var b=a[1].split(")");
		creaLife=eval(b[0]);
		//alert(creaLife);
		
		var img="<img src='view/img/rose.png' width="+ (creaLife * 2 ) + " height=24>";
		$("#heroLifeCurrent").html(img);
		
		creaIdh=0; creaImg=''; creaArm=0; creaArmDet=''; creaSex=0;	creaPower=0;		
	

	$('#heroImgCurrent').attr('src', 'view/img/heroes/0.png');
	$('#heroArmCurrent').attr('src', 'view/img/arms/0.png');
	
	$('#heroArmDetCurrent').html('');
	//alert("idh=" + idh);
showImages(idh, sex);
}

var getHeroSe=function(event){
//alert('heroParams=');
		var idh=0, sex=0;
		
		idh=$(".heroType:checked").val();	
	//alert("idc=" + idc);		
			if(idh==undefined  || idh==0) {
				alert("Hero' type don't selected");
				return;
				}
		
		sex= $(this).val();
	//	alert("sex=" + sex);				
//
showImages(idh, sex);
}

function showImages(idh, sex){
			creaIdh=idh;
			creaSex=sex;
			var s='', sa='';
			for(var i=1; i<4; i++){
				s+="<p><img src='view/img/heroes/" + idh + "_" + i + "_"+sex+".png' class='heroImg'  alt='avatar"+i+"'" + "id='avatar"+i+"'></p>";
			
				}
			//	alert(s);
		$('#heroImgs').html(s);  
		$('.heroImg').bind('click', getHeroImg );
		
		var la=""+window.location;
		//alert(la);
		var lar=la.split("&");
		 lang=lar[lar.length-1].substr(5);
		//alert(lang);
		
		$.get('controller/getArms.php', {'idh':idh, 'lang':lang}, function(data){
		//alert(data);
			 var a=data.split("#");
			for(var i=0; i<a.length; i++){
				var b=a[i].split("^");
				//alert("b[0]="+b[0]);
				var n=eval(b[0]);
sa+="<div class='heroArmCont'><img src='view/img/arms/" + idh + "_" + n + ".png' class='heroArm'  alt='heroArm"+ n +"'" + " id='arm"+ n +"'>";
sa+="<div id='armDet" +  n + "'>" + b[1] + ' ('+ b[2] +')'+"</div></div>";
			 }
			// alert(sa);
			 $('#heroArms').html(sa);  
			 $('.heroArm').bind('click', getHeroArm );
			});		
}

var getHeroImg=function(event){
//alert('img');
	$('.heroImg').removeClass('imgSel');
	
	$(this).addClass('imgSel');
	var sr=$(this).attr('src');
	$('#heroImgCurrent').attr('src', sr);
	$('#heroArmCurrent').attr('src', 'view/img/arms/0.png');
	creaImg=sr;
	$('#heroArmDetCurrent').html('');
	
}

var getHeroArm=function(event){
//
	$('.heroArm').removeClass('imgSel');
	$(this).addClass('imgSel');
	var sr=$(this).attr('src');
	$('#heroArmCurrent').attr('src', sr);
	
	
	creaArm=$(this).attr('id').substr(3);
	//alert('creaArm='+creaArm);
	var ar='#armDet'+creaArm;
	//alert('ar='+ar);
	var armd=$(ar).html();
	//alert(a);
	//creaArmDet=
	$('#heroArmDetCurrent').html(armd);
	
	var p1=armd.indexOf('(');
	var s1=armd.substr(p1);
	//alert(eval(s1));
	creaPower=eval(s1);
	var img="<img src='view/img/rose.png' width="+ (creaPower * 2 ) + " height=24>";
	$('#heroPowerCurrent').html(img);
	
}

var getHeroNa=function(event){
 // alert('nimi');
  var nimi=$(this).val();
 
  if(nimi.length>20) {
    alert('Name max length is 20 characters');
	return;
  }
   creaName=nimi;
  $('#heroNameCurrent').html(nimi);
  
}

function heroSave(){
if(creaName.length==0){
		alert('Name is Empty');
		return;
	}

if(creaIdh==0){
		alert("Hero's Type don't selected!");
		return;
	}
if(creaImg.length==0){
		alert("Hero's Avatar don't selected!");
		return;
	}

if(creaArm==0){
		alert("Arm don't selected!");
		return;
	}
	
$.get('controller/saveNewHero.php', {'creaIdh':creaIdh, 'creaImg':creaImg ,  'creaName':creaName, 'creaSex':creaSex, 'creaArm':creaArm}, function(data){
		
		$('#error123').html(data);
		//alert(data);
		window.location="?page=game&lang="+lang;
	});		
}