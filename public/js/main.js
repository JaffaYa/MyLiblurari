document.addEventListener( "DOMContentLoaded", function( event ) {
	
	// кнопка переклячатель для редактіровання форми
	(function(){
		function tumblerChange(self){
			var text = self.parentElement.children["0"].children["0"]; 
			var updateForm = self.parentElement.children["0"].children["1"];
			var textActive = true;

			return function(){
				if(textActive){
					text.classList.remove('text-active');
					updateForm.classList.add('text-active');
					textActive = false;
				}else{
					text.classList.add('text-active');
					updateForm.classList.remove('text-active');
					textActive = true;
				}
			}
		}

		//start
		var chageButtons = document.querySelectorAll( "button.chage" );
		for (let i = 0; i < chageButtons.length; i++){
			chageButtons[i].addEventListener( "click", tumblerChange(chageButtons[i]));
		}
	})();//\\кнопка переклячатель для редактіровання форми

});