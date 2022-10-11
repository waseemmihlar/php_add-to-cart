const header=document.querySelector("header");

window.addEventListener("scroll",function(){
    header.classList.toggle("sticky",this.scrollY>0);
});

let menu=document.querySelector("#menu-icon");
let navlist=document.querySelector(".navlist");

menu.onclick=()=>{
    menu.classList.toggle('bx-x');
    navlist.classList.toggle('active')
};

window.onscroll=()=>{
    menu.classList.remove('bx-x');
    navlist.classList.remove('active')
};

const sr=ScrollReveal({
    distance:'45px',
    duration:2000,
    reset:true
})

sr.reveal('.introduction',{delay:350,origin:'left'})
sr.reveal('.profile-photo',{delay:350,origin:'right'})


sr.reveal('.education,.about,.project,.contact,.end',{delay:200,origin:'bottom'})





// form script

var form = document.getElementById("my-form");
    
    async function handleSubmit(event) {
      event.preventDefault();
      var status = document.querySelector("#status");
      var data = new FormData(event.target);
      fetch(event.target.action, {
        method: form.method,
        body: data,
        headers: {
            'Accept': 'application/json'
        }
      }).then(response => {
        if (response.ok) {
          status.innerHTML = "Thanks for your submission!";
          form.reset()
        } else {
          response.json().then(data => {
            if (Object.hasOwn(data, 'errors')) {
              status.innerHTML = data["errors"].map(error => error["message"]).join(", ")
            } else {
          
              status.innerHTML = "Oops! There was a problem submitting your form"
              
            }
          })
        }
      }).catch(error => {
        status.innerHTML = "Oops! There was a problem submitting your form"
      });
    }
    form.addEventListener("submit", handleSubmit)




