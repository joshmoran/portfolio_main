// alert( window.innerWidth );

let header = document.getElementById('header');
let container = document.getElementById('container');
let footer = document.getElementById('footer');

let headerHeight = header.offsetHeight;
let windowHeight = window.innerHeight;
let containerHeight = container.offsetHeight;
let footerHeight = footer.offsetHeight;Height = footer.offsetHeight;



// alert( header.offsetHeight );
window.addEventListener('change', changeDimentsions );

window.addEventListener('load', changeDimentsions );

function changeDimentsions() {
    container.style.marginTop = Number( headerHeight + 25 ) + 'px';
    
    container.style.marginBottom = Number( footerHeight + 25 ) + 'px';
    header.style.top = 0;

}