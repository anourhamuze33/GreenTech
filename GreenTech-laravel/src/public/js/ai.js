const ai_btn = document.getElementById("aiBtn");
const aiMessage = document.getElementById("aiMessage");

ai_btn.addEventListener("click", async (e)=>{
    const productName = document.getElementById('name').value
    const description = document.getElementById('description')
    console.log(productName);
    
    if(!productName){
        alert("entrer le  nom")
        return;
    }
    ai_btn.innerText = "generation en cours..."
    ai_btn.disabled= true;
    aiMessage.innerText = "l'ia create une description, attender vous";
    const urlFetch = `/ai/description/${productName}`;

        try {            
            const response = await fetch(urlFetch);
            const data = await response.json(); 
            description.value= data
            if(data){
                ai_btn.innerText = "Generate autre description"
                 aiMessage.innerText = "";
                 ai_btn.disabled = false;
            }
        } catch (error) {
            console.error('error de la get des produits:', error);
        }
})