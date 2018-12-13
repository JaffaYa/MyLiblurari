document.addEventListener( "DOMContentLoaded", function( event ) {
	
	// кнопка переклячатель для редактіровання форми
	(function(){
		function tumblerChange(self){
			var text = self.parentElement.children["0"].children["0"]; 
			var updateForm = self.parentElement.children["0"].children["1"];
			var textActive = true;

			for (let j = 0; j < text.classList.length; j++) {
				if( text.classList[j] == 'text-active' ){
					textActive = true;
				}
			}

			for (let j = 0; j < updateForm.classList.length; j++) {
				if( updateForm.classList[j] == 'text-active' ){
					textActive = false;
				}
			}

			return function(){
				if(textActive){
					// переробити
					console.log(1);
					text.className = 'text';
					updateForm.className = 'updateForm text-active';
					textActive = false;
				}else{
					// переробити
					console.log(2);
					text.className = 'text text-active';
					updateForm.className = 'updateForm';
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