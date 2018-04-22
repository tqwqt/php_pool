
var  id = 0;
var  arr_list = [];
var list = document.getElementById('ft_list');
var add = document.createElement("BUTTON");
var btn_text = document.createTextNode("New");

add.appendChild(btn_text);
add.style.width = "20%";
add.style.marginRight = "40%";
add.style.marginLeft = "40%";
add.style.fontSize = "1.5vw";
add.style.borderRadius = "5px";
add.style.border = "solid black 2px";
add.style.marginTop = "5%";
add.setAttribute( "onclick", "add_todo()");
list.style.backgroundColor = "darkblue";
list.style.width = "30%";
list.style.minHeight = "45%";
list.style.marginLeft = "35%";
list.style.marginRight = "35%";

list.style.marginBottom = "5%";
list.style.paddingBottom = "1vh";
list.style.paddingTop = "1vh";
document.body.appendChild(add);
document.body.appendChild(list);
document.body.style.position = "absolute";
document.body.style.width = "100%";
document.body.style.height = "100%";

var c;
c = document.cookie;
console.log(c);
var max = -1;
var arr = document.cookie.split(";");

for( var el in arr)
{
    var tmp = -1;
    var i = arr[el].indexOf("=");
    tmp = parseInt(arr[el].substr(0,i));
    if (tmp > max)
        max = tmp;

}
for (var ell in arr)
{
    var text = arr[ell].substr(arr[ell].indexOf('=') + 1);
    var idd = arr[ell].substr(0, arr[ell].indexOf('='));
    console.log(text);
    displayTodo(atob(text), idd);
}
id = max + 1;

function add_todo() {
    var  elem = document.createElement('div');
    var  pro = prompt("Enter TODO text:");
    var  text = document.createTextNode(pro);
    var  date = new Date();
    date.setDate(date.getDate()+1);
    elem.appendChild(text);
    elem.style.wordWrap = "break-word";
    elem.style.backgroundColor = "white";
    elem.style.width = "70%";
    elem.style.height = "auto";
    elem.style.marginTop = "2.5%";
    elem.style.marginBottom = "2.5%";
    elem.style.position = "relative";
    elem.style.marginLeft = "15%";
    elem.style.marginRight = "15%";
    elem.addEventListener("click", delete_elem);
    elem.setAttribute("id", id+"");
    arr_list.push(elem);

    document.cookie= id+"="+btoa(pro)+";expires="+date.toUTCString();
    list.insertBefore(elem, list.childNodes[0]);
    id++;
}
function delete_elem() {
    var res = confirm("Delete this TODO?");
    if (res)
    {
        var  date = new Date();
        date.setDate(date.getDate()-1);
        document.cookie = this.id+"= ;expires="+date.toUTCString();
        list.removeChild(this);
    }
}

function displayTodo(todo, idd) {

    var  elem = document.createElement('div');
    var  text = document.createTextNode(todo);
    elem.appendChild(text);
    elem.style.wordWrap = "break-word";
    elem.style.backgroundColor = "white";
    elem.style.width = "70%";
    elem.style.height = "auto";
    elem.style.marginTop = "2.5%";
    elem.style.marginBottom = "2.5%";
    elem.style.position = "relative";
    elem.style.marginLeft = "15%";
    elem.style.marginRight = "15%";
    elem.addEventListener("click", delete_elem);
    elem.setAttribute("id", idd+"");
    list.insertBefore(elem, list.childNodes[0]);
}
