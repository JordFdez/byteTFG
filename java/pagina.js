var progreso = document.getElementById("progreso");

progreso.innerHTML = progreso.value;

progreso.oninput = function(){
    output.innerHTML = this.value;
}

progreso.addEventListener("mousemove", function(){
    var x = progreso.value;
    var color = 'linear-gradient(90deg, rgb(117,252,117)' + x + '%, rgb(214,214,214)' + x + '%)';
    progreso.style.background = color;
})

const musica = new Audio('../otro/audio/1.mp3');
// musica.play();
const canciones = [
    {
        id: 1,
        songname: `titulo cancion
        <div class="subtitulo">Nombre de autor</div>`,
        poster: "../otro/img/1.jpg"
    }
    
]







var canciones_pop_izquierda = document.getElementById('canciones_pop_izquierda');
var canciones_pop_derecha = document.getElementById('canciones_pop_derecha');
var canciones_pop = document.getElementsByClassName('canciones_pop')[0];


canciones_pop_derecha.addEventListener('click', () =>{
    canciones_pop.scrollLeft += 330;
});
canciones_pop_izquierda.addEventListener('click', () =>{
    canciones_pop.scrollLeft -= 330;
});

var artistas_pop_izquierda = document.getElementById('artistas_pop_izquierda');
var artistas_pop_derecha = document.getElementById('artistas_pop_derecha');
var item = document.getElementsByClassName('artistas_bx')[0];

artistas_pop_derecha.addEventListener('click', () =>{
    item.scrollLeft += 330;
});
artistas_pop_izquierda.addEventListener('click', () =>{
    item.scrollLeft -= 330;
});


