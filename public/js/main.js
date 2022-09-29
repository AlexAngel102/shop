"use strict";

const categoryTemplate = document.querySelector('#categoryItem');
const itemTemplate = document.querySelector('#product');
const categories = document.querySelector('#categories');
const productList = document.querySelector('#productList');
const orderBy = document.querySelector('#order');
const welcome = document.querySelector("#welcomeBlock");

async function getCategories() {
    await $.get('/categories', {}, function (data) {
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
            ev.preventDefault();
            let catUrl = ev.target.href;
            history.pushState({}, "", catUrl);
            orderBy.selectedIndex = 1;
            getItems(catUrl);
        });
    }
}

orderBy.addEventListener('change', function () {
    let order = this.value;
    let link = window.location.href;
    getItems(link, order);
});


async function getItems(link, order = 'name') {
    if (welcome) {
        welcome.setAttribute('hidden', true);
    }
    await $.get(link, {'order': order}, async function (data) {
        if (data) {
            productList.replaceChildren();
            for (let product of data) {
                let item = await renderItems(product);
                productList.append(item);
            }
        }
    });
}



function createModal(item){
    document.querySelector(".card").addEventListener('click', function (){

    });
}

function renderItems(product) {
    const item = itemTemplate.content.cloneNode(true);
    item.querySelector(".card-title").insertAdjacentHTML('afterbegin', product.name);
    item.querySelector(".card-text").insertAdjacentHTML('afterbegin', product.price);
    item.querySelector("#date").insertAdjacentHTML('afterbegin', product.date);
    item.querySelector('#date').removeAttribute('id');
    return item;
}

async function makeRequest(url) {
    try {
        const response = await fetch(url);
        const stat = response.status;
        if (stat >= 400 && stat <= 499) {
            try {
                await getItems(url);
            } catch (err) {
                console.log('status: 404');
                productList.replaceChildren('');
                const status404 = '<div class="container"><b><h1>404</h1></b><h2>Page not found</h2></div>';
                welcome.innerHTML = status404;
                welcome.removeAttribute('hidden');
            }
        }
    } catch (err) {
        console.log('status: 500')
        productList.replaceChildren('');
        const status500 = `<div class="container"><b><h1>500</h1></b><h2>Internal server error</h2></div>`;
        welcome.innerHTML = status500;
        welcome.removeAttribute('hidden');
    }
}

window.addEventListener("load", function (ev) {

    let url = this.location.href;

    getCategories();

    makeRequest(url);

});
