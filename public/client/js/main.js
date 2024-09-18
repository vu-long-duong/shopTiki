function loadContentById(id, url) {
    const element = document.getElementById(id);
    if (element) {
        fetch(url)
            .then(response => response.text())
            .then(data => {
                element.innerHTML = data;
            })
            .catch(error => console.error('Error loading content:', error));
    } else {
        console.error(`Element with id "${id}" not found.`);
    }
}

// document.addEventListener('DOMContentLoaded', () => {
//     loadContentById('header-container', './home/header.html');
// } );

// document.addEventListener('DOMContentLoaded', () => {
//     loadContentById('nav-container', './home/nav.html');
// } );

// document.addEventListener('DOMContentLoaded', () => {
//     loadContentById('slide-container', './home/slide.html');
// } );

// document.addEventListener('DOMContentLoaded', () => {
//     loadContentById('promotion-container', './home/promotion.html');
// } );

// document.addEventListener('DOMContentLoaded', () => {
//     loadContentById('super-promotion-container', './home/super-promotion.html');
// } );

// document.addEventListener('DOMContentLoaded', () => {
//     loadContentById('product-interest-container', './home/product-interest.html');
// } );

// document.addEventListener('DOMContentLoaded', () => {
//     loadContentById('product-price-shock-container', './home/product-price-shock.html');
// } );

// document.addEventListener('DOMContentLoaded', () => {
//     loadContentById('genuine-brand-container', './home/genuine-brand.html');
// } );

// document.addEventListener('DOMContentLoaded', () => {
//     loadContentById('genuine-import-container', './home/genuine-import.html');
// } );

// document.addEventListener('DOMContentLoaded', () => {
//     loadContentById('might-like-container', './home/might-like.html');
// } );

// document.addEventListener('DOMContentLoaded', () => {
//     loadContentById('today-suggestion-container', './home/today-suggestion.html');
// } );

// document.addEventListener('DOMContentLoaded', () => {
//     loadContentById('payment-svg-container', './home/payment-svg.html');
// } );

// document.addEventListener('DOMContentLoaded', () => {
//     loadContentById('footer-container', './home/footer.html');
// } );

// document.querySelector('.product-detail-description-view-all').addEventListener('click', function() {
//     const content = document.querySelector('.product-detail-description-content');
//     content.classList.toggle('expanded');

//     if (content.classList.contains('expanded')) {
//         this.textContent = "Thu gọn";
//     } else {
//         this.textContent = "Xem thêm";
//     }
// } );


function setupQuantityControls() {
    let quantity = document.querySelector(".seller-product-qnt");
    let minusButton = document.querySelector('.seller-product-control-minus');

    if (parseInt(quantity.value) == 1) minusButton.classList.add('disable');

    minusButton.addEventListener('click', function() {
        let currentValue = parseInt(quantity.value);
        if (currentValue > 1) quantity.value = currentValue - 1;
            if (parseInt(quantity.value) == 1) minusButton.classList.add('disable');
    });

    document.querySelector(".seller-product-control-plus").addEventListener('click', function() {
        let currentValue = parseInt(quantity.value);
        quantity.value = currentValue + 1;
        if (parseInt(quantity.value) > 1) minusButton.classList.remove('disable');
    });
}

function initializeToggleIcons () { 
    let iconDown = document.querySelector('#toggle-icon-down');
    let iconUp = document.querySelector('#toggle-icon-up');
    let toggleContainer = document.querySelector('#toggle-container');

    function toggleIcons(isDown) {
        iconDown.style.display = isDown ? 'block' : 'none';
        iconUp.style.display = isDown ? 'none' : 'block';
        toggleContainer.style.display = isDown ? 'block' : 'none';
    }

    toggleIcons(true);

    iconDown.addEventListener('click', function() {
        toggleIcons(false);
    });

    iconUp.addEventListener('click', function() {
        toggleIcons(true);
    });
}
