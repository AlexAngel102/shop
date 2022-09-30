"use strict";

const categoryTemplate = document.querySelector('#categoryItem');
const itemTemplate = document.querySelector('#product');
const itemModal = document.querySelector('#itemModal');
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
            categoriesNav.forEach((el) => el.classList.remove("text-white"));
            this.classList.add("text-white");
            let catUrl = ev.target.href;
            history.replaceState({}, "", catUrl);
            getItems(catUrl);
        });
    }
}

orderBy.addEventListener('change', async function () {
    let order = this.value;
    let link = new URL(window.location.href);
    link.searchParams.set('order', order);
    history.pushState('', {}, link);
    await getItems(link, order);
});

async function getItems(link, order) {

    if (welcome) {
        welcome.setAttribute('hidden', true);
    }
    const url = new URL(link);
    const paramOrder = new URLSearchParams(link).get('order');
    if (`http://${url.hostname}/` != url.href) {
        if (!paramOrder) {
            if (order) {
                url.searchParams.set('order', order);
                history.pushState('', {}, url);
            } else {
                url.searchParams.append('order', 'name');
                history.pushState('', {}, url);
            }
        }
    }
    await $.get(url, {'json': "true"}, function (data) {
        if (data) {
            productList.replaceChildren();
            for (let product of data) {
                let item = renderItems(product);
                createModal(item, product);
                productList.append(item);
            }
        }
    });
}


async function createModal(item, product) {
    await item.querySelector(".btn").addEventListener('click', function () {
        const productModal = itemModal.content.cloneNode(true);
        productModal.querySelector(".title").insertAdjacentHTML('afterbegin', product.name);
        productModal.querySelector(".text").insertAdjacentHTML('afterbegin', product.price);
        productModal.querySelector("#date").insertAdjacentHTML('afterbegin', product.date);
        productModal.querySelector('#date').removeAttribute('id');
        bootstrap.Modal.getOrCreateInstance(productModal.querySelector('#productModal')).show();
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

async function makeRequest(url, order = 'name') {
    const response = await fetch(url);
    const stat = response.status;
    try {
        if (stat == 200) {
            await getItems(url, order);
        } else if (stat >= 400 && stat <= 499) {
            await getItems(url, order);
            console.log('status: 404');
            productList.replaceChildren('');
            const status404 = '<div class="container"><b><h1>404</h1></b><h2>Page not found</h2></div>';
            welcome.innerHTML = status404;
            welcome.removeAttribute('hidden');
        }
    } catch (err) {
        if (stat == 500) {
            console.log('status: 500')
            productList.replaceChildren('');
            const status500 = `<div class="container"><b><h1>500</h1></b><h2>Internal server error</h2></div>`;
            welcome.innerHTML = status500;
            welcome.removeAttribute('hidden');
        } else {
            welcome.removeAttribute('hidden');

        }
    }
}

window.addEventListener("load", async function () {

    let url = this.location.search;
    let link = this.location.href;
    let domain = new URL(link);
    const params = new URLSearchParams(url);
    const id = params.get('id');
    let order = params.get('order');
    if (order) {
        await makeRequest(link, order);
    } else {
        await makeRequest(link);
    }

    if (`http://${domain.hostname}/` != domain.href) {

        await getCategories();
        if (id) {
            setTimeout(() => document.querySelector(`[href*='id=${id}']`).classList.add('text-white'), 0);
        }

        let selected;
        switch (params.get('order')) {
            case 'price':
                selected = 0;
                break;
            case 'date':
                selected = 2;
                break;
            default:
                selected = 1;
        }
        orderBy.selectedIndex = selected;
    } else {
        await getCategories();
    }
});
