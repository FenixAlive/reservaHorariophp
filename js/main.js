var state = [];

function ccaja(elmnt){
  var el =Number((elmnt.id).slice(1));
  var disp = Number(document.getElementById("c"+el).innerHTML);
  if(!state[el]){
    state[el] = 1;
    disp--;
    elmnt.className = "caja tomado"
  }else{
    state[el] = 0;
    disp++;
    elmnt.className = "caja"
  }
document.getElementById("c"+el).innerHTML = disp;
var url = 'app/update.php';
const data = new FormData();
data.append('id', el);
data.append('disp', disp);

fetch(url, {
  method: 'POST', // or 'PUT'
  body: data, // data can be `string` or {object}!
}).then(res => {
    if(res.ok){
        return res.text();
    }else{
        throw "error en fetch";
    }
}).then(function(texto) {
   console.log(texto);
})
.catch(function(err) {
   console.log(err);
});
}

function main(){
  var container = document.getElementById("container");
  for(let i=0; i<25; i++){
    state.push(0);
    let hora = i%2 ? (8+Math.floor(i/2)).toString()+":30": (8+ i*.5).toString()+":00";
    container.insertAdjacentHTML("beforeend", `<div class="caja" id="n${i}" onclick="ccaja(this)"><div class="hora">${hora}</div> <div class="conta" id="c${i}">8</div></div>`) 
  }
}