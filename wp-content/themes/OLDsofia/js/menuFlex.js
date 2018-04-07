
function init_scoutkar_menu_toggle() {
	var burgerBTN = document.getElementById('hamburger');
	var menu_main = document.getElementById('main-menu_scoutkar'); 
	
	burgerBTN.addEventListener('click', function (){
		toggleMenu(menu_main)
		
	})

	function toggleMenu(menuDiv) {

		if (menuDiv.style.display != "block") {
			menuDiv.style.display = "block";
		}else{	
			menuDiv.style.display = "none";
		}
	}
	//class menu-item-has-children
	/*
		add a arrow or something to indicate that this item have childs, and add eventlisteners to show them.
	*/
	var haveChilds = document.getElementsByClassName('menu-item-has-children'); // get menu items that have childs
	for (var i = 0; i < haveChilds.length; i++) {
		var newDiv = document.createElement("div");
		newDiv.innerText = "+";
		newDiv.classList.add("ChildPointer");
		newDiv.addEventListener("click", toggleSumMenu)
		haveChilds[i].appendChild(newDiv);
	}
	function toggleSumMenu(e) {
		
		e.preventDefault();
		this.previousElementSibling.classList.toggle('visabale');
		if(hasClass(this.previousElementSibling, "visabale")){
			this.innerText = "-";
		}else{
			this.innerText = "+";

		}
		
	}

}
function hasClass(element, cls) {
    return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
}


document.addEventListener("DOMContentLoaded", init_scoutkar_menu_toggle);
