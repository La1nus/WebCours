
let iconMenu = document.querySelector(".icon-menu");
let body = document.querySelector("body");
if (iconMenu != null) {
	let menuBody = document.querySelector(".menu__body");
	iconMenu.addEventListener("click", function (e) {
		iconMenu.classList.toggle("_active");
		menuBody.classList.toggle("_active");
		body.classList.toggle("_lock");
	});
};

let Edit = document.querySelector("#edit");
if (Edit != null) {
	let OpenEdit = document.querySelector(".open-edit");
	Edit.addEventListener("click", function (e) {
		OpenEdit.classList.toggle("_active");
	});
};

let UpdateEdit = document.querySelector("#update_btn");
if (UpdateEdit != null) {
	let OpenUpdateDeleteEdit = document.querySelector(".edit-update-delete");
	let UpdateBtn = document.querySelector("#update_article");
	let DeleteBtn = document.querySelector("#delete_article");
	UpdateEdit.addEventListener("click", function (e) {
		if (!DeleteBtn.classList.contains("_active")) {
			OpenUpdateDeleteEdit.classList.toggle("_active")
		}
		UpdateBtn.classList.toggle("_active");
		DeleteBtn.classList.remove("_active");
	});
};

let DeleteEdit = document.querySelector("#delete_btn");
if (DeleteEdit != null) {
	let OpenUpdateDeleteEdit = document.querySelector(".edit-update-delete");
	let UpdateBtn = document.querySelector("#update_article");
	let DeleteBtn = document.querySelector("#delete_article");
	DeleteEdit.addEventListener("click", function (e) {
		if (!UpdateBtn.classList.contains("_active")) {
			OpenUpdateDeleteEdit.classList.toggle("_active")
		}
		UpdateBtn.classList.remove("_active");
		DeleteBtn.classList.toggle("_active");
	});
};