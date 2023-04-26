//Inserir dados 
localStorage.setItem("name", "krypthon");


//Inserir sem perder dados 


//resgatar item 

const name = localStorage.getItem("name");
// const key = localStorage.getItem("key");
console.log(name);

const lastName = localStorage.getItem("lastName")

if(!lastName){
    console.log("Sem sobrenome")
}else{
    console.log(lastName);
}

//remover items 
localStorage.removeItem("name")

//remover todos os items
localStorage.setItem("a", 1)
localStorage.setItem("b", 5)
localStorage.clear();


//session storage




