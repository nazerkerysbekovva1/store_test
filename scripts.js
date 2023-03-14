

const cardsContainer = document.getElementById("cards");
const allCheckBoxes = cardsContainer.querySelectorAll("input.check");
const allCostParagraph = document.getElementById("all-cost");
let allCost = 0;




for (let checkBox of allCheckBoxes) {
    checkBox.addEventListener('change', function() {
        if (this.checked) {
            let cost = checkBox.parentElement.querySelector("span").innerHTML;
            allCost += Number(cost);
            allCostUpdate();
        } else {
            let cost = checkBox.parentElement.querySelector("span").innerHTML;
            allCost -= Number(cost);
            allCostUpdate();
        }  
      });
}

const allCostUpdate = () => {
    allCostParagraph.innerHTML = allCost + " руб.";
}
allCostUpdate();


const checkAllBtn = document.getElementById("check-all-btn");
checkAllBtn.onclick = () => {

    for (let checkBox of allCheckBoxes) {
        checkBox.checked = true;
        let cost = checkBox.parentElement.querySelector("span").innerHTML;
        allCost += Number(cost);
        allCostUpdate();
    }    

}