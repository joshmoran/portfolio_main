// alert( window.innerWidth );


let header = document.getElementById('header');
let container = document.getElementById('container');
let footer = document.getElementById('footer');

let headerHeight = header.offsetHeight;
let windowHeight = window.innerHeight;
let containerHeight = container.offsetHeight;



// alert( header.offsetHeight );
window.addEventListener('change', () => {
    sleep(1000);
    changeDimensions;
});
window.addEventListener('load', changeDimensions );

function changeDimensions() {

    // alert( windowHeight);
    container.style.marginTop = Number( ( windowHeight - containerHeight ) / 2 ) + 'px';
    header.style.top = 0;

}