function $ (id){
	return document.getElementById(id);
}

function init(){
	$('felhnev').addEventListener('change',regEll,false);
	$('email').addEventListener('change',emailEll,false);
}
window.addEventListener('load',init,false);

function regEll(e){
	var felhnev = this.value;
	ajax({
		url: 'regell.php',
		getadat: 'felhnev=' + encodeURIComponent(felhnev),
		siker: function (xhr, data){
					console.log(data);
					var json = JSON.parse(data);
					var unique = json.unique;
					$('spanregfhnev').innerHTML = unique ? 'OK' : 'Már létezik'; 
				}
	});
	
}
function emailEll(e){
	var email = this.value;
	ajax({
		url: 'regellemail.php',
		getadat: 'email=' + encodeURIComponent(email),
		siker: function (xhr, data){
					console.log(data);
					var json = JSON.parse(data);
					var unique = json.unique;
					$('spanregemail').innerHTML = unique ? 'OK' : 'Ezzel az email címmel már regisztráltak'; 
				}
	});
	
}