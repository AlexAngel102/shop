"use strict";

const categoryTemplate = document.querySelector('#categoryItem');
const itemTemplate = document.querySelector("#product");
const categories = document.querySelector('#categories');

function getCategories() {
    $.get('/categories', {}, function (data) {
        for (let cat of data) {
            const category = categoryTemplate.content.cloneNode(true);
            let element = category.querySelector(".nav-link");
            element.insertAdjacentHTML("afterbegin", cat.name)
            element.setAttribute("href", `/category/?id=${cat.category_id}`);
            element.querySelector("span").insertAdjacentHTML('afterbegin', cat.amount)
            categories.append(category);
        }
        setTimeout(listenNav, 0);
    });
}

function listenNav() {

    let categoriesNav = document.querySelectorAll(".nav-link");

    for (const categoriesNavElement of categoriesNav) {
        categoriesNavElement.addEventListener("click", function (ev) {
            // ev.preventDefault();
            let catUrl = ev.target.href;
            let link = new URL(catUrl);
            let id = link.searchParams.get("id");
            getItems(id);
        });
    }
}

function getItems(categoryId){
    $.get("/category/",{"categoryId":categoryId}, function (data){
        const item = itemTemplate.content.cloneNode(true);

    });
}

document.addEventListener("DOMContentLoaded", async function (ev) {

    getCategories();


});



