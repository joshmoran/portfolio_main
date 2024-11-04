// alert( window.innerWidth );

let header = document.getElementById('header');
let container = document.getElementById('container');

let headerHeight = header.offsetHeight;
let windowHeight = window.innerHeight;
let containerHeight = container.offsetHeight;



// alert( header.offsetHeight );
window.addEventListener('change', changeDimentsions );

window.addEventListener('load', changeDimentsions );

function changeDimentsions() {
    container.style.marginTop = Number( ( windowHeight - containerHeight ) / 2 ) + 'px';
    header.style.top = 0;

}