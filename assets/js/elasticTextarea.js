//TextArea Elastico
function eylem(a,b){
	sayi=b.split("\n").length;
		
		c=sayi*20+40; //*20+48
		a.style.height = c+"px"; 

		console.log(b);
}


// Tooltip
// $(document).ready(function(){

// 	$('[data-toggle="tooltip"]').tooltip({
// 		placement: 'right',
// 		title: "<h3>Help</h3><p>Exemplo</p>",
// 		animation: true,
// 		delay:{show:300, hide:500},
// 		html: true
// 	});
// });

$(function(){
	$('[data-toggle="tooltip"]').tooltip();

});