var hiddenElement = document.getElementById("txt");
var btn = document.querySelector('.btn');
function handleButtonClick() {
	hiddenElement.scrollIntoView({block: "center", behavior: "smooth"});
}
btn.addEventListener('click', handleButtonClick);